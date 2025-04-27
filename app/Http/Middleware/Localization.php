<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{

    public function handle($request, Closure $next)
    {
        if (session()->has('locale')) {
            $current = Language::where('abbr', Session::get('locale'))->first();
            if ($current != null) {
                App::setLocale($current->abbr);
                return $next($request);
            }
                
        
        }
        $lang = Language::where('is_default', 1)->first();
                if ($lang != null) {
                    App::setLocale($lang->abbr);
                    Session::put('locale', $lang->abbr);
                    return $next($request);
                }
        App::setLocale('fa');
        Session::put('locale', 'fa');
        return $next($request);
    }
}
