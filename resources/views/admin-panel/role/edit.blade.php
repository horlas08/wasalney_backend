@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('role.update',['id'=>$role->id])}}"
          method="post"  enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="mt-5 widgets" data-index="1">
            <div class="row">
                <div class="col-12">
                    <div class="card" >

                        <div id="sticky-wrapper" class="sticky-wrapper" >
                            <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                                <h5 class="card-title mb-sm-0 me-2">{{__('Edit User Role')}}</h5>
                                <div class="action-btns">
                                    <a href="{{route('role.index')}}" class="btn btn-label-primary me-3">
                                        <span class="align-middle"> {{__('Return')}}</span>
                                    </a>
                                    <button type="submit" class="btn btn-primary ">{{__('Save')}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-11 mx-auto">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="title"> {{__('Title')}} </label>
                                            <input type="text" id="title" name="title" class="form-control" value="{{$role->title}}" />
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="category_slug">{{__('Category')}} </label>
                                            <select id="category_slug" name="category_slug" class="select2 form-select  form-select-lg" data-width="100%">
                                                @php($categories=\App\Models\Category::where('is_menu',0)->get())
                                                @foreach($categories as $category)
                                                    <option {{$role->category_slug==$category->slug?'selected':''}} value="{{$category->slug}}"> {{$category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @php($routes=\App\Models\Route::all())
                                        <div class="col-md-12">
                                            <label class="form-label" for="login_route_id">{{__('Login Route')}} </label>
                                            <select id="login_route_id" name="login_route_id" class="select2 form-select  form-select-lg" data-width="100%">
                                                @foreach($routes as $route)
                                                    <option {{$role->login_route_id==$route->id?'selected':''}} value="{{$route->id}}"> {{$route->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="landing_route_id">{{__('Landing Route')}} </label>
                                            <select id="landing_route_id" name="landing_route_id" class="select2 form-select  form-select-lg" data-width="100%">
                                                <option value=" ">{{__('Return to the requested page')}}</option>
                                                @foreach($routes as $route)
                                                    <option {{$role->landing_route_id==$route->id?'selected':''}} value="{{$route->id}}"> {{$route->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="routes">{{__('Routes under authentication')}} </label>
                                            <select id="routes" name="routes[]" class="select2 form-select  form-select-lg" data-width="100%" multiple>
                                                @foreach($routes->filter(function($item) use ($role) {
                                                    if($item->role_id==null || $item->role_id==$role->id)
                                                        return true;
                                                    else
                                                        return false;
                                                    }) as $route)
                                                    <option {{$route->role_id==$role->id?'selected':''}}  value="{{$route->id}}">
                                                        {{$route->title}}
                                                    </option>
                                                @endforeach
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

        $('#v-role-tab').addClass('DC_activeTab');
    </script>
@endsection
