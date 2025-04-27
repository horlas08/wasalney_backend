@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('record.store',['slug'=>'drivers'])}}"
          method="post"  enctype="multipart/form-data" novalidate>
        @csrf
    <div class="widgets" data-index="1">
        <div class="row">
            <div class="col-12">
                <div class="card" >

                    <div id="sticky-wrapper" class="sticky-wrapper" >
                        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                            <h5 class="card-title mb-sm-0 me-2">{{ __('Store') }} {{__("رانندگان")}}</h5>
                            <div class="action-btns">
                                <a href="{{route('record.index',['slug'=>'drivers'])}}" class="btn btn-outline-primary me-3">
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
                                        <label class="form-label" for="name">{{__("نام و نام خانوادگی")}}</label>
                                        <input id="name" type="text" name="name" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="mobile">{{__("موبایل")}}</label>
                                        <input id="mobile" type="text" name="mobile" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="code_meli">{{__("کدملی")}}</label>
                                        <input id="code_meli" type="text" name="code_meli" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="certificate_type">{{__("جنسیت")}}</label>
                                            <select id="gender" name="gender" class="select2 form-select  form-select-lg"  data-width="100%">
                                                <option value=" ">{{__('not selected')}}</option>
                                                @foreach(\App\Models\MyGender::orderBy('sort','DESC')->get() as $gender)
                                                    <option  value="{{$gender->id}}">{{"$gender->title"}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="verify_code">{{__("verify code")}}</label>
                                        <input id="verify_code" type="text" name="verify_code" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="lat">{{__("lat")}}</label>
                                        <input id="lat" type="text" name="lat" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="long">{{__("long")}}</label>
                                        <input id="long" type="text" name="long" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="number_licence">{{__("شماره گواهینامه")}}</label>
                                        <input id="number_licence" type="text" name="number_licence" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="certificate_type">{{__("نوع گواهینامه")}}</label>
                                        <select id="certificate_type" name="certificate_type" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyCertificates_Types::orderBy('sort','DESC')->get() as $certificates_types)
                                        <option  value="{{$certificates_types->id}}">{{"$certificates_types->title"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="type_activity">{{__("نوع فعالیت")}}</label>
                                        <select id="type_activity" name="type_activity" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyDeliveries::orderBy('sort','DESC')->get() as $deliveries)
                                        <option  value="{{$deliveries->id}}">{{"$deliveries->title"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <input type="hidden" name="state" value="1">
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="image">{{__("عکس")}}</label>
                                        <input type="file" name="image" class="form-control" >
                                        <div style="display: flex" deleteUrl="{{route('file.delete',['slug'=>'drivers','fieldName'=>'image'])}}">
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="certificat_date">{{__("تاریخ صدور گواهینامه")}}</label>
                                        @if(getLang()=='fa')
                                        <input data-jdp name="certificat_date"  type="text" id="certificat_date" class="form-control" value="">
                                        @else
                                        <input id="certificat_date" type="date" name="certificat_date" class="form-control" value=""/>
                                        @endif
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="certificate_validity">{{__("مدت اعتبار گواهینامه")}}</label>
                                        <input id="certificate_validity" type="text" name="certificate_validity" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="level">{{__("سطح")}}</label>
                                        <select id="level" name="level" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyLevel::orderBy('sort','DESC')->get() as $level)
                                        <option  value="{{$level->id}}">{{"$level->title"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="credit">{{__("اعتبار")}}</label>
                                        <input id="credit" type="number" name="credit" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="car_tag">{{__("پلاک")}}</label>
                                        <input id="car_tag" type="text" name="car_tag" value="" class="form-control"  />
                                        </div>

                                        <div class="col-md-12">
                                        <label class="form-label" for="car_model">{{__("مدل ماشین")}}</label>
                                        <select id="car_model" name="car_model" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyCar_Models::orderBy('sort','DESC')->get() as $car_models)
                                        <option  value="{{$car_models->id}}">{{"$car_models->title"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="code">{{__("کد معرفی")}}</label>
                                        <input id="code" type="text" name="code" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="intro_code">{{__("کد معرف استفاده شده")}}</label>
                                        <input id="intro_code" type="text" name="intro_code" value="" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="family_number">{{__("شماره یکی از بستگان")}}</label>
                                        <input id="family_number" type="text" name="family_number" value="" class="form-control"  />
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

        @php($lastCategory=\App\Models\Category::where("slug",'drivers')->first())

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
