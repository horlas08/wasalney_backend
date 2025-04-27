@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('record.update',['slug'=>'documents','id'=>$documents->id])}}"
          method="post"  enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
    <div class="widgets" data-index="1">
        <div class="row">
            <div class="col-12">
                <div class="card" id="form-box">

                    <div id="sticky-wrapper" class="sticky-wrapper" >
                        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                            <h5 class="card-title mb-sm-0 me-2">{{ __('Edit') }} {{__("مدارک راننده")}}</h5>
                            <div class="action-btns ">
                                <a href="{{route('record.index',['slug'=>'documents','parentSlug'=>$parentSlug,'parentId'=>$parentId])}}" class="btn btn-outline-primary me-3">
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
                                        <label class="form-label" for="on_car_card">{{__("صورة أمامية لسنوية السيارة")}}</label>
                                        <input type="file" name="on_car_card" class="form-control" >
                                        <div style="display: flex" deleteUrl="{{route('file.delete',['slug'=>'documents','fieldName'=>'on_car_card','id'=>$documents->id])}}">
                                        @if($documents->on_car_card!=null)                                        <div style="position: relative">
                                        <a href="{{"/pvfiles/".$documents->on_car_card}}" target="_blank">
                                        <img src="{{"/pvfiles/".$documents->on_car_card}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
                                        </a>
                                        <i id="btnDelete-on_car_card" onclick="deleteFile(this,'on_car_card')" fileName="{{last(explode('/',$documents->on_car_card))}}" class="fa-solid fa-trash" style="position: absolute;top: 5px;right: 5%;color: red;cursor: pointer"></i>
                                        <i data-text="{{"/pvfiles/".$documents->on_car_card}}" class="fa-solid fa-copy copy" style="position: absolute;top: 5px;left: 5%;color: orangered;cursor: pointer"></i>
                                        </div>
                                        @endif
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="back_car_card">{{__("عکس پشت کارت ماشین")}}</label>
                                        <input type="file" name="back_car_card" class="form-control" >
                                        <div style="display: flex" deleteUrl="{{route('file.delete',['slug'=>'documents','fieldName'=>'back_car_card','id'=>$documents->id])}}">
                                        @if($documents->back_car_card!=null)                                        <div style="position: relative">
                                        <a href="{{"/pvfiles/".$documents->back_car_card}}" target="_blank">
                                        <img src="{{"/pvfiles/".$documents->back_car_card}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
                                        </a>
                                        <i id="btnDelete-back_car_card" onclick="deleteFile(this,'back_car_card')" fileName="{{last(explode('/',$documents->back_car_card))}}" class="fa-solid fa-trash" style="position: absolute;top: 5px;right: 5%;color: red;cursor: pointer"></i>
                                        <i data-text="{{"/pvfiles/".$documents->back_car_card}}" class="fa-solid fa-copy copy" style="position: absolute;top: 5px;left: 5%;color: orangered;cursor: pointer"></i>
                                        </div>
                                        @endif
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="on_certificate">{{__("عکس روی گواهینامه")}}</label>
                                        <input type="file" name="on_certificate" class="form-control" >
                                        <div style="display: flex" deleteUrl="{{route('file.delete',['slug'=>'documents','fieldName'=>'on_certificate','id'=>$documents->id])}}">
                                        @if($documents->on_certificate!=null)                                        <div style="position: relative">
                                        <a href="{{"/pvfiles/".$documents->on_certificate}}" target="_blank">
                                        <img src="{{"/pvfiles/".$documents->on_certificate}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
                                        </a>
                                        <i id="btnDelete-on_certificate" onclick="deleteFile(this,'on_certificate')" fileName="{{last(explode('/',$documents->on_certificate))}}" class="fa-solid fa-trash" style="position: absolute;top: 5px;right: 5%;color: red;cursor: pointer"></i>
                                        <i data-text="{{"/pvfiles/".$documents->on_certificate}}" class="fa-solid fa-copy copy" style="position: absolute;top: 5px;left: 5%;color: orangered;cursor: pointer"></i>
                                        </div>
                                        @endif
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="additional_documents">{{__("مستمسك اضافي")}}</label>
                                        <input type="file" name="additional_documents" class="form-control" >
                                        <div style="display: flex" deleteUrl="{{route('file.delete',['slug'=>'documents','fieldName'=>'additional_documents','id'=>$documents->id])}}">
                                        @if($documents->additional_documents!=null)                                        <div style="position: relative">
                                        <a href="{{"/pvfiles/".$documents->additional_documents}}" target="_blank">
                                        <img src="{{"/pvfiles/".$documents->additional_documents}}" height="60" width="60" onerror="this.src='/admin-panel/images/file.png'">
                                        </a>
                                        <i id="btnDelete-additional_documents" onclick="deleteFile(this,'additional_documents')" fileName="{{last(explode('/',$documents->additional_documents))}}" class="fa-solid fa-trash" style="position: absolute;top: 5px;right: 5%;color: red;cursor: pointer"></i>
                                        <i data-text="{{"/pvfiles/".$documents->additional_documents}}" class="fa-solid fa-copy copy" style="position: absolute;top: 5px;left: 5%;color: orangered;cursor: pointer"></i>
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

        @php($parent=$parentSlug!=null?db($parentSlug)->find($parentId):null)
        @php($preSlug=$parentSlug)
        @php($preParent=$parent)
        @while($preSlug!=null)
            @php($lastCategory=\App\Models\Category::where('slug',$preSlug)->first())
            @php($preSlug=$preParent->parent_slug)
            @php($preParent=$preParent->parent_slug==null?null:db($preParent->parent_slug)->find($preParent->parent_id))
        @endwhile
        @php($lastCategory=isset($lastCategory)?$lastCategory:(\App\Models\Category::where("slug",'documents')->first()))

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
