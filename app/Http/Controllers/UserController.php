<?php

namespace App\Http\Controllers;


use App\Models\File;
use App\Models\FileCategory;
use App\Models\General;
use App\Models\RecordLang;
use App\Models\Language;
use App\Models\Record;
use App\Models\Route;
use App\Models\User;
use App\Models\UserAccess;
use App\Models\UserRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic;
use Image;
use function PHPUnit\Framework\logicalAnd;

class UserController extends Controller
{


    function login(Request $request)
    {
        try {

            $rules = [
                'username' => 'required',
                'password' => 'required',
                'captcha' => 'captcha|required',
            ];
            $validator = validator()->make(request()->all(), $rules);
            if ($validator->fails()) {
                $result['status']=false;
                $result['message']=$validator->messages()->all();
                $result['data']=$request->toArray();
                return back()->withErrors($validator->messages()->all())->with('formData',(object)$result);
            }
            if (Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password])) {
                $user=Auth::user();
                $role=UserRole::find($user->role_id);
                if($role->landing_route_id==null){

                    $preLogin=Session::get('pre-login');
                    Session::forget('pre-login');
                    return redirect($preLogin);
                }
                $lang=app()->getLocale();
                $defaultLang=Language::where('is_default',1)->first();
                $landing=Route::find($role->landing_route_id)->address;
                if ($defaultLang==null || $defaultLang->abbr==$lang)
                    return redirect('/'.$landing);
                else
                    return redirect('/'.$lang.'/'.$landing);

            }

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        $result['status']=false;
        $result['message']=[__('Please enter the username and password correctly.')];
        $result['data']=[];
        return back()->withErrors([__('Please enter the username and password correctly.')])->with('formData',(object)$result);
    }

    function changePassword(Request $request)
    {
        try {

            $rules = [
                'password' => 'required',
            ];
            $validator = validator()->make(request()->all(), $rules);
            if ($validator->fails()) {
                $result['status']=false;
                $result['message']=$validator->messages()->all();
                $result['data']=$request->toArray();
                return back()->withErrors($validator->messages()->all())->with('formData',(object)$result);
            }
            $user=$request->user('web');
            $user->password=Hash::make($request->password);
            $user->save();
            $result['status']=true;
            $result['message']=getAlertSuccess();
            $result['data']=null;
            return back()->with('formData',(object)$result);

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        $result['status']=false;
        $result['message']=[getAlertError()];
        $result['data']=null;
        return back()->withErrors(getAlertError())->with('formData',(object)$result);
    }

    function logout()
    {
        try {
            $user=Auth::user();
            $role=UserRole::find($user->role_id);
            Auth::guard('web')->logout();
            if($role->logout_route_id==null){
                return back();
            }
            $lang=app()->getLocale();
            $defaultLang=Language::where('is_default',1)->first();
            $route=Route::find($role->logout_route_id)->address;
            if ($defaultLang==null || $defaultLang->abbr==$lang)
                return redirect('/'.$route);
            else
                return redirect('/'.$lang.'/'.$route);

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return back()->withErrors(getAlertError());
    }


    function unAuth(Request $request){
        $result['status']=false;
        $result['message']=__('You do not have permission to access this section.');
        $result['data']=null;
        return response()->json($result,401);
    }


    function store (Request $request,$slug,$parentSlug=null,$parentId=null){
            $lang=app()->getLocale();
            $result=Record::storeRecord($request,$lang, $slug, $parentSlug, $parentId);
            if(isset($request->return_json)){
                if ($result->status)
                    return response()->json($result,200);
                else
                    return response()->json($result,400);
            }
            elseif(isset($request->return_redirect) && $result->status){
                    return redirect($request->return_redirect)->with('formData',$result);
            }
            return back()->with('formData',$result);

    }


    function edit (Request $request, $slug,$id){

        $result=db($slug)->where('id',$id)->updateRecord($request->toArray());
            if(isset($request->return_json)){
                if ($result->status)
                    return response()->json($result,200);
                else
                    return response()->json($result,400);
            }
            if(isset($request->return_redirect) && $result->status){
                return redirect($request->return_redirect)->with('formData',$result);
            }
            return back()->with('formData',$result);
    }

    function delete(Request $request, $slug, $id){

            $lang=app()->getLocale();
            $result=Record::deleteRecord($lang,$slug, $id);
            if(isset($request->return_json)){
                if ($result->status)
                    return response()->json($result,200);
                else
                    return response()->json($result,400);
            }
            if(isset($request->return_redirect) && $result->status){
                return redirect($request->return_redirect)->with('formData',$result);
            }
            return back()->with('formData',$result);

    }



}
