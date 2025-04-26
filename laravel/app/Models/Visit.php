<?php

namespace App\Models;

use Carbon\Carbon;
use Browser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Crawler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Morilog\Jalali\Jalalian;

class Visit extends Model
{
    use HasFactory;
    protected $table = 'visits';

    public static function pack(){
        try{
            $now=Carbon::now();
            $collection=collect();
            foreach (Visit::where('ip','!=',null)->whereYear('date','<', $now->year)->get() as $visit){
                $date=Carbon::createFromFormat('Y-m-d', $visit->date)->startOfMonth()->format('Y-m-d');

                $month=$collection->where('route_id',$visit->route_id)->where('record_id',$visit->record_id)
                    ->Where('date',$date)->first();
                if ($month){
                    if (!in_array($visit->user_id,$month->user_id) && !in_array($visit->ip,$month->ip)){
                        $month->count++;
                        array_push($month->ip,$visit->ip);
                        array_push($month->user_id,$visit->user_id);
                    }
                }
                else{
                    $visit->date=$date;
                    $visit->user_id=[$visit->user_id];
                    $visit->ip=[$visit->ip];
                    $collection->push($visit);
                }

            }
            foreach ($collection as $month){
                if (in_array(null,$month->user_id)){
                    $visit=Visit::where('ip',null)->where('route_id',$month->route_id)->where('record_id',$month->record_id)
                        ->Where('date',$month->date)->where('user_id',null)->first();
                    if ($visit==null){
                        $visit=new Visit();
                        $visit->route_id=$month->route_id;
                        $visit->record_id=$month->record_id;
                        $visit->count=$month->count;
                        $visit->date=$month->date;
                        $visit->user_id=null;
                    }
                    else
                        $visit->count=$month->count+$visit->count;
                    $visit->save();
                    $month->user_id=array_diff($month->user_id,[null]);
                }
                if (count($month->user_id)>0){
                    $visit=Visit::where('ip',null)->where('route_id',$month->route_id)->where('record_id',$month->record_id)
                        ->Where('date',$month->date)->where('user_id',null)->first();
                    if ($visit==null){
                        $visit=new Visit();
                        $visit->route_id=$month->route_id;
                        $visit->record_id=$month->record_id;
                        $visit->count=$month->count;
                        $visit->date=$month->date;
                        $visit->user_id=0;
                    }
                    else
                        $visit->count=$month->count+$visit->count;
                    $visit->save();
                }

            }

            Visit::where('ip','!=',null)->whereYear('date','<', $now->year)->delete();
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }


    }

    public static function insert($route,$record,$user){
        if (!Browser::isBot() && !Crawler::isCrawler()){

            $visit=new Visit();
            $visit->ip=\Request::ip();
            $visit->route_id=$route==null?null:$route->id;
            $visit->record_id=$record==null?null:$record->id;
            $visit->user_id=$user==null?null:$user->id;
            if (Browser::isMobile())
                $visit->platform='Mobile';
            elseif (Browser::isTablet())
                $visit->platform='Tablet';
            elseif (Browser::isDesktop())
                $visit->platform='Desktop';

            $visit->os=Browser::platformFamily();
            $visit->browser=Browser::browserFamily();
            $visit->date=Carbon::now()->format('Y-m-d');
            $visit->save();
        }
    }

    public static function guests(){
        $old=Visit::where('ip,'!='',null)->where('user_id',null)->sum('count');
        $new=Visit::select('ip','date')->where('user_id',null)->groupBy('ip','date')->count();
        return $old+$new;
    }
    public static function users(){
        $old=Visit::where('ip','!=',null)->where('user_id','!=',null)->sum('count');
        $new=Visit::select('ip','date')->where('user_id','!=',null)->groupBy('ip','date')->count();
        return $old+$new;
    }
    public static function onlines(){
        return Visit::select('ip')->where('created_at','>=',Carbon::now()->subMinutes(5)->format('Y-m-d H:i:s'))->groupBy('ip')->count();
    }
    public static function today(){
        return Visit::select('ip')->whereDate('date', Carbon::now()->format('Y-m-d'))->groupBy('ip')->count();
    }
    public static function week(){
        $max=0;
        $dayArray=[];
        $countArray=[];
        for ($i=6;$i>=0;$i--){

//            $day=\Morilog\Jalali\Jalalian::forge('now - '.$i.' days');
            $day=Carbon::now()->subDays($i);

            $count=Visit::select('ip')->whereDate('date',$day->format('Y-m-d'))->groupBy('ip')->count();
            array_push($countArray, $count);
            $max=$count>$max?$count:$max;
            switch ($day->dayOfWeek){
                case '0':
                    array_push($dayArray, __('Sunday'));
                    break;
                case '1':
                    array_push($dayArray, __('Monday'));
                    break;
                case '2':
                    array_push($dayArray, __('Tuesday'));
                    break;
                case '3':
                    array_push($dayArray, __('Wednesday'));
                    break;
                case '4':
                    array_push($dayArray, __('Thursday'));
                    break;
                case '5':
                    array_push($dayArray, __('Friday'));
                    break;
                case '6':
                    array_push($dayArray, __('Saturday'));
                    break;
            }
        }
        $result['days']=$dayArray;
        $result['counts']=$countArray;
        $result['max']=$max+(10-$max%10);
        return $result;

    }
    public static function month(){
        if (getLang()=='fa'){
            $nowJalali=Jalalian::now();
            $firstJalali=$nowJalali->getFirstDayOfMonth();
            $first=$firstJalali->toCarbon();
            $now=$nowJalali->toCarbon();
            return Visit::select('ip','date')->whereDate('date','>=',$first)->whereDate('date','<=',$now)->groupBy('ip','date')->count();
        }
        else{
            $now=Carbon::now();
            return Visit::select('ip','date')->whereYear('date', $now->year)
                ->whereMonth('date', $now->month)->groupBy('ip','date')->count();
        }

    }
    public static function allTime(){
        $old=Visit::where('ip',null)->sum('count');
        $new=Visit::where('ip','!=',null)->select('ip','date')->groupBy('ip','date')->count();
        return $old+$new;
    }
    public static function routeDynamic($link,$recordId){
        if ($link!=null){
            $array=explode('/', $link);
            $route=Route::where('address',$array[0])->first();
            $old=Visit::where('ip',null)->where('route_id',$route->id)->where('record_id',$recordId)->sum('count');
            $new=Visit::where('ip','!=',null)->select('ip','date')->where('route_id',$route->id)->where('record_id',$recordId)->groupBy('ip','date')->count();
            return $old+$new;
        }
        else
            return 0;

    }





}
