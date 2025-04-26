@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('language.update',['id'=>$language->id])}}" method="post" >
        @csrf
        @method('PUT')
        <div class="widgets" data-index="1">
            <div class="row">
                <div class="col-12">
                    <div class="card" >

                        <div id="sticky-wrapper" class="sticky-wrapper" >
                            <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                                <h5 class="card-title mb-sm-0 me-2">{{__('Edit Language')}}</h5>
                                <div class="action-btns">
                                    <a href="{{route('language.index')}}" class="btn btn-label-primary me-3">
                                        <span class="align-middle"> {{__('Return')}}</span>
                                    </a>
                                    <button type="submit" class="btn btn-primary ">{{__('Save')}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row" >
                                <div class="col-lg-11 mx-auto">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="title"> {{__('Title')}} </label>
                                            <input type="text" id="title" name="title" class="form-control" value="{{$language->title}}" />
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="direction">{{__('Direction')}} </label>
                                            <select id="direction" name="direction" class="select2 form-select  form-select-lg" data-width="100%">
                                                <option {{$language->direction=="rtl"?'selected':''}} value="rtl">{{__('Right to Left')}}</option>
                                                <option {{$language->direction=="ltr"?'selected':''}} value="ltr">{{__('Left to Right')}}</option>

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
    <script>

        $('#v-language-tab').addClass('DC_activeTab');
    </script>
@endsection
