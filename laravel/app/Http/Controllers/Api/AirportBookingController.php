<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AirportBooking;
use App\Models\AirportFlightDetail;
use App\Models\AirportLuggageDetail;
use App\Models\AirportServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AirportBookingController extends Controller
{
    public function getServiceTypes()
    {
        $types = AirportServiceType::where('active', true)->get();
        return response()->api($types);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_type_id' => 'required|exists:airport_service_types,id',
            'booking_type' => 'required|in:ONE_WAY,ARRIVAL,ROUND_TRIP',
            'pickup_location' => 'required|string',
            'pickup_lat' => 'required|numeric',
            'pickup_lng' => 'required|numeric',
            'booking_date' => 'required|date|after:now',
            'adults' => 'required|integer|min:1',
            'children' => 'integer|min:0',
            'infants' => 'integer|min:0',
            'customer_notes' => 'nullable|string',
            'flight_number' => 'required_unless:booking_type,ONE_WAY',
            'flight_time' => 'required|date|after:now',
            'airline' => 'required_unless:booking_type,ONE_WAY',
            'terminal' => 'nullable|string',
            'ticket_number' => 'required_unless:booking_type,ONE_WAY',
            'large_bags' => 'integer|min:0',
            'medium_bags' => 'integer|min:0',
            'small_bags' => 'integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->api(null, $validator->errors()->first(), 422);
        }

        try {
            DB::beginTransaction();

            // Calculate base fare and check for urgent booking
            $serviceType = AirportServiceType::findOrFail($request->service_type_id);
            $baseFare = $serviceType->base_price;
            $urgentBookingFee = 0;

            $bookingDate = \Carbon\Carbon::parse($request->booking_date);
            if ($bookingDate->diffInHours(now()) < 3) {
                $urgentBookingFee = 10000; // 10,000 Dinar for urgent bookings
            }

            // Create booking
            $booking = AirportBooking::create([
                'user_id' => auth()->id(),
                'service_type_id' => $request->service_type_id,
                'booking_type' => $request->booking_type,
                'pickup_location' => $request->pickup_location,
                'pickup_lat' => $request->pickup_lat,
                'pickup_lng' => $request->pickup_lng,
                'booking_date' => $request->booking_date,
                'adults' => $request->adults,
                'children' => $request->children ?? 0,
                'infants' => $request->infants ?? 0,
                'customer_notes' => $request->customer_notes,
                'base_fare' => $baseFare,
                'urgent_booking_fee' => $urgentBookingFee,
                'total_fare' => $baseFare + $urgentBookingFee,
                'status' => 'PENDING'
            ]);

            // Create flight details
            if ($request->booking_type !== 'ONE_WAY') {
                $flightTime = \Carbon\Carbon::parse($request->flight_time);
                $driverArrivalTime = $request->booking_type === 'DEPARTURE'
                    ? $flightTime->copy()->subHours(3)
                    : $flightTime;

                AirportFlightDetail::create([
                    'booking_id' => $booking->id,
                    'flight_number' => $request->flight_number,
                    'flight_time' => $flightTime,
                    'driver_arrival_time' => $driverArrivalTime,
                    'airline' => $request->airline,
                    'terminal' => $request->terminal,
                    'flight_type' => $request->booking_type === 'ARRIVAL' ? 'ARRIVAL' : 'DEPARTURE',
                    'ticket_number' => $request->ticket_number
                ]);
            }

            // Create luggage details
            AirportLuggageDetail::create([
                'booking_id' => $booking->id,
                'large_bags' => $request->large_bags ?? 0,
                'medium_bags' => $request->medium_bags ?? 0,
                'small_bags' => $request->small_bags ?? 0
            ]);

            DB::commit();

            return response()->api($booking->load(['flightDetails', 'luggageDetails', 'serviceType']));
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->api(null, __('Error occurred while processing your request.'), 500);
        }
    }

    public function cancel(Request $request, AirportBooking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            return response()->api(null, __('Unauthorized'), 403);
        }

        if ($booking->status !== 'PENDING' && $booking->status !== 'ASSIGNED') {
            return response()->api(null, __('Booking cannot be cancelled at this stage'), 422);
        }

        $cancellationCharge = 0;
        if ($booking->booking_date->diffInHours(now()) < 2) {
            $cancellationCharge = $booking->base_fare * 0.5; // 50% of base fare
        }

        $booking->update([
            'status' => 'CANCELLED',
            'cancellation_reason' => $request->reason,
            'cancellation_charge' => $cancellationCharge
        ]);

        return response()->api($booking);
    }

    public function getBookingDetails(AirportBooking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            return response()->api(null, __('Unauthorized'), 403);
        }

        return response()->api($booking->load([
            'flightDetails',
            'luggageDetails',
            'serviceType',
            'driver'
        ]));
    }

    public function getUserBookings()
    {
        $bookings = AirportBooking::where('user_id', auth()->id())
            ->with(['flightDetails', 'luggageDetails', 'serviceType', 'driver'])
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->api($bookings);
    }
}
