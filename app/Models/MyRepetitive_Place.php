<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyRepetitive_Place extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_repetitive_place';
    }


}
