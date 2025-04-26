<?php

namespace App\Http\Controllers;



use App\Models\Category;
use App\Excels\RecordExport;
use App\Excels\RecordImport;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Morilog\Jalali\Jalalian;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use App\Models\Language;
use App\Models\MyOrders;
use PDF;

class MyOrdersController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyOrders::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_orders')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_orders')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

            }
            return true;


        }catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;

    }

    function user_rateActive($id){
        try {
            $orders=MyOrders::find($id);
            if($orders->user_rate)
                $orders->user_rate=0;
            else
                $orders->user_rate=1;
            $orders->save();

            return true;

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;
    }function economicActive($id){
        try {
            $orders=MyOrders::find($id);
            if($orders->economic)
                $orders->economic=0;
            else
                $orders->economic=1;
            $orders->save();

            return true;

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;
    }


    function pdf(Request $request)
    {
        try {
            //start
            $filter=Session::get('filterOrders');

            $records=MyOrders::orderBy('sort','DESC')->where(function ($q) use ($filter) {


                if ($filter->from != null) {
                    $fromDate = Jalalian::fromFormat('Y/m/d', $filter->from)->toCarbon();
                    $q->whereDate('created_at', '>=', $fromDate->format('Y-m-d'));
                }
                if ($filter->to != null) {
                    $toDate = Jalalian::fromFormat('Y/m/d', $filter->to)->toCarbon();
                    $q->whereDate('created_at', '<=', $toDate->format('Y-m-d'));
                }
                if ($filter->statuses != 0) {
                    $q->where('state', $filter->statuses);
                }
                if ($filter->comeback != null) {
                    if ($filter->comeback)
                        $q->where('comeback', 1);
                    else
                        $q->where(function ($c){
                            $c->where('comeback', 0)->orWhere('comeback', null);
                        });
                }
                if ($filter->stop_time != null) {
                    $q->where('stop_minutes','>=', $filter->stop_time);
                }  if ($filter->stop_time2 != null) {
                    $q->where('stop_minutes2','>=', $filter->stop_time2);
                }

                if ($filter->pay_type != 0) {
                    $q->where('pay_type', $filter->pay_type);
                }
                if ($filter->role == 1 && $filter->user != 0) {
                    $q->where('user', $filter->user);
                } else if ($filter->role == 2 && $filter->provider != 0) {
                    $q->orWhere('driver', $filter->provider);
                } else if ($filter->role == 3 && $filter->service != 0) {
                    $q->where('delivery_id', $filter->service);
                }
            }
            )->get();
            //end
            $data = [
                'slug' => 'orders',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-orders.export', $data);
            return $pdf->stream('orders.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request)
    {
        try {

            //start
            $filter=Session::get('filterOrders');
            $records=MyOrders::orderBy('sort','DESC')->where(function ($q) use ($filter) {


                if ($filter->from != null) {
                    $fromDate = Jalalian::fromFormat('Y/m/d', $filter->from)->toCarbon();
                    $q->whereDate('created_at', '>=', $fromDate->format('Y-m-d'));
                }
                if ($filter->to != null) {
                    $toDate = Jalalian::fromFormat('Y/m/d', $filter->to)->toCarbon();
                    $q->whereDate('created_at', '<=', $toDate->format('Y-m-d'));
                }
                if ($filter->statuses != 0) {
                    $q->where('state', $filter->statuses);
                }
                if ($filter->comeback != null) {
                    if ($filter->comeback)
                        $q->where('comeback', 1);
                    else
                        $q->where(function ($c){
                            $c->where('comeback', 0)->orWhere('comeback', null);
                        });
                }
                if ($filter->stop_time != null) {
                    $q->where('stop_minutes','>=', $filter->stop_time);
                }
                if ($filter->stop_time2 != null) {
                    $q->where('stop_minutes2','>=', $filter->stop_time2);
                }

                if ($filter->pay_type != 0) {
                    $q->where('pay_type', $filter->pay_type);
                }
                if ($filter->role == 1 && $filter->user != 0) {
                    $q->where('user', $filter->user);
                } else if ($filter->role == 2 && $filter->provider != 0) {
                    $q->orWhere('driver', $filter->provider);
                } else if ($filter->role == 3 && $filter->service != 0) {
                    $q->where('delivery_id', $filter->service);
                }
            }
            )->get();
            //end
            return Excel::download(new RecordExport('orders',$records), 'orders.xlsx');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    public function import(Request $request)
    {
        try {
            $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

            if (!$receiver->isUploaded()) {
                throw new UploadMissingFileException();
            }

            $fileReceived = $receiver->receive(); // receive file
            if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
                $file = $fileReceived->getFile(); // get file


                Excel::import(new RecordImport($request->user('admin'),getLang(),'orders',null,null), $file);

//                Artisan::call('queue:work --stop-when-empty', []);

                unlink($file->getPathname());
            }

            // otherwise return percentage informatoin
            $handler = $fileReceived->handler();
            return [
                'done' => $handler->getPercentageDone(),
                'status' => true
            ];
        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }


        return [
            'done' => 0,
            'status' => false
        ];
    }


    function index(Request $request)
    {
        try {

            //start
            Session::put('filterOrders',(object)['from'=>$request->from, 'to'=>$request->to,'statuses'=>$request->statuses,'comeback'=>$request->comeback,'stop_time'=>$request->stop_time,'stop_time2'=>$request->stop_time2,'pay_type'=>$request->pay_type,'role'=>$request->role,'user'=>$request->user,'provider'=>$request->provider,'service'=>$request->service]);
            //end
          return view('admin-panel.my-orders.index');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function pagination(Request $request){
        try {

          $search=$request->search['value'];
            $start=$request->start;
            $length=$request->length;
            $orderIndex=$request->order[0]['column'];
            $orderDir=$request->order[0]['dir'];
            $orderColumn=$request->columns[$orderIndex]['data'];
            Session::put('dataTableInfo',(object)['slug'=>'orders', 'parentSlug'=>null,'parentId'=>null,'start'=>$start,'length'=>$length,'search'=>$search]);
            $selectIds=[];
          if ($search!=''){
          $selectIds["user"]=\App\Models\MyUsers::where(function($q) use ($search){
          $q->orWhere("name","like", "%".$search."%");
          $q->orWhere("mobile","like", "%".$search."%");
          })->pluck('id')->toArray();
          $selectIds["driver"]=\App\Models\MyDrivers::where(function($q) use ($search){
          $q->orWhere("name","like", "%".$search."%");
          })->pluck('id')->toArray();
          $selectIds["pay_type"]=\App\Models\MyPay_Typs::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          $selectIds["delivery_id"]=\App\Models\MyDeliveries::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          $selectIds["cancel_reason"]=\App\Models\MyCancel_Trip::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          $selectIds["state"]=\App\Models\MyStatuses::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          }
          $query=MyOrders::where(function ($q) use ($search,$selectIds) {
            if ($search!=''){
          $q->orWhereIn("user", $selectIds["user"]);
          $q->orWhere("code", 'like', '%'.$search.'%');
          $q->orWhereIn("driver", $selectIds["driver"]);
          $q->orWhere("price", 'like', '%'.$search.'%');
          $q->orWhere("comeback", 'like', '%'.$search.'%');
          $q->orWhere("stop_time", 'like', '%'.$search.'%');
          $q->orWhere("stop_time2", 'like', '%'.$search.'%');
          $q->orWhere("origin_lat", 'like', '%'.$search.'%');
          $q->orWhere("origin_long", 'like', '%'.$search.'%');
          $q->orWhere("origin_address", 'like', '%'.$search.'%');
          $q->orWhere("destination_lat", 'like', '%'.$search.'%');
          $q->orWhere("destination_long", 'like', '%'.$search.'%');
          $q->orWhere("destination_address", 'like', '%'.$search.'%');
          $q->orWhereIn("pay_type", $selectIds["pay_type"]);
          $q->orWhere("rate", 'like', '%'.$search.'%');
          $q->orWhere("cancel_status", 'like', '%'.$search.'%');
          $q->orWhere("created_at", 'like', '%'.$search.'%');
          $q->orWhere("pay_side", 'like', '%'.$search.'%');
          $q->orWhereIn("delivery_id", $selectIds["delivery_id"]);
          $q->orWhere("name", 'like', '%'.$search.'%');
          $q->orWhere("mobile", 'like', '%'.$search.'%');
          $q->orWhere("canceled_by", 'like', '%'.$search.'%');
          $q->orWhere("driver_rate", 'like', '%'.$search.'%');
          $q->orWhere("user_rate", 'like', '%'.$search.'%');
          $q->orWhere("hurry_percent", 'like', '%'.$search.'%');
          $q->orWhereIn("cancel_reason", $selectIds["cancel_reason"]);
          $q->orWhere("net_price", 'like', '%'.$search.'%');
          $q->orWhere("percent_discount", 'like', '%'.$search.'%');
          $q->orWhere("percent_code", 'like', '%'.$search.'%');
          $q->orWhere("discounted_price", 'like', '%'.$search.'%');
          $q->orWhere("economic", 'like', '%'.$search.'%');
          $q->orWhereIn("state", $selectIds["state"]);

          }});

          //start
            $query->where(function ($q) {
                $filter=Session::get('filterOrders');

                if ($filter->from != null) {
                    $fromDate = $filter->from;
                    $q->whereDate('created_at', '>=', $fromDate);
                }
                if ($filter->to != null) {
                    $toDate = $filter->to;
                    $q->whereDate('created_at', '<=', $toDate);
                }
                if ($filter->statuses != 0) {
                    $q->where('state', $filter->statuses);
                }
                if ($filter->comeback != null) {
                    if ($filter->comeback)
                        $q->where('comeback', 1);
                    else
                        $q->where(function ($c){
                            $c->where('comeback', 0)->orWhere('comeback', null);
                        });
                }
                if ($filter->stop_time != null) {
                    $q->where('stop_minutes','>=', $filter->stop_time);
                }
                if ($filter->stop_time2 != null) {
                    $q->where('stop_minutes2','>=', $filter->stop_time2);
                }

                if ($filter->pay_type != 0) {
                    $q->where('pay_type', $filter->pay_type);
                }
                if ($filter->role == 1 && $filter->user != 0) {
                    $q->where('user', $filter->user);
                } else if ($filter->role == 2 && $filter->provider != 0) {
                    $q->orWhere('driver', $filter->provider);
                } else if ($filter->role == 3 && $filter->service != 0) {
                    $q->where('delivery_id', $filter->service);
                }
            });
            //end

        if ($orderIndex==0)
            $query->orderBy('sort',$orderDir);
        else
            $query->orderBy($orderColumn,$orderDir);
        $total=$query->count();
            $data=[];
            $counter=0;
            foreach ($query->skip($start)->take($length)->get() as $orders){
                $json=[];
                $json['datatable-counter'] = view('admin-panel.my-orders.table-data', ["type" => "datatable-counter", "orders" => $orders, "counter" => $start + $counter + 1])->render();
                $json["user"] = view('admin-panel.my-orders.table-data', ["type" => "user", "orders" => $orders])->render();
                $json["code"] = view('admin-panel.my-orders.table-data', ["type" => "code", "orders" => $orders])->render();
                $json["driver"] = view('admin-panel.my-orders.table-data', ["type" => "driver", "orders" => $orders])->render();
                $json["price"] = view('admin-panel.my-orders.table-data', ["type" => "price", "orders" => $orders])->render();
                $json["comeback"] = view('admin-panel.my-orders.table-data', ["type" => "comeback", "orders" => $orders])->render();
                $json["reserve"] = view('admin-panel.my-orders.table-data', ["type" => "reserve", "orders" => $orders])->render();
                $json["private"] = view('admin-panel.my-orders.table-data', ["type" => "private", "orders" => $orders])->render();
                $json["time_reserve"] = view('admin-panel.my-orders.table-data', ["type" => "time_reserve", "orders" => $orders])->render();
                $json["date_reserve"] = view('admin-panel.my-orders.table-data', ["type" => "date_reserve", "orders" => $orders])->render();
                $json["hurry"] = view('admin-panel.my-orders.table-data', ["type" => "hurry", "orders" => $orders])->render();
                $json["stop_time"] = view('admin-panel.my-orders.table-data', ["type" => "stop_time", "orders" => $orders])->render();
                $json["stop_minutes"] = view('admin-panel.my-orders.table-data', ["type" => "stop_minutes", "orders" => $orders])->render();
                $json["stop_time2"] = view('admin-panel.my-orders.table-data', ["type" => "stop_time2", "orders" => $orders])->render();
                $json["stop_minutes2"] = view('admin-panel.my-orders.table-data', ["type" => "stop_minutes2", "orders" => $orders])->render();
                $json["origin_address"] = view('admin-panel.my-orders.table-data', ["type" => "origin_address", "orders" => $orders])->render();
                $json["destination_address"] = view('admin-panel.my-orders.table-data', ["type" => "destination_address", "orders" => $orders])->render();
                $json["pay_type"] = view('admin-panel.my-orders.table-data', ["type" => "pay_type", "orders" => $orders])->render();
                $json["rate"] = view('admin-panel.my-orders.table-data', ["type" => "rate", "orders" => $orders])->render();
                $json["cancel_status"] = view('admin-panel.my-orders.table-data', ["type" => "cancel_status", "orders" => $orders])->render();
                $json["created_at"] = view('admin-panel.my-orders.table-data', ["type" => "date", "orders" => $orders])->render();
                $json["pay_side"] = view('admin-panel.my-orders.table-data', ["type" => "pay_side", "orders" => $orders])->render();
                $json["delivery_id"] = view('admin-panel.my-orders.table-data', ["type" => "delivery_id", "orders" => $orders])->render();
                $json["name"] = view('admin-panel.my-orders.table-data', ["type" => "name", "orders" => $orders])->render();
                $json["mobile"] = view('admin-panel.my-orders.table-data', ["type" => "mobile", "orders" => $orders])->render();
                $json["canceled_by"] = view('admin-panel.my-orders.table-data', ["type" => "canceled_by", "orders" => $orders])->render();
                $json["driver_rate"] = view('admin-panel.my-orders.table-data', ["type" => "driver_rate", "orders" => $orders])->render();
                $json["user_rate"] = view('admin-panel.my-orders.table-data', ["type" => "user_rate", "orders" => $orders])->render();
                $json["hurry_percent"] = view('admin-panel.my-orders.table-data', ["type" => "hurry_percent", "orders" => $orders])->render();
                $json["cancel_reason"] = view('admin-panel.my-orders.table-data', ["type" => "cancel_reason", "orders" => $orders])->render();
                $json["net_price"] = view('admin-panel.my-orders.table-data', ["type" => "net_price", "orders" => $orders])->render();
                $json["percent_discount"] = view('admin-panel.my-orders.table-data', ["type" => "percent_discount", "orders" => $orders])->render();
                $json["percent_code"] = view('admin-panel.my-orders.table-data', ["type" => "percent_code", "orders" => $orders])->render();
                $json["discounted_price"] = view('admin-panel.my-orders.table-data', ["type" => "discounted_price", "orders" => $orders])->render();
                $json["economic"] = view('admin-panel.my-orders.table-data', ["type" => "economic", "orders" => $orders])->render();
                $json["state"] = view('admin-panel.my-orders.table-data', ["type" => "state", "orders" => $orders])->render();
                $json["helper"] = view('admin-panel.my-orders.table-data', ["type" => "helper", "orders" => $orders])->render();
                $json["cooler"] = view('admin-panel.my-orders.table-data', ["type" => "cooler", "orders" => $orders])->render();
                $json['datatable-actions']=view('admin-panel.my-orders.table-data',["type"=>"datatable-actions","orders"=>$orders])->render();
                $data[$counter]=$json;
                $counter++;
            }

            $result = array(
                "draw" => intval($request->draw),
                "recordsTotal" => intval($total),
                "recordsFiltered" => intval($total),
                "data" => $data
            );
            return response()->json($result,200);

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        $result = array(
            "draw" => intval($request->draw),
            "recordsTotal" => intval(0),
            "recordsFiltered" => intval(0),
            "data" => []
        );
        return response()->json($result,400);

    }



    function storeForm()
    {
        try {

          return view('admin-panel.my-orders.store');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"orders");
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $orders=MyOrders::find($id);
          return view('admin-panel.my-orders.edit',compact('orders'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"orders",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"orders",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
