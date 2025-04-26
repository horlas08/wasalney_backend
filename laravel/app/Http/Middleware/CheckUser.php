<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Record;
use App\Models\UserAccess;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
class CheckUser
{

    public function handle(Request $request, Closure $next,$type=null)
    {


        $catSlug=$request->route()->parameters['slug'];
        $user=$request->user();
        $access=UserAccess::where('category_slug',$catSlug)->where(function ($query) use ($user) {
            $query->where('role_id', null);
            if($user!=null)
                $query->orWhere('role_id', $user->role_id);
        })->where('type',$type)->first();

        if($access!=null){
            return $next($request);
        }


        $result['status']=false;
        $result['message']=['You do not have permission to access this section.'];
        $result['data']=null;
        return response()->json($result,403);
    }
}
