<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyGenerate_Code_Driver extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_generate_code_driver';
    }


}
