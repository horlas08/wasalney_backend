@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('record.update',['slug'=>'favorite_place','id'=>$favorite_place->id])}}"
          method="post"  enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
    <div class="widgets" data-index="1">
        <div class="row">
            <div class="col-12">
                <div class="card" id="form-box">

                    <div id="sticky-wrapper" class="sticky-wrapper" >
                        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                            <h5 class="card-title mb-sm-0 me-2">{{ __('Edit') }} {{__("مکان های منتخب")}}</h5>
                            <div class="action-btns ">
                                <a href="{{route('record.index',['slug'=>'favorite_place'])}}" class="btn btn-outline-primary me-3">
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
                                        <label class="form-label" for="title">{{__("عنوان")}}</label>
                                        <input id="title" type="text" name="title" value="{{$favorite_place->title}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="lat">{{__("lat")}}</label>
                                        <input id="lat" type="text" name="lat" value="{{$favorite_place->lat}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="long">{{__("long")}}</label>
                                        <input id="long" type="text" name="long" value="{{$favorite_place->long}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="address">{{__("آدرس")}}</label>
                                        <input id="address" type="text" name="address" value="{{$favorite_place->address}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="user">{{__("کاربر")}}</label>
                                        <select id="user" name="user" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyUsers::orderBy('sort','DESC')->get() as $users)
                                        <option {{$favorite_place->user==$users->id?"selected":""}} value="{{$users->id}}">{{"$users->name"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="count">{{__("دفعات مورد استفاده")}}</label>
                                        <input id="count" type="number" name="count" value="{{$favorite_place->count}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="name">{{__("نام")}}</label>
                                        <input id="name" type="text" name="name" value="{{$favorite_place->name}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="phone">{{__("شماره تلفن")}}</label>
                                        <input id="phone" type="text" name="phone" value="{{$favorite_place->phone}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="plack">{{__("پلاک")}}</label>
                                        <input id="plack" type="text" name="plack" value="{{$favorite_place->plack}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="unit">{{__("واحد")}}</label>
                                        <input id="unit" type="text" name="unit" value="{{$favorite_place->unit}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="description">{{__("توضیحات")}}</label>
                                        <input id="description" type="text" name="description" value="{{$favorite_place->description}}" class="form-control"  />
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

        @php($lastCategory=\App\Models\Category::where("slug",'favorite_place')->first())

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
