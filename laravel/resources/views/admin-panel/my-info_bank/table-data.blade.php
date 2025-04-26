@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$info_bank->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="cart_number")
{{$info_bank->cart_number}}
@elseif($type=="shaba")
{{$info_bank->shaba}}
@elseif($type=="name")
{{$info_bank->name}}
@elseif($type=="bank")
@if($banks=\App\Models\MyBanks::find($info_bank->bank))
{{"$banks->title"}}
@endif
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','info_bank'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'info_bank','id'=>$info_bank->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','info_bank'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'info_bank','id'=>$info_bank->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
