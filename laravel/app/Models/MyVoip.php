<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyVoip extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_voip';
    }


}
