<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Record;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
class AdminAccess
{

    public function handle(Request $request, Closure $next,$accessCategory=null,$type=null)
    {
        if(Auth::guard('admin')->check()){
            $catSlug=null;
            if ($accessCategory=='record'){
                $catSlug=$request->route()->parameters['slug'];
            }

            if($accessCategory==null || Admin::checkAccess($accessCategory,$type,$catSlug)){
                return $next($request);
            }
            else
                abort(403);

        }
        else
            return redirect(route('admin.loginForm'));
    }
}
