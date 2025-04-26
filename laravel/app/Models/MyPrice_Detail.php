<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyPrice_Detail extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_price_detail';
    }


}
