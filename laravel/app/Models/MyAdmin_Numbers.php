<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyAdmin_Numbers extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_admin_numbers';
    }


}
