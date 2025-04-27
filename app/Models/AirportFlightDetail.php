<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirportFlightDetail extends Model
{
    protected $fillable = [
        'booking_id',
        'flight_number',
        'flight_time',
        'driver_arrival_time',
        'airline',
        'terminal',
        'flight_type',
        'ticket_number'
    ];

    protected $casts = [
        'flight_time' => 'datetime',
        'driver_arrival_time' => 'datetime'
    ];

    public function booking()
    {
        return $this->belongsTo(AirportBooking::class, 'booking_id');
    }

    public function calculateDriverArrivalTime()
    {
        // For departures, driver should arrive 3 hours before flight time
        if ($this->flight_type === 'DEPARTURE') {
            return $this->flight_time->subHours(3);
        }
        // For arrivals, calculate based on flight arrival time
        return $this->flight_time;
    }
}
