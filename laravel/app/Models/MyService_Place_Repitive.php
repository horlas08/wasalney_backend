<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyService_Place_Repitive extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_service_place_repitive';
    }


}
