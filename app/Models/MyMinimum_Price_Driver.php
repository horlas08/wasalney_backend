<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyMinimum_Price_Driver extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_minimum_price_driver';
    }


}
