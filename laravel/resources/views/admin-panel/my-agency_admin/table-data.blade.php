@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$agency_admin->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="username")
{{$agency_admin->username}}
@elseif($type=="name")
{{$agency_admin->name}}
@elseif($type=="services")
@php($multiValues=\App\Models\MyAgency_AdminDeliveries::where('agency_admin_id',$agency_admin->id)->get())
@foreach($multiValues as $value)
@php($deliveries=\App\Models\MyDeliveries::find($value->deliveries_id))
<div style="text-align: center">{{"$deliveries->title"}}</div>@endforeach
@elseif($type=="commission")
{{$agency_admin->commission}}
@elseif($type=="address")
{{$agency_admin->address}}
@elseif($type=="title")
{{$agency_admin->title}}
@elseif($type=="image")
<div class="d-flex justify-content-center align-items-center">
@if($agency_admin->image!=null)
<a href="{{'/files/'.$agency_admin->image}}" target="_blank" style="background-color: #EEEEEE;text-align: center;width: fit-content">
<img src="{{'/files/'.$agency_admin->image}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
</a>
@endif
</div>
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','agency_admin'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'agency_admin','id'=>$agency_admin->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','agency_admin'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'agency_admin','id'=>$agency_admin->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
