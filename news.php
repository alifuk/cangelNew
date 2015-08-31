<?php
include 'part/translation.php';
?>
<div class="navigation" style="position: fixed; right: 0; z-index: 50;">
    <div id="display-up" class="display hvr-push"><img src="./img/up.png"></div>
    <div id="navigation-counter"></div>
    <div id="display-down" class="display hvr-push" style="top: -5px; position:relative;"><img src="./img/down.png"></div>
</div>


<div class="novinka">

    <div style="width: 60%; position: relative; height: 100%; overflow: hidden;  display: table;  float: left; background-image: url(./img/news/start.jpg);" class="background-cover">
    </div>
    <div class="novinkaObsah" style="right: 0;">
        <div class='novinkaInner'>
            <p class="datum">7.6.2015</p>
            <h2>Spuštění webových stránek</h2>
            <img src="./img/separator.png" style="margin: 0px auto 10px auto; max-width: 400px;"> 
            <h4>Firma <b>The Studio</b> spouští nové webové stránky, na kterých jsme pracovali několik měsíců.<br>
                Nové internetové stránky v moderním designu, jsou zaměřeny především na přehledné a aktuální informování našich zákazníků. Na stránkách najdete aktuality z naší činnosti, nabídku služeb, nabídku našich produktů, kontakty a mnoho dalších informací.
                Nově spuštěné stránky budeme průběžně doplňovat, pokud Vám nějaké informace na nových stránkách budou chybět, neváhejte nás kontaktovat s návrhem na vylepšení.    
            </h4>
        </div>
    </div>
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
        selectedItem = selectedItem - 2;
        if (selectedItem < 0) {
            selectedItem = 0;
        }
        aktualniStranka = Math.ceil((selectedItem + 1) / 2);

        var itemToScroll = $novinky.get(selectedItem);
        scrollTo($(itemToScroll).offset().top);
    });

    $('#display-down', Cangel.core.$container).on('click', function () {
        selectedItem = selectedItem + 2;
        if (selectedItem >= pocetNovinek) {
            selectedItem = pocetNovinek - 1;
        }
        aktualniStranka = Math.ceil((selectedItem + 1) / 2);

        var itemToScroll = $novinky.get(selectedItem);
        scrollTo($(itemToScroll).offset().top);

    });

    function scrollTo(numma) {

        $("#navigation-counter", Cangel.core.$container).html("<b>" + aktualniStranka + "</b>/" + pocetStranek);

        $('body').animate({
            scrollTop: numma
        }, function () {

        });
    }


</script>