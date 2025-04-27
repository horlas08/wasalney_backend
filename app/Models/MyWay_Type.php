<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyWay_Type extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_way_type';
    }


}
