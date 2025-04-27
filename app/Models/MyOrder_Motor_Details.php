<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyOrder_Motor_Details extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_order_motor_details';
    }


}
