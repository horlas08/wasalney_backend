@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$wallet_admin->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="price")
{{$wallet_admin->price}}
@elseif($type=="type")
@if($transaction_types=\App\Models\MyTransaction_Types::find($wallet_admin->type))
{{"$transaction_types->title"}}
@endif
@elseif($type=="created_at")
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($wallet_admin->updated_at)->format('%A, %d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $wallet_admin->updated_at)->format('M d Y H:i')}}
@endif
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','wallet_admin'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'wallet_admin','id'=>$wallet_admin->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','wallet_admin'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'wallet_admin','id'=>$wallet_admin->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
