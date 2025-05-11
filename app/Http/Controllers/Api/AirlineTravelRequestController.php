<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AirlineTravel;
use Illuminate\Http\Request;
use App\Http\Resources\AirlineTravelRequestResource;
use App\Http\Requests\AirlineTravelRequest;
use Illuminate\Http\Response;

class AirlineTravelRequestController extends Controller
{
    /**
     * Display a listing of the user's travel requests
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $requests = AirlineTravel::where('user_id', $request->user()->id)
            ->latest()
            ->paginate(10);

        return AirlineTravelRequestResource::collection($requests);
    }

    /**
     * Store a new travel request
     *
     * @param AirlineTravelRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AirlineTravelRequest $request)
    {
        $travelRequest = AirlineTravel::create([
            'user_id' => $request->user()->id,
            'departure_city' => $request->departure_city,
            'arrival_city' => $request->arrival_city,
            'departure_date' => $request->departure_date,
            'return_date' => $request->return_date,
            'number_of_passengers' => $request->number_of_passengers,
            'travel_class' => $request->travel_class,
            'trip_type' => $request->trip_type,
            'special_requirements' => $request->special_requirements,
            'status' => 'pending'
        ]);

        return (new AirlineTravelRequestResource($travelRequest))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Display the specified travel request
     *
     * @param AirlineTravel $request
     * @return AirlineTravelRequestResource
     */
    public function show(AirlineTravel $request)
    {
        $this->authorize('view', $request);
        return new AirlineTravelRequestResource($request);
    }

    /**
     * Update the travel request
     *
     * @param AirlineTravelRequest $request
     * @param AirlineTravel $travelRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AirlineTravelRequest $request, AirlineTravel $travelRequest)
    {
        $this->authorize('update', $travelRequest);

        $travelRequest->update($request->validated());

        return (new AirlineTravelRequestResource($travelRequest))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Cancel the travel request
     *
     * @param AirlineTravel $airlineTravel
     * @return \Illuminate\Http\JsonResponse
     */
    public function cancel(AirlineTravel $airlineTravel)
    {
        $this->authorize('cancel', $airlineTravel);

        $airlineTravel->update(['status' => 'cancelled']);

        return (new AirlineTravelRequestResource($airlineTravel))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }
}
