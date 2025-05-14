<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyUsers extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_users';
    }

    protected $guarded = [];
    public static function find($ids, $columns = ['*']) {
        return db('users')->findRecord($ids);
    }

}
