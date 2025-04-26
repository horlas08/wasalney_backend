@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('record.store',['slug'=>'condition_rate'])}}"
          method="post"  enctype="multipart/form-data" novalidate>
        @csrf
    <div class="widgets" data-index="1">
        <div class="row">
            <div class="col-12">
                <div class="card" >

                    <div id="sticky-wrapper" class="sticky-wrapper" >
                        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                            <h5 class="card-title mb-sm-0 me-2">{{ __('Store') }} {{__("نرخ امتیاز بر اساس مبلغ سفارش")}}</h5>
                            <div class="action-btns">
                                <a href="{{route('record.index',['slug'=>'condition_rate'])}}" class="btn btn-outline-primary me-3">
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
                                        <label class="form-label" for="price">{{__("مبلغ")}}</label>
                                        <input id="price" type="number" name="price" value="" class="form-control"  />
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

        @php($lastCategory=\App\Models\Category::where("slug",'condition_rate')->first())

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
