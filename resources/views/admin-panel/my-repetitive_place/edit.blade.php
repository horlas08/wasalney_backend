@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('record.update',['slug'=>'repetitive_place','id'=>$repetitive_place->id])}}"
          method="post"  enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
    <div class="widgets" data-index="1">
        <div class="row">
            <div class="col-12">
                <div class="card" id="form-box">

                    <div id="sticky-wrapper" class="sticky-wrapper" >
                        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                            <h5 class="card-title mb-sm-0 me-2">{{ __('Edit') }} {{__("مسیر پر تکرار")}}</h5>
                            <div class="action-btns ">
                                <a href="{{route('record.index',['slug'=>'repetitive_place','parentSlug'=>$parentSlug,'parentId'=>$parentId])}}" class="btn btn-outline-primary me-3">
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
                                        <label class="form-label" for="origin">{{__("مکان منتخب مبدا")}}</label>
                                        <select id="origin" name="origin" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyFavorite_Place::orderBy('sort','DESC')->get() as $favorite_place)
                                        <option {{$repetitive_place->origin==$favorite_place->id?"selected":""}} value="{{$favorite_place->id}}">{{"$favorite_place->title"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="destination">{{__("مکان منتخب مقصد")}}</label>
                                        <select id="destination" name="destination" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyFavorite_Place::orderBy('sort','DESC')->get() as $favorite_place)
                                        <option {{$repetitive_place->destination==$favorite_place->id?"selected":""}} value="{{$favorite_place->id}}">{{"$favorite_place->title"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="delivery">{{__("سرویس")}}</label>
                                        <select id="delivery" name="delivery" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyDeliveries::orderBy('sort','DESC')->get() as $deliveries)
                                        <option {{$repetitive_place->delivery==$deliveries->id?"selected":""}} value="{{$deliveries->id}}">{{"$deliveries->title"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="title_origin">{{__("عنوان مبدا")}}</label>
                                        <input id="title_origin" type="text" name="title_origin" value="{{$repetitive_place->title_origin}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="lat_origin">{{__("lat مبدا")}}</label>
                                        <input id="lat_origin" type="text" name="lat_origin" value="{{$repetitive_place->lat_origin}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="long_origin">{{__("long مبدا")}}</label>
                                        <input id="long_origin" type="text" name="long_origin" value="{{$repetitive_place->long_origin}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="lat_destination">{{__("lat مقصد")}}</label>
                                        <input id="lat_destination" type="text" name="lat_destination" value="{{$repetitive_place->lat_destination}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="long_destination">{{__("long مقصد")}}</label>
                                        <input id="long_destination" type="text" name="long_destination" value="{{$repetitive_place->long_destination}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="title_destination">{{__("عنوان مقصد")}}</label>
                                        <input id="title_destination" type="text" name="title_destination" value="{{$repetitive_place->title_destination}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="address_origin">{{__("آدرس مبدا")}}</label>
                                        <input id="address_origin" type="text" name="address_origin" value="{{$repetitive_place->address_origin}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="address_destination">{{__("آدرس مقصد")}}</label>
                                        <input id="address_destination" type="text" name="address_destination" value="{{$repetitive_place->address_destination}}" class="form-control"  />
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
        @php($lastCategory=isset($lastCategory)?$lastCategory:(\App\Models\Category::where("slug",'repetitive_place')->first()))

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
