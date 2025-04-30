<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AirportBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_type_id',
        'driver_id',
        'booking_type',
        'pickup_location',
        'booking_date',
        'adults',
        'children',
        'infants',
        'base_fare',
        'urgent_booking_fee',
        'waiting_charges',
        'total_fare',
        'status',
        'customer_notes',
    ];

    protected $casts = [
        'booking_date' => 'datetime',
        'adults' => 'integer',
        'children' => 'integer',
        'infants' => 'integer',
        'base_fare' => 'decimal:2',
        'urgent_booking_fee' => 'decimal:2',
        'waiting_charges' => 'decimal:2',
        'total_fare' => 'decimal:2',
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function serviceType(): BelongsTo
    {
        return $this->belongsTo(AirportServiceType::class, 'service_type_id');
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(MyDrivers::class, 'driver_id');
    }

    public function flightDetails(): HasMany
    {
        return $this->hasMany(AirportFlightDetail::class, 'booking_id');
    }

    public function luggageDetails(): HasOne
    {
        return $this->hasOne(AirportLuggageDetail::class, 'booking_id');
    }

    // Status constants
    const STATUS_PENDING = 'PENDING';
    const STATUS_ASSIGNED = 'ASSIGNED';
    const STATUS_IN_PROGRESS = 'IN_PROGRESS';
    const STATUS_COMPLETED = 'COMPLETED';
    const STATUS_CANCELLED = 'CANCELLED';

    // Booking type constants
    const TYPE_PICKUP = 'PICKUP';
    const TYPE_DROPOFF = 'DROPOFF';
}
