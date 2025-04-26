$(document).ready(function(){
    $(".menu-bar").hover(function(){

        if(document.querySelector("body").classList.contains("dir_left")){
            document.getElementById("menu-bar").classList.add("opened_left");
            document.getElementById("menu-bar").classList.remove("opened_right");
        }
        else{
            document.getElementById("menu-bar").classList.add("opened_right");
            document.getElementById("menu-bar").classList.remove("opened_left");
        }
      }, function(){
        document.getElementById("menu-bar").classList.remove("opened_left");
        document.getElementById("menu-bar").classList.remove("opened_right");
    });
    $(".menu-bar .nav-link").click(function(){
        document.getElementById("menu-bar").classList.remove("opened_left");
        document.getElementById("menu-bar").classList.remove("opened_right");

        openSidebar();
    });

    if(document.body.classList.contains('dir_left')){
        localStorage.setItem("direction", "dir_left");
        document.querySelector("body").classList.remove("dir_right")
        document.querySelector("body").classList.add("dir_left")
        // document.querySelector(".menu-bar").style.left=0;
        // document.querySelector(".main-content").style.padding="40px 40px 40px 100px";
        // if(document.querySelector(".main-content").classList.contains('menu-opened')){
        //     document.querySelector(".main-sidebar").classList.add("opened_left")
        //     document.querySelector(".main-sidebar").classList.remove("opened_right")
        // }
    }
    else{
        localStorage.setItem("direction", "dir_right");
        document.querySelector("body").classList.add("dir_right")
        document.querySelector("body").classList.remove("dir_left")
        // document.querySelector(".menu-bar").style.right=0;
        // document.querySelector(".main-content").style.padding="40px 100px 40px 40px";
        // if(document.querySelector(".main-content").classList.contains('menu-opened')){
        //     document.querySelector(".main-sidebar").classList.add("opened_right")
        //     document.querySelector(".main-sidebar").classList.remove("opened_left")
        // }
    }
    // if(window.innerWidth<1024){
    //     if(document.querySelector("body").classList.contains("dir_left")){
    //         document.querySelector("#sidebar").classList.remove("opened_left")
    //         document.querySelector("#sidebar").style.left="-250px"
    //         document.querySelector(".main-content.menu-opened").style.paddingLeft='90px';
    //     }
    //     else{
    //         document.querySelector("#sidebar").classList.remove("opened_right")
    //         document.querySelector("#sidebar").style.right="-250px"
    //         document.querySelector(".main-content.menu-opened").style.paddingRight='90px';
    //     }
    //
    // }
    // Overlay
    $(".ol-hover").hover(function(){
        document.getElementById("overlay").classList.add("show");
    }, function(){
        document.getElementById("overlay").classList.remove("show");
        if(document.querySelector("body").classList.contains("dir_left")){
            document.querySelector(".ul_mobile_account").style.right="-100vw";
            document.querySelector(".ul_mobile_account").style.left="unset";
        }
        else{
            document.querySelector(".ul_mobile_account").style.left="-100vw";
            document.querySelector(".ul_mobile_account").style.right="unset";
        }
    });

    $(".overlay").click(function(){
        hideNotifications();
    });

    $(".messages").click(function(){
        closeChatInfo();
    });
    $('.messages-container').scrollTop($('.messages-container')[0].scrollHeight);
});

