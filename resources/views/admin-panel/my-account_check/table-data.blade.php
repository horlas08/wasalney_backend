@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$account_check->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="card_number")
{{$account_check->card_number}}
@elseif($type=="user")
@if($users=\App\Models\MyUsers::find($account_check->user))
{{"( $users->mobile)$users->name"}}
@endif
@elseif($type=="title")
{{$account_check->title}}
@elseif($type=="price")
{{$account_check->price}}
@elseif($type=="create_at")
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($account_check->created_at)->format('%A, %d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $account_check->created_at)->format('M d Y H:i')}}
@endif
@elseif($type=="state")
@if($state_driver=\App\Models\MyState_Driver::find($account_check->state))
{{"$state_driver->title"}}
@endif
@elseif($type=="shaba")
{{$account_check->shaba}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','account_check'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'account_check','id'=>$account_check->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','account_check'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'account_check','id'=>$account_check->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
