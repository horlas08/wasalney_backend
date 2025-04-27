<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyRate extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_rate';
    }


}
