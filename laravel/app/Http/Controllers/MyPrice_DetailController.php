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
use App\Models\MyPrice_Detail;
use PDF;

class MyPrice_DetailController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyPrice_Detail::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_price_detail')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_price_detail')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

            }
            return true;


        }catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;

    }

    


    function pdf(Request $request,$parentSlug=null,$parentId=null)
    {
        try {

            $records=MyPrice_Detail::where('parent_slug',$parentSlug)->where('parent_id',$parentId)->orderBy('sort','DESC')->get();
            $data = [
                'slug' => 'price_detail',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-price_detail.export', $data);
            return $pdf->stream('price_detail.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request,$parentSlug=null,$parentId=null)
    {
        try {

            $records=MyPrice_Detail::where('parent_slug',$parentSlug)->where('parent_id',$parentId)->orderBy('sort','DESC')->get();
            return Excel::download(new RecordExport('price_detail',$records), 'price_detail.xlsx');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    public function import(Request $request,$parentSlug=null,$parentId=null)
    {
        try {
            $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

            if (!$receiver->isUploaded()) {
                throw new UploadMissingFileException();
            }

            $fileReceived = $receiver->receive(); // receive file
            if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
                $file = $fileReceived->getFile(); // get file


                Excel::import(new RecordImport($request->user('admin'),getLang(),'price_detail',$parentSlug,$parentId), $file);

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


    function index($parentSlug=null,$parentId=null)
    {
        try {

          return view('admin-panel.my-price_detail.index',compact('parentSlug','parentId'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function pagination(Request $request,$parentSlug=null,$parentId=null){
        try {

          $search=$request->search['value'];
            $start=$request->start;
            $length=$request->length;
            $orderIndex=$request->order[0]['column'];
            $orderDir=$request->order[0]['dir'];
            $orderColumn=$request->columns[$orderIndex]['data'];
            Session::put('dataTableInfo',(object)['slug'=>'price_detail', 'parentSlug'=>$parentSlug,'parentId'=>$parentId,'start'=>$start,'length'=>$length,'search'=>$search]);
          $query=MyPrice_Detail::where('parent_slug',$parentSlug)->where('parent_id',$parentId)->where(function ($q) use ($search) {
            if ($search!=''){
          $q->orWhere("base_price", 'like', '%'.$search.'%');
          $q->orWhere("multiply_price", 'like', '%'.$search.'%');
          $q->orWhere("hurry_percent", 'like', '%'.$search.'%');
          $q->orWhere("back_price", 'like', '%'.$search.'%');
          $q->orWhere("decrease_percent", 'like', '%'.$search.'%');
          $q->orWhere("final_price", 'like', '%'.$search.'%');
          }});
        if ($orderIndex==0)
            $query->orderBy('sort',$orderDir);
        else
            $query->orderBy($orderColumn,$orderDir);
        $total=$query->count();
            $data=[];
            $counter=0;
            foreach ($query->skip($start)->take($length)->get() as $price_detail){
                $json=[];
                $json['datatable-counter']=view('admin-panel.my-price_detail.table-data',["type"=>"datatable-counter","price_detail"=>$price_detail,"counter"=>$start+$counter+1])->render();
          $json["base_price"]=view('admin-panel.my-price_detail.table-data',["type"=>"base_price","price_detail"=>$price_detail])->render();
          $json["multiply_price"]=view('admin-panel.my-price_detail.table-data',["type"=>"multiply_price","price_detail"=>$price_detail])->render();
          $json["hurry_percent"]=view('admin-panel.my-price_detail.table-data',["type"=>"hurry_percent","price_detail"=>$price_detail])->render();
          $json["back_price"]=view('admin-panel.my-price_detail.table-data',["type"=>"back_price","price_detail"=>$price_detail])->render();
          $json["decrease_percent"]=view('admin-panel.my-price_detail.table-data',["type"=>"decrease_percent","price_detail"=>$price_detail])->render();
          $json["final_price"]=view('admin-panel.my-price_detail.table-data',["type"=>"final_price","price_detail"=>$price_detail])->render();
          $json['datatable-actions']=view('admin-panel.my-price_detail.table-data',["type"=>"datatable-actions","price_detail"=>$price_detail])->render();
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



    function storeform($parentSlug=null,$parentId=null)
    {
        try {

          return view('admin-panel.my-price_detail.store',compact('parentSlug','parentId'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request,$parentSlug=null,$parentId=null)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"price_detail",$parentSlug,$parentId);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $price_detail=MyPrice_Detail::find($id);
          $parentSlug=$price_detail->parent_slug;
          $parentId=$price_detail->parent_id;
          return view('admin-panel.my-price_detail.edit',compact('price_detail','parentSlug','parentId'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"price_detail",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"price_detail",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
