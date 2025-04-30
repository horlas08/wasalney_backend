<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AirlineTravelRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'departure_city' => $this->departure_city,
            'arrival_city' => $this->arrival_city,
            'departure_date' => $this->departure_date,
            'return_date' => $this->return_date,
            'number_of_passengers' => $this->number_of_passengers,
            'travel_class' => $this->travel_class,
            'trip_type' => $this->trip_type,
            'special_requirements' => $this->special_requirements,
            'status' => $this->status,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
