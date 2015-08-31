<?php
include 'part/translation.php';
?>
<div class="detail" >


    <?php
    require_once './connect.php';

    $stmt = $conn->prepare('SELECT obsah, foto, nazev, podkategorie, material, kodProduktu FROM detaily WHERE nadpis = ?');
    $stmt->bind_param('s', $_POST["parameter"]);
    $stmt->execute();

    $stmt->bind_result($obsah, $foto, $nazev, $podkategorie, $material, $kodProduktu);
    $zobrazeno = false;

    while ($stmt->fetch()) {
        //echo $obsah;
        $zobrazeno = true;
    }
    $stmt->close();
    ?>
    <div class="kurvaZasrana pulse" style="background-image: url('<?php echo "." . $foto; ?>')">
    </div>



    <div class="detailObsah">

        <div style="display: table; height: 100%; width: 100%; position: relative;">
            <div style="vertical-align: middle;  display: table-cell; margin: 0 22px; text-align: left;">

                <h1 style="text-align: center; margin: 10px 0; text-height: 48px;"><?php echo $nazev; ?></h1>
                <div class="background-contain" style="background-image: url(./img/separator.png); width: 80%; height: 20px; margin: auto;" ></div>

                <p>

                    <?php echo $obsah; ?>
                    <br>
                <div style="margin: 0 auto;  text-align: center;">
                    <!-- <h1><?php /* echo htmlspecialchars($_POST["param"]); */ ?></h1>

                    <img src="./img/foto/separator.png" style="margin: 10px auto; max-width: 400px;">
                    <p>Once upon a midnight dreary...</p> -->
                    <div class="hvr-shutter-out-vertical button-wide button-border" onclick="Cangel.core.setPage('contact')"><?php echo $tr["contact_us"]; ?></div>                    
                </div>
                <br>
            </div>
            <!--
            <p class="datum">24.5.2015</p>
            <h2>Nadpis Novinky</h2>
            <img src="./img/foto/separator.png" style="margin: 10px auto; max-width: 400px;"> 
            <h4>V záři reflektorů: Pět značek světového designu představuje výběr ze sedacího nábytku těch nejlepších světových značek zastupovaných na českém trhu firmou STOPKA. </h4> -->
        </div>
    </div>

