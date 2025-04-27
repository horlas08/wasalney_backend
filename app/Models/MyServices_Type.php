<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyServices_Type extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_services_type';
    }


}
