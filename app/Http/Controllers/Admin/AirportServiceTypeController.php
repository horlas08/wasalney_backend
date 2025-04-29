<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AirportServiceType;
use Illuminate\Http\Request;

class AirportServiceTypeController extends Controller
{
    /**
     * Display a listing of the service types.
     */
    public function index()
    {
        $serviceTypes = AirportServiceType::all();
        return view('admin-panel.airport.service-types.index', compact('serviceTypes'));
    }

    /**
     * Store a newly created service type.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'base_price' => 'required|numeric|min:0',
            'is_active' => 'boolean'
        ]);

        AirportServiceType::create($validated);

        return redirect()->route('admin.airport.service-types.index')
            ->with('success', 'Service type created successfully.');
    }

    /**
     * Update the specified service type.
     */
    public function update(Request $request, AirportServiceType $serviceType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'base_price' => 'required|numeric|min:0',
            'is_active' => 'boolean'
        ]);

        $serviceType->update($validated);

        return redirect()->route('admin.airport.service-types.index')
            ->with('success', 'Service type updated successfully.');
    }

    /**
     * Remove the specified service type.
     */
    public function destroy(AirportServiceType $serviceType)
    {
        $serviceType->delete();

        return redirect()->route('admin.airport.service-types.index')
            ->with('success', 'Service type deleted successfully.');
    }
}
