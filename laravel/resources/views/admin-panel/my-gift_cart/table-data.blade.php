@if($type=="datatable-counter")
<i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$gift_cart->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
{{$counter}}
@elseif($type=="gift_code")
{{$gift_cart->gift_code}}
@elseif($type=="percent")
{{$gift_cart->percent}}
@elseif($type=="expire_date")
@if($gift_cart->expire_date)
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromCarbon(\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $gift_cart->expire_date))->format('%A, %d %B %Y')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $gift_cart->expire_date)->format('M d Y')}}
@endif
@endif
@elseif($type=="service")
@php($multiValues=\App\Models\MyGift_CartDeliveries::where('gift_cart_id',$gift_cart->id)->get())
@foreach($multiValues as $value)
@php($deliveries=\App\Models\MyDeliveries::find($value->deliveries_id))
<div style="text-align: center">{{"$deliveries->title"}}</div>@endforeach
@elseif($type=="count")
{{$gift_cart->count}}
@elseif($type=="min_price")
{{$gift_cart->min_price}}
@else
<div class="btn-group">
<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Actions') }}</button>
<ul class="dropdown-menu" style="">
@if(\App\Models\Admin::checkAccess('record','edit','gift_cart'))
       <li>
            <a class="dropdown-item" href="{{route('record.editform',['slug'=>'gift_cart','id'=>$gift_cart->id])}}">
                <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','delete','gift_cart'))
       <li>
            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#basicModal"
            onclick="setModalRoute('{{route('record.destroy',['slug'=>'gift_cart','id'=>$gift_cart->id])}}')">
                <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
            </a>
       </li>
@endif
@if(\App\Models\Admin::checkAccess('record','show','discount_order'))
           <li>
                <a href="{{route('record.index',['slug'=>'discount_order','parentSlug'=>'gift_cart','parentId'=>$gift_cart->id])}}"
                type="button" class="dropdown-item" >{{__("سفارشات")}}
                </a>
                </li>
@endif
</ul>
</div>
@endif
