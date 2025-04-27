<?php

namespace App\Http\Controllers;


use App\Models\AdminAccess;
use App\Models\AccessCategory;
use App\Models\AccessType;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;

class AdminAccessController extends Controller
{
    function index($adminId)
    {
        try {
            $currentAdmin=Auth::guard('admin')->user();
            $admin=Admin::find($adminId);
            if ($currentAdmin->level>=$admin->level)
                return back()->withErrors('شما به این کاربر دسترسی ندارید');

            return view("admin-panel.admin.access", compact('adminId' ));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }


    function show($adminId,$name,$catSlug=null)
    {
        try {
            $currentUser=Auth::guard('admin')->user();
            if($currentUser->level!=1) {
                $user=Admin::find($adminId);
                if ($currentUser->level>=$user->level)
                    return false;

                $access = AdminAccess::where('name', $name)->where('category_slug', $catSlug)->where('admin_id', $currentUser->id)->first();
                if ($access == null || $access->show == 0)
                    return false;
            }
            $access=AdminAccess::where('name',$name)->where('category_slug',$catSlug)->where('admin_id',$adminId)->first();
            if ($access!=null){
                if ($access->show){
                    $access->show = 0;
//                    $access->store = 0;
//                    $access->edit = 0;
//                    $access->delete = 0;
                }
                else
                    $access->show = 1;
            }else{
                $access=new AdminAccess();
                $access->admin_id=$adminId;
                $access->name=$name;
                $access->category_slug=$catSlug;
                $access->show=1;
                $access->store=0;
                $access->edit=0;
                $access->delete=0;
            }
            $access->save();
            return true;
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;

    }
    function store($adminId,$name,$catSlug=null)
    {
        try {
            $currentUser=Auth::guard('admin')->user();
            if($currentUser->level!=1) {
                $user=Admin::find($adminId);
                if ($currentUser->level>=$user->level)
                    return false;

                $access = AdminAccess::where('name', $name)->where('category_slug', $catSlug)->where('admin_id', $currentUser->id)->first();
                if ($access == null || $access->store == 0)
                    return false;
            }
            $access=AdminAccess::where('name',$name)->where('category_slug',$catSlug)->where('admin_id',$adminId)->first();
            if ($access!=null){
                if ($access->store)
                    $access->store = 0;
                else{
//                    $access->show=1;
                    $access->store = 1;
                }

            }else{
                $access=new AdminAccess();
                $access->admin_id=$adminId;
                $access->name=$name;
                $access->category_slug=$catSlug;
                $access->show=0;
                $access->store=1;
                $access->edit=0;
                $access->delete=0;
            }
            $access->save();
            return true;
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;

    }
    function edit($adminId,$name,$catSlug=null)
    {
        try {
            $currentUser=Auth::guard('admin')->user();
            if($currentUser->level!=1) {
                $user=Admin::find($adminId);
                if ($currentUser->level>=$user->level)
                    return false;

                $access = AdminAccess::where('name', $name)->where('category_slug', $catSlug)->where('admin_id', $currentUser->id)->first();
                if ($access == null || $access->edit == 0)
                    return false;
            }
            $access=AdminAccess::where('name',$name)->where('category_slug',$catSlug)->where('admin_id',$adminId)->first();
            if ($access!=null){
                if ($access->edit)
                    $access->edit = 0;
                else{
//                    $access->show=1;
                    $access->edit = 1;
                }

            }else{
                $access=new AdminAccess();
                $access->admin_id=$adminId;
                $access->name=$name;
                $access->category_slug=$catSlug;
                $access->show=0;
                $access->store=0;
                $access->edit=1;
                $access->delete=0;
            }
            $access->save();
            return true;
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;

    }
    function delete($adminId,$name,$catSlug=null)
    {
        try {
            $currentUser=Auth::guard('admin')->user();
            if($currentUser->level!=1) {
                $user=Admin::find($adminId);
                if ($currentUser->level>=$user->level)
                    return false;

                $access=AdminAccess::where('name',$name)->where('category_slug',$catSlug)->where('admin_id',$currentUser->id)->first();
                if($access==null || $access->delete==0)
                    return false;
            }

            $access=AdminAccess::where('name',$name)->where('category_slug',$catSlug)->where('admin_id',$adminId)->first();
            if ($access!=null){
                if ($access->delete)
                    $access->delete = 0;
                else{
//                    $access->show=1;
                    $access->delete = 1;
                }

            }else{
                $access=new AdminAccess();
                $access->admin_id=$adminId;
                $access->name=$name;
                $access->category_slug=$catSlug;
                $access->show=0;
                $access->store=0;
                $access->edit=0;
                $access->delete=1;
            }
            $access->save();
            return true;
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;

    }


}
