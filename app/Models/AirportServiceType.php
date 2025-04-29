<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirportServiceType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'name_ar',
        'type',
        'base_price',
        'price_per_km',
        'free_waiting_time',
        'waiting_price_per_hour',
        'max_passengers',
        'active'
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
        'price_per_km' => 'decimal:2',
        'waiting_price_per_hour' => 'decimal:2',
        'active' => 'boolean'
    ];

    public function bookings()
    {
        return $this->hasMany(AirportBooking::class, 'service_type_id');
    }
}
