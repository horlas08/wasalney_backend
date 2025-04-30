<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class TourDestination extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'name_ar',
        'description',
        'description_ar',
        'is_departure',
        'active'
    ];

    protected $casts = [
        'is_departure' => 'boolean',
        'active' => 'boolean'
    ];

    public function departureBookings()
    {
        return $this->hasMany(TourBooking::class, 'departure_id');
    }

    public function destinationBookings()
    {
        return $this->hasMany(TourBooking::class, 'destination_id');
    }

    public function getNameAttribute($value)
    {
        return App::getLocale() == 'ar' ? $this->name_ar : $value;
    }

    public function getDescriptionAttribute($value)
    {
        return App::getLocale() == 'ar' ? $this->description_ar : $value;
    }
} 