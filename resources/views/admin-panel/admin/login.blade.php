<!DOCTYPE html>
<html lang="fa-IR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
    <link rel="stylesheet" href={{asset("admin-panel/plugins/bootstrap/bootstrap.min.css")}}>
    <link rel="stylesheet" href={{asset("admin-panel/icons/style.css")}}>

    <!-- Theme Colors -->
    <style id="colors">
        :root{
            --primary:     #4053BA;
            --accent:      #FF982E;
            --primary-op:  #4053ba21;
            --background1: #F8F8F8;
            --background2: #ffffff;
            --color1:      #474747;
            --color2:      #ffffff;
            --color3:      #7C7C7C;
            --color4:      #D3D3D3;
            --hover1:      #ffffff1a;
            --hover2:      #4053ba12;
            --hover3:      #4053ba0a;
            --shadow1:       0px 4px 30px rgba(0, 0, 0, 0.03);
            --shadow-accent: 0 5px 15px #ff982e3b;
            --shadow-primary:0 5px 15px #4053ba6b;
        }
    </style>

    <!-- Plugins -->
    <link rel="stylesheet" href={{asset("admin-panel/plugins/progresscircle/progresscircle.css")}}>

    <!-- Main Styles -->
    <link rel="stylesheet" href={{asset("admin-panel/styles/main.css")}}>
</head>

<body class="login-box dir_right">

@if($errors->any())
    <div style="position: absolute;top: 20px;width: 100%;display: flex;justify-content: center;align-items: center">

        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li> {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
<div class="login-container">
    <div class="login-form">


        <div class="login-logo">
            <img src={{asset("admin-panel/images/logo.svg")}} alt=>
        </div>
        <div class="login-info">
            <h1>{{__('Login')}}</h1>
            <form action="{{route('admin.login')}}" method="post">
                @csrf
                <div class="icon-input">
                    <label for="username">{{__('Username')}} :</label>
                    <div class="input_box ">
                        <input name="username" type=" number" id="username" placeholder="09 ...">
                        <i class=" ic-mobile"></i>
                    </div>
                </div>
                <div class="icon-input">
                    <label for="password">{{__('Password')}} :</label>

                    <div class="input_box">
                        <input name="password" type="password" id="password">
                        <i class="ic-password"></i>
                    </div>
                </div>
                <div style="margin-bottom:12px;">
                    <img id="captcha_code" class="captcha_img" src="{{captcha_src()}}" alt="captcha"/>
                    <img class="refresh_captcha pointer" source="captcha_code" src={{asset("admin-panel/images/refresh.png")}} alt="refresh"/>
                </div>

                <div class="icon-input">
                    <label for="password">{{__('Captcha')}} :</label>

                    <div class="input_box">
                        <input name="captcha" type="number" id="captcha">
                        <i class="ic-password"></i>
                    </div>
                </div>
{{--                <a href="password.html" class="forget-password">رمز عبور را فراموش کرده اید ؟</a>--}}
                <button type="submit">{{__('Login')}} </button>
            </form>

            <a href="{{route('baseUrl')}}" class="back-btn">{{__('Return')}}</a>
        </div>
    </div>
</div>

<div id="overlay" class="overlay"></div>
<script src={{asset("admin-panel/plugins/bootstrap/bootstrap.bundle.min.js")}}></script>
<script src={{asset("admin-panel/plugins/jquery/jquery.min.js")}}></script>
<!-- Plugins -->
<script src={{asset("admin-panel/plugins/progresscircle/progresscircle.js")}}></script>
<script src={{asset("admin-panel/plugins/chartjs/chart.js")}}></script>

<!-- Main Scripts -->
<script src={{asset("admin-panel/scripts/login.js")}}></script>
<script>

    $(document).on("click", ".refresh_captcha", function () {
        var source = $(this).attr('source');
        $.get("/captcha_src/refresh", function (response) {
            $("#" + source).attr('src', response);
        });
    });
</script>

</body>

</html>
