@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('record.update',['slug'=>'drivers','id'=>$drivers->id])}}"
          method="post"  enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="widgets" data-index="1">
            <div class="row">
                <div class="col-12">
                    <div class="card" id="form-box">

                        <div id="sticky-wrapper" class="sticky-wrapper" >
                            <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                                <h5 class="card-title mb-sm-0 me-2">{{ __('Edit') }} {{__("رانندگان")}}</h5>
                                <div class="action-btns ">
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
                                            <input id="name" type="text" name="name" value="{{$drivers->name}}" class="form-control"  />
                                        </div>
                                        <div style="display:none" class="col-md-12">
                                            <label class="form-label" for="mobile">{{__("موبایل")}}</label>
                                            <input id="mobile" type="text" name="mobile" value="{{$drivers->mobile}}" class="form-control"  />
                                        </div>

                                        <div style="display:none" class="col-md-12">
                                            <label class="form-label" for="code_meli">{{__("کدملی")}}</label>
                                            <input id="code_meli" type="text" name="code_meli" value="{{$drivers->code_meli}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="gender">{{__("جنسیت")}}</label>
                                            <select id="gender" name="gender" class="select2 form-select  form-select-lg"  data-width="100%">
                                                <option value=" ">{{__('not selected')}}</option>
                                                @foreach(\App\Models\MyGender::orderBy('sort','DESC')->get() as $gender)
                                                    <option {{$drivers->gender==$gender->id?"selected":""}} value="{{$gender->id}}">{{"$gender->title"}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="display:none" class="col-md-12">
                                            <label class="form-label" for="family_number">{{__("شماره بستگان")}}</label>
                                            <input id="family_number" type="text" name="family_number" value="{{$drivers->family_number}}" class="form-control"  />
                                        </div>
                                        <div style="display:none" class="col-md-12">
                                            <label class="form-label" for="verify_code">{{__("verify code")}}</label>
                                            <input id="verify_code" type="text" name="verify_code" value="{{$drivers->verify_code}}" class="form-control"  />
                                        </div>
                                        <div style="display:none" class="col-md-12">
                                            <label class="form-label" for="lat">{{__("lat")}}</label>
                                            <input id="lat" type="text" name="lat" value="{{$drivers->lat}}" class="form-control"  />
                                        </div>
                                        <div style="display:none" class="col-md-12">
                                            <label class="form-label" for="long">{{__("long")}}</label>
                                            <input id="long" type="text" name="long" value="{{$drivers->long}}" class="form-control"  />
                                        </div>
                                        <div style="display:none" class="col-md-12">
                                            <label class="form-label" for="number_licence">{{__("شماره گواهینامه")}}</label>
                                            <input id="number_licence" type="text" name="number_licence" value="{{$drivers->number_licence}}" class="form-control"  />
                                        </div>
                                        <div style="display:none" class="col-md-12">
                                            <label class="form-label" for="agency">{{__("آژانس")}}</label>
                                            <select id="agency" name="agency" class="select2 form-select  form-select-lg"  data-width="100%">
                                                <option value=" ">{{__('not selected')}}</option>
                                                @foreach(\App\Models\MyAgency_Admin::orderBy('sort','DESC')->get() as $agency)
                                                    <option {{$drivers->agency==$agency->id?"selected":""}} value="{{$agency->id}}">{{"$agency->title"}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12" style="display:none">
                                            <label class="form-label"  for="car_detail">{{__("ماشین")}}</label>
                                            <select  id="car_detail" name="car_detail" class="select2 form-select  form-select-lg"  data-width="100%">
                                                <option value=" ">{{__('not selected')}}</option>
                                                @foreach(\App\Models\MyCar_Details::orderBy('sort','DESC')->get() as $agency)
                                                    <option {{$drivers->car_detail==$agency->id?"selected":""}} value="{{$agency->id}}">{{"$agency->car_tag"}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div  class="col-md-12" style="display:none">
                                            <label class="form-label"  for="gender">{{__("جنسیت")}}</label>
                                            <select id="gender" name="gender" class="select2 form-select  form-select-lg"  data-width="100%">
                                                <option value=" ">{{__('not selected')}}</option>
                                                @foreach(\App\Models\MyGender::orderBy('sort','DESC')->get() as $agency)
                                                    <option {{$drivers->gender==$agency->id?"selected":""}} value="{{$agency->id}}">{{"$agency->title"}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="display:none" class="col-md-12">
                                            <label class="form-label" for="certificate_type">{{__("نوع گواهینامه")}}</label>
                                            <select id="certificate_type" name="certificate_type" class="select2 form-select  form-select-lg"  data-width="100%">
                                                <option value=" ">{{__('not selected')}}</option>
                                                @foreach(\App\Models\MyCertificates_Types::orderBy('sort','DESC')->get() as $certificates_types)
                                                    <option {{$drivers->certificate_type==$certificates_types->id?"selected":""}} value="{{$certificates_types->id}}">{{"$certificates_types->title"}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="type_activity">{{__("نوع فعالیت")}}</label>
                                            <select id="type_activity" name="type_activity" class="select2 form-select  form-select-lg"  data-width="100%">
                                                <option value=" ">{{__('not selected')}}</option>
                                                @foreach(\App\Models\MyDeliveries::orderBy('sort','DESC')->get() as $deliveries)
                                                    <option {{$drivers->type_activity==$deliveries->id?"selected":""}} value="{{$deliveries->id}}">{{"$deliveries->title"}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="display:none" class="col-md-12">
                                            <label class="form-label" for="agency">{{__("آژانس")}}</label>
                                            <select id="agency" name="agency" class="select2 form-select  form-select-lg"  data-width="100%">
                                                <option value=" ">{{__('not selected')}}</option>
                                                @foreach(\App\Models\MyAgency_Admin::orderBy('sort','DESC')->get() as $agency)
                                                    <option {{$drivers->agency==$agency->id?"selected":""}} value="{{$agency->id}}">{{"$agency->name"}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="state_approval">{{__("تعیین وضعیت")}}</label>
                                            <select id="state_approval" name="state_approval" class="select2 form-select  form-select-lg"  data-width="100%">
                                                <option value=" ">{{__('not selected')}}</option>
                                                @foreach(\App\Models\MyState_Completed::orderBy('sort','DESC')->get() as $myState)
                                                    <option {{$drivers->state_approval==$myState->id?"selected":""}} value="{{$myState->id}}">{{"$myState->title"}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="hidden" name="state" value="{{ $drivers->state }}">
                                        </div>
                                        <div style="display:none" class="col-md-12">
                                            <label class="form-label" for="image">{{__("عکس")}}</label>
                                            <input type="file" name="image" class="form-control" >
                                            <div style="display: flex" deleteUrl="{{route('file.delete',['slug'=>'drivers','fieldName'=>'image','id'=>$drivers->id])}}">
                                                @if($drivers->image!=null)                                        <div style="position: relative">
                                                    <a href="{{"/files/".$drivers->image}}" target="_blank">
                                                        <img src="{{"/files/".$drivers->image}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
                                                    </a>
                                                    <i id="btnDelete-image" onclick="deleteFile(this,'image')" fileName="{{last(explode('/',$drivers->image))}}" class="fa-solid fa-trash" style="position: absolute;top: 5px;right: 5%;color: red;cursor: pointer"></i>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div style="display:none" class="col-md-12">
                                            <label class="form-label" for="certificat_date">{{__("تاریخ صدور گواهینامه")}}</label>
                                            @if(getLang()=='fa')
                                                <input data-jdp name="certificat_date"  type="text" id="certificat_date" class="form-control" value="{{$drivers->certificat_date!=null?\Morilog\Jalali\Jalalian::fromCarbon(\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $drivers->certificat_date))->format('Y/m/d'):""}}">
                                            @else
                                                <input id="certificat_date" type="date" name="certificat_date" class="form-control" value="{{$drivers->certificat_date}}"/>
                                            @endif
                                        </div>
                                        <div style="display:none" class="col-md-12">
                                            <label class="form-label" for="certificate_validity">{{__("مدت اعتبار گواهینامه")}}</label>
                                            <input id="certificate_validity" type="text" name="certificate_validity" value="{{$drivers->certificate_validity}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="level">{{__("سطح")}}</label>
                                            <select id="level" name="level" class="select2 form-select  form-select-lg"  data-width="100%">
                                                <option value=" ">{{__('not selected')}}</option>
                                                @foreach(\App\Models\MyLevel::orderBy('sort','DESC')->get() as $level)
                                                    <option {{$drivers->level==$level->id?"selected":""}} value="{{$level->id}}">{{"$level->title"}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div  class="col-md-12">
                                            <label class="form-label" for="credit">{{__("اعتبار")}}</label>
                                            <input id="credit" type="number" name="credit" value="{{$drivers->credit}}" class="form-control"  />
                                        </div>
                                        <div style="display:none" class="col-md-12">
                                            <label class="form-label" for="car_tag">{{__("پلاک")}}</label>
                                            <input id="car_tag" type="text" name="car_tag" value="{{$drivers->car_tag}}" class="form-control"  />
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="name">{{__("تذکر ادمین")}}</label>
                                            <input id="description" type="text" name="description" value="{{$drivers->description}}" class="form-control"  />
                                        </div>
                                        <div style="display:none" class="col-md-12">
                                            <label style="display: none" class="form-label" for="car_model">{{__("مدل ماشین")}}</label>
                                            <select style="display: none" id="car_model" name="car_model" class="select2 form-select  form-select-lg"  data-width="100%">
                                                <option value=" ">{{__('not selected')}}</option>
                                                @foreach(\App\Models\MyCar_Models::orderBy('sort','DESC')->get() as $car_models)
                                                    <option {{$drivers->car_model==$car_models->id?"selected":""}} value="{{$car_models->id}}">{{"$car_models->title"}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="display:none" class="col-md-12">
                                            <label class="form-label" for="code">{{__("کد معرفی")}}</label>
                                            <input id="code" type="text" name="code" value="{{$drivers->code}}" class="form-control"  />
                                        </div>
                                        <div style="display:none" class="col-md-12">
                                            <label class="form-label" for="intro_code">{{__("کد معرف استفاده شده")}}</label>
                                            <input id="intro_code" type="text" name="intro_code" value="{{$drivers->intro_code}}" class="form-control"  />
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
