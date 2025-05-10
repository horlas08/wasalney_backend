<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirlineTravel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'departure_city',
        'arrival_city',
        'departure_date',
        'return_date',
        'number_of_passengers',
        'travel_class',
        'trip_type',
        'special_requirements',
        'status',
        'admin_notes'
    ];

    protected $casts = [
        'departure_date' => 'date',
        'return_date' => 'date',
        'number_of_passengers' => 'integer'
    ];

    /**
     * Get the user that owns the request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function airportService()
    {
        return $this->belongsTo(AirportServiceType::class, 'airport_service_type_id');
    }
}
