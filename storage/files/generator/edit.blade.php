@extends('admin-panel.layout.index')


@section('content')

    <form action="{{--FormAction--}}"
          method="post"  enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
    <div class="widgets" data-index="1">
        <div class="row">
            <div class="col-12">
                <div class="card" id="form-box">

                    <div id="sticky-wrapper" class="sticky-wrapper" >
                        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                            <h5 class="card-title mb-sm-0 me-2">{{ __('Edit') }} {{--Title--}}</h5>
                            <div class="action-btns ">
                                <a href="{{--Return--}}" class="btn btn-outline-primary me-3">
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


                                        {{--FormFields--}}


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
    <link rel="stylesheet" href="{{asset("admin-panel/plugins/quill/typography.css")}}">
    <link rel="stylesheet" href="{{asset("admin-panel/plugins/quill/katex.css")}}">
    <link rel="stylesheet" href="{{asset("admin-panel/plugins/quill/editor.css")}}">
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
    <script src="{{ asset('admin-panel/scripts/chunk.js') }}"></script>
    <script src="{{asset('admin-panel/plugins/quill/katex.js')}}"></script>
    <script src="{{asset('admin-panel/plugins/quill/quill.js')}}"></script>
    <script src="{{asset('admin-panel/scripts/forms-editors.js')}}"></script>
    <script src="{{asset('admin-panel/plugins/jalalidatepicker/jalalidatepicker.js')}}"></script>

    <script>

        {{--LastCategory--}}

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

        function deleteFile(element,fieldName,url){
            var fileName=$(element).attr('fileName');
            $.ajax({url: url+'?fileName='+fileName, success: function(result){
                    if(result){
                        $('#linkPreview-'+fieldName).attr('href','').hide();
                        $('#imagePreview-'+fieldName).attr('src','');
                        $('#btnDelete-'+fieldName).attr('fieldName','').hide();
                        $('#progress-'+fieldName).hide();
                        $('#btnUpload-'+fieldName).show();
                    }

                }});
        }

        $(".full-editor").on('DOMSubtreeModified',function(){
            var data=$(this).children(":first").html();
            if(data=="<p><br></p>")
                $('#'+$(this).attr('textarea_id')).html('');
            else
                $('#'+$(this).attr('textarea_id')).html($(this).children(":first").html());
        })


        $(document).ready(function(){
            jalaliDatepicker.startWatch();
        });
    </script>
@endsection
