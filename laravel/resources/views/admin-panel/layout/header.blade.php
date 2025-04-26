

<header>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible  in" style="z-index: 1000">
            <p>
{{--                <strong>خطا!</strong>--}}
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

            </p>

            <ul class="">

                @foreach($errors->all() as $error)
                    <li> {{$error}} </li>
                @endforeach
            </ul>
        </div>

    @endif
{{--    <a class="show-website" href="{{route('baseUrl')}}" target="_blank">--}}
{{--        <i class="ic-home"></i>--}}
{{--        <span>مشاهده وبسایت</span>--}}
{{--    </a>--}}
{{--    <a class="show-website-mobile" href="#" target="_blank">--}}
{{--        <i class="ic-external-link"></i>--}}
{{--    </a>--}}
        @php($languages=\App\Models\Language::all())
        <div class="account-menu ol-hover">
            <span>{{$selectedLang==null?'':$selectedLang->title}}</span>
            <img src={{asset("admin-panel/images/translate.png")}} alt="">
            <ul>
                @foreach($languages as $lang)
                    <li><a  href="{{route('language.change',['abbr'=>$lang->abbr])}}"><i class="ic-browser"></i>{{$lang->title}}</a></li>
                @endforeach
            </ul>
        </div>
    <h1>{{__('Admin Panel')}}</h1>
    <div class="account-menu-section">

        <div class="buttons">
            <!--<button><i class="ic-settings"></i></button>-->
            <!--<button onclick="showNotifications()"><i class="ic-notify"></i><span></span></button>-->
            <!--              <button class="direction-btn">-->
            <!--                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
            <!--                <path d="M3.5 8.3C3.5 6.61984 3.5 5.77976 3.82698 5.13803C4.1146 4.57354 4.57354 4.1146 5.13803 3.82698C5.77976 3.5 6.61984 3.5 8.3 3.5H15.7C17.3802 3.5 18.2202 3.5 18.862 3.82698C19.4265 4.1146 19.8854 4.57354 20.173 5.13803C20.5 5.77976 20.5 6.61984 20.5 8.3V15.7C20.5 17.3802 20.5 18.2202 20.173 18.862C19.8854 19.4265 19.4265 19.8854 18.862 20.173C18.2202 20.5 17.3802 20.5 15.7 20.5H8.3C6.61984 20.5 5.77976 20.5 5.13803 20.173C4.57354 19.8854 4.1146 19.4265 3.82698 18.862C3.5 18.2202 3.5 17.3802 3.5 15.7V8.3Z" stroke="#33363F" stroke-linecap="round"/>-->
            <!--                <path d="M6.5 9.5H9C10.6569 9.5 12 10.8431 12 12.5V17M6.5 9.5L8 8M6.5 9.5L8 11" stroke="#33363F" stroke-linecap="round" stroke-linejoin="round"/>-->
            <!--                <path d="M17.5 9.5H15C13.3431 9.5 12 10.8431 12 12.5V17M17.5 9.5L16 8M17.5 9.5L16 11" stroke="#33363F" stroke-linecap="round" stroke-linejoin="round"/>-->
            <!--              </svg></button>-->
            <div class="account-menu-mobile ol-hover">
                <img src={{asset("admin-panel/images/avatar.png")}} alt="">

            </div>
        </div>
        @php($admin=\Illuminate\Support\Facades\Auth::guard('admin')->user())
        <div class="account-menu ol-hover">
            <span>{{$admin->name}}</span>
            <img src={{asset("admin-panel/images/avatar.png")}} alt="">
            <ul>
                <li><a href="{{route('admin.editform',['id'=>$admin->id])}}"><i class="ic-user"></i>{{__('Edit User')}}</a></li>
                <li><a href="{{route('admin.logOut')}}"><i class="ic-block"></i>{{__('Logout')}}</a></li>
            </ul>
        </div>

    </div>

</header>

