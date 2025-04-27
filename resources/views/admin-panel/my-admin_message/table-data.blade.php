@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$admin_message->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="driver")
@php($multiValues=\App\Models\MyAdmin_MessageDrivers::where('admin_message_id',$admin_message->id)->get())
@foreach($multiValues as $value)
@php($drivers=\App\Models\MyDrivers::find($value->drivers_id))
<div style="text-align: center">{{"($drivers->mobile) $drivers->name"}}</div>@endforeach
@elseif($type=="message")
{{$admin_message->message}}
@elseif($type=="date")
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($admin_message->created_at)->format('%A, %d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $admin_message->created_at)->format('M d Y H:i')}}
@endif
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','admin_message'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'admin_message','id'=>$admin_message->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','admin_message'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'admin_message','id'=>$admin_message->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
