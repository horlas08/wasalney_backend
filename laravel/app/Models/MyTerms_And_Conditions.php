<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyTerms_And_Conditions extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_terms_and_conditions';
    }


}
