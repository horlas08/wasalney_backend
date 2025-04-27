@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$financial_report->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="order")
@if($orders=\App\Models\MyOrders::find($financial_report->order))
{{"$orders->code"}}
@endif
@elseif($type=="date")
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($financial_report->created_at)->format('%A, %d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $financial_report->created_at)->format('M d Y H:i')}}
@endif
@elseif($type=="price")
    {{$financial_report->price}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','financial_report'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'financial_report','id'=>$financial_report->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','financial_report'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'financial_report','id'=>$financial_report->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
