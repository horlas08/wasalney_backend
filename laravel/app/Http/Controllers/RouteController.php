<?php

namespace App\Http\Controllers;



use App\Models\Category;
use App\Models\Field;
use App\Models\General;
use App\Models\Language;
use App\Models\RecordLang;
use App\Models\Record;
use App\Models\Route;
use App\Models\UserRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic;

class RouteController extends Controller
{

    function baseUrl(Request $request){
        return Route::routing( $request,null,null,null);
    }

    function firstUrl (Request $request,$firstValue){

        $language=Language::where('abbr',$firstValue)->first();
        if ($language!=null){
            return Route::routing( $request,$firstValue,null,null);
        }
        else{
            $route=Route::where('address',$firstValue)->first();
            if ($route!=null && $route->field_id==null){
                return Route::routing($request,null,$route,null);
            }


        }
        return abort(404);
    }

    function secondUrl (Request $request,$firstValue,$secondValue){
        $language=Language::where('abbr',$firstValue)->first();
        if($language!=null){
            $route=Route::where('address',$secondValue)->first();
            if ( $route!=null && $route->field_id==null){
                return Route::routing( $request,$firstValue,$route,null);
            }
        }
        else{
            $route=Route::where('address',$firstValue)->first();
            if ($route!=null && $route->field_id!=null){
                return Route::routing( $request,null,$route,$secondValue);
            }
        }
        return abort(404);

    }


    function thirdUrl (Request $request,$firstValue,$secondValue,$thirdValue){
        $language=Language::where('abbr',$firstValue)->first();
        $route=Route::where('address',$secondValue)->first();
        if($language!=null && $route!=null && $route->field_id!=null){
            return Route::routing( $request,$firstValue,$route,$thirdValue);
        }
        return abort(404);
    }


    function index()
    {
        try {
            return view("admin-panel.route.index");

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        abort(500);
    }



    function storeForm()
    {
        try {
            return view("admin-panel.route.store");

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        abort(500);
    }

    function store(Request $request)
    {
        try {

                $validator = Validator::make($request->all(), [
                    'title' => 'required|unique:routes',
                    'address' => 'required|unique:routes',
                    'view' => 'required',
                    'changefreq' => 'required',
                    'priority' => 'required|numeric|min:0|max:1',
                ]);
                if($validator->fails()){
                    return back()->withErrors($validator->messages()->all());
                }
                $route = new Route();
                $route->title = $request->title;
                $route->address=$request->address;
                $route->view=$request->view;
                $route->field_id=$request->field_id;
                $route->changefreq=$request->changefreq;
                $route->priority=$request->priority;

                $route->save();

                return back();


        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return back()->withErrors(getAlertError());
    }

    function editForm($id)
    {
        try {

            $route=Route::find($id);
            return view("admin-panel.route.edit", compact('route'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        abort(500);
    }

    function edit(Request $request, $id)
    {
        try {

                $validator = Validator::make($request->all(), [
                    'title' => 'required|unique:routes,title,'.$id,
                    'address' => 'required|unique:routes,address,'.$id,
                    'view' => 'required',
                    'changefreq' => 'required',
                    'priority' => 'required|numeric|min:0|max:1',
                ]);
                if($validator->fails()){
                    return back()->withErrors($validator->messages()->all());
                }
                $route = Route::find($id);
                if($route->field_id!=null && $request->address!=$route->address){
                    $field=Field::find($route->field_id);
                    foreach (Language::all() as $language){
                        foreach (DB::table($language->abbr.'_'.$field->category_slug)->where($field->name,'like',$route->address.'/%')->get() as $record){

                            $array=explode('/',$record->{$field->name});
                            $array[0]=$request->address;
                            DB::table($language->abbr.'_'.$field->category_slug)->where('id',$record->{'id'})->limit(1)->update([$field->name=>implode('/',$array)]);

                        }

                    }
                }


                $route->title = $request->title;
                $route->address=$request->address;
                $route->view=$request->view;
            $route->changefreq=$request->changefreq;
            $route->priority=$request->priority;
            if ($route->field_id==null)
                $route->field_id=$request->field_id;
            $route->save();
            return back();
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return back()->withErrors(getAlertError());
    }


    function destroy($id)
    {
        try {

            $route=Route::find($id);
            if ($route->role_id!=null){
                $roleRoutes=UserRole::where('login_route_id',$id)->orWhere('landing_route_id',$id)->first();
                if ($roleRoutes!=null)
                    return back()->withErrors('مسیر مورد نظر در نقش کاربری '.$roleRoutes->title.' استفاده شده است');
            }
            if ($route->field_id!=null){
                $fieldRoutes=Route::where('field_id',$route->field_id)->count();
                $field=Field::find($route->field_id);
                if ($fieldRoutes<2){
                    if ($field!=null){
                        $category=Category::find($field->category_id);
                        return back()->withErrors('ابتدا در فیلد '.$field->title.' جدول '.$category->title.' مسیر مورد نظر را جایگزین کنید سپس برای حذف آن اقدام کنید.');
                    }
                }
                foreach (Language::all() as $language){
                    DB::table($language->abbr.'_'.$field->category_slug)->where($field->name, 'like', $route->address.'/%')->update([$field->name=>null]);
                }
            }
            $route->delete();
            return back();

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return back()->withErrors(getAlertError());
    }



}
