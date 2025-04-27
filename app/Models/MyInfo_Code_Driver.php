<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyInfo_Code_Driver extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_info_code_driver';
    }


}
