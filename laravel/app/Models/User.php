<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    protected $guard = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function Role(){
        return $this->belongsTo(UserRole::class,'role_id');
    }



    public function getToken(){
        return $this->createToken($this->category_slug)->plainTextToken;
    }



    public function getRecord(){
        $locale=app()->getLocale();
        $user=Record::getRecord($locale,$this->category_slug,$this->record_id);
        return $user;
    }




    public static function store($role, $user, $recordId, $username, $password)
    {
        if ($user!=null ) {
            if ($username!=null){
                $user->username = $username;
            }
            if ($password!=null)
                $user->password = Hash::make($password);
            $user->save();
        }
        elseif ($username!=null) {
            $user = new User();
            $user->username = $username;
            if ($password!=null)
                $user->password = Hash::make($password);
            else
                $user->password = Hash::make(time());
            $user->role_id = $role->id;
            $user->category_slug = $role->category_slug;
            $user->record_id = $recordId;
            $user->save();
        }


    }




}
