@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('route.store')}}" method="post" novalidate>
        @csrf
    <div class="widgets" data-index="1">
        <div class="row">
            <div class="col-12">
                <div class="card" >

                    <div id="sticky-wrapper" class="sticky-wrapper" >
                        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                            <h5 class="card-title mb-sm-0 me-2">{{__('Store Route')}}</h5>
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
                                                <input type="text" id="title" name="title" class="form-control" />
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="address"> {{__('Address')}} </label>
                                                <input type="text" id="address" name="address" class="form-control" onkeyup="this.value = setRouteTitleFormat(this.value);"/>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="view"> {{__('View')}} </label>
                                                <input type="text" id="view" name="view" class="form-control" />
                                            </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="field_id">{{__('Link Maker')}} </label>
                                            <select id="field_id" name="field_id" class="select2 form-select  form-select-lg" data-width="100%">
                                                <option value=" "> {{__('No Link Maker')}} </option>
                                                @foreach(\App\Models\Field::where('type',\App\Enums\TypeField::ROUTE)->get() as $field)
                                                    @php($category=\App\Models\Category::where('slug',$field->category_slug)->first())
                                                    <option value="{{$field->id}}"> {{$field->title.'/'.$category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="changefreq">{{__('Change Frequency')}} </label>
                                            <select id="changefreq" name="changefreq" class="select2 form-select  form-select-lg" data-width="100%">

                                                <option value="yearly"> {{__('Yearly')}}</option>
                                                <option value="monthly"> {{__('Monthly')}}</option>
                                                <option value="weekly"> {{__('Weekly')}}</option>
                                                <option value="daily"> {{__('Daily')}}</option>
                                                <option value="hourly"> {{__('Hourly')}}</option>
                                                <option value="always"> {{__('Always')}}</option>
                                                <option value="never"> {{__('Never')}}</option>

                                            </select>
                                        </div>


                                        <div class="col-md-12">
                                            <label class="form-label" for="priority"> {{__('Priority')}} </label>
                                            <input type="number" id="priority" name="priority" class="form-control" value="0.5"/>
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
