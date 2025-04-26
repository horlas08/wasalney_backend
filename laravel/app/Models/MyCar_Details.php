<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyCar_Details extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_car_details';
    }


}
