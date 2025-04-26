<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyDriver_Agency extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_driver_agency';
    }


}
