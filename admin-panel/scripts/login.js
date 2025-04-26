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
    // document.getElementById("cs-icon").className = "ic-sun";
    body.classList.add("dark");
}
function setLightMode(){
    document.getElementById("colors").innerHTML = light;
    // document.getElementById("cs-icon").className = "ic-dark";
    body.classList.remove("dark");
}
var ThemeStyle = localStorage.getItem("themeStyle");
if (ThemeStyle === 'dark'){
    setDarkMode();
}else{
    setLightMode();
}
if(localStorage.getItem("direction")=="dir_left"){
    localStorage.setItem("direction", "dir_left");
    document.querySelector("body").classList.remove("dir_right")
    document.querySelector("body").classList.add("dir_left")

    document.querySelector(".login-logo").style.borderRadius="15px 0px 0px 15px";
    document.querySelector("a.back-btn").style.right="40px";
    document.querySelector("a.back-btn").style.left="unset";
}
else{
    localStorage.setItem("direction", "dir_right");
    document.querySelector("body").classList.add("dir_right")
    document.querySelector("body").classList.remove("dir_left")
    document.querySelector("a.back-btn").style.left="40px";
    document.querySelector("a.back-btn").style.right="unset";
    document.querySelector(".login-logo").style.borderRadius="0px 15px 15px 0px";


}
if(window.innerWidth<=425){
    document.querySelector(".login-logo").style.borderRadius="15px 15px 0px 0px";
    if(document.querySelector("body").classList.contains("dir_left")){

        document.querySelector("a.back-btn").style.right="0px";
        document.querySelector("a.back-btn").style.left="unset";
    }
    else{
        document.querySelector("a.back-btn").style.left="0px";
        document.querySelector("a.back-btn").style.right="unset";
    }

}