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
use App\Models\MyAccount_Check;
use PDF;

class MyAccount_CheckController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyAccount_Check::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_account_check')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_account_check')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

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

            $records=MyAccount_Check::orderBy('sort','DESC')->get();
            $data = [
                'slug' => 'account_check',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-account_check.export', $data);
            return $pdf->stream('account_check.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request)
    {
        try {

            $records=MyAccount_Check::orderBy('sort','DESC')->get();
            return Excel::download(new RecordExport('account_check',$records), 'account_check.xlsx');

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


                Excel::import(new RecordImport($request->user('admin'),getLang(),'account_check',null,null), $file);

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

          return view('admin-panel.my-account_check.index');

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
            Session::put('dataTableInfo',(object)['slug'=>'account_check', 'parentSlug'=>null,'parentId'=>null,'start'=>$start,'length'=>$length,'search'=>$search]);
          $selectIds=[];
          if ($search!=''){
          $selectIds["user"]=\App\Models\MyUsers::where(function($q) use ($search){
          $q->orWhere("name","like", "%".$search."%");
          $q->orWhere("mobile","like", "%".$search."%");
          })->pluck('id')->toArray();
          $selectIds["state"]=\App\Models\MyState_Driver::where(function($q) use ($search){
          $q->orWhere("title","like", "%".$search."%");
          })->pluck('id')->toArray();
          }
          $query=MyAccount_Check::where(function ($q) use ($search,$selectIds) {
            if ($search!=''){
          $q->orWhere("card_number", 'like', '%'.$search.'%');
          $q->orWhereIn("user", $selectIds["user"]);
          $q->orWhere("title", 'like', '%'.$search.'%');
          $q->orWhere("price", 'like', '%'.$search.'%');
          $q->orWhere("created_at", 'like', '%'.$search.'%');
          $q->orWhereIn("state", $selectIds["state"]);
          $q->orWhere("shaba", 'like', '%'.$search.'%');
          }});
        if ($orderIndex==0)
            $query->orderBy('sort',$orderDir);
        else
            $query->orderBy($orderColumn,$orderDir);
        $total=$query->count();
            $data=[];
            $counter=0;
            foreach ($query->skip($start)->take($length)->get() as $account_check){
                $json=[];
                $json['datatable-counter']=view('admin-panel.my-account_check.table-data',["type"=>"datatable-counter","account_check"=>$account_check,"counter"=>$start+$counter+1])->render();
          $json["card_number"]=view('admin-panel.my-account_check.table-data',["type"=>"card_number","account_check"=>$account_check])->render();
          $json["user"]=view('admin-panel.my-account_check.table-data',["type"=>"user","account_check"=>$account_check])->render();
          $json["title"]=view('admin-panel.my-account_check.table-data',["type"=>"title","account_check"=>$account_check])->render();
          $json["price"]=view('admin-panel.my-account_check.table-data',["type"=>"price","account_check"=>$account_check])->render();
          $json["created_at"]=view('admin-panel.my-account_check.table-data',["type"=>"create_at","account_check"=>$account_check])->render();
          $json["state"]=view('admin-panel.my-account_check.table-data',["type"=>"state","account_check"=>$account_check])->render();
          $json["shaba"]=view('admin-panel.my-account_check.table-data',["type"=>"shaba","account_check"=>$account_check])->render();
          $json['datatable-actions']=view('admin-panel.my-account_check.table-data',["type"=>"datatable-actions","account_check"=>$account_check])->render();
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

          return view('admin-panel.my-account_check.store');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"account_check");
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $account_check=MyAccount_Check::find($id);
          return view('admin-panel.my-account_check.edit',compact('account_check'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"account_check",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"account_check",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
