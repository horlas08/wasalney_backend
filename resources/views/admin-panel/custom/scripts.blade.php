

@php($user=\Illuminate\Support\Facades\Auth::guard('admin')->user())
<script>
    window.laravel_echo_port='6001';
    window.laravel_echo_host='https://chatbama.ir';
</script>
<script src="https://chatbama.ir:6001/socket.io/socket.io.js"></script>
<script src="https://chatbama.ir/js/laravel_echo.js" type="text/javascript"></script>
@php($admin=\Illuminate\Support\Facades\Auth::guard('admin')->user())
<script type="text/javascript">
    var i = 0;
    window.Echo.channel('user-channel{{$admin->notif_token}}')
        .listen('.UserEvent', (data) => {
            console.log(data.data.data);
            data=data.data.data;
            console.log($('#call_modal').hasClass('show'));
            if(!$('#call_modal').hasClass('show')){

                setCallModalData(data);

                $('#call_modal_btn').click();


            } else if(data.user_mobile!=$('#call_modal_mobile').text()){
                var alert="<div data-notify=\"container\" class=\"alert alert-danger alert-dismissible\" role=\"alert\" data-notify-position=\"top-center\" style=\"display: flex;justify-content: space-evenly; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 10000; bottom: 20px; left: 200px; animation-iteration-count: 1;width: 350px\">\n" +
                    "        <span data='' onclick='setCallModalData("+JSON.stringify(data)+")' style='cursor: pointer'> تماس پشت خطی به شماره "+data.user_mobile+"</span>    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>\n" +
                    "    </div>";

                $('body').append(alert);

            }
        });

    function setCallModalData(data){

        // $('#call_select_user').hide();
        $('#call_modal_user_tell').hide();
        if (data.provider_id!='0'){
            $('#call_modal_user').show();
            $('#call_modal_header').text('تماس راننده');
            $('#call_modal_name').text(data.user_name);
            $('#call_modal_mobile').text(data.user_mobile);
            $('#call_modal_mobile').attr('data-mobile',data.user_mobile);
            $('#call_modal_user').text('جزییات راننده');
            $('#call_modal_user').attr('href','/adminpanel/editform/drivers/'+data.provider_id);
            if(data.user_id!='0'){
                $('#call_modal_user_tell').show();
                $('#call_modal_user_tell').text('جزییات کاربر');
                $('#call_modal_user_tell').attr('href','/adminpanel/editform/users/'+data.user_id);
            }
            $('#call_modal_avatar').attr('src',data.user_avatar);

        }
        else if(data.user_id!='0'){
            $('#call_modal_header').text('تماس کاربر');
            $('#call_modal_name').text(data.user_name);
            $('#call_modal_mobile').text(data.user_mobile);
            $('#call_modal_mobile').attr('data-mobile',data.user_mobile);
            $('#call_modal_user').text('جزییات');
            $('#call_modal_user').attr('href','/adminpanel/editform/users/'+data.user_id);
            $('#call_modal_avatar').attr('src',data.user_avatar);
        }
        else{
            $('#call_select_user').show();
            $('#call_modal_header').text('تماس کاربر جدید');
            $('#call_modal_name').text('');
            $('#call_modal_mobile').text(data.user_mobile);
            $('#call_modal_mobile').attr('data-mobile',data.user_mobile);
            $('#call_modal_user').hide();
            // $('#call_modal_user').text('ثبت کاربر جدید');
            // $('#call_modal_user').attr('href','/admin/user/storeForm?mobile='+data.user_mobile);
            // $('#call_modal_user_tell').text('افزودن به کاربر موجود');
            // $('#call_modal_user_tell').attr('href','/admin/user/teleNumForm/'+$('#select_user').val()+'?tell='+data.user_mobile);
            $('#call_modal_avatar').attr('src','');
        }

        if(!$('#call_modal').hasClass('show')){
            $('#call_modal_btn').click();
        }
    }

    // $(document).on('change','#call_select_user',function(){
    //     let userMobile=$("#call_modal_mobile").attr('data-mobile');
    //     let selectedUser=$('#select_user').val();
    //     if(selectedUser!=0){
    //         $('#call_modal_user_tell').show();
    //         $('#call_modal_user_tell').attr('href','/admin/user/teleNumForm/'+$('#select_user').val()+'?tell='+userMobile);
    //     }else{
    //         $('#call_modal_user_tell').hide();
    //     }
    // });
    // function autocomma(number_input) {
    //     number_input += '';
    //     number_input = number_input.replace(',', ''); number_input = number_input.replace(',', ''); number_input = number_input.replace(',', '');
    //     number_input = number_input.replace(',', ''); number_input = number_input.replace(',', ''); number_input = number_input.replace(',', '');
    //     x = number_input.split('.');
    //     x1 = x[0];
    //     x2 = x.length > 1 ? '.' + x[1] : '';
    //     var rgx = /(\d+)(\d{3})/;
    //     while (rgx.test(x1))
    //         x1 = x1.replace(rgx, '$1' + ',' + '$2');
    //     return x1 + x2;
    // }
</script>
