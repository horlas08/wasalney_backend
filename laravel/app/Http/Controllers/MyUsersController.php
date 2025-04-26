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
use App\Models\MyUsers;
use PDF;

class MyUsersController extends Controller
{

    function sort(Request $request){
        try {

            $change=$request->sourceId>$request->targetId?(-1):1;
            $shifts=MyUsers::where('sort',$change>0?'<':'>',$request->targetId+($change*999999))->where('sort',$change>0?'>':'<',$request->targetId)->get();
            foreach (Language::all() as $language){
                foreach ($shifts as $shift){
                    DB::table($language->abbr.'_users')->where('id',$shift->id)->limit(1)->update(['sort'=>$shift->sort+$change]);
                }

                DB::table($language->abbr.'_users')->where('sort',$request->sourceId)->limit(1)->update(['sort'=>$request->targetId+$change]);

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
            $filter=Session::get('filterUsers');
            $records=MyUsers::orderBy('sort','DESC')->where(function ($q) use ($filter) {

                if ($filter->from != null) {
                    $q->where('credit', '>=', $filter->from);
                }
                if ($filter->to != null) {
                    $q->where('credit', '<=', $filter->to);
                }

            }
            )->get();
            //end
            $data = [
                'slug' => 'users',
                'records' => $records,
            ];
            $pdf = PDF::loadView('admin-panel.my-users.export', $data);
            return $pdf->stream('users.pdf');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function export(Request $request)
    {
        try {

            //start
            $filter=Session::get('filterUsers');
            $records=MyUsers::orderBy('sort','DESC')->where(function ($q) use ($filter) {

                if ($filter->from != null) {
                    $q->where('credit', '>=', $filter->from);
                }
                if ($filter->to != null) {
                    $q->where('credit', '<=', $filter->to);
                }

            }
            )->get();
            //end
            return Excel::download(new RecordExport('users',$records), 'users.xlsx');

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


                Excel::import(new RecordImport($request->user('admin'),getLang(),'users',null,null), $file);

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
            Session::put('filterUsers',(object)['from'=>$request->from, 'to'=>$request->to]);
            //end
          return view('admin-panel.my-users.index');

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
            Session::put('dataTableInfo',(object)['slug'=>'users', 'parentSlug'=>null,'parentId'=>null,'start'=>$start,'length'=>$length,'search'=>$search]);
          $query=MyUsers::where(function ($q) use ($search) {
            if ($search!=''){
          $q->orWhere("email", 'like', '%'.$search.'%');
          $q->orWhere("name", 'like', '%'.$search.'%');
          $q->orWhere("address", 'like', '%'.$search.'%');
          $q->orWhere("mobile", 'like', '%'.$search.'%');
          $q->orWhere("verify_code", 'like', '%'.$search.'%');
          $q->orWhere("image", 'like', '%'.$search.'%');
          $q->orWhere("birth_date", 'like', '%'.$search.'%');
          $q->orWhere("notif_token", 'like', '%'.$search.'%');
          $q->orWhere("code", 'like', '%'.$search.'%');
          $q->orWhere("intro_code", 'like', '%'.$search.'%');
          $q->orWhere("credit", 'like', '%'.$search.'%');
          }});
            //start
            $query->where(function ($q) {
                $filter=Session::get('filterUsers');

                if ($filter->from != null) {
                    $q->where('credit', '>=', $filter->from);
                }
                if ($filter->to != null) {
                    $q->where('credit', '<=', $filter->to);
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
            foreach ($query->skip($start)->take($length)->get() as $users){
                $json=[];
                $json['datatable-counter']=view('admin-panel.my-users.table-data',["type"=>"datatable-counter","users"=>$users,"counter"=>$start+$counter+1])->render();
          $json["email"]=view('admin-panel.my-users.table-data',["type"=>"email","users"=>$users])->render();
          $json["name"]=view('admin-panel.my-users.table-data',["type"=>"name","users"=>$users])->render();
          $json["address"]=view('admin-panel.my-users.table-data',["type"=>"address","users"=>$users])->render();
          $json["mobile"]=view('admin-panel.my-users.table-data',["type"=>"mobile","users"=>$users])->render();
          $json["image"]=view('admin-panel.my-users.table-data',["type"=>"image","users"=>$users])->render();
          $json["birth_date"]=view('admin-panel.my-users.table-data',["type"=>"birth_date","users"=>$users])->render();
          $json["code"]=view('admin-panel.my-users.table-data',["type"=>"code","users"=>$users])->render();
          $json["intro_code"]=view('admin-panel.my-users.table-data',["type"=>"intro_code","users"=>$users])->render();
          $json["credit"]=view('admin-panel.my-users.table-data',["type"=>"credit","users"=>$users])->render();
          $json['datatable-actions']=view('admin-panel.my-users.table-data',["type"=>"datatable-actions","users"=>$users])->render();
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

          return view('admin-panel.my-users.store');

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function store(Request $request)
    {
        $lang=app()->getLocale();
        $result=Record::storeRecord($request,$lang,"users");
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }

    function editForm($id)
    {
        try {

          $users=MyUsers::find($id);
          return view('admin-panel.my-users.edit',compact('users'));

        } catch (\Exception $e) {
            Storage::disk('file')->append('log.txt', $e->getMessage());
        }
        return abort(500);
    }

    function edit(Request $request,$id)
    {
        $lang=app()->getLocale();
        $result=Record::editRecord($request,$lang,"users",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();
    }


    function destroy($id)
    {
        $lang=app()->getLocale();
        $result=Record::deleteRecord($lang,"users",$id);
        if ($result->status==true){
            return back();
        }
        else
            return back()->withErrors($result->message)->withInput();

    }



}
