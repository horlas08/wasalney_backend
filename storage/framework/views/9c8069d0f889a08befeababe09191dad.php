

<script src=<?php echo e(asset("admin-panel/plugins/jquery/jquery.min.js")); ?>></script>
<script src=<?php echo e(asset("admin-panel/plugins/bootstrap/bootstrap.bundle.min.js")); ?>></script>
<script src=<?php echo e(asset("admin-panel/plugins/bootstrap/bootstrap.min.js")); ?>></script>

<!-- Main Scripts -->
<script src=<?php echo e(asset("admin-panel/scripts/main.js")); ?>></script>

<script>
    <?php if(App\Models\Visit::where('ip','!=',null)->whereYear('date','<', \Carbon\Carbon::now()->year)->exists()): ?>
    $.ajax({url: '/adminpanel/visit/pack'});
    <?php endif; ?>

    function setModalRoute(route){
        document.getElementById('btn-confirm-modal').setAttribute('href',route);
    }
    function onCheckbox(checkbox,route,refresh=false){

        $.ajax({url: route, success: function(result){
                if(result!=true){
                    $(checkbox).prop('checked', !$(checkbox).prop('checked'));
                }
                else {
                    if (refresh)
                        location.reload();
                }
            }});
    }

    $(document).on('click', '.copy', function () {
        let text = $(this).attr('data-text');
        let $temp = $("<input>");
        $("body").append($temp);
        $temp.val(text).select();
        document.execCommand("copy");
        $temp.remove();
    });



    function setRouteUrlValue(inputGroup){
        var title=inputGroup.querySelector('.route-title').value;
        if (title!=''){
            var address=inputGroup.querySelector('.route-address').value;
            inputGroup.querySelector('.route-complete').value=address+'/'+title;
        }
        else
            inputGroup.querySelector('.route-complete').value=null;

    }

    function setRouteTitleFormat(value) {
        value = value.replace('/', "").replace(' ', "");
        return value;
    }

    let lastScrollTop =
        window.pageYOffset || document.documentElement.scrollTop;
    window.addEventListener(
        'scroll',
        function handleScroll() {
            const scrollTopPosition =
                window.pageYOffset || document.documentElement.scrollTop;

            if(scrollTopPosition>140){
                let wid=document.querySelector(".card-body").offsetWidth;
                let style=` height: 58px;position: fixed;top: 0px;background-color: var(--background2);;z-index: 100; width:${wid}px ;    border-radius: 0;border-color:var(--color4)`
                // document.querySelector("#sticky-wrapper .card-header").style.width=wid;
                document.querySelector("#sticky-wrapper .card-header").style=style;
            }
            else{
                document.querySelector("#sticky-wrapper .card-header").style=""

            }

            lastScrollTop =scrollTopPosition <= 0 ? 0 : scrollTopPosition;

        },
        false,
    );

    // sidbar js

    $(".DC_items .DC_item_tabBox").on("click",function (e){


        $(".DC_item_tabBox").removeClass("DC_activeTab");
        $(this).addClass("DC_activeTab")
        if($(this).hasClass("DC_list_item")){
            $(".DC_sidbar_box").addClass("DC_isOpen")
            $(".Dc_sidbar_body .DC_item_acordian").removeClass("DC_activeBoxBody")
            let id=$(this).attr("data_id")
            $(".DC_sidbar_box").find(`#${id}`).addClass("DC_activeBoxBody")
            $("#main-content").addClass("menu-opened")
            $(".sidebar-main-box").addClass("open-side")
            $(".sidebar-main-box").removeClass("close-side")
        }
        else{
            $(".DC_sidbar_box").removeClass("DC_isOpen")
            $(".sidebar-main-box").removeClass("open-side")
            $(".sidebar-main-box").addClass("close-side")
            $(".Dc_sidbar_body .DC_item_acordian").removeClass("DC_activeBoxBody")
            $("#main-content").removeClass("menu-opened")
        }
    })
    $(".DC_acordian_list .DC_text_box_li").on("click",function (){
        let name_ul=$(this).closest("ul").attr("data-name");

        $(`.${name_ul}`).each(function (){
            $(this).removeClass("DC_show_ul")
        })

        if($(this).hasClass("DC_headeer_acordian1")==false){

            if($(this).closest("ul").prev().attr("data-parent")){
                $(this).attr("data-parent",`${$(this).closest("ul").prev().attr("data-parent")},${$(this).closest("ul").prev().attr("id")}`)
            }
            else{
                $(this).attr("data-parent",`${$(this).closest("ul").prev().attr("id")}`)
            }
        }
        // $(".DC_acordian_list .DC_text_box_li").removeClass("")
        if($(this).closest("li").find(".DC_ul:first").hasClass("DC_show_ul")){
            $(this).closest("li").find("ul").removeClass("DC_show_ul")
            $(this).closest("li").find(".DC_angel_icon").css("transform"," rotate(0deg)")

        }
        else {
            $(this).closest("li").find(".DC_ul:first").addClass("DC_show_ul")

            $(this).closest("li").find(".DC_angel_icon.fa-angle-left").css("transform"," rotate(-90deg)")
            $(this).closest("li").find(".DC_angel_icon.fa-angle-right").css("transform"," rotate(90deg)")
        }
    })
    // $(".DC_headeer_acordian2").on("click",function (){
    //     let thisLi=$(this);
    //     $(".DC_headeer_acordian3").each(function (){
    //         debugger
    //         let nx=thisLi.next();
    //         console.log(nx.isEqualNode($(this)))
    //         if(nx.isEqualNode($(this))){
    //             $(this).removeClass("DC_show_ul")
    //         }
    //     })
    // })
    // $(".DC_acordian_list .DC_headeer_acordian").on("click",function (){
    //     if($(this).closest("li").find(".DC_sub_list").hasClass("DC_show_ul")){
    //         $(this).closest("li").find("ul").removeClass("DC_show_ul")
    //         $(this).closest("li").find(".DC_angel_icon").css("transform"," rotate(0deg)")
    //     }
    //     else {
    //         $(this).closest("li").find(".DC_sub_list").addClass("DC_show_ul")
    //         $(this).closest("li").find(".DC_angel_icon.fa-angle-left").css("transform"," rotate(-90deg)")
    //         $(this).closest("li").find(".DC_angel_icon.fa-angle-right").css("transform"," rotate(90deg)")
    //         $(this).closest("li").addClass("menuActive")
    //     }
    // })
    // $(".DC_acordian_list .DC_headeer_acordian2").on("click",function (){
    //     if($(this).closest("li").find(".DC_sub_list_3").hasClass("DC_show_ul")){
    //         $(this).closest("li").find("ul").removeClass("DC_show_ul")
    //
    //     }
    //     else {
    //         $(this).closest("li").find(".DC_sub_list_3").addClass("DC_show_ul")
    //         $(this).closest("li").addClass("menuActive")
    //         if(screen.width<=768){
    //             $(this).closest("li").find(".fa-angle-left").css("transform"," rotate(-90deg)")
    //             $(this).closest("li").find(".fa-angle-right").css("transform"," rotate(90deg)")
    //         }
    //     }
    // })


    $(".DC_item_tabBox ").hover(function(e){

        // console.log($(".DC_items").offsetTop)
        $(this).find(".DC_tooltip_text").css("display", "block");


        setTimeout(()=>{
            $(this).find(".DC_tooltip_text").css("display", "none");
        },700)
    }, function(){
        $(this).find(".DC_tooltip_text").css("display", "none");
    });
    $("#menu-btn").on("click",function (){
        $(".DC_sidbar_box").removeClass("DC_isOpen")
        $("#main-content").removeClass("menu-opened")
        $(".sidebar-main-box").removeClass("open-side")
        $(".sidebar-main-box").addClass("close-side")
    })
    $(body).on("click",function (e){

        if(!e.target.closest("li")){
            $(".DC_ul ").removeClass("DC_show_ul")
            $(".DC_ul").closest("li").find(".DC_angel_icon").css("transform"," rotate(0deg)")

        }
        if(!e.target.closest(".account-menu")){
            $(".account-menu").removeClass("open-ul");
        }

    })
    $(".account-menu").on("click",function (){

        $(this).toggleClass("open-ul")
    })
</script>
<?php /**PATH /home/qozeem/projects/web/wasalney/resources/views/admin-panel/layout/scripts.blade.php ENDPATH**/ ?>