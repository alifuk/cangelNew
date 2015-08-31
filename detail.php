<?php
include 'part/translation.php';
?>
<div class="detail" >


    <?php
    require_once './connect.php';

    $stmt = $conn->prepare('SELECT obsah, foto, nazev, podkategorie, material, kodProduktu, rozmery, foto2, foto3, foto4 FROM detaily WHERE nadpis = ?');
    $stmt->bind_param('s', $_POST["parameter"]);
    $stmt->execute();

    $stmt->bind_result($obsah, $foto, $nazev, $podkategorie, $material, $kodProduktu, $rozmery, $foto2, $foto3, $foto4);
    $zobrazeno = false;

    while ($stmt->fetch()) {
        //echo $obsah;
        $zobrazeno = true;
    }
    $stmt->close();
    ?>
    <div class="kurvaZasrana pulse" style="background-image: url('<?php echo "./img/big/" . $foto; ?>')">
    </div>



    <div class="detailObsah">

        <div style="display: table; height: 100%; width: 100%; position: relative;">
            <div style="vertical-align: middle;  display: table-cell; padding: 0 22px; text-align: left;">

                <h1 style="text-align: center; margin: 10px 0; text-height: 48px;"><?php echo $nazev; ?></h1>
                <!--
                <h4 style="text-align: center;"><?php
                    if (trim($podkategorie) == "brousene") {
                        echo "Hranované sklo";
                    } else {
                        echo $podkategorie;
                    }
                    ?></h4>
                -->
                <div class="background-contain" style="background-image: url(./img/separator.png); width: 80%; height: 20px; margin: auto;" ></div>
                <p>
                <table style="margin: 0;">
                    <tr><td><b>Materiály:</b> </td><td style="margin-left: 10px;"> <?php echo $material; ?></td></tr>
                    <tr><td><b>Design: </b> </td><td> The Studio, 2015</td></tr>                        
                </table><br>

                <b>Detail produktu:</b> <?php echo $obsah; ?>
                <br><br>
                Veškeré produkty jsou dostupné v těch barevných kombinacích, které jsou níže.<br>
                V případě zájmu o tento produkt, nás neváhejte kontaktovat.
                <br><br>
                <b>Rozměry (HxWxD):</b> <?php echo $rozmery; ?><br>
                <b>Kod produktu:</b> <?php echo $kodProduktu; ?><br>
                <b>Ostatní barevné varianty</b>
                </p>
                <div style="margin: 0 auto;  text-align: center;">




                    <?php
                    if (trim($foto2) != "") {
                        $fotoN = $foto2;
                        include './part/detailMinigalerie.php';
                    }
                    if (trim($foto3) != "") {
                        $fotoN = $foto3;
                        include './part/detailMinigalerie.php';
                    }

                    if (trim($foto4) != "") {
                        $fotoN = $foto4;
                        include './part/detailMinigalerie.php';
                    }
                    ?>



                    <!--
                    <img src="./img/small/Rectangle small b.jpg" style="margin: 10px ; max-width: 100px; min-width: 20px;  left: 0;  position: static;  display: inline-block; transform: translate( 0%, 0%);" onclick="vymenFotky('Rectangle small b.jpg')">
                    <img src="./img/foto/image1.jpg" style="margin: 10px ; max-width: 100px; min-width: 20px;  left: 0;  position: static;  display: inline-block; transform: translate( 0%, 0%);">
                    <img src="./img/foto/image1.jpg" style="margin: 10px ; max-width: 100px; min-width: 20px;  left: 0;  position: static;  display: inline-block; transform: translate( 0%, 0%);">

                    -->





                    <!-- <h1><?php /* echo htmlspecialchars($_POST["param"]); */ ?></h1>

                    <img src="./img/foto/separator.png" style="margin: 10px auto; max-width: 400px;">
                    <p>Once upon a midnight dreary...</p> -->




                </div>
                <div class="hvr-shutter-out-vertical button-wide button-border" style="margin: 0 auto; display: block;" onclick="Cangel.core.setPage('contact')">
                    <?php echo $tr["contact_us"]; ?></div> 
            </div>


            <!--
            <p class="datum">24.5.2015</p>
            <h2>Nadpis Novinky</h2>
            <img src="./img/foto/separator.png" style="margin: 10px auto; max-width: 400px;"> 
            <h4>V záři reflektorů: Pět značek světového designu představuje výběr ze sedacího nábytku těch nejlepších světových značek zastupovaných na českém trhu firmou STOPKA. </h4> -->
        </div>
    </div>
</div>



<script>

    function vymenFotky(noveFoto) {
        //$("#kurvaZasrana").hide();

        /*
         var puvodniSrc = $(".detailFotka").attr('src');
         var n = puvodniSrc.lastIndexOf("/");
         var l = puvodniSrc.length;
         var imgName = puvodniSrc.substring(n + 1, l);
         console.log("puvodniSrc:" + puvodniSrc + "n: " + n + " l: " + l + " l-n: " + (l - n));
         $(".detailFotka").attr('src', './img/big/' + noveFoto);
         $("img[data='" + noveFoto + "'").attr('src', puvodniSrc).attr('data', imgName).attr('onclick', "vymenFotky('" + imgName + "')");
         */

        var puvodniSrc = $("div.kurvaZasrana", Cangel.core.$container).css('background-image');
        var puvodniSrc = puvodniSrc.substring(4,puvodniSrc.length-1)
        var n = puvodniSrc.lastIndexOf("/");
        var l = puvodniSrc.length;
        var imgName = puvodniSrc.substring(n + 1, l);
        console.log("puvodniSrc:" + puvodniSrc + "n: " + n + " l: " + l + " l-n: " + (l - n));
        $("div.kurvaZasrana", Cangel.core.$container).css("background-image",'url("./img/big/' + noveFoto + '")');
        
        $("img[data='" + noveFoto + "'").attr('src', puvodniSrc).attr('data', imgName).attr('onclick', "vymenFotky('" + imgName + "')");

    }




</script>
