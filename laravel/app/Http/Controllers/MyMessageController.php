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
use App\Models\MyMessage;
use PDF;

class MyMessageController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyMessage::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_message')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_message')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

            }
            return true;


        }catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;

    }

    function user_sentActive($id){
        try {
            $message=MyMessage::find($id);
            if($message->user_sent)
                $message->user_sent=0;
            else
                $message->user_sent=1;
            $message->save();

            return true;

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;
    }function driver_sentActive($id){
        try {
            $message=MyMessage::find($id);
            if($message->driver_sent)
                $message->driver_sent=0;
            else
                $message->driver_sent=1;
            $message->save();

            return true;

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return false;
    }


    function pdf(Request $request,$parentSlug=null,$parentId=null)
    {
        try {

            $records=MyMessage::where('parent_slug',$parentSlug)->where('parent_id',$parentId)->orderBy('sort','DESC')->get();
            $data = [
                'slug' => 'message',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-message.export', $data);
            return $pdf->stream('message.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request,$parentSlug=null,$parentId=null)
    {
        try {

            $records=MyMessage::where('parent_slug',$parentSlug)->where('parent_id',$parentId)->orderBy('sort','DESC')->get();
            return Excel::download(new RecordExport('message',$records), 'message.xlsx');

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


                Excel::import(new RecordImport($request->user('admin'),getLang(),'message',$parentSlug,$parentId), $file);

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

          return view('admin-panel.my-message.index',compact('parentSlug','parentId'));

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
            Session::put('dataTableInfo',(object)['slug'=>'message', 'parentSlug'=>$parentSlug,'parentId'=>$parentId,'start'=>$start,'length'=>$length,'search'=>$search]);
          $selectIds=[];
          if ($search!=''){
          $selectIds["driver"]=\App\Models\MyDrivers::where(function($q) use ($search){
          $q->orWhere("name","like", "%".$search."%");
          $q->orWhere("mobile","like", "%".$search."%");
          })->pluck('id')->toArray();
          $selectIds["user"]=\App\Models\MyUsers::where(function($q) use ($search){
          $q->orWhere("name","like", "%".$search."%");
          $q->orWhere("mobile","like", "%".$search."%");
          })->pluck('id')->toArray();
          }
          $query=MyMessage::where('parent_slug',$parentSlug)->where('parent_id',$parentId)->where(function ($q) use ($search,$selectIds) {
            if ($search!=''){
          $q->orWhereIn("driver", $selectIds["driver"]);
          $q->orWhereIn("user", $selectIds["user"]);
          $q->orWhere("messsage", 'like', '%'.$search.'%');
          $q->orWhere("user_sent", 'like', '%'.$search.'%');
          $q->orWhere("driver_sent", 'like', '%'.$search.'%');
          $q->orWhere("created_at", 'like', '%'.$search.'%');
          $q->orWhere("updated_at", 'like', '%'.$search.'%');
          }});
        if ($orderIndex==0)
            $query->orderBy('sort',$orderDir);
        else
            $query->orderBy($orderColumn,$orderDir);
        $total=$query->count();
            $data=[];
            $counter=0;
            foreach ($query->skip($start)->take($length)->get() as $message){
                $json=[];
                $json['datatable-counter']=view('admin-panel.my-message.table-data',["type"=>"datatable-counter","message"=>$message,"counter"=>$start+$counter+1])->render();
          $json["driver"]=view('admin-panel.my-message.table-data',["type"=>"driver","message"=>$message])->render();
          $json["user"]=view('admin-panel.my-message.table-data',["type"=>"user","message"=>$message])->render();
          $json["messsage"]=view('admin-panel.my-message.table-data',["type"=>"messsage","message"=>$message])->render();
          $json["user_sent"]=view('admin-panel.my-message.table-data',["type"=>"user_sent","message"=>$message])->render();
          $json["driver_sent"]=view('admin-panel.my-message.table-data',["type"=>"driver_sent","message"=>$message])->render();
          $json["created_at"]=view('admin-panel.my-message.table-data',["type"=>"create_at","message"=>$message])->render();
          $json["updated_at"]=view('admin-panel.my-message.table-data',["type"=>"update_at","message"=>$message])->render();
          $json['datatable-actions']=view('admin-panel.my-message.table-data',["type"=>"datatable-actions","message"=>$message])->render();
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

          return view('admin-panel.my-message.store',compact('parentSlug','parentId'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request,$parentSlug=null,$parentId=null)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"message",$parentSlug,$parentId);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $message=MyMessage::find($id);
          $parentSlug=$message->parent_slug;
          $parentId=$message->parent_id;
          return view('admin-panel.my-message.edit',compact('message','parentSlug','parentId'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"message",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"message",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
