<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class Route extends Model
{
    protected $table = "routes";

    public function LoginRoutes(){
        return $this->hasMany(UserRole::class,'login_route_id');
    }

    public function LandingRoutes(){
        return $this->hasMany(UserRole::class,'landing_route_id');
    }



    public static function routing(Request $request,$lang=null,$route=null,$title=null){
        $isDefaultLang=false;
        if ($lang==null){
            $language=Language::where('is_default',1)->first();
            $lang=$language!=null?$language->abbr:'fa';
            $isDefaultLang=true;
        }
        Session::put('locale',$lang);
        App::setLocale($lang);
        $data=null;
        if ($route!=null && $route->field_id!=null){
            $field=Field::find($route->field_id);
            $record=DB::table($lang.'_'.$field->category_slug)->where($field->name,$route->address.'/'.$title)->first();
            if ($record==null)
                return abort(404);
            else
                $data=Record::getRecord($lang,$field->category_slug,$record->id,(array)$record,null);

        }
        $view=$route!=null?$route->view:'index';
        if (($route==null || view()->exists('theme.'.$view))){

            if ($route!=null && $route->role_id!=null ){
                $user=Auth::check()?Auth::user():null;
                if($user==null || $user->role_id!=$route->role_id){
                    $role=UserRole::find($route->role_id);
                    $login=Route::find($role->login_route_id)->address;
                    Session::put('pre-login',url()->current());
                    if ($isDefaultLang)
                        return redirect('/'.$login);
                    else
                        return redirect('/'.$lang.'/'.$login);
                }
            }
            Visit::insert($route,$data,isset($user)?$user:null);

            $formData=Session::get('formData');
            Session::forget('formData');
            $page=$request->page;

            return view('theme.'.$view,compact('data','formData','page'));
        }
         return abort(404);
    }

}
