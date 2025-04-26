<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyDiscount_Order extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_discount_order';
    }


}
