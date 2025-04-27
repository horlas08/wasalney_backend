<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyInfo_Bank extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_info_bank';
    }


}
