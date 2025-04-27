<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyGenerate_Code extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_generate_code';
    }


}
