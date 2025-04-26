@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('record.update',['slug'=>'account_check','id'=>$account_check->id])}}"
          method="post"  enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
    <div class="widgets" data-index="1">
        <div class="row">
            <div class="col-12">
                <div class="card" id="form-box">

                    <div id="sticky-wrapper" class="sticky-wrapper" >
                        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                            <h5 class="card-title mb-sm-0 me-2">{{ __('Edit') }} {{__("التحقق من حسابات السائقين")}}</h5>
                            <div class="action-btns ">
                                <a href="{{route('record.index',['slug'=>'account_check'])}}" class="btn btn-outline-primary me-3">
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
                                        <label class="form-label" for="card_number">{{__("رقم البطاقة")}}</label>
                                        <input id="card_number" type="text" name="card_number" value="{{$account_check->card_number}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="user">{{__("مستخدم")}}</label>
                                        <select id="user" name="user" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyUsers::orderBy('sort','DESC')->get() as $users)
                                        <option {{$account_check->user==$users->id?"selected":""}} value="{{$users->id}}">{{"( $users->mobile)$users->name"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="title">{{__("عنوان")}}</label>
                                        <input id="title" type="text" name="title" value="{{$account_check->title}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="price">{{__("سعر")}}</label>
                                        <input id="price" type="number" name="price" value="{{$account_check->price}}" class="form-control"  />
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="state">{{__("حالة")}}</label>
                                        <select id="state" name="state" class="select2 form-select  form-select-lg"  data-width="100%">
                                        <option value=" ">{{__('not selected')}}</option>
                                        @foreach(\App\Models\MyState_Driver::orderBy('sort','DESC')->get() as $state_driver)
                                        <option {{$account_check->state==$state_driver->id?"selected":""}} value="{{$state_driver->id}}">{{"$state_driver->title"}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label" for="shaba">{{__("شماره شبا کارت")}}</label>
                                        <input id="shaba" type="number" name="shaba" value="{{$account_check->shaba}}" class="form-control"  />
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

        @php($lastCategory=\App\Models\Category::where("slug",'account_check')->first())

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
