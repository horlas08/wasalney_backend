<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyLimit extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_limit';
    }


}
