@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('record.update',['slug'=>'wait_service','id'=>$wait_service->id])}}"
          method="post"  enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
    <div class="widgets" data-index="1">
        <div class="row">
            <div class="col-12">
                <div class="card" id="form-box">

                    <div id="sticky-wrapper" class="sticky-wrapper" >
                        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                            <h5 class="card-title mb-sm-0 me-2">{{ __('Edit') }} {{__("آیتم های صفحه انتظار سرویس")}}</h5>
                            <div class="action-btns ">
                                <a href="{{route('record.index',['slug'=>'wait_service'])}}" class="btn btn-outline-primary me-3">
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
                                        <label class="form-label" for="image">{{__("تصویر")}}</label>
                                        <input type="file" name="image" class="form-control" >
                                        <div style="display: flex" deleteUrl="{{route('file.delete',['slug'=>'wait_service','fieldName'=>'image','id'=>$wait_service->id])}}">
                                        @if($wait_service->image!=null)                                        <div style="position: relative">
                                        <a href="{{"/files/".$wait_service->image}}" target="_blank">
                                        <img src="{{"/files/".$wait_service->image}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
                                        </a>
                                        <i id="btnDelete-image" onclick="deleteFile(this,'image')" fileName="{{last(explode('/',$wait_service->image))}}" class="fa-solid fa-trash" style="position: absolute;top: 5px;right: 5%;color: red;cursor: pointer"></i>
                                        <i data-text="{{"/files/".$wait_service->image}}" class="fa-solid fa-copy copy" style="position: absolute;top: 5px;left: 5%;color: orangered;cursor: pointer"></i>
                                        </div>
                                        @endif
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="description">{{__("توضیحات")}}</label>
                                        <input id="description" type="text" name="description" value="{{$wait_service->description}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="name">{{__("نام سرویس")}}</label>
                                        <input id="name" type="text" name="name" value="{{$wait_service->name}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="image_waiting">{{__("تصویر صفحه انتظار")}}</label>
                                        <input type="file" name="image_waiting" class="form-control" >
                                        <div style="display: flex" deleteUrl="{{route('file.delete',['slug'=>'wait_service','fieldName'=>'image_waiting','id'=>$wait_service->id])}}">
                                        @if($wait_service->image_waiting!=null)                                        <div style="position: relative">
                                        <a href="{{"/files/".$wait_service->image_waiting}}" target="_blank">
                                        <img src="{{"/files/".$wait_service->image_waiting}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
                                        </a>
                                        <i id="btnDelete-image_waiting" onclick="deleteFile(this,'image_waiting')" fileName="{{last(explode('/',$wait_service->image_waiting))}}" class="fa-solid fa-trash" style="position: absolute;top: 5px;right: 5%;color: red;cursor: pointer"></i>
                                        <i data-text="{{"/files/".$wait_service->image_waiting}}" class="fa-solid fa-copy copy" style="position: absolute;top: 5px;left: 5%;color: orangered;cursor: pointer"></i>
                                        </div>
                                        @endif
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="description_waiting">{{__("توضیحات صفحه انتظار")}}</label>
                                        <input id="description_waiting" type="text" name="description_waiting" value="{{$wait_service->description_waiting}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="title_waiting">{{__("عنوان صفحه انتظار")}}</label>
                                        <input id="title_waiting" type="text" name="title_waiting" value="{{$wait_service->title_waiting}}" class="form-control"  />
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

        @php($lastCategory=\App\Models\Category::where("slug",'wait_service')->first())

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
