<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AirlineTravel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AirlineTravelRequestController extends Controller
{
    /**
     * Display a listing of airline travel requests.
     */
    public function index()
    {
        $requests = AirlineTravel::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin-panel.airline-travel.index', compact('requests'));
    }

    /**
     * Display the specified airline travel request.
     */
    public function show($id)
    {
        $request = AirlineTravel::with('user')->findOrFail($id);
        return view('admin-panel.airline-travel.show', compact('request'));
    }

    /**
     * Update the status of an airline travel request.
     */
    public function updateStatus(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:PENDING,PROCESSING,COMPLETED,CANCELLED',
            'admin_notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $travelRequest = AirlineTravel::findOrFail($id);
            $travelRequest->update([
                'status' => $request->status,
                'admin_notes' => $request->admin_notes
            ]);

            return redirect()->route('admin.airline-travel.index')
                ->with('success', 'Status updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error updating status');
        }
    }
}
