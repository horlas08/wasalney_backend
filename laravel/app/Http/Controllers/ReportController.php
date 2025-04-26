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

class ReportController extends Controller
{
    function index($adminId)
    {
        try {
            $currentUser=Auth::guard('admin')->user();
            $user=Admin::find($adminId);
            if ($currentUser->level>$user->level)
                return view('admin-panel.layout.alert')->withErrors('شما به این کاربر دسترسی ندارید');

            return view("admin-panel.report.index", compact('userId' ));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return 0;
    }




}
