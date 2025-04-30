
{{--<div id="sidebar" class="main-sidebar ">--}}
{{--    <div class="nav flex-column nav-pills menu-bar" id="menu-bar" role="tablist" aria-orientation="vertical">--}}
{{--        <button class="menu-btn opened_right" id="menu-btn" onclick="changeMenuStyle()">--}}
{{--            <div class="menu-bars">--}}
{{--                <span></span>--}}
{{--                <span></span>--}}
{{--                <span></span>--}}
{{--            </div>--}}
{{--            <span id="mbtn-label">مخفی کردن منو</span>--}}
{{--        </button>--}}
{{--        <a href="{{route('admin.dashboard')}}" class="nav-link" id="v-home-tab"><i class="ic-home"></i><span></span></a>--}}
{{--        <button class="nav-link" id="v-dynamic-tab" data-bs-toggle="pill" data-bs-target="#v-dynamic" type="button" role="tab" aria-controls="v-dynamic" aria-selected="false"><i class="ic-statistics"></i><span>منو اصلی</span></button>--}}
{{--        <button class="nav-link" id="v-messages-tab" data-bs-toggle="pill" data-bs-target="#v-messages" type="button" role="tab" aria-controls="v-messages" aria-selected="false"><i class="ic-message"></i><span>پیام ها</span></button>--}}
{{--        @if(\App\Models\Admin::checkAccess('developer'))--}}
{{--            <a href="{{route('category.index',['type'=>'menu','parentId'=>0])}}" class="nav-link" id="v-menu-tab" ><i class="ic-location"></i><span></span></a>--}}
{{--            <a href="{{route('category.index',['type'=>'table'])}}" class="nav-link" id="v-table-tab" ><i class="ic-location"></i><span></span></a>--}}
{{--            <a href="{{route('language.index')}}" class="nav-link" id="v-language-tab" ><i class="ic-plug"></i><span></span></a>--}}
{{--            <a href="{{route('route.index')}}" class="nav-link" id="v-route-tab" ><i class="ic-plug"></i><span></span></a>--}}
{{--            <a href="{{route('role.index')}}" class="nav-link" id="v-role-tab" ><i class="ic-user"></i><span></span></a>--}}
{{--        @endif--}}
{{--        @if(\App\Models\Admin::checkAccess('admin','show'))--}}
{{--            <a href="{{route('admin.index')}}" class="nav-link" id="v-admin-tab" ><i class="ic-user"></i><span></span></a>--}}
{{--        @endif--}}
{{--        @if(\App\Models\Admin::checkAccess('setting','show'))--}}
{{--            <a href="{{route('setting.index')}}" class="nav-link" id="v-setting-tab" ><i class="ic-plug"></i><span></span></a>--}}
{{--        @endif--}}
{{--        <div class="bottom-bar">--}}
{{--            <button onclick="changeStyle()"><i id="cs-icon" class="ic-dark"></i></button>--}}
{{--            <a href="#"><i class="ic-question"></i></a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="tab-content" id="v-pills-tabContent">--}}


