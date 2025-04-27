<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyAdmin_MessageDrivers extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_admin_message_driver_drivers';
    }


}
