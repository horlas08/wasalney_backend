@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$message->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="driver")
@if($drivers=\App\Models\MyDrivers::find($message->driver))
{{"($drivers->mobile) $drivers->name"}}
@endif
@elseif($type=="user")
@if($users=\App\Models\MyUsers::find($message->user))
{{"($users->mobile) $users->name"}}
@endif
@elseif($type=="messsage")
{{$message->messsage}}
@elseif($type=="user_sent")
<div class="custom-control custom-checkbox mb-3 text-center">
<input {{\App\Models\Admin::checkAccess('record','edit','message')?'':'disabled'}} {{$message->user_sent?'checked':''}}
onclick="onCheckbox(this,'{{route('record.active',['slug'=>'message','fieldName'=>'user_sent','id'=>$message->id])}}')"
type="checkbox" class="form-check-input" id="customCheck{{'user_sent_'.$message->id}}"/>
@elseif($type=="driver_sent")
<div class="custom-control custom-checkbox mb-3 text-center">
<input {{\App\Models\Admin::checkAccess('record','edit','message')?'':'disabled'}} {{$message->driver_sent?'checked':''}}
onclick="onCheckbox(this,'{{route('record.active',['slug'=>'message','fieldName'=>'driver_sent','id'=>$message->id])}}')"
type="checkbox" class="form-check-input" id="customCheck{{'driver_sent_'.$message->id}}"/>
@elseif($type=="create_at")
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($message->created_at)->format('%A, %d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $message->created_at)->format('M d Y H:i')}}
@endif
@elseif($type=="update_at")
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($message->updated_at)->format('%A, %d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $message->updated_at)->format('M d Y H:i')}}
@endif
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','message'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'message','id'=>$message->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','message'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'message','id'=>$message->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
