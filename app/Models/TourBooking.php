<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TourBooking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'departure_id',
        'destination_id',
        'adults',
        'children',
        'departure_date',
        'return_date',
        'hotel_stars',
        'additional_notes',
        'status',
        'admin_notes'
    ];

    protected $casts = [
        'departure_date' => 'date',
        'return_date' => 'date',
        'adults' => 'integer',
        'children' => 'integer',
        'hotel_stars' => 'integer'
    ];

    const STATUS_PENDING = 'PENDING';
    const STATUS_PROCESSING = 'PROCESSING';
    const STATUS_CONFIRMED = 'CONFIRMED';
    const STATUS_CANCELLED = 'CANCELLED';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function departure(): BelongsTo
    {
        return $this->belongsTo(TourDestination::class, 'departure_id');
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(TourDestination::class, 'destination_id');
    }
} 