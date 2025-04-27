<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyState_Completed extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_state_completed';
    }


}
