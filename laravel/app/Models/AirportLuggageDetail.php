<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirportLuggageDetail extends Model
{
    protected $fillable = [
        'booking_id',
        'large_bags',
        'medium_bags',
        'small_bags'
    ];

    protected $casts = [
        'large_bags' => 'integer',
        'medium_bags' => 'integer',
        'small_bags' => 'integer'
    ];

    public function booking()
    {
        return $this->belongsTo(AirportBooking::class, 'booking_id');
    }

    public function getTotalBags()
    {
        return $this->large_bags + $this->medium_bags + $this->small_bags;
    }
}
