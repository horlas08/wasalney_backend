<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyCost_Type extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_cost_type';
    }


}
