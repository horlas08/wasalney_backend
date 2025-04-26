@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$support->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="phone")
{{$support->phone}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','support'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'support','id'=>$support->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','support'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'support','id'=>$support->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
