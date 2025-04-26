<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyPrice_Parcel extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_price_parcel';
    }


}
