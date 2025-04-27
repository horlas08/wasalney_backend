<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyHeavy_Equipment extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_heavy_equipment';
    }


}
