<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyFavorite_Place extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_favorite_place';
    }


}
