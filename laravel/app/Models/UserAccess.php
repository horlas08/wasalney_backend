<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;


class UserAccess extends Authenticatable
{
    protected $table='user_accesses';


    public function Category(){
        return $this->belongsTo(Category::class,'category_slug','slug');
    }

    public function UserRole(){
        return $this->belongsTo(UserRole::class,'role_id');
    }




}
