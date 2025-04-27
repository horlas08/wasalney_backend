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
use App\Models\MyGift_Cart;
use PDF;

class MyGift_CartController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyGift_Cart::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_gift_cart')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_gift_cart')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

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

            $records=MyGift_Cart::orderBy('sort','DESC')->get();
            $data = [
                'slug' => 'gift_cart',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-gift_cart.export', $data);
            return $pdf->stream('gift_cart.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request)
    {
        try {

            $records=MyGift_Cart::orderBy('sort','DESC')->get();
            return Excel::download(new RecordExport('gift_cart',$records), 'gift_cart.xlsx');

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


                Excel::import(new RecordImport($request->user('admin'),getLang(),'gift_cart',null,null), $file);

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


    function index()
    {
        try {

          return view('admin-panel.my-gift_cart.index');

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
            Session::put('dataTableInfo',(object)['slug'=>'gift_cart', 'parentSlug'=>null,'parentId'=>null,'start'=>$start,'length'=>$length,'search'=>$search]);
          $selectIds=[];
          if ($search!=''){
          $selectIds["service"]=\App\Models\MyDeliveries::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          $selectIds["service"]=\App\Models\MyGift_CartDeliveries::whereIn("deliveries_id",$selectIds["service"])
                    ->pluck("gift_cart_id")->toArray();
          }
          $query=MyGift_Cart::where(function ($q) use ($search,$selectIds) {
            if ($search!=''){
          $q->orWhere("gift_code", 'like', '%'.$search.'%');
          $q->orWhere("percent", 'like', '%'.$search.'%');
          $q->orWhere("expire_date", 'like', '%'.$search.'%');
          $q->orWhereIn("id", $selectIds["service"]);
          $q->orWhere("count", 'like', '%'.$search.'%');
          $q->orWhere("min_price", 'like', '%'.$search.'%');
          }});
        if ($orderIndex==0)
            $query->orderBy('sort',$orderDir);
        else
            $query->orderBy($orderColumn,$orderDir);
        $total=$query->count();
            $data=[];
            $counter=0;
            foreach ($query->skip($start)->take($length)->get() as $gift_cart){
                $json=[];
                $json['datatable-counter']=view('admin-panel.my-gift_cart.table-data',["type"=>"datatable-counter","gift_cart"=>$gift_cart,"counter"=>$start+$counter+1])->render();
          $json["gift_code"]=view('admin-panel.my-gift_cart.table-data',["type"=>"gift_code","gift_cart"=>$gift_cart])->render();
          $json["percent"]=view('admin-panel.my-gift_cart.table-data',["type"=>"percent","gift_cart"=>$gift_cart])->render();
          $json["expire_date"]=view('admin-panel.my-gift_cart.table-data',["type"=>"expire_date","gift_cart"=>$gift_cart])->render();
          $json["service"]=view('admin-panel.my-gift_cart.table-data',["type"=>"service","gift_cart"=>$gift_cart])->render();
          $json["count"]=view('admin-panel.my-gift_cart.table-data',["type"=>"count","gift_cart"=>$gift_cart])->render();
          $json["min_price"]=view('admin-panel.my-gift_cart.table-data',["type"=>"min_price","gift_cart"=>$gift_cart])->render();
          $json['datatable-actions']=view('admin-panel.my-gift_cart.table-data',["type"=>"datatable-actions","gift_cart"=>$gift_cart])->render();
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

          return view('admin-panel.my-gift_cart.store');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"gift_cart");
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $gift_cart=MyGift_Cart::find($id);
          return view('admin-panel.my-gift_cart.edit',compact('gift_cart'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"gift_cart",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"gift_cart",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
