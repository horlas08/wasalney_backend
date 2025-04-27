@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('record.update',['slug'=>'gift_cart','id'=>$gift_cart->id])}}"
          method="post"  enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
    <div class="widgets" data-index="1">
        <div class="row">
            <div class="col-12">
                <div class="card" id="form-box">

                    <div id="sticky-wrapper" class="sticky-wrapper" >
                        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                            <h5 class="card-title mb-sm-0 me-2">{{ __('Edit') }} {{__("تخفیف")}}</h5>
                            <div class="action-btns ">
                                <a href="{{route('record.index',['slug'=>'gift_cart'])}}" class="btn btn-outline-primary me-3">
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
                                        <label class="form-label" for="gift_code">{{__("کد تخفیف")}}</label>
                                        <input id="gift_code" type="text" name="gift_code" value="{{$gift_cart->gift_code}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="percent">{{__("درصد تخفیف")}}</label>
                                        <input id="percent" type="number" name="percent" value="{{$gift_cart->percent}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="expire_date">{{__("تاریخ اعتبار")}}</label>
                                        @if(getLang()=='fa')
                                        <input data-jdp name="expire_date"  type="text" id="expire_date" class="form-control" value="{{$gift_cart->expire_date!=null?\Morilog\Jalali\Jalalian::fromCarbon(\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $gift_cart->expire_date))->format('Y/m/d'):""}}">
                                        @else
                                        <input id="expire_date" type="date" name="expire_date" class="form-control" value="{{$gift_cart->expire_date}}"/>
                                        @endif
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="service">{{__("سرویس")}}</label>
                                        <select id="service" name="service[]" class="select2 form-select  form-select-lg" multiple="multiple" data-width="100%">
                                        @php($values=\App\Models\MyGift_CartDeliveries::where('gift_cart_id',$gift_cart->id)->get())
                                        @foreach(\App\Models\MyDeliveries::orderBy('sort','DESC')->get() as $deliveries)
                                        <option {{$values->where('deliveries_id',$deliveries->id)->first()!=null?"selected":""}} value="{{$deliveries->id}}">{{"$deliveries->title"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="count">{{__("تعداد استفاده")}}</label>
                                        <input id="count" type="number" name="count" value="{{$gift_cart->count}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="min_price">{{__("حداقل مبلغ سفارش")}}</label>
                                        <input id="min_price" type="number" name="min_price" value="{{$gift_cart->min_price}}" class="form-control"  />
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

        @php($lastCategory=\App\Models\Category::where("slug",'gift_cart')->first())

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
