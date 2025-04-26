<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyLevel extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_level';
    }


}
