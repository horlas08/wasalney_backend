<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyStop_On_Way extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_stop_on_way';
    }


}
