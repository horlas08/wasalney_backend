<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyRate_User extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_rate_user';
    }


}
