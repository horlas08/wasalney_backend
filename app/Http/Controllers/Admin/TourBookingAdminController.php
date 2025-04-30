<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourBooking;
use App\Models\TourDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TourBookingAdminController extends Controller
{
    public function index()
    {
        $bookings = TourBooking::with(['user', 'departure', 'destination'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin-panel.tour-bookings.index', compact('bookings'));
    }

    public function show(TourBooking $booking)
    {
        $booking->load(['user', 'departure', 'destination']);
        return view('admin-panel.tour-bookings.show', compact('booking'));
    }

    public function updateStatus(Request $request, TourBooking $booking)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:' . implode(',', [
                TourBooking::STATUS_PENDING,
                TourBooking::STATUS_PROCESSING,
                TourBooking::STATUS_CONFIRMED,
                TourBooking::STATUS_CANCELLED
            ]),
            'admin_notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->api(null, $validator->errors()->first(), 422);
        }

        $booking->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes
        ]);

        return response()->api($booking);
    }

    public function destinations()
    {
        $destinations = TourDestination::orderBy('name')->get();
        return view('admin-panel.tour-bookings.destinations', compact('destinations'));
    }

    public function storeDestination(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'is_departure' => 'boolean',
            'active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        TourDestination::create($request->all());

        return redirect()->route('admin.tour.destinations.index')
            ->with('success', __('Destination created successfully.'));
    }

    public function updateDestination(Request $request, TourDestination $destination)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'is_departure' => 'boolean',
            'active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->api(null, $validator->errors()->first(), 422);
        }

        $destination->update($request->all());
        return response()->api($destination);
    }

    public function deleteDestination(TourDestination $destination)
    {
        if ($destination->departureBookings()->exists() || $destination->destinationBookings()->exists()) {
            return response()->api(null, __('Cannot delete destination with existing bookings'), 422);
        }

        $destination->delete();
        return response()->api(null, __('Destination deleted successfully'));
    }
} 