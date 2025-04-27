<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyRejected_Order extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_rejected_order';
    }


}
