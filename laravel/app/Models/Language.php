<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;

class Language extends Model
{
    protected $table = "languages";

    protected $fillable = [
        'title',
        'abbr',
        'direction',
        'is_default'
    ];

    public static function getLangs($currentLang)
    {
        $languages = \App\Models\Language::all();
        $collection = new Collection();
        $params = \Illuminate\Support\Facades\Route::getCurrentRoute()->parameters();
        $paramNames = \Illuminate\Support\Facades\Route::getCurrentRoute()->parameterNames();
        foreach ($languages as $language) {
            $coll = new Collection();
            $arr['title'] = $language->title;
            $arr['abbr'] = $language->abbr;
            $arr['direction'] = $language->direction;
            $arr['active'] = $language->abbr == $currentLang;
            $link = url($language->is_default ? '' : '/' . $language->abbr);
            foreach ($paramNames as $name) {
                if ($name != 'lang' && !($name == 'firstValue' && $params[$name] == $currentLang)) {
                    $link = $link . '/' . $params[$name];
                }
            }
            $arr['link'] = $link;
            $coll->push((object)$arr);
            $collection->put($language->abbr, $coll->first());
        }
        return $collection;
    }
}
