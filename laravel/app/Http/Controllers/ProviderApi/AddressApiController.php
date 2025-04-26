<?php

namespace App\Http\Controllers\ProviderApi;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


class AddressApiController extends Controller
{
    function getAddress(Request $request)
    {
        try {
        $result = findAddress($request->lat, $request->long);
        return response()->api($result);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);
    }

    function findAddress(Request $request)
    {
        try {
//            return $request->text;
            $result = searchAddress($request->text);
            return response()->api($result);
//        return searchAddress($request->text);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);
    }

    function time($origin,$destinations)
    {
        try {
       $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', 'https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$origin.'&destinations='.$destinations.'&key=AIzaSyB3PjQjbvfT990ovxDSaUHbywxJEKkd7Yc');
        $res = $client->sendAsync($request)->wait();
        $result = json_decode($res->getBody(), true);
        return response()->api($result);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null,__('خطا'), 400);
    }



}
