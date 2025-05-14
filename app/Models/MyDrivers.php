<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyDrivers extends Model
{

    public function __construct()
    {
        $this->table = getLang().'_drivers';
    }
    protected $guarded = [];
    //start
    protected $appends = ['rate'];
    public function getRateAttribute()
    {
        $rate=calulateRate($this->id);
        return round($rate, 2);
    }
    //end

}
