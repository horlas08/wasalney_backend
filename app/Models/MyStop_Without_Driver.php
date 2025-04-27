<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyStop_Without_Driver extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_stop_without_driver';
    }


}
