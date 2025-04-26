<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyMoving_Order_Details extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_moving_order_details';
    }


}