// let menu_opened = true;
// function changeMenuStyle(){
//     debugger
//     if(menu_opened == true){
//         closeSidebar();
//     }else{
//         openSidebar();
//     }
// }
// function openSidebar(){
//     debugger
//     if(document.querySelector("body").classList.contains("dir_left")){
//         document.getElementById("menu-btn").classList.add("opened_left");
//         document.getElementById("sidebar").classList.add("opened_left");
//         document.getElementById("menu-bar").classList.remove("opened_right");
//         document.getElementById("sidebar-toggle").classList.add("opened_left");
//         document.getElementById("main-content").classList.add("menu-opened");
//     }
//     else{
//         document.getElementById("menu-btn").classList.add("opened_right");
//         document.getElementById("sidebar").classList.add("opened_right");
//         document.getElementById("menu-bar").classList.remove("opened_left");
//         document.getElementById("sidebar-toggle").classList.add("opened_right");
//         document.getElementById("main-content").classList.add("menu-opened");
//     }
//
//     document.getElementById("mbtn-label").innerHTML = "مخفی کردن منو";
//     menu_opened = true;
// }
// function closeSidebar(){
//     if(document.querySelector("body").classList.contains("dir_left")){
//         document.getElementById("menu-btn").classList.remove("opened_left");
//         document.getElementById("sidebar").classList.remove("opened_left");
//         document.getElementById("menu-bar").classList.remove("opened_left");
//         document.getElementById("sidebar-toggle").classList.remove("opened_left");
//         document.getElementById("main-content").classList.remove("menu-opened");
//     }
//     else{
//         document.getElementById("menu-btn").classList.remove("opened_right");
//         document.getElementById("sidebar").classList.remove("opened_right");
//         document.getElementById("menu-bar").classList.remove("opened_right");
//         document.getElementById("sidebar-toggle").classList.remove("opened_right");
//         document.getElementById("main-content").classList.remove("menu-opened");
//     }
//     document.getElementById("mbtn-label").innerHTML = "نمایش منو";
//     menu_opened = false;
// }

// DarkMode
let body = document.body;

// Theme Colors
let light = ":root{\n" +
    "    --primary:     #4053BA;\n" +
    "    --accent:      #FF982E;\n" +
    "    --primary-op:  #4053ba21;\n" +
    "    --background1: #F8F8F8;\n" +
    "    --background2: #ffffff;\n" +
    "    --color1:      #474747;\n" +
    "    --color2:      #ffffff;\n" +
    "    --color3:      #7C7C7C;\n" +
    "    --color4:      #D3D3D3;\n" +
    "    --hover1:      #ffffff1a;\n" +
    "    --hover2:      #4053ba12;\n" +
    "    --hover3:      #4053ba0a;\n" +
    "    --hover4:      #ff982e1f;\n" +
    "    --shadow1:       0px 4px 30px rgba(0, 0, 0, 0.03);\n" +
    "    --shadow-accent: 0 5px 15px #ff982e3b;\n" +
    "    --shadow-primary:0 5px 15px #4053ba6b;\n" +
    "}";
let dark = ":root{\n" +
    "    --primary:     #424e8f;\n" +
    "    --accent:      #FF982E;\n" +
    "    --primary-op:  #4053ba21;\n" +
    "    --background1: #131c26;\n" +
    "    --background2: #202e3d;\n" +
    "    --color1:      #ffffff;\n" +
    "    --color2:      #ffffff;\n" +
    "    --color3:      #ffffff;\n" +
    "    --color4:      #D3D3D3;\n" +
    "    --hover1:      #ffffff1a;\n" +
    "    --hover2:      #ffffff12;\n" +
    "    --hover3:      #ffffff08;\n" +
    "    --hover4:      #ff982e1f;\n" +
    "    --shadow1:       0px 4px 30px rgba(0, 0, 0, 0.03);\n" +
    "    --shadow-accent: 0 5px 15px #ff982e3b;\n" +
    "    --shadow-primary:0 5px 15px #424e8f57;\n" +
    "}";

