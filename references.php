<?php
include 'part/translation.php';
?>
<div class="navigation" style="position: fixed; right: 0; z-index: 50;">
    <div id="display-up" class="display hvr-push"><img src="./img/up.png"></div>
    <div id="navigation-counter"></div>
    <div id="display-down" class="display hvr-push" style="top: -5px; position:relative;"><img src="./img/down.png"></div>
</div>

<div class="novinka">
    <div style="  width: 60%;  position: relative;  height: 100%;  overflow: hidden;  display: table;  float: left; background-image: url(./img/reference/reymont1.jpg);" class="background-cover">
    </div>
    <div class="novinkaObsah" style="right: 0;">
        <div class='novinkaInner'>
            <p class="datum">7.6.2015</p>
            <h2>Lukáš Rejmont – Trofeje pro surfaře</h2>
            <img src="./img/separator.png" style="margin: 0px auto 10px auto; max-width: 400px;"> 
            <h4>Lukášem jsme byli osloveni k výrobě trofejí v podobě surfařské vlny a medailí pro Quiksilver and Roxy Czech & Slovak Surfing Championship konané ve Francii.</h4>
        </div>
    </div>
</div>

<div class="novinka">
    <div style="  width: 60%;  position: relative;  height: 100%;  overflow: hidden;  display: table;  float: right; background-image: url(./img/reference/bubles.jpg);" class="background-cover">
    </div>

    <div class="novinkaObsah" style="left: 0;">
        <div class='novinkaInner'>

            <p class="datum">7.6.2015</p>
            <h2>Qubus – Yellow vase, Soap bubles</h2>
            <img src="./img/separator.png" style="margin: 10px auto; max-width: 400px;"> 
            <h4>Studiem Qubus jsme byli osloveni k výrobě designových produktů, které se z části tvarovali do forem a z části tvarovaných z volné ruky.</h4>
        </div>
    </div>
</div>

<div class="novinka ">
    <div style="  width: 60%;  position: relative;  height: 100%;  overflow: hidden;  display: table;  float: left; background-image: url(./img/reference/vases1.jpg);" class="background-cover">
    </div>
    <div class="novinkaObsah" style="right: 0;">
        <div class='novinkaInner'>
            <p class="datum">7.6.2015</p>
            <h2>Křehký – Limited colection vases</h2>
            <img src="./img/separator.png" style="margin: 0px auto 10px auto; max-width: 400px;"> 
            <h4>Studiem Křehký jsme byli osloveni k výrobě výrobků z části foukaných do kovových forem a z části tvarovaných z volné ruky.</h4>
        </div>
    </div>
</div>

<div style="height: 30px;">
</div>

<script>
    var $navigation = $(".navigation", Cangel.core.$container);



    var $novinky = Cangel.core.$container.children("div.novinka");
    var pocetNovinek = $novinky.length;
    var pocetStranek = Math.ceil(pocetNovinek / 2);
    var aktualniStranka = 1;

    $("#navigation-counter", Cangel.core.$container).html("<b>" + aktualniStranka + "</b>/" + pocetStranek);

    $navigation.css("top", 50 + Cangel.core.$container.height() / 2 - $navigation.height() / 2);

    var selectedItem = 0;


    $novinky.height(Cangel.core.$container.height() / 2);





    $('#display-up', Cangel.core.$container).on('click', function () {
        up();
    });

    $('#display-down', Cangel.core.$container).on('click', function () {
        down();
    });

    $(function () {
        $(document).keydown(function(event){
            event.preventDefault();
            if(event.keyCode == 40){
                down();
            } 
            
            if(event.keyCode == 38){
                up();
            } 
        });
    });
    /*$(function () {
     var lastScrollTop = 0;
     $(window).scroll(function (event) {
     
     setTimeout(function () {
     enableScroll();
     }, 200);
     
     });
     
     function setPosition() {
     var st = $(this).scrollTop();
     }
     });*/





    function up() {
        selectedItem = selectedItem - 2;
        if (selectedItem < 0) {
            selectedItem = 0;
        }
        aktualniStranka = Math.ceil((selectedItem + 1) / 2);

        var itemToScroll = $novinky.get(selectedItem);
        scrollTo($(itemToScroll).offset().top);
    }

    function down() {
        selectedItem = selectedItem + 2;
        if (selectedItem >= pocetNovinek) {
            selectedItem = pocetNovinek - 1;
        }
        aktualniStranka = Math.ceil((selectedItem + 1) / 2);

        var itemToScroll = $novinky.get(selectedItem);
        scrollTo($(itemToScroll).offset().top);
    }



    function scrollTo(numma) {

        $("#navigation-counter", Cangel.core.$container).html("<b>" + aktualniStranka + "</b>/" + pocetStranek);

        $('body').animate({
            scrollTop: numma - 50
        }, function () {

        });
    }




</script>