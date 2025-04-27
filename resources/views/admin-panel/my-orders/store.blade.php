@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('record.store',['slug'=>'orders'])}}"
          method="post"  enctype="multipart/form-data" novalidate>
        @csrf
    <div class="widgets" data-index="1">
        <div class="row">
            <div class="col-12">
                <div class="card" >

                    <div id="sticky-wrapper" class="sticky-wrapper" >
                        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                            <h5 class="card-title mb-sm-0 me-2">{{ __('Store') }} {{__("سفارشات")}}</h5>
                            <div class="action-btns">
                                <a href="{{route('record.index',['slug'=>'orders'])}}" class="btn btn-outline-primary me-3">
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
                                        <label class="form-label" for="user">{{__("اطلاعات ثبت کننده سفارش")}}</label>
                                        <select id="user" name="user" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyUsers::orderBy('sort','DESC')->get() as $users)
                                        <option  value="{{$users->id}}">{{"($users->mobile) $users->name"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="driver">{{__("راننده")}}</label>
                                        <select id="driver" name="driver" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyDrivers::orderBy('sort','DESC')->get() as $drivers)
                                        <option  value="{{$drivers->id}}">{{"$drivers->name"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="price">{{__("قیمت")}}</label>
                                        <input id="price" type="number" name="price" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="comeback">{{__("بازگشت")}}</label>
                                        <input id="comeback" type="text" name="comeback" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="stop_time">{{__("زمان توقف")}}</label>
                                        <input id="stop_time" type="text" name="stop_time" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="origin_lat">{{__("lat مبدا")}}</label>
                                        <input id="origin_lat" type="text" name="origin_lat" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="origin_long">{{__("long مبدا")}}</label>
                                        <input id="origin_long" type="text" name="origin_long" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="origin_address">{{__("آدرس مبدا")}}</label>
                                        <input id="origin_address" type="text" name="origin_address" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="destination_lat">{{__("lat مقصد")}}</label>
                                        <input id="destination_lat" type="text" name="destination_lat" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="destination_long">{{__("long مقصد")}}</label>
                                        <input id="destination_long" type="text" name="destination_long" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="destination_address">{{__("آدرس مقصد")}}</label>
                                        <input id="destination_address" type="text" name="destination_address" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="pay_type">{{__("نوع پرداخت")}}</label>
                                        <select id="pay_type" name="pay_type" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyPay_Typs::orderBy('sort','DESC')->get() as $pay_typs)
                                        <option  value="{{$pay_typs->id}}">{{"$pay_typs->title"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="rate">{{__("امتیاز")}}</label>
                                        <input id="rate" type="number" name="rate" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="cancel_status">{{__("وضعیت لغو")}}</label>
                                        <input id="cancel_status" type="text" name="cancel_status" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="pay_side">{{__("طرف پرداخت")}}</label>
                                        <input id="pay_side" type="text" name="pay_side" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="delivery_id">{{__("نوع تحویل")}}</label>
                                        <select id="delivery_id" name="delivery_id" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyDeliveries::orderBy('sort','DESC')->get() as $deliveries)
                                        <option  value="{{$deliveries->id}}">{{"$deliveries->title"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="name">{{__("نام")}}</label>
                                        <input id="name" type="text" name="name" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="mobile">{{__("موبایل")}}</label>
                                        <input id="mobile" type="text" name="mobile" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="canceled_by">{{__("لغو شده توسط")}}</label>
                                        <input id="canceled_by" type="text" name="canceled_by" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="driver_rate">{{__("امتیاز راننده")}}</label>
                                        <input id="driver_rate" type="number" name="driver_rate" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <input type="hidden" name="user_rate" value="1">
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="hurry_percent">{{__("درصد عجله دارم")}}</label>
                                        <input id="hurry_percent" type="text" name="hurry_percent" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="cancel_reason">{{__("دلیل لغو")}}</label>
                                        <select id="cancel_reason" name="cancel_reason" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyCancel_Trip::orderBy('sort','DESC')->get() as $cancel_trip)
                                        <option  value="{{$cancel_trip->id}}">{{"$cancel_trip->title"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="net_price">{{__("خالص دریافتی راننده")}}</label>
                                        <input id="net_price" type="number" name="net_price" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="percent_discount">{{__("درصد تخفیف")}}</label>
                                        <input id="percent_discount" type="number" name="percent_discount" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="percent_code">{{__("کد تخفیف")}}</label>
                                        <input id="percent_code" type="text" name="percent_code" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="discounted_price">{{__("قیمت با تخفیف")}}</label>
                                        <input id="discounted_price" type="number" name="discounted_price" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <input type="hidden" name="economic" value="1">
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="state">{{__("وضعیت")}}</label>
                                        <select id="state" name="state" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyStatuses::orderBy('sort','DESC')->get() as $statuses)
                                        <option  value="{{$statuses->id}}">{{"$statuses->title"}}</option>
                                        @endforeach
                                        </select>
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

        @php($lastCategory=\App\Models\Category::where("slug",'orders')->first())

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
