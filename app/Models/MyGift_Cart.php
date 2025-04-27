<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyGift_Cart extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_gift_cart';
    }


}
