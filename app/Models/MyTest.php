<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyTest extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_test';
    }


}
