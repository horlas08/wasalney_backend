<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MySlider extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_slider';
    }


}
