@if($type=="datatable-counter")
    <i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$orders->sort}}" style="color: #2e98c5;font-size: 20px;"></i>
    {{$counter}}
@elseif($type=="user")
    @if($users=db('users')->findRecord($orders->user))
        {{"($users->mobile) $users->name"}}
    @endif
@elseif($type=="code")
    {{$orders->code}}
@elseif($type=="driver")
    @if($drivers=db('drivers')->findRecord($orders->driver))
        ({{"$drivers->mobile"}}) {{"$drivers->name"}}
    @endif
@elseif($type=="price")
    {{$orders->price}}
@elseif($type=="reserve")
    <div class="custom-control custom-checkbox mb-3 text-center">
        <input {{\App\Models\Admin::checkAccess('record','edit','orders')?'':'disabled'}} {{$orders->reserve?'checked':''}}
               onclick="onCheckbox(this,'{{route('record.active',['slug'=>'orders','fieldName'=>'reserve','id'=>$orders->id])}}')"
               type="checkbox" class="form-check-input" id="customCheck{{'reserve'.$orders->id}}"/>
        @elseif($type=="comeback")
            <div class="custom-control custom-checkbox mb-3 text-center">
                <input {{\App\Models\Admin::checkAccess('record','edit','orders')?'':'disabled'}} {{$orders->comeback?'checked':''}}
                       onclick="onCheckbox(this,'{{route('record.active',['slug'=>'orders','fieldName'=>'comeback','id'=>$orders->id])}}')"
                       type="checkbox" class="form-check-input" id="customCheck{{'comeback'.$orders->id}}"/>
                @elseif($type=="private")
                    <div class="custom-control custom-checkbox mb-3 text-center">
                        <input {{\App\Models\Admin::checkAccess('record','edit','orders')?'':'disabled'}} {{$orders->private?'checked':''}}
                               onclick="onCheckbox(this,'{{route('record.active',['slug'=>'orders','fieldName'=>'private','id'=>$orders->id])}}')"
                               type="checkbox" class="form-check-input" id="customCheck{{'private'.$orders->id}}"/>
                        @elseif($type=="hurry")
                            <div class="custom-control custom-checkbox mb-3 text-center">
                                <input {{\App\Models\Admin::checkAccess('record','edit','orders')?'':'disabled'}} {{$orders->hurry?'checked':''}}
                                       onclick="onCheckbox(this,'{{route('record.active',['slug'=>'orders','fieldName'=>'hurry','id'=>$orders->id])}}')"
                                       type="checkbox" class="form-check-input"
                                       id="customCheck{{'hurry'.$orders->id}}"/>

                                @elseif($type=="stop_time")
                                    {{$orders->stop_time}}
                                @elseif($type=="stop_time2")
                                    {{$orders->stop_time2}}
                                    {{--@elseif($type=="stop_minutes")--}}
                                    {{--{{$orders->stop_minutes}}--}}
                                @elseif($type=="origin_address")
                                    {{$orders->origin_address}}
                                @elseif($type=="destination_address")
                                    {{$orders->destination_address}}
                                @elseif($type=="pay_type")
                                    @if($pay_typs=\App\Models\MyPay_Typs::find($orders->pay_type))
                                        {{"$pay_typs->title"}}
                                    @endif
                                @elseif($type=="rate")
                                    {{$orders->rate}}
                                @elseif($type=="cancel_status")
                                    {{$orders->cancel_status}}
                                @elseif($type=="date")
                                    @if(getLang()=='fa')
                                        {{\Morilog\Jalali\Jalalian::fromDateTime($orders->created_at)->format('%A, %d %B %Y H:i')}}
                                    @else
                                        {{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $orders->created_at)->format('M d Y H:i')}}
                                    @endif
                                @elseif($type=="pay_side")
                                    {{$orders->pay_side}}
                                @elseif($type=="delivery_id")
                                    @if($deliveries=\App\Models\MyDeliveries::find($orders->delivery_id))
                                        {{"$deliveries->title"}}
                                    @endif
                                @elseif($type=="name")
                                    {{$orders->name}}
                                @elseif($type=="mobile")
                                    {{$orders->mobile}}
                                @elseif($type=="canceled_by")
                                    {{$orders->canceled_by}}
                                @elseif($type=="driver_rate")
                                    {{$orders->driver_rate}}
                                @elseif($type=="user_rate")
                                    <div class="custom-control custom-checkbox mb-3 text-center">
                                        <input {{\App\Models\Admin::checkAccess('record','edit','orders')?'':'disabled'}} {{$orders->user_rate?'checked':''}}
                                               onclick="onCheckbox(this,'{{route('record.active',['slug'=>'orders','fieldName'=>'user_rate','id'=>$orders->id])}}')"
                                               type="checkbox" class="form-check-input"
                                               id="customCheck{{'user_rate_'.$orders->id}}"/>
                                        @elseif($type=="hurry_percent")
                                            {{$orders->hurry_percent}}
                                        @elseif($type=="cancel_reason")
                                            @if($cancel_trip=\App\Models\MyCancel_Trip::find($orders->cancel_reason))
                                                {{"$cancel_trip->title"}}
                                            @endif
                                        @elseif($type=="net_price")
                                            {{$orders->net_price}}
                                        @elseif($type=="percent_discount")
                                            {{$orders->percent_discount}}
                                        @elseif($type=="percent_code")
                                            {{$orders->percent_code}}
                                        @elseif($type=="discounted_price")
                                            {{$orders->discounted_price}}
                                        @elseif($type=="economic")
                                            <div class="custom-control custom-checkbox mb-3 text-center">
                                                <input {{\App\Models\Admin::checkAccess('record','edit','orders')?'':'disabled'}} {{$orders->economic?'checked':''}}
                                                       onclick="onCheckbox(this,'{{route('record.active',['slug'=>'orders','fieldName'=>'economic','id'=>$orders->id])}}')"
                                                       type="checkbox" class="form-check-input"
                                                       id="customCheck{{'economic_'.$orders->id}}"/>
                                                @elseif($type=="state")
                                                    @if($statuses=\App\Models\MyStatuses::find($orders->state))
                                                        {{"$statuses->title"}}
                                                    @endif
                                                @elseif($type=="date_reserve")
                                                    {{$orders->date_reserve}}
                                                @elseif($type=="time_reserve")
                                                    {{$orders->time_reserve}}
                                                @elseif($type=="cooler")
                                                    <div class="custom-control custom-checkbox mb-3 text-center">
                                                        <input {{\App\Models\Admin::checkAccess('record','edit','orders')?'':'disabled'}} {{$orders->cooler?'checked':''}}
                                                               onclick="onCheckbox(this,'{{route('record.active',['slug'=>'orders','fieldName'=>'cooler','id'=>$orders->id])}}')"
                                                               type="checkbox" class="form-check-input" id="customCheck{{'cooler'.$orders->id}}"/>
                                                        @elseif($type=="helper")
                                                            <div class="custom-control custom-checkbox mb-3 text-center">
                                                                <input {{\App\Models\Admin::checkAccess('record','edit','orders')?'':'disabled'}} {{$orders->helper?'checked':''}}
                                                                       onclick="onCheckbox(this,'{{route('record.active',['slug'=>'orders','fieldName'=>'helper','id'=>$orders->id])}}')"
                                                                       type="checkbox" class="form-check-input" id="customCheck{{'helper'.$orders->id}}"/>

                                                            @else
                                                    <div class="btn-group">
                                                        <button type="button"
                                                                class="btn btn-outline-primary dropdown-toggle"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false">{{ __('Actions') }}</button>
                                                        <ul class="dropdown-menu" style="">
                                                            @if(\App\Models\Admin::checkAccess('record','edit','orders'))
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                       href="{{route('record.editform',['slug'=>'orders','id'=>$orders->id])}}">
                                                                        <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if(\App\Models\Admin::checkAccess('record','delete','orders'))
                                                                <li>
                                                                    <a class="dropdown-item text-danger"
                                                                       data-bs-toggle="modal"
                                                                       data-bs-target="#basicModal"
                                                                       onclick="setModalRoute('{{route('record.destroy',['slug'=>'orders','id'=>$orders->id])}}')">
                                                                        <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            {{--                                                                @php($statuses=\App\Models\MyStatuses::find($orders->state))--}}
                                                            @if($orders->state!=7)

                                                                @if(\App\Models\Admin::checkAccess('record','show','path_info'))
                                                                    <li>
                                                                        <a class="dropdown-item text-danger"
                                                                           data-bs-toggle="modal"
                                                                           data-bs-target="#basicModal"
                                                                           onclick="setModalRoute('{{route('cancel_order',['id'=>$orders->id])}}')">
                                                                            <i class="bx bx-trash me-1"></i>{{__("لغو")}}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @endif
                                                            @if(\App\Models\Admin::checkAccess('record','show','status'))
                                                                <li>
                                                                    <a href="{{route('record.index',['slug'=>'status','parentSlug'=>'orders','parentId'=>$orders->id])}}"
                                                                       type="button"
                                                                       class="dropdown-item">{{__("وضعیت")}}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if(\App\Models\Admin::checkAccess('record','show','path_info'))
                                                                <li>
                                                                    <a href="{{route('record.index',['slug'=>'path_info','parentSlug'=>'orders','parentId'=>$orders->id])}}"
                                                                       type="button"
                                                                       class="dropdown-item">{{__("اطلاعات مسیر")}}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if(\App\Models\Admin::checkAccess('record','show','price_detail'))
                                                                <li>
                                                                    <a href="{{route('record.index',['slug'=>'price_detail','parentSlug'=>'orders','parentId'=>$orders->id])}}"
                                                                       type="button"
                                                                       class="dropdown-item">{{__("جزئیات قیمت")}}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if(\App\Models\Admin::checkAccess('record','show','price_detail'))
                                                                <li>
                                                                    <a href="{{route('record.index',['slug'=>'detail_private','parentSlug'=>'orders','parentId'=>$orders->id])}}"
                                                                       type="button"
                                                                       class="dropdown-item">{{__("جزئیات دربستی")}}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if(\App\Models\Admin::checkAccess('record','show','price_detail'))
                                                                <li>
                                                                    <a href="{{route('record.index',['slug'=>'message','parentSlug'=>'orders','parentId'=>$orders->id])}}"
                                                                       type="button"
                                                                       class="dropdown-item">{{__("پیام ها")}}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
@endif
