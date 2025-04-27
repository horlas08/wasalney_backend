@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('setting.update',['lang'=>$lang])}}"
          method="post"  enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="widgets" data-index="1">
            <div class="row">
                <div class="col-12">
                    <div class="card" >

                        <div id="sticky-wrapper" class="sticky-wrapper" >
                            <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                                <h5 class="card-title mb-sm-0 me-2">{{__('Setting')}}</h5>
                                <div class="action-btns">
                                    <button type="button" class="btn btn-outline-info copy  me-3" data-text="{{'@'}}include('seo.meta')">{{__('Copy Meta Tags')}}</button>
                                    <a href="{{route('admin.dashboard')}}" class="btn btn-label-primary me-3">
                                        <span class="align-middle"> {{__('Return')}}</span>
                                    </a>
                                    @if(\App\Models\Admin::checkAccess('setting','edit'))
                                    <button type="submit" class="btn btn-primary ">{{__('Save')}}</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row" >
                                <div class="col-lg-11 mx-auto">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="name"> {{__('Name')}} </label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{$setting->name}}"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="short_name"> {{__('Short Name')}} </label>
                                            <input type="text" id="short_name" name="short_name" class="form-control" value="{{$setting->short_name}}"/>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="description">{{__('Description')}}</label>
                                            <textarea name="description" class="form-control" id="description" rows="2" >{{$setting->description}}</textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="keywords"> {{__('Keywords')}} </label>
                                            <input type="text" id="keywords" name="keywords" class="form-control" value="{{$setting->keywords}}"/>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="background_color"> {{__('Background Color')}} </label>
                                            <input type="color" id="background_color" name="background_color" class="form-control" value="{{$setting->background_color}}"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="theme_color"> {{__('Theme Color')}} </label>
                                            <input type="color" id="theme_color" name="theme_color" class="form-control" value="{{$setting->theme_color}}"/>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="favicon"> {{__('Icon')}} </label>
                                            <input type="file" id="favicon" name="favicon" class="form-control" />
                                        </div>
                                        <img src="/setting/{{$lang.'/'.$setting->favicon}}" style="width: 60px;height: 60px" onerror="this.src='/admin-panel/images/file.png'">

                                        <div class="col-md-12">
                                            <label class="form-label" for="logo"> {{__('Logo')}} </label>
                                            <input type="file" id="logo" name="logo" class="form-control" />
                                        </div>
                                        <img src="{{$setting->logo}}"  style="width: 60px;height: 60px" onerror="this.src='/admin-panel/images/file.png'">

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

        $('#v-setting-tab').addClass('DC_activeTab');
    </script>
@endsection
