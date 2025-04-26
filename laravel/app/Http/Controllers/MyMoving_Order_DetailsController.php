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
use App\Models\MyMoving_Order_Details;
use PDF;

class MyMoving_Order_DetailsController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyMoving_Order_Details::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_moving_order_details')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_moving_order_details')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

            }
            return true;


        }catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;

    }




    function pdf(Request $request)
    {
        try {
            //start
            $filter=Session::get('filterMovingOrders');
            $records=MyMoving_Order_Details::orderBy('sort','DESC')->where(function ($q) use ($filter) {


                if ($filter->from != null) {
                    $fromDate = Jalalian::fromFormat('Y/m/d', $filter->from)->toCarbon();
                    $q->whereDate('date', '>=', $fromDate->format('Y-m-d'));
                }
                if ($filter->to != null) {
                    $toDate = Jalalian::fromFormat('Y/m/d', $filter->to)->toCarbon();
                    $q->whereDate('date', '<=', $toDate->format('Y-m-d'));
                }
            }
            )->get();
            //end
            $data = [
                'slug' => 'moving_order_details',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-moving_order_details.export', $data);
            return $pdf->stream('moving_order_details.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request)
    {
        try {

            //start
            $filter=Session::get('filterMovingOrders');
            $records=MyMoving_Order_Details::orderBy('sort','DESC')->where(function ($q) use ($filter) {


                if ($filter->from != null) {
                    $fromDate = Jalalian::fromFormat('Y/m/d', $filter->from)->toCarbon();
                    $q->whereDate('date', '>=', $fromDate->format('Y-m-d'));
                }
                if ($filter->to != null) {
                    $toDate = Jalalian::fromFormat('Y/m/d', $filter->to)->toCarbon();
                    $q->whereDate('date', '<=', $toDate->format('Y-m-d'));
                }
            }
            )->get();
            //end
            return Excel::download(new RecordExport('moving_order_details',$records), 'moving_order_details.xlsx');

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


                Excel::import(new RecordImport($request->user('admin'),getLang(),'moving_order_details',null,null), $file);

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
            Session::put('filterMovingOrders',(object)['from'=>$request->from, 'to'=>$request->to]);
            //end
          return view('admin-panel.my-moving_order_details.index');

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
            Session::put('dataTableInfo',(object)['slug'=>'moving_order_details', 'parentSlug'=>null,'parentId'=>null,'start'=>$start,'length'=>$length,'search'=>$search]);
          $selectIds=[];
          if ($search!=''){
          $selectIds["order_id"]=\App\Models\MyOrders::where(function($q) use ($search){
          $q->orWhere("code","like", "%".$search."%");
          })->pluck('id')->toArray();
          }
          $query=MyMoving_Order_Details::where(function ($q) use ($search,$selectIds) {
            if ($search!=''){
          $q->orWhereIn("order_id", $selectIds["order_id"]);
          $q->orWhere("count_worker", 'like', '%'.$search.'%');
          $q->orWhere("price_worker", 'like', '%'.$search.'%');
          $q->orWhere("count_floors_origin", 'like', '%'.$search.'%');
          $q->orWhere("count_floors_destination", 'like', '%'.$search.'%');
          $q->orWhere("elevator_origin", 'like', '%'.$search.'%');
          $q->orWhere("elevator_destination", 'like', '%'.$search.'%');
          $q->orWhere("date", 'like', '%'.$search.'%');
          $q->orWhere("time", 'like', '%'.$search.'%');
          }});

            //start
            $query->where(function ($q) {
                $filter=Session::get('filterMovingOrders');

                if ($filter->from != null) {
                    $fromDate =$filter->from;
                    $q->whereDate('date', '>=', $fromDate);
                }
                if ($filter->to != null) {
                    $toDate = $filter->to;
                    $q->whereDate('date', '<=', $toDate);
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
            foreach ($query->skip($start)->take($length)->get() as $moving_order_details){
                $json=[];
                $json['datatable-counter']=view('admin-panel.my-moving_order_details.table-data',["type"=>"datatable-counter","moving_order_details"=>$moving_order_details,"counter"=>$start+$counter+1])->render();
          $json["order_id"]=view('admin-panel.my-moving_order_details.table-data',["type"=>"order_id","moving_order_details"=>$moving_order_details])->render();
          $json["count_worker"]=view('admin-panel.my-moving_order_details.table-data',["type"=>"count_worker","moving_order_details"=>$moving_order_details])->render();
          $json["price_worker"]=view('admin-panel.my-moving_order_details.table-data',["type"=>"price_worker","moving_order_details"=>$moving_order_details])->render();
          $json["count_floors_origin"]=view('admin-panel.my-moving_order_details.table-data',["type"=>"count_floors_origin","moving_order_details"=>$moving_order_details])->render();
          $json["count_floors_destination"]=view('admin-panel.my-moving_order_details.table-data',["type"=>"count_floors_destination","moving_order_details"=>$moving_order_details])->render();
          $json["elevator_origin"]=view('admin-panel.my-moving_order_details.table-data',["type"=>"elevator_origin","moving_order_details"=>$moving_order_details])->render();
          $json["elevator_destination"]=view('admin-panel.my-moving_order_details.table-data',["type"=>"elevator_destination","moving_order_details"=>$moving_order_details])->render();
          $json["date"]=view('admin-panel.my-moving_order_details.table-data',["type"=>"date","moving_order_details"=>$moving_order_details])->render();
          $json["time"]=view('admin-panel.my-moving_order_details.table-data',["type"=>"time","moving_order_details"=>$moving_order_details])->render();
          $json['datatable-actions']=view('admin-panel.my-moving_order_details.table-data',["type"=>"datatable-actions","moving_order_details"=>$moving_order_details])->render();
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

          return view('admin-panel.my-moving_order_details.store');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"moving_order_details");
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $moving_order_details=MyMoving_Order_Details::find($id);
          return view('admin-panel.my-moving_order_details.edit',compact('moving_order_details'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"moving_order_details",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"moving_order_details",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