// DarkMode settings
function setDarkMode(){
    document.getElementById("colors").innerHTML = dark;
    document.querySelector(".DC_theme_btn i").classList.add("fa-moon")
    document.querySelector(".DC_theme_btn i").classList.remove("fa-sun")
    body.classList.add("dark");
    body.classList.remove("light");
}
function setLightMode(){
    document.getElementById("colors").innerHTML = light;
    document.querySelector(".DC_theme_btn i").classList.remove("fa-moon")
    document.querySelector(".DC_theme_btn i").classList.add("fa-sun")
    body.classList.remove("dark");
    body.classList.add("light");
}
var ThemeStyle = localStorage.getItem("themeStyle");
if (ThemeStyle === 'dark'){
    setDarkMode();
}else{
    setLightMode();
}
function changeStyle(){
    if (ThemeStyle === 'dark'){
        ThemeStyle = "light";
        setLightMode();
        localStorage.setItem("themeStyle",ThemeStyle);
    }else{
        ThemeStyle = "dark";
        setDarkMode();
        localStorage.setItem("themeStyle",ThemeStyle);
    }
}


// Show Notifications
function showNotifications(){
    document.getElementById("notifications").classList.add("show");
    document.getElementById("overlay").classList.add("show");
}
function hideNotifications(){
    document.getElementById("notifications").classList.remove("show");
    document.getElementById("overlay").classList.remove("show");
}

// Chat INPUT

const input = document.getElementById("msg-input"),
button = document.getElementById("msg-submit"),
message = document.getElementById("msg-message");
if(input){
    input.addEventListener('keyup', function (e) {
        const target = e.target;
        var value = target.textContent || target.innerText;
        value = value.replace(/(\s+)/g, '');
        message.value = value;
    })
}
if(button){
    button.addEventListener('click', function (e) {
        e.preventDefault();
        if(message.value !== '') {
            alert(message.value)
        }

    });
}



// UserInfo Sidebar
function openChatInfo(){
    document.getElementById("main-content").classList.add("chatinfo-opened");
    if(document.querySelector("body").classList.contains("dir_left")){
        document.getElementById("chat-info").classList.add("opened_left");
    }
    else{
        document.getElementById("chat-info").classList.add("opened_right");
    }
}
function closeChatInfo(){
    document.getElementById("main-content").classList.remove("chatinfo-opened");
    if(document.querySelector("body").classList.contains("dir_left")){
        document.getElementById("chat-info").classList.remove("opened_left");
    }
    else{
        document.getElementById("chat-info").classList.remove("opened_right");
    }
}
// jafari

// document.querySelector(".direction-btn").addEventListener("click",function (){
//
//         if(document.querySelector("body").classList.contains("dir_left")){
//             localStorage.setItem("direction", "dir_right");
//             document.querySelector("body").classList.add("dir_right")
//             document.querySelector("body").classList.remove("dir_left")
//             document.querySelector(".menu-bar").style.right=0;
//             document.querySelector(".main-content").style.padding="40px 100px 40px 40px";
//             document.querySelector(".main-sidebar").classList.add("opened_right")
//             document.querySelector(".main-sidebar").classList.remove("opened_left")
//             // document.querySelector(".main-sidebar").style.left="unset";
//         }
//         else{
//             localStorage.setItem("direction", "dir_left");
//             document.querySelector("body").classList.remove("dir_right")
//             document.querySelector("body").classList.add("dir_left")
//             document.querySelector(".menu-bar").style.left=0;
//             document.querySelector(".main-content").style.padding="40px 40px 40px 100px";
//             document.querySelector(".main-sidebar").classList.add("opened_left")
//             document.querySelector(".main-sidebar").classList.remove("opened_right")
//             // document.querySelector(".main-sidebar").style.right="unset";
//         }
//
// })
document.querySelector(".account-menu-mobile").addEventListener("click",function (){

    if(document.querySelector("body").classList.contains("dir_left")){
        document.querySelector(".ul_mobile_account").style.right="0";
        document.querySelector(".ul_mobile_account").style.left="unset";
    }
    else{
        document.querySelector(".ul_mobile_account").style.left="0";
        document.querySelector(".ul_mobile_account").style.right="unset";
    }
})
$(".table-menu").on("click",function (){
   $("#main-content .infobox").css("display","none")
    let ind=$(this).attr("data-index");
    $("#main-content .infobox").each(function (){
        if($(this).att("data-index")==ind){
            $(this).css("display","block")
        }
    })
})

