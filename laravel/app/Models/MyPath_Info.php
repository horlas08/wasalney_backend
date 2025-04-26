<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyPath_Info extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_path_info';
    }


}
