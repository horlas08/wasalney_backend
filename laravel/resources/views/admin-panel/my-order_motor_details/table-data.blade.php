@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$order_motor_details->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="order_id")
@if($orders=\App\Models\MyOrders::find($order_motor_details->order_id))
{{"$orders->code"}}
@endif
@elseif($type=="type_parcel")
@if($type_parcel=\App\Models\MyType_Parcel::find($order_motor_details->type_parcel))
{{"$type_parcel->title"}}
@endif
@elseif($type=="price_parcel")
{{$order_motor_details->price_parcel}}
{{--@elseif($type=="price_product")--}}
{{--    {{$order_motor_details->price_product}}--}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','order_motor_details'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'order_motor_details','id'=>$order_motor_details->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','order_motor_details'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'order_motor_details','id'=>$order_motor_details->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
</ul>
</div>
@endif
