<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyQuestions extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_questions';
    }


}
