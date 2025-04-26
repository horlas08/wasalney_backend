<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyCondition_Rate extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_condition_rate';
    }


}
