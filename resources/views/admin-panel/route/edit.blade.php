@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('route.update',['id'=>$route->id])}}" method="post" novalidate>
        @csrf
        @method('PUT')
        <div class="widgets" data-index="1">
            <div class="row">
                <div class="col-12">
                    <div class="card" >

                        <div id="sticky-wrapper" class="sticky-wrapper" >
                            <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                                <h5 class="card-title mb-sm-0 me-2">{{__('Edit Route')}}</h5>
                                <div class="action-btns">
                                    <a href="{{route('route.index')}}" class="btn btn-label-primary me-3">
                                        <span class="align-middle"> {{__('Return')}}</span>
                                    </a>
                                    <button type="submit" class="btn btn-primary ">{{__('Save')}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col-lg-11 mx-auto">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="title"> {{__('Title')}} </label>
                                            <input type="text" id="title" name="title" class="form-control"  value="{{$route->title}}"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="address"> {{__('Address')}} </label>
                                            <input type="text" id="address" name="address" class="form-control" value="{{$route->address}}" onkeyup="this.value = setRouteTitleFormat(this.value);"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="view"> {{__('View')}} </label>
                                            <input type="text" id="view" name="view" class="form-control" value="{{$route->view}}" />
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="field_id">{{__('Link Maker')}} </label>
                                            <select id="field_id" name="field_id" class="select2 form-select  form-select-lg" data-width="100%">
                                                <option value=" ">{{__('No Link Maker')}} </option>
                                                @foreach(\App\Models\Field::where('type',\App\Enums\TypeField::ROUTE)->get() as $field)
                                                    @php($category=\App\Models\Category::where('slug',$field->category_slug)->first())
                                                    <option {{$route->field_id==$field->id?'selected':''}} value="{{$field->id}}"> {{$field->title.'/'.$category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="changefreq">{{__('Change Frequency')}} </label>
                                            <select id="changefreq" name="changefreq" class="select2 form-select  form-select-lg" data-width="100%">

                                                <option {{$route->changefreq=='yearly'?'selected':''}} value="yearly"> {{__('Yearly')}}</option>
                                                <option {{$route->changefreq=='monthly'?'selected':''}} value="monthly"> {{__('Monthly')}}</option>
                                                <option {{$route->changefreq=='weekly'?'selected':''}} value="weekly"> {{__('Weekly')}}</option>
                                                <option {{$route->changefreq=='daily'?'selected':''}} value="daily"> {{__('Daily')}}</option>
                                                <option {{$route->changefreq=='hourly'?'selected':''}} value="hourly"> {{__('Hourly')}}</option>
                                                <option {{$route->changefreq=='always'?'selected':''}} value="always"> {{__('Always')}}</option>
                                                <option {{$route->changefreq=='never'?'selected':''}} value="never"> {{__('Never')}}</option>

                                            </select>
                                        </div>


                                        <div class="col-md-12">
                                            <label class="form-label" for="priority"> {{__('Priority')}} </label>
                                            <input type="number" id="priority" name="priority" class="form-control" value="{{$route->priority}}" />
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

        $('#v-route-tab').addClass('DC_activeTab');
    </script>
@endsection
