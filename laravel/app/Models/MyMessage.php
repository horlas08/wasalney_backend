<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyMessage extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_message';
    }


}
