<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AirportBooking;
use App\Models\AirportServiceType;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AirportBookingAdminController extends Controller
{
    public function index()
    {
        $bookings = AirportBooking::with(['user', 'serviceType', 'driver', 'flightDetails', 'luggageDetails'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin-panel.airport-bookings.index', compact('bookings'));
    }

    public function show(AirportBooking $booking)
    {
        $booking->load(['user', 'serviceType', 'driver', 'flightDetails', 'luggageDetails']);
        return view('admin-panel.airport-bookings.show', compact('booking'));
    }

    public function assignDriver(Request $request, AirportBooking $booking)
    {
        $validator = Validator::make($request->all(), [
            'driver_id' => 'required|exists:ar_drivers,id'
        ]);

        if ($validator->fails()) {
            return response()->api(null, $validator->errors()->first(), 422);
        }

        $driver = Driver::findOrFail($request->driver_id);

        $booking->update([
            'driver_id' => $driver->id,
            'status' => 'ASSIGNED'
        ]);

        // TODO: Send notification to driver and user

        return response()->api($booking->load(['driver']));
    }

    public function manageServiceTypes()
    {
        $serviceTypes = AirportServiceType::orderBy('type')->get();
        return view('admin-panel.airport-bookings.service-types', compact('serviceTypes'));
    }

    public function storeServiceType(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'type' => 'required|in:ECONOMY,STANDARD,VIP,CVIP',
            'base_price' => 'required|numeric|min:0',
            'price_per_km' => 'required|numeric|min:0',
            'free_waiting_time' => 'required|integer|min:0',
            'waiting_price_per_hour' => 'required|numeric|min:0',
            'max_passengers' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $serviceType = AirportServiceType::create($request->all());

        return redirect()->route('admin.airport.service-types.index')
            ->with('success', 'Service type created successfully.');
    }

    public function updateServiceType(Request $request, AirportServiceType $serviceType)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'type' => 'required|in:ECONOMY,STANDARD,VIP,CVIP',
            'base_price' => 'required|numeric|min:0',
            'price_per_km' => 'required|numeric|min:0',
            'free_waiting_time' => 'required|integer|min:0',
            'waiting_price_per_hour' => 'required|numeric|min:0',
            'max_passengers' => 'required|integer|min:1',
            'active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->api(null, $validator->errors()->first(), 422);
        }

        $serviceType->update($request->all());
        return response()->api($serviceType);
    }

    public function deleteServiceType(AirportServiceType $serviceType)
    {
        if ($serviceType->bookings()->exists()) {
            return response()->api(null, __('Cannot delete service type with existing bookings'), 422);
        }

        $serviceType->delete();
        return response()->api(null, __('Service type deleted successfully'));
    }

    public function getAvailableDrivers(AirportBooking $booking)
    {
        // Get drivers who are available and match the service type requirements
        $drivers = Driver::where('active', true)
            ->where('status', 'AVAILABLE')
            ->whereDoesntHave('airportBookings', function ($query) use ($booking) {
                $query->whereIn('status', ['ASSIGNED', 'IN_PROGRESS'])
                    ->where(function ($q) use ($booking) {
                        $q->whereBetween('booking_date', [
                            $booking->booking_date->subHours(2),
                            $booking->booking_date->addHours(2)
                        ]);
                    });
            })
            ->get();

        return response()->api($drivers);
    }
}
