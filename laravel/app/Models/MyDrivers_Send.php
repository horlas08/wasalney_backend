<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyDrivers_Send extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_drivers_send';
    }


}
