@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$rate_user->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="type")
@if($transaction_types=\App\Models\MyTransaction_Types::find($rate_user->type))
{{"$transaction_types->title"}}
@endif
@elseif($type=="count")
{{$rate_user->count}}
@elseif($type=="created_at")
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($rate_user->created_at)->format('%A, %d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $rate_user->created_at)->format('M d Y H:i')}}
@endif
@elseif($type=="cost")
{{$rate_user->cost}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','rate_user'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'rate_user','id'=>$rate_user->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','rate_user'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'rate_user','id'=>$rate_user->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