{{--        <div class="tab-pane" id="v-dynamic" role="tabpanel" aria-labelledby="v-dynamic-tab" tabindex="0">--}}
{{--            <div class="sidebar-logo">--}}
{{--                <a href="#">--}}
{{--                    <img class="d-dark-none" src={{asset("admin-panel/images/logo.png")}} alt="">--}}
{{--                    <img class="d-light-none" src={{asset("admin-panel/images/logo-light.png")}} alt="">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <form class="sidebar-search">--}}
{{--                <input type="text" placeholder="جستجو ...">--}}
{{--            </form>--}}
{{--            @php($mainCategories=\App\Models\Category::where('parent_id','0')->orderBy('sort', 'DESC')->get())--}}
{{--            <nav class="navbar navbar-expand-lg">--}}
{{--                <div class="collapse navbar-collapse" id="navbarScroll">--}}
{{--                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">--}}
{{--                        @foreach($mainCategories as $category)--}}
{{--                            @if(!$category->is_menu)--}}

{{--                                @if(\App\Models\Admin::checkAccess('record','show',$category->slug))--}}
{{--                                    <li id="category_{{$category->id}}" class="nav-item">--}}
{{--                                        <a class="nav-link" href="{{route('record.index',['slug'=>$category->slug])}}">--}}
{{--                                            <i class="{{$category->icon}}"></i>--}}
{{--                                            {{$category->title}}--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                @endif--}}
{{--                            @else--}}

{{--                                <li id="category_{{$category->id}}" class="ol-hover"><a class="dropdown-item" href="#">--}}
{{--                                                        <i class="{{$sub1->icon}}"></i>{{$sub1->title}}</a>--}}
{{--                                                    <ul class="sub-menu">--}}
{{--                                                        {!! $sub1->getSubMenus() !!}--}}
{{--                                                    </ul>--}}
{{--                                                </li>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}


{{--                    </ul>--}}
{{--                </div>--}}
{{--            </nav>--}}

{{--        </div>--}}
{{--        <div class="tab-pane" id="v-messages" role="tabpanel" aria-labelledby="v-messages-tab" tabindex="0">--}}
{{--            <ul class="nav nav-pills" id="messages-tab" role="tablist">--}}
{{--                <li class="nav-item" role="presentation">--}}
{{--                    <button class="nav-link active" id="msg-all-tab" data-bs-toggle="pill" data-bs-target="#msg-all" type="button" role="tab" aria-controls="msg-all" aria-selected="true">همه</button>--}}
{{--                </li>--}}
{{--                <li class="nav-item" role="presentation">--}}
{{--                    <button class="nav-link" id="msg-unread-tab" data-bs-toggle="pill" data-bs-target="#msg-unread" type="button" role="tab" aria-controls="msg-unread" aria-selected="false">خوانده نشده</button>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <div class="tab-content" id="pills-tabContent">--}}
{{--                <div class="tab-pane fade show active" id="msg-all" role="tabpanel" aria-labelledby="msg-all-tab" tabindex="0">--}}
{{--                    <form class="sidebar-search">--}}
{{--                        <input type="text" placeholder="جستجو ...">--}}
{{--                    </form>--}}
{{--                    <ul class="contact-list">--}}
{{--                        <li><a href="chats.html" class="contact-item">--}}
{{--                                <img src={{asset("admin-panel/images/avatar/image 1.png")}} alt="">--}}
{{--                                <strong>کاربر شماره 1</strong>--}}
{{--                                <span>لورم ایپسوم متن ساختگی ...</span>--}}
{{--                            </a></li>--}}
{{--                        <li><a href="chats.html" class="contact-item">--}}
{{--                                <img src={{asset("admin-panel/images/avatar/image 2.png")}} alt="">--}}
{{--                                <strong>کاربر شماره 2</strong>--}}
{{--                                <span>لورم ایپسوم متن ساختگی ...</span>--}}
{{--                            </a></li>--}}
{{--                        <li><a href="chats.html" class="contact-item">--}}
{{--                                <img src={{asset("admin-panel/images/avatar/image 3.png")}} alt="">--}}
{{--                                <strong>کاربر شماره 3</strong>--}}
{{--                                <span>لورم ایپسوم متن ساختگی ...</span>--}}
{{--                            </a></li>--}}
{{--                        <li><a href="chats.html" class="contact-item">--}}
{{--                                <img src={{asset("admin-panel/images/avatar/image 4.png")}} alt="">--}}
{{--                                <strong>کاربر شماره 4</strong>--}}
{{--                                <span>لورم ایپسوم متن ساختگی ...</span>--}}
{{--                            </a></li>--}}
{{--                        <li><a href="chats.html" class="contact-item">--}}
{{--                                <img src={{asset("admin-panel/images/avatar/image 1.png")}} alt="">--}}
{{--                                <strong>کاربر شماره 1</strong>--}}
{{--                                <span>لورم ایپسوم متن ساختگی ...</span>--}}
{{--                            </a></li>--}}
{{--                        <li><a href="chats.html" class="contact-item">--}}
{{--                                <img src={{asset("admin-panel/images/avatar/image 2.png")}} alt="">--}}
{{--                                <strong>کاربر شماره 2</strong>--}}
{{--                                <span>لورم ایپسوم متن ساختگی ...</span>--}}
{{--                            </a></li>--}}
{{--                        <li><a href="chats.html" class="contact-item">--}}
{{--                                <img src={{asset("admin-panel/images/avatar/image 3.png")}} alt="">--}}
{{--                                <strong>کاربر شماره 3</strong>--}}
{{--                                <span>لورم ایپسوم متن ساختگی ...</span>--}}
{{--                            </a></li>--}}
{{--                        <li><a href="chats.html" class="contact-item">--}}
{{--                                <img src={{asset("admin-panel/images/avatar/image 4.png")}} alt="">--}}
{{--                                <strong>کاربر شماره 4</strong>--}}
{{--                                <span>لورم ایپسوم متن ساختگی ...</span>--}}
{{--                            </a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="tab-pane fade" id="msg-unread" role="tabpanel" aria-labelledby="msg-unread-tab" tabindex="0">...</div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <button id="sidebar-toggle" class="sidebar-toggle opened_right" onclick="changeMenuStyle()"><i class="ic-down"></i></button>--}}
{{--</div>--}}

{{--</div>--}}
<div class="sidebar-main-box close-side" >
    <div class="nav flex-column nav-pills DC_menu-bar" id="menu-bar" role="tablist" aria-orientation="vertical" >
        <button class="DC_open_btn  " id="menu-btn" >
            <div class="DC_menu-bars">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>

        <div class="DC_items">

            <a id="v-home-tab" href="{{route('admin.dashboard')}}" class="nav-link DC_item_tabBox DC_link_item "   >
                <i class="fa-solid fa-chart-simple"></i>
                <span class="DC_tooltip_text">{{__('Dashboard')}}</span>
            </a>
            <button id="v-dynamic-tab" class="nav-link DC_item_tabBox DC_list_item " data_id="chart_box"  type="button"   >
                <i class="fa-solid fa-house"></i>
                <span class="DC_tooltip_text">{{__('Main Menu')}}</span>
            </button>
            {{--            <button class="nav-link DC_activeTab DC_item_tabBox DC_list_item" data_id="message_box" >--}}
            {{--                <i class="fa-solid fa-message"></i>--}}
            {{--                <span class="DC_tooltip_text">Message</span>--}}
            {{--            </button>--}}
            @if(\App\Models\Admin::checkAccess('developer'))
                <a id="v-menu-tab" href="{{route('category.index',['type'=>'menu','parentId'=>0])}}" class="nav-link DC_item_tabBox DC_link_item" >
                    <i class="fa-solid fa-list"></i>
                    <span class="DC_tooltip_text">{{__('Manage Menus')}}</span>
                </a>
                <a id="v-table-tab" href="{{route('category.index',['type'=>'table'])}}" class="nav-link DC_item_tabBox DC_link_item"  >
                    <i class="fa-solid fa-table"></i>
                    <span class="DC_tooltip_text">{{__('Manage Tables')}}</span>
                </a>
                <a id="v-language-tab" href="{{route('language.index')}}" class="nav-link DC_item_tabBox DC_link_item"  >
                    <i class="fa-solid fa-language"></i>
                    <span class="DC_tooltip_text">{{__('Manage Languages')}}</span>
                </a>
                <a id="v-route-tab" href="{{route('route.index')}}" class="nav-link DC_item_tabBox DC_link_item"  >
                    <i class="fa-solid fa-link"></i>
                    <span class="DC_tooltip_text">{{__('Manage Routes')}}</span>
                </a>
                <a id="v-role-tab" href="{{route('role.index')}}" class="nav-link DC_item_tabBox DC_link_item"  >
                    <i class="fa-solid fa-users"></i>
                    <span class="DC_tooltip_text">{{__('Manage User Roles')}}</span>
                </a>
            @endif
            @if(\App\Models\Admin::checkAccess('admin','show'))
                <a id="v-admin-tab" href="{{route('admin.index')}}" class="nav-link DC_item_tabBox DC_link_item"  >
                    <i class="fa-solid fa-user"></i>
                    <span class="DC_tooltip_text">{{__('Manage Admins')}}</span>
                </a>
            @endif
            @if(\App\Models\Admin::checkAccess('setting','show'))
                <a id="v-setting-tab" href="{{route('setting.index')}}" class="nav-link DC_item_tabBox DC_link_item"  >
                    <i class="fa-solid fa-gear"></i>
                    <span class="DC_tooltip_text">{{__('Setting')}}</span>
                </a>
            @endif

            @if(\App\Models\Admin::checkAccess('airport','show'))
                <a id="v-airport-bookings-tab" href="{{route('admin.airport.bookings.index')}}" class="nav-link DC_item_tabBox DC_link_item"  >
                    <i class="fa-solid fa-plane"></i>
                    <span class="DC_tooltip_text">{{__('Airport Bookings')}}</span>
                </a>
            @endif
            @if(\App\Models\Admin::checkAccess('airport-service','show'))
                <a id="v-airport-services-tab" href="{{route('admin.airport.service-types.index')}}" class="nav-link DC_item_tabBox DC_link_item"  >
                    <i class="fa-solid fa-taxi"></i>
                    <span class="DC_tooltip_text">{{__('Airport Services')}}</span>
                </a>
            @endif

            @if(\App\Models\Admin::checkAccess('airline-travel','show'))
                <a id="v-airline-travel-tab" href="{{route('admin.airline-travel.index')}}" class="nav-link DC_item_tabBox DC_link_item">
                    <i class="fa-solid fa-plane-departure"></i>
                    <span class="DC_tooltip_text">{{__('Airline Travel')}}</span>
                </a>
            @endif

            @if(\App\Models\Admin::checkAccess('tour-service','show'))
                <a id="v-tour-service-tab" href="{{route('admin.tour.bookings.index')}}" class="nav-link DC_item_tabBox DC_link_item">
                    <i class="fa-solid fa-map-location-dot"></i>
                    <span class="DC_tooltip_text">{{__('Tour Services')}}</span>
                </a>
            @endif

        </div>
        <div class="DC_bottom-bar ">
            <button class="DC_item_tabBox DC_theme_btn" onclick="changeStyle()">
                <i class="fa-solid fa-moon"></i>
                <span class="DC_tooltip_text">Theme</span>
            </button>
            <a href="#" class="DC_item_tabBox">
                <i class="fa-solid fa-circle-question"></i>
                <span class="DC_tooltip_text">Question</span>
            </a>
        </div>
    </div>
    {{--<div style="position: relative">--}}
    <div class="DC_sidbar_box main-sidebar" id="sidbar">
        <div class="DC_sidebar-logo">
            <a href="#">
                <img class="d-dark-none" src="http://127.0.0.1:8000/admin-panel/images/logo.png" alt="">
                <img class="d-light-none" src="http://127.0.0.1:8000/admin-panel/images/logo-light.png" alt="">
            </a>
        </div>
        @php($mainCategories=\App\Models\Category::where('parent_id','0')->orderBy('sort', 'DESC')->get())
        <div class="Dc_sidbar_body">
            <div class="DC_item_acordian" id="chart_box">
                <ul class="DC_acordian_list">
                    @foreach($mainCategories as $category)
                        @if(!$category->is_menu)
                            @if(\App\Models\Admin::checkAccess('record','show',$category->slug))
                                <li id="category_{{$category->id}}" class=""><a href="{{route('record.index',['slug'=>$category->slug])}}" class="DC_text_li"><i class="{{$category->icon}} DC_icon_title"></i>{{__($category->title)}}</a></li>
                            @endif
                        @else
                            <li id="category_{{$category->id}}">
                                <div class="DC_headeer_acordian DC_text_box_li DC_headeer_acordian1 " id="category_{{$category->id}}">
                                    <span class="DC_text_li"><i class="{{$category->icon}} DC_icon_title"></i>{{__($category->title)}}</span>
                                    <i class=" DC_angel_icon fa-solid fa-angle-left"></i>
                                    <i class="  DC_angel_icon fa-solid fa-angle-right"></i>
                                </div>
                                <ul class="DC_sub_list DC_ul " data-name="category_{{$category->id}}">
                                    @foreach(\App\Models\Category::where('parent_id',$category->id)->orderBy('sort', 'DESC')->get() as $sub)
                                        @if(!$sub->is_menu)
                                            @if(\App\Models\Admin::checkAccess('record','show',$sub->slug))
                                                <li id="category_{{$sub->id}}" class=""><a  href="{{route('record.index',['slug'=>$sub->slug])}}" class="DC_text_li"><i class="{{$sub->icon}} DC_icon_title"></i>{{__($sub->title)}}</a></li>
                                            @endif
                                        @else
                                            <li id="category_{{$sub->id}}">
                                                <div class="DC_headeer_acordian2 DC_text_box_li" id="category_{{$category->id}}">
                                                    <span class="DC_text_li"><i class="{{$sub->icon}} DC_icon_title"></i>{{__($sub->title)}}</span>
                                                    <i class="  fa-solid fa-angle-left"></i>
                                                    <i class="  fa-solid fa-angle-right"></i>
                                                </div>
                                                <ul class="DC_sub_list_box DC_ul DC_headeer_acordian3 category_{{$category->id}}" data-name="category_{{$sub->id}}">
                                                    {!! $sub->getSubMenus() !!}
                                                </ul>
                                                {{--                                            <ul class="DC_sub_list_3">--}}

                                                {{--                                                <li><span class="DC_text_li">sub1</span></li>--}}
                                                {{--                                                <li><span class="DC_text_li">sub2</span></li>--}}
                                                {{--                                            </ul>--}}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            {{--        <div class="DC_item_acordian" id="message_box">--}}
            {{--            <ul class="DC_acordian_list">--}}
            {{--                <li class=""><span class="DC_text_li">item5</span></li>--}}
            {{--                <li class=""><span class="DC_text_li">item6</span></li>--}}
            {{--                <li class=""><span class="DC_text_li">item7</span></li>--}}
            {{--                <li class=""><span class="DC_text_li">item8</span></li>--}}
            {{--            </ul>--}}
            {{--        </div>--}}
        </div>
    </div>
</div>
