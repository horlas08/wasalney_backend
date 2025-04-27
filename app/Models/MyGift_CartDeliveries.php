<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyGift_CartDeliveries extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_gift_cart_service_deliveries';
    }


}
