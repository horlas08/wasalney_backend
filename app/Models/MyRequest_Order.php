<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyRequest_Order extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_request_order';
    }


}
