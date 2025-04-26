@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('record.update',['slug'=>'deliveries','id'=>$deliveries->id])}}"
          method="post"  enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
    <div class="widgets" data-index="1">
        <div class="row">
            <div class="col-12">
                <div class="card" id="form-box">

                    <div id="sticky-wrapper" class="sticky-wrapper" >
                        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                            <h5 class="card-title mb-sm-0 me-2">{{ __('Edit') }} {{__("سرویس ها")}}</h5>
                            <div class="action-btns ">
                                <a href="{{route('record.index',['slug'=>'deliveries'])}}" class="btn btn-outline-primary me-3">
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
                                        <label class="form-label" for="image">{{__("عکس سرویس")}}</label>
                                        <input type="file" name="image" class="form-control" >
                                        <div style="display: flex" deleteUrl="{{route('file.delete',['slug'=>'deliveries','fieldName'=>'image','id'=>$deliveries->id])}}">
                                        @if($deliveries->image!=null)                                        <div style="position: relative">
                                        <a href="{{"/files/".$deliveries->image}}" target="_blank">
                                        <img src="{{"/files/".$deliveries->image}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
                                        </a>
                                        <i id="btnDelete-image" onclick="deleteFile(this,'image')" fileName="{{last(explode('/',$deliveries->image))}}" class="fa-solid fa-trash" style="position: absolute;top: 5px;right: 5%;color: red;cursor: pointer"></i>
                                        <i data-text="{{"/files/".$deliveries->image}}" class="fa-solid fa-copy copy" style="position: absolute;top: 5px;left: 5%;color: orangered;cursor: pointer"></i>
                                        </div>
                                        @endif
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="title">{{__("نام سرویس")}}</label>
                                        <input id="title" type="text" name="title" value="{{$deliveries->title}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="base_price">{{__("قیمت پایه")}}</label>
                                        <input id="base_price" type="number" name="base_price" value="{{$deliveries->base_price}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="price">{{__("ضریب قیمت")}}</label>
                                        <input id="price" type="number" name="price" value="{{$deliveries->price}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="hurry_price">{{__("درصد قیمت عجله دارم")}}</label>
                                        <input id="hurry_price" type="text" name="hurry_price" value="{{$deliveries->hurry_price}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="image_waiting">{{__("تصویر صفحه انتظار")}}</label>
                                        <input type="file" name="image_waiting" class="form-control" >
                                        <div style="display: flex" deleteUrl="{{route('file.delete',['slug'=>'deliveries','fieldName'=>'image_waiting','id'=>$deliveries->id])}}">
                                        @if($deliveries->image_waiting!=null)                                        <div style="position: relative">
                                        <a href="{{"/files/".$deliveries->image_waiting}}" target="_blank">
                                        <img src="{{"/files/".$deliveries->image_waiting}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
                                        </a>
                                        <i id="btnDelete-image_waiting" onclick="deleteFile(this,'image_waiting')" fileName="{{last(explode('/',$deliveries->image_waiting))}}" class="fa-solid fa-trash" style="position: absolute;top: 5px;right: 5%;color: red;cursor: pointer"></i>
                                        <i data-text="{{"/files/".$deliveries->image_waiting}}" class="fa-solid fa-copy copy" style="position: absolute;top: 5px;left: 5%;color: orangered;cursor: pointer"></i>
                                        </div>
                                        @endif
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="title_waiting">{{__("عنوان صفحه انتظار")}}</label>
                                        <input id="title_waiting" type="text" name="title_waiting" value="{{$deliveries->title_waiting}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="description_waiting">{{__("توضیح صفحه انتظار")}}</label>
                                        <input id="description_waiting" type="text" name="description_waiting" value="{{$deliveries->description_waiting}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="back_price">{{__("نسبة العودة")}}</label>
                                        <input id="back_price" type="number" name="back_price" value="{{$deliveries->back_price}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="type">{{__("نوع سرویس")}}</label>
                                        <select id="type" name="type" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyServices_Type::orderBy('sort','DESC')->get() as $services_type)
                                        <option {{$deliveries->type==$services_type->id?"selected":""}} value="{{$services_type->id}}">{{"$services_type->title"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="decrease_percent">{{__("درصد کاهش قیمت سرویس اقتصادی")}}</label>
                                        <input id="decrease_percent" type="number" name="decrease_percent" value="{{$deliveries->decrease_percent}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="economic_icon">{{__("آیکن سرویس اقتصادی")}}</label>
                                        <input type="file" name="economic_icon" class="form-control" >
                                        <div style="display: flex" deleteUrl="{{route('file.delete',['slug'=>'deliveries','fieldName'=>'economic_icon','id'=>$deliveries->id])}}">
                                        @if($deliveries->economic_icon!=null)                                        <div style="position: relative">
                                        <a href="{{"/files/".$deliveries->economic_icon}}" target="_blank">
                                        <img src="{{"/files/".$deliveries->economic_icon}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
                                        </a>
                                        <i id="btnDelete-economic_icon" onclick="deleteFile(this,'economic_icon')" fileName="{{last(explode('/',$deliveries->economic_icon))}}" class="fa-solid fa-trash" style="position: absolute;top: 5px;right: 5%;color: red;cursor: pointer"></i>
                                        <i data-text="{{"/files/".$deliveries->economic_icon}}" class="fa-solid fa-copy copy" style="position: absolute;top: 5px;left: 5%;color: orangered;cursor: pointer"></i>
                                        </div>
                                        @endif
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="time_price">{{__("تكلفة الدقيقة (دینار)")}}</label>
                                        <input id="time_price" type="number" name="time_price" value="{{$deliveries->time_price}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="service">{{__("سرویس مرتبط")}}</label>
                                        <select id="service" name="service" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyDeliveries::orderBy('sort','DESC')->get() as $deliveries)
                                        <option {{$deliveries->service==$deliveries->id?"selected":""}} value="{{$deliveries->id}}">{{"$deliveries->title"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <input type="hidden" name="show" value="{{ $deliveries->show }}">
                                        </div>
                                        <div class="col-md-12">
                                        <input type="hidden" name="have_economic" value="{{ $deliveries->have_economic }}">
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

        @php($lastCategory=\App\Models\Category::where("slug",'deliveries')->first())

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
