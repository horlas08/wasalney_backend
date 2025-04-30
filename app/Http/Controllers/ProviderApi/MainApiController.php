<?php

namespace App\Http\Controllers\ProviderApi;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use \Morilog\Jalali\Jalalian;


class MainApiController extends Controller
{
    function getServices()
    {
        try {
            // Get regular delivery services
            $result = db('deliveries')->withRelations(['taxi_options', 'stop_without_driver'])->getRecords();

            // Add airport services
            $airportServices = \App\Models\AirportServiceType::where('active', true)
                ->get()
                ->map(function ($service) {
                    return [
                        'id' => $service->id,
                        'name' => $service->name,
                        'name_ar' => $service->name_ar,
                        'type' => $service->type,
                        'base_price' => $service->base_price,
                        'price_per_km' => $service->price_per_km,
                        'free_waiting_time' => $service->free_waiting_time,
                        'waiting_price_per_hour' => $service->waiting_price_per_hour,
                        'max_passengers' => $service->max_passengers,
                        'active' => $service->active,
                        'service_type' => 'airport'
                    ];
                });

            // Add tour services
            $tourDestinations = \App\Models\TourDestination::where('active', true)
                ->where('is_departure', true)
                ->get()
                ->map(function ($destination) {
                    return [
                        'id' => $destination->id,
                        'name' => $destination->name,
                        'name_ar' => $destination->name_ar,
                        'description' => $destination->description,
                        'description_ar' => $destination->description_ar,
                        'service_type' => 'tour'
                    ];
                });

            $result = $result->concat($airportServices)->concat($tourDestinations);

            return response()->api($result);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }
    function getQuestions()
    {
        try {
            $result = db('questions')->getRecords();
            return response()->api($result);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }
    function getInfoSupport()
    {
        try {
            $result = db('support')->firstRecord();
            return response()->api($result);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function getServicesInfo(Request $request)
    {
        try {
            $result = array();
            $result['stop'] = db('stop_on_way')->parent("deliveries", $request->id)->getRecords();
            $result['heavy'] = db('heavy_equipment')->parent("deliveries", $request->id)->getRecords();
            $result['worker'] = db('worker_price')->parent("deliveries", $request->id)->firstRecord();
            $result['floors'] = db('price_floors')->parent("deliveries", $request->id)->firstRecord();
            $result['reserve'] = $this->detail();

            return response()->api((object)$result);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function getSlider()
    {
        try {
            $result = db('slider')->firstRecord();
            return response()->api($result);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }
    function getSliders()
    {
        try {
            $result = db('slider')->getRecords();
            return response()->api($result);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function getCancelItem()
    {
        try {
            $result = db('cancel_trip')->getRecords();
            return response()->api($result);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }

    function infoProduct()
    {
        try {
            $result = array();
            $result['price_parcel'] = getRecords('price_parcel');
            $result['type_parcel'] = getRecords('type_parcel');
            return response()->api($result);
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }



    function detail()
    {
        try {
            $result = array();
            $timeNow = Carbon::now()->format('H');
            $Todaytime = collect();
            $a = array();
            $b = array();
            $c = array();
            $d = array();
            $e = array();
            $f = array();
            $g = array();
            $h = array();
            $timeCollect = collect();
            $t = 8;
            $hour = 24 - $timeNow;
            for ($i = 0; $i <= $hour; $i++) {
                $Todaytime->push($timeNow + $i);
            }
            for ($i = 8; $i <= 24; $i++) {
                $timeCollect->push($t++);
            }
            $a['title'] = Carbon::now()->format('m/d l');
            $a['date'] = Carbon::now()->format('Y/m/d');
            $a['items'] = $Todaytime;

            $b['title'] = Carbon::now()->addDays(1)->format('m/d l');
            $b['date'] = Carbon::now()->addDays(1)->format('Y/m/d');
            $b['items'] = $timeCollect;

            $c['title'] = Carbon::now()->addDays(2)->format('m/d l');
            $c['date'] = Carbon::now()->addDays(2)->format('Y/m/d');
            $c['items'] = $timeCollect;

            $d['title'] = Carbon::now()->addDays(3)->format('m/d l');
            $d['date'] = Carbon::now()->addDays(3)->format('Y/m/d');
            $d['items'] = $timeCollect;

            $e['title'] = Carbon::now()->addDays(4)->format('m/d l');
            $e['date'] = Carbon::now()->addDays(4)->format('Y/m/d');
            $e['items'] = $timeCollect;


            $f['title'] = Carbon::now()->addDays(5)->format('m/d l');
            $f['date'] = Carbon::now()->addDays(5)->format('Y/m/d');
            $f['items'] = $timeCollect;


            $g['title'] = Carbon::now()->addDays(6)->format('m/d l');
            $g['date'] = Carbon::now()->addDays(6)->format('Y/m/d');
            $g['items'] = $timeCollect;

            $h['title'] = Carbon::now()->addDays(7)->format('m/d l');
            $h['date'] = Carbon::now()->addDays(7)->format('Y/m/d');
            $h['items'] = $timeCollect;
            array_push($result, $a, $b, $c, $d, $e, $f, $g, $h);
            return $result;
        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
        return response()->api(null, __('خطا'), 400);
    }
}