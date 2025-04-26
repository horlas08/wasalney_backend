<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyGender extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_gender';
    }


}
