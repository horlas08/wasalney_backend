@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$moving_order_details->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="order_id")
@if($orders=\App\Models\MyOrders::find($moving_order_details->order_id))
{{"$orders->code"}}
@endif
@elseif($type=="count_worker")
{{$moving_order_details->count_worker}}
@elseif($type=="price_worker")
{{$moving_order_details->price_worker}}
@elseif($type=="count_floors_origin")
{{$moving_order_details->count_floors_origin}}
@elseif($type=="count_floors_destination")
{{$moving_order_details->count_floors_destination}}
@elseif($type=="elevator_origin")
{{$moving_order_details->elevator_origin}}
@elseif($type=="elevator_destination")
{{$moving_order_details->elevator_destination}}
@elseif($type=="date")
@if($moving_order_details->date)
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromCarbon(\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $moving_order_details->date))->format('%A, %d %B %Y')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $moving_order_details->date)->format('M d Y')}}
@endif
@endif
@elseif($type=="time")
{{$moving_order_details->time}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','moving_order_details'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'moving_order_details','id'=>$moving_order_details->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','moving_order_details'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'moving_order_details','id'=>$moving_order_details->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','show','equipment_detail'))
           <li>
                <a href="{{route('record.index',['slug'=>'equipment_detail','parentSlug'=>'moving_order_details','parentId'=>$moving_order_details->id])}}"
                type="button" class="dropdown-item" >{{__("وسایل")}}
                </a>
                </li>
@endif
</ul>
</div>
@endif
