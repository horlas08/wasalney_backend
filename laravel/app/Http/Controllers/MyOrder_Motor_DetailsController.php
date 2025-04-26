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
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use App\Models\Language;
use App\Models\MyOrder_Motor_Details;
use PDF;

class MyOrder_Motor_DetailsController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyOrder_Motor_Details::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_order_motor_details')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_order_motor_details')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

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
            $filter=Session::get('filterOrderMotor');
            $records=MyOrder_Motor_Details::orderBy('sort','DESC')->where(function ($q) use ($filter) {

                if ($filter->type != null && $filter->type !=0) {
                    $q->where('type_parcel',$filter->type);
                }
                if ($filter->price_from != null ) {
                    $q->where('price_product','>=', $filter->price_from);
                }
                if ($filter->price_to != null ) {
                    $q->where('price_product','<=', $filter->price_to);
                }

            }
            )->get();
            //end
            $data = [
                'slug' => 'order_motor_details',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-order_motor_details.export', $data);
            return $pdf->stream('order_motor_details.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request)
    {
        try {

            //start
            $filter=Session::get('filterOrderMotor');
            $records=MyOrder_Motor_Details::orderBy('sort','DESC')->where(function ($q) use ($filter) {

                if ($filter->price_from != null ) {
                    $q->where('price_product','>=', $filter->price_from);
                }
                if ($filter->price_to != null ) {
                    $q->where('price_product','<=', $filter->price_to);
                }


            }
            )->get();
            //end
            return Excel::download(new RecordExport('order_motor_details',$records), 'order_motor_details.xlsx');

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


                Excel::import(new RecordImport($request->user('admin'),getLang(),'order_motor_details',null,null), $file);

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
            Session::put('filterOrderMotor',(object)['type'=>$request->type,'price_from'=>$request->price_from, 'price_to'=>$request->price_to]);
            //end
          return view('admin-panel.my-order_motor_details.index');

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
            Session::put('dataTableInfo',(object)['slug'=>'order_motor_details', 'parentSlug'=>null,'parentId'=>null,'start'=>$start,'length'=>$length,'search'=>$search]);
          $selectIds=[];
          if ($search!=''){
          $selectIds["order_id"]=\App\Models\MyOrders::where(function($q) use ($search){
          $q->orWhere("price","like", "%".$search."%");
          })->pluck('id')->toArray();
          $selectIds["type_parcel"]=\App\Models\MyType_Parcel::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          $selectIds["price_parcel"]=\App\Models\MyPrice_Parcel::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          }
          $query=MyOrder_Motor_Details::where(function ($q) use ($search,$selectIds) {
            if ($search!=''){
          $q->orWhereIn("order_id", $selectIds["order_id"]);
          $q->orWhereIn("type_parcel", $selectIds["type_parcel"]);
          $q->orWhereIn("price_parcel", $selectIds["price_parcel"]);
          }});

            //start
            $query->where(function ($q) {
                $filter=Session::get('filterOrderMotor');

                if ($filter->type != 0 && $filter->type != null) {
                    $q->where('type_parcel', $filter->type);
                }
                if ($filter->price_from != null) {
                    $q->where('price_product','>=', $filter->price_from);
                }
                if ($filter->price_to != null) {
                    $q->where('price_product','<=', $filter->price_to);
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
            foreach ($query->skip($start)->take($length)->get() as $order_motor_details){
                $json=[];
                $json['datatable-counter']=view('admin-panel.my-order_motor_details.table-data',["type"=>"datatable-counter","order_motor_details"=>$order_motor_details,"counter"=>$start+$counter+1])->render();
          $json["order_id"]=view('admin-panel.my-order_motor_details.table-data',["type"=>"order_id","order_motor_details"=>$order_motor_details])->render();
          $json["type_parcel"]=view('admin-panel.my-order_motor_details.table-data',["type"=>"type_parcel","order_motor_details"=>$order_motor_details])->render();
          $json["price_parcel"]=view('admin-panel.my-order_motor_details.table-data',["type"=>"price_parcel","order_motor_details"=>$order_motor_details])->render();
          $json["price_product"]=view('admin-panel.my-order_motor_details.table-data',["type"=>"price_product","order_motor_details"=>$order_motor_details])->render();
          $json['datatable-actions']=view('admin-panel.my-order_motor_details.table-data',["type"=>"datatable-actions","order_motor_details"=>$order_motor_details])->render();
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

          return view('admin-panel.my-order_motor_details.store');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"order_motor_details");
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $order_motor_details=MyOrder_Motor_Details::find($id);
          return view('admin-panel.my-order_motor_details.edit',compact('order_motor_details'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"order_motor_details",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"order_motor_details",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
