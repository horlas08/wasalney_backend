<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyWait_Service extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_wait_service';
    }


}
