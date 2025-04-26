<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyCar_Models extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_car_models';
    }


}
