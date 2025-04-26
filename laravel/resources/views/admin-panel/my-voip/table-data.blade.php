@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$voip->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="ip")
{{$voip->ip}}
@elseif($type=="user_name")
{{$voip->user_name}}
@elseif($type=="pass")
{{$voip->pass}}
@elseif($type=="trank")
{{$voip->trank}}
@elseif($type=="gateway")
{{$voip->gateway}}
@elseif($type=="pre_trank")
{{$voip->pre_trank}}
@elseif($type=="port")
{{$voip->port}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','voip'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'voip','id'=>$voip->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','voip'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'voip','id'=>$voip->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
