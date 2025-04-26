<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyPrefixes extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_prefixes';
    }


}
