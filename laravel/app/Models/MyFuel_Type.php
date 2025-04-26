<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyFuel_Type extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_fuel_type';
    }


}
