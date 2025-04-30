<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TourBooking;
use App\Models\TourDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TourBookingController extends Controller
{
    public function getDestinations()
    {
        $destinations = TourDestination::where('active', true)
            ->get()
            ->map(function ($destination) {
                return [
                    'id' => $destination->id,
                    'name' => $destination->name,
                    'name_ar' => $destination->name_ar,
                    'description' => $destination->description,
                    'description_ar' => $destination->description_ar,
                    'is_departure' => $destination->is_departure
                ];
            });

        return response()->api($destinations);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'departure_id' => 'required|exists:tour_destinations,id',
            'destination_id' => 'required|exists:tour_destinations,id|different:departure_id',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
            'departure_date' => 'required|date|after:today',
            'return_date' => 'required|date|after:departure_date',
            'hotel_stars' => 'required|integer|min:1|max:5',
            'additional_notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->api(null, $validator->errors()->first(), 422);
        }

        // Verify departure and destination locations
        $departure = TourDestination::findOrFail($request->departure_id);
        $destination = TourDestination::findOrFail($request->destination_id);

        if (!$departure->is_departure) {
            return response()->api(null, __('Selected departure location is not valid'), 422);
        }

        $booking = TourBooking::create([
            'user_id' => auth()->id(),
            'departure_id' => $request->departure_id,
            'destination_id' => $request->destination_id,
            'adults' => $request->adults,
            'children' => $request->children,
            'departure_date' => $request->departure_date,
            'return_date' => $request->return_date,
            'hotel_stars' => $request->hotel_stars,
            'additional_notes' => $request->additional_notes,
            'status' => TourBooking::STATUS_PENDING
        ]);

        return response()->api($booking->load(['departure', 'destination']));
    }

    public function getUserBookings()
    {
        $bookings = TourBooking::where('user_id', auth()->id())
            ->with(['departure', 'destination'])
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->api($bookings);
    }

    public function getBookingDetails(TourBooking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            return response()->api(null, __('Unauthorized'), 403);
        }

        return response()->api($booking->load(['departure', 'destination']));
    }

    public function cancel(Request $request, TourBooking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            return response()->api(null, __('Unauthorized'), 403);
        }

        if ($booking->status !== TourBooking::STATUS_PENDING) {
            return response()->api(null, __('Booking cannot be cancelled at this stage'), 422);
        }

        $booking->update([
            'status' => TourBooking::STATUS_CANCELLED,
            'admin_notes' => $request->reason
        ]);

        return response()->api($booking);
    }
}
