@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('record.update',['slug'=>'moving_order_details','id'=>$moving_order_details->id])}}"
          method="post"  enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
    <div class="widgets" data-index="1">
        <div class="row">
            <div class="col-12">
                <div class="card" id="form-box">

                    <div id="sticky-wrapper" class="sticky-wrapper" >
                        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                            <h5 class="card-title mb-sm-0 me-2">{{ __('Edit') }} {{__("جزئیات سفارشات اثاث کشی")}}</h5>
                            <div class="action-btns ">
                                <a href="{{route('record.index',['slug'=>'moving_order_details'])}}" class="btn btn-outline-primary me-3">
                                    <span class="align-middle"> {{ __('Return') }}</span>
                                </a>
                                <button type="submit" class="btn btn-primary ">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="row mb-5">
                                <div class="col-lg-11 mx-auto">
                                    <div class="row g-3">


                                        <div class="col-md-12">
                                        <label class="form-label" for="order_id">{{__("سفارش")}}</label>
                                        <select id="order_id" name="order_id" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyOrders::orderBy('sort','DESC')->get() as $orders)
                                        <option {{$moving_order_details->order_id==$orders->id?"selected":""}} value="{{$orders->id}}">{{"$orders->code"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="count_worker">{{__("تعداد کارگر")}}</label>
                                        <input id="count_worker" type="number" name="count_worker" value="{{$moving_order_details->count_worker}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="price_worker">{{__("قیمت هر کارگر")}}</label>
                                        <input id="price_worker" type="number" name="price_worker" value="{{$moving_order_details->price_worker}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="count_floors_origin">{{__("تعداد طبقات مبدا")}}</label>
                                        <input id="count_floors_origin" type="number" name="count_floors_origin" value="{{$moving_order_details->count_floors_origin}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="count_floors_destination">{{__("تعداد طبقات مقصد")}}</label>
                                        <input id="count_floors_destination" type="number" name="count_floors_destination" value="{{$moving_order_details->count_floors_destination}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="elevator_origin">{{__("جابجایی با آسانسور مبدا")}}</label>
                                        <input id="elevator_origin" type="text" name="elevator_origin" value="{{$moving_order_details->elevator_origin}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="elevator_destination">{{__("جابجایی با آسانسور در مقصد")}}</label>
                                        <input id="elevator_destination" type="text" name="elevator_destination" value="{{$moving_order_details->elevator_destination}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="date">{{__("تاریخ اسباب کشی")}}</label>
                                        @if(getLang()=='fa')
                                        <input data-jdp name="date"  type="text" id="date" class="form-control" value="{{$moving_order_details->date!=null?\Morilog\Jalali\Jalalian::fromCarbon(\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $moving_order_details->date))->format('Y/m/d'):""}}">
                                        @else
                                        <input id="date" type="date" name="date" class="form-control" value="{{$moving_order_details->date}}"/>
                                        @endif
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="time">{{__("ساعت")}}</label>
                                        <input id="time" type="time" name="time" value="{{$moving_order_details->time}}" class="form-control"  />
                                        </div>
                                        


                                    </div>


                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection


@section('styles')
    <link rel="stylesheet" href={{asset("admin-panel/plugins/select2/select2.css")}}>
    <link rel="stylesheet" href={{asset("admin-panel/plugins/select2/theme_default.css")}}>
    <link rel="stylesheet" href="{{asset('admin-panel/plugins/ckeditor/samples.css')}}">
    <link rel="stylesheet" href="{{asset('admin-panel/plugins/ckeditor/neo.css')}}">
    <link rel="stylesheet" href="{{asset("admin-panel/plugins/jalalidatepicker/jalalidatepicker.css")}}">
@endsection

@section('scripts')
    <script src={{asset('admin-panel/plugins/jquery-sticky/jquery-sticky.js')}}></script>
    <script src={{asset('admin-panel/plugins/cleavejs/cleave.js')}}></script>
    <script src={{asset('admin-panel/plugins/cleavejs/cleave-phone.js')}}></script>
    <script src={{asset('admin-panel/plugins/select2/select2.js')}}></script>
    <script src={{asset('admin-panel/plugins/select2/i18n/fa.js')}}></script>

    <!-- Page JS -->
    <script src={{asset('admin-panel/scripts/form-layouts.js')}}></script>
    <script src={{asset('admin-panel/scripts/forms-selects.js')}}></script>
    <script src="{{ asset('admin-panel/plugins/chunk/resumable.min.js') }}"></script>
    <script src="{{ asset('admin-panel/scripts/chunk.js')}}?v1"></script>
    <script src="{{asset('admin-panel/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin-panel/plugins/ckeditor/sample.js')}}"></script>
    <script src="{{asset('admin-panel/scripts/forms-editors.js')}}?v1"></script>
    <script src="{{asset('admin-panel/plugins/jalalidatepicker/jalalidatepicker.js')}}"></script>

    <script>

        @php($lastCategory=\App\Models\Category::where("slug",'moving_order_details')->first())

        @while($lastCategory!=null)
        document.getElementById('category_{{$lastCategory->id}}').classList.add('menuActive');
        @php($lastCategory=\App\Models\Category::find($lastCategory->parent_id))
        @endwhile

        $('#main-content').addClass('menu-opened');
        $('.DC_sidbar_box ').addClass('DC_isOpen');
        $(".sidebar-main-box").addClass("open-side")
        $('#chart_box').addClass('DC_activeBoxBody');
        $('#v-dynamic').addClass('show active');
        $('#v-dynamic-tab').addClass('DC_activeTab');


        $(document).ready(function(){
            jalaliDatepicker.startWatch();
        });
    </script>
@endsection
