@if($type=="datatable-counter")
    <i class="sort-icon fa-solid fa-refresh m-1" sortId="{{$drivers->sort}}"
       style="color: #2e98c5;font-size: 20px;"></i>
    {{$counter}}
@elseif($type=="name")
    {{$drivers->name}}
@elseif($type=="mobile")
    {{$drivers->mobile}}
@elseif($type=="code_meli")
    {{$drivers->code_meli}}
@elseif($type=="gender")
    @if($deliveries=\App\Models\MyGender::find($drivers->gender))
        {{"$deliveries->title"}}
    @endif
@elseif($type=="rate")
    {{$drivers->rate}}

@elseif($type=="type_activity")
    @if($deliveries=\App\Models\MyDeliveries::find($drivers->type_activity))
        {{"$deliveries->title"}}
    @endif
@elseif($type=="state")
    <div class="custom-control custom-checkbox mb-3 text-center">
        <input {{\App\Models\Admin::checkAccess('record','edit','drivers')?'':'disabled'}} {{$drivers->state?'checked':''}}
               onclick="onCheckbox(this,'{{route('record.active',['slug'=>'drivers','fieldName'=>'state','id'=>$drivers->id])}}')"
               type="checkbox" class="form-check-input" id="customCheck{{'state_'.$drivers->id}}"/>
        @elseif($type=="state_approval")
            @if($state_completed=\App\Models\MyState_Completed::find($drivers->state_approval))
                {{"$state_completed->title"}}
            @endif
        @elseif($type=="image")
            <div class="d-flex justify-content-center align-items-center">
                @if($drivers->image!=null)
                    <a href="{{'/files/'.$drivers->image}}" target="_blank"
                       style="background-color: #EEEEEE;text-align: center;width: fit-content">
                        <img src="{{'/files/'.$drivers->image}}" height="60"
                             width="60"
                             onerror="this.src='/admin-panel/images/file.png'">
                    </a>
                @endif
            </div>
        @elseif($type=="credit")
            {{$drivers->credit}}
        @elseif($type=="level")
            @if($level=\App\Models\MyLevel::find($drivers->level))
                {{"$level->title"}}
            @endif

        @elseif($type=="has_profile")
            <div class="custom-control custom-checkbox mb-3 text-center">
                <input {{\App\Models\Admin::checkAccess('record','edit','drivers')?'':'disabled'}} {{$drivers->has_profile?'checked':''}}
                       onclick="onCheckbox(this,'{{route('record.active',['slug'=>'drivers','fieldName'=>'has_profile','id'=>$drivers->id])}}')"
                       type="checkbox" class="form-check-input"
                       id="customCheck{{'state_'.$drivers->id}}"/>
                @elseif($type=="has_info_user")
                    <div class="custom-control custom-checkbox mb-3 text-center">
                        <input {{\App\Models\Admin::checkAccess('record','edit','drivers')?'':'disabled'}} {{$drivers->has_info_user?'checked':''}}
                               onclick="onCheckbox(this,'{{route('record.active',['slug'=>'drivers','fieldName'=>'has_info_user','id'=>$drivers->id])}}')"
                               type="checkbox" class="form-check-input"
                               id="customCheck{{'state_'.$drivers->id}}"/>
                        @elseif($type=="has_info_bank")
                            <div class="custom-control custom-checkbox mb-3 text-center">
                                <input {{\App\Models\Admin::checkAccess('record','edit','drivers')?'':'disabled'}} {{$drivers->has_info_bank?'checked':''}}
                                       onclick="onCheckbox(this,'{{route('record.active',['slug'=>'drivers','fieldName'=>'has_info_bank','id'=>$drivers->id])}}')"
                                       type="checkbox" class="form-check-input"
                                       id="customCheck{{'state_'.$drivers->id}}"/>
                                @elseif($type=="has_car_details")
                                    <div class="custom-control custom-checkbox mb-3 text-center">
                                        <input {{\App\Models\Admin::checkAccess('record','edit','drivers')?'':'disabled'}} {{$drivers->has_car_details?'checked':''}}
                                               onclick="onCheckbox(this,'{{route('record.active',['slug'=>'drivers','fieldName'=>'has_car_details','id'=>$drivers->id])}}')"
                                               type="checkbox" class="form-check-input"
                                               id="customCheck{{'state_'.$drivers->id}}"/>
                                        @elseif($type=="has_documents")
                                            <div class="custom-control custom-checkbox mb-3 text-center">
                                                <input {{\App\Models\Admin::checkAccess('record','edit','drivers')?'':'disabled'}} {{$drivers->has_documents?'checked':''}}
                                                       onclick="onCheckbox(this,'{{route('record.active',['slug'=>'drivers','fieldName'=>'has_documents','id'=>$drivers->id])}}')"
                                                       type="checkbox" class="form-check-input"
                                                       id="customCheck{{'state_'.$drivers->id}}"/>
                                                @elseif($type=="lat")
                                                    {{$drivers->lat}}
                                                @elseif($type=="long")
                                                    {{$drivers->long}}
                                                @elseif($type=="number_licence")
                                                    {{$drivers->number_licence}}
                                                @elseif($type=="certificate_type")
                                                    @if($certificates_types=\App\Models\MyCertificates_Types::find($drivers->certificate_type))
                                                        {{"$certificates_types->title"}}
                                                    @endif
                                                @elseif($type=="certificat_date")
                                                    @if($drivers->certificat_date)
                                                        @if(getLang()=='fa')
                                                            {{\Morilog\Jalali\Jalalian::fromCarbon(\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $drivers->certificat_date))->format('%A, %d %B %Y')}}
                                                        @else
                                                            {{\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $drivers->certificat_date)->format('M d Y')}}
                                                        @endif
                                                    @endif
                                                @elseif($type=="certificate_validity")
                                                    {{$drivers->certificate_validity}}
                                                @elseif($type=="car_model")
                                                    @if($car_models=\App\Models\MyCar_Models::find($drivers->car_model))
                                                        {{"$car_models->title"}}
                                                    @endif

                                                @elseif($type=="notif_token")
                                                    {{$drivers->notif_token}}
                                                @elseif($type=="car_tag")
                                                    {{$drivers->car_tag}}

                                                @elseif($type=="description")
                                                    {{$drivers->description}}

                                                @elseif($type=="code")
                                                    {{$drivers->code}}
                                                @elseif($type=="intro_code")
                                                    {{$drivers->intro_code}}
                                                @elseif($type=="family_number")
                                                    {{$drivers->family_number}}
                                                     @elseif($type=="fcm_token")
                                                    {{$drivers->fcm_token}}
                                                @else
                                                    <div class="btn-group">
                                                        <button type="button"
                                                                class="btn btn-outline-primary dropdown-toggle"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false">{{ __('Actions') }}</button>
                                                        <ul class="dropdown-menu" style="">
                                                            @if(\App\Models\Admin::checkAccess('record','edit','drivers'))
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                       href="{{route('record.editform',['slug'=>'drivers','id'=>$drivers->id])}}">
                                                                        <i class="bx bx-edit-alt me-1"></i> {{ __('Edit') }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if(\App\Models\Admin::checkAccess('record','delete','drivers'))
                                                                <li>
                                                                    <a class="dropdown-item text-danger"
                                                                       data-bs-toggle="modal"
                                                                       data-bs-target="#basicModal"
                                                                       onclick="setModalRoute('{{route('record.destroy',['slug'=>'drivers','id'=>$drivers->id])}}')">
                                                                        <i class="bx bx-trash me-1"></i>{{ __('Delete') }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                                @if(\App\Models\Admin::checkAccess('record','show','rate_user'))
                                                                    <li>
                                                                        <a href="{{route('record.index',['slug'=>'rate_user','parentSlug'=>'drivers','parentId'=>$drivers->id])}}"
                                                                           type="button" class="dropdown-item">{{__("امتیاز ها")}}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @if(\App\Models\Admin::checkAccess('record','show','car_details'))
                                                                <li>
                                                                    <a href="{{route('record.index',['slug'=>'car_details','parentSlug'=>'drivers','parentId'=>$drivers->id])}}"
                                                                       type="button"
                                                                       class="dropdown-item">{{__("مشخصات ماشین")}}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if(\App\Models\Admin::checkAccess('record','show','documents'))
                                                                <li>
                                                                    <a href="{{route('record.index',['slug'=>'documents','parentSlug'=>'drivers','parentId'=>$drivers->id])}}"
                                                                       type="button"
                                                                       class="dropdown-item">{{__("مدارک")}}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if(\App\Models\Admin::checkAccess('record','show','wallet'))
                                                                <li>
                                                                    <a href="{{route('record.index',['slug'=>'wallet','parentSlug'=>'drivers','parentId'=>$drivers->id])}}"
                                                                       type="button"
                                                                       class="dropdown-item">{{__("کیف پول")}}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if(\App\Models\Admin::checkAccess('record','show','cancel_driver'))
                                                                <li>
                                                                    <a href="{{route('record.index',['slug'=>'cancel_driver','parentSlug'=>'drivers','parentId'=>$drivers->id])}}"
                                                                       type="button"
                                                                       class="dropdown-item">{{__("سفارشات لغو کرده")}}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if(\App\Models\Admin::checkAccess('record','show','info_bank'))
                                                                <li>
                                                                    <a href="{{route('record.index',['slug'=>'info_bank','parentSlug'=>'drivers','parentId'=>$drivers->id])}}"
                                                                       type="button"
                                                                       class="dropdown-item">{{__("اطلاعات بانکی")}}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
@endif
