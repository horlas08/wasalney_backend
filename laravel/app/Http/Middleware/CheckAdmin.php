<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Record;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
class CheckAdmin
{

    public function handle(Request $request, Closure $next,$accessCategory=null,$type=null,$catSlug=null)
    {
        if(Auth::guard('admin')->check()){

            if ($catSlug==null && $accessCategory=='record'){
                $catSlug=$request->route()->parameters['slug'];
            }

            if($accessCategory==null || Admin::checkAccess($accessCategory,$type,$catSlug)){
                return $next($request);
            }
            else
                abort(403);

        }

        return redirect(route('admin.loginForm'));
    }
}
