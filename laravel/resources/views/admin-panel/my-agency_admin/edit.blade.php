@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('record.update',['slug'=>'agency_admin','id'=>$agency_admin->id])}}"
          method="post"  enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
    <div class="widgets" data-index="1">
        <div class="row">
            <div class="col-12">
                <div class="card" id="form-box">

                    <div id="sticky-wrapper" class="sticky-wrapper" >
                        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                            <h5 class="card-title mb-sm-0 me-2">{{ __('Edit') }} {{__("مدیریت آژانس")}}</h5>
                            <div class="action-btns ">
                                <a href="{{route('record.index',['slug'=>'agency_admin'])}}" class="btn btn-outline-primary me-3">
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
                                        <label class="form-label" for="username">{{__("نام کاربری")}}</label>
                                        <input id="username" type="text" name="username" value="{{$agency_admin->username}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="password">{{__("کلمه عبور")}}</label>
                                        <input id="password" type="text" name="password" value="{{$agency_admin->password}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="name">{{__("نام")}}</label>
                                        <input id="name" type="text" name="name" value="{{$agency_admin->name}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="email">{{__("ایمیل")}}</label>
                                        <input id="email" type="text" name="email" value="{{$agency_admin->email}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="level">{{__("سطح")}}</label>
                                        <input id="level" type="number" name="level" value="{{$agency_admin->level}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="number">{{__("number")}}</label>
                                        <input id="number" type="number" name="number" value="{{$agency_admin->number}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="services">{{__("سرویس ها")}}</label>
                                        <select id="services" name="services[]" class="select2 form-select  form-select-lg" multiple="multiple" data-width="100%">
                                        @php($values=\App\Models\MyAgency_AdminDeliveries::where('agency_admin_id',$agency_admin->id)->get())
                                        @foreach(\App\Models\MyDeliveries::orderBy('sort','DESC')->get() as $deliveries)
                                        <option {{$values->where('deliveries_id',$deliveries->id)->first()!=null?"selected":""}} value="{{$deliveries->id}}">{{"$deliveries->title"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="commission">{{__("درصد کمیسیون")}}</label>
                                        <input id="commission" type="number" name="commission" value="{{$agency_admin->commission}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="address">{{__("آدرس")}}</label>
                                        <input id="address" type="text" name="address" value="{{$agency_admin->address}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="title">{{__("عنوان آژانس")}}</label>
                                        <input id="title" type="text" name="title" value="{{$agency_admin->title}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="image">{{__("لوگو")}}</label>
                                        <input type="file" name="image" class="form-control" >
                                        <div style="display: flex" deleteUrl="{{route('file.delete',['slug'=>'agency_admin','fieldName'=>'image','id'=>$agency_admin->id])}}">
                                        @if($agency_admin->image!=null)                                        <div style="position: relative">
                                        <a href="{{"/files/".$agency_admin->image}}" target="_blank">
                                        <img src="{{"/files/".$agency_admin->image}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
                                        </a>
                                        <i id="btnDelete-image" onclick="deleteFile(this,'image')" fileName="{{last(explode('/',$agency_admin->image))}}" class="fa-solid fa-trash" style="position: absolute;top: 5px;right: 5%;color: red;cursor: pointer"></i>
                                        </div>
                                        @endif
                                        </div>
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

        @php($lastCategory=\App\Models\Category::where("slug",'agency_admin')->first())

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
