<?php

namespace App\Http\Controllers;

use App\Models\AdminAccess;
use App\Models\Admin;
use App\Models\Category;
use App\Models\General;
use App\Models\Session;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    function dashboard()
    {
        try {
                return view('admin-panel.dashboard.index');
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }


    function packVisits()
    {
        Visit::pack();
        return 1;
    }


    public function loginForm(){
        return view('admin-panel.dashboard.login');
    }

    function login(Request $request)
    {
        try {
            $rules = [
                'captcha' => 'required|captcha',
                'username' => 'required',
                'password' => 'required',
                ];
            $validator = validator()->make(request()->all(), $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator->messages()->all());
            }
            if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect(route("admin.dashboard"));
            }

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return back()->withErrors([__('Please enter the username and password correctly.')]);
    }

    function logOut()
    {
        try {
            Auth::guard('admin')->logout();
            return redirect(route("admin.loginForm"));
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return back();
    }

    function index()
    {
        try {
            return view("admin-panel.admin.index");

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }



    function storeForm()
    {
        try {
            return view("admin-panel.admin.store");

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:admins',
                'username' => 'required|unique:admins',
                'password' => 'required',
            ]);
            if($validator->fails()){
                return back()->withErrors($validator->messages()->all());
            }
            $user=Auth::guard('admin')->user();
            $admin = new Admin();
            $admin->name = $request->name;
            $admin->level = $user->level+1;
            $admin->notif_token = Str::uuid();
            $admin->number = $request->number;
            $admin->username=$request->username;
            $admin->password=Hash::make($request->password);
            $admin->save();
            if ($user->level==1){
                $access=new AdminAccess();
                $access->admin_id=$admin->id;
                $access->name='setting';
                $access->store=0;
                $access->delete=0;
                $access->save();
                $access=new AdminAccess();
                $access->admin_id=$admin->id;
                $access->name='admin';
                $access->save();
                foreach (Category::where('is_menu',0)->get() as $category){
                    $access=new AdminAccess();
                    $access->admin_id=$admin->id;
                    $access->name='record';
                    $access->category_slug=$category->slug;
                    $access->save();
                }
            }
            else{
                foreach (AdminAccess::where('admin_id',$user->id)->get() as $userAccess){
                    $access=new AdminAccess();
                    $access->admin_id=$admin->id;
                    $access->name=$userAccess->name;
                    $access->category_slug=$userAccess->category_slug;
                    $access->show=$userAccess->show;
                    $access->store=$userAccess->store;
                    $access->edit=$userAccess->edit;
                    $access->delete=$userAccess->delete;
                    $access->save();
                }
            }

            return back();


        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return back()->withErrors(getAlertError());
    }

    function editForm($id)
    {
        try {

            $admin=Admin::find($id);
            return view("admin-panel.admin.edit", compact('admin'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:admins,name,'.$id,
                'username' => 'required|unique:admins,username,'.$id,
            ]);
            if($validator->fails()){
                return back()->withErrors($validator->messages()->all());
            }
            $user=Auth::guard('admin')->user();
            $admin = Admin::find($id);
            if ($user->level >= $admin->level && $user->id!=$admin->id){
                return back()->withErrors('شما اجازه ویرایش این کاربر را ندارید');
            }
            if ($admin->notif_token==null){
                $admin->notif_token = Str::uuid();
            }
            $admin->number = $request->number;
            $admin->name = $request->name;
            $admin->username=$request->username;
            if ($request->password!=null){
                $admin->password=Hash::make($request->password);
            }
            $admin->save();
            return back();
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return back()->withErrors(getAlertError());
    }


    function destroy($id)
    {
        try {
            $admin=Admin::find($id);
            $user=Auth::guard('admin')->user();
            if ($user->level<$admin->level){
                foreach (AdminAccess::where('admin_id',$id)->get() as $access){
                    $access->delete();
                }
                $admin->delete();
                return back();
            }
            else
                return back()->withErrors('شما اجازه حذف این کاربر را ندارید');


        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return back()->withErrors(getAlertError());
    }

}
