<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;


class MainApiController extends Controller
{
    function terms()
    {
        try {
            $terms = db('terms_and_conditions')->firstRecord();
            $text = strip_tags($terms->text->main);
            return response()->api($text);

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, 'خطا', 400);
    }

    function getGender()
    {
        try {
            $result = db('gender')->getRecords();
            return response()->api($result);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, 'خطا', 400);
    }

    function getMessageAdmin(Request $request)
    {
//        try {
        $user = $request->user();
        $message = db('admin_message')->findRecord($request->id);
        foreach ($message->driver as $driver) {
            if ($driver->id ==$user->record_id){
                return response()->api($message);
            }
            else{
                return response()->api(null);
            }
        }

//        $joinTable = getLang() . '_admin_message_driver_drivers';
//        $baseTable = getLang() . '_drivers';
//        $find = DB::table($baseTable)
//            ->join($joinTable, $baseTable . '.id', '=', $joinTable . '.drivers_id')
//            ->where($baseTable . '.id', $user->record_id)->get()->last();
//        if ($find->id == $request->id) {
//            $message = db('admin_message')->findRecord($find->id);
//        } else {
//            $message = db('admin_message')->findRecord($request->id);
//        }
//
//        if ($message != null)
//            return response()->api($message);
//        else
//            return response()->api(null);


//        } catch (\Exception $e) {
//            Storage::disk('file')->append('logApi.txt', $e->getMessage());
//        }
//        return response()->api(null, __('خطا'), 400);
    }

}