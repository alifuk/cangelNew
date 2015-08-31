
<div id="menu-bottom">

    <span>
        © The Studio 2015
    </span>




    <div style="float: right; width: 195px; height: 100%; padding-right: 15px; position: relative">
        <img src="./img/instagram.png" class="icon-small hvr-push left">
        <img src="./img/pinterest.png" class="icon-small hvr-push left">
        <img src="./img/in.png" class="icon-small hvr-push left">
        <img src="./img/twitter.png" class="icon-small hvr-push left">
        <img src="./img/g.png" class="icon-small hvr-push left">
        <img src="./img/facebook.png" class="icon-small hvr-push left">
    </div>

    <div style="float: right; padding-right: 15px;">        
        <span id="language-button" class="hvr-shutter-out-vertical button-medium left" style="width: 50px;"><?php echo strtoupper($lang); ?>

            <span class="hvr-shutter-out-vertical button-medium move-top left" onclick="window.location.href = './setLanguage.php?lang=cz';">CZ</span>
            <span class="hvr-shutter-out-vertical button-medium move-top left" onclick="window.location.href = './setLanguage.php?lang=en';">EN</span>
            <span class="hvr-shutter-out-vertical button-medium move-top left" onclick="window.location.href = './setLanguage.php?lang=ge';">GE</span>
        </span>
        <span class="hvr-shutter-out-vertical button-medium left" onclick="Cangel.core.setPage('about-us')"><?php echo $tr["onas"]; ?></span>
        <span class="hvr-shutter-out-vertical button-medium left" onclick="Cangel.core.setPage('career')"><?php echo $tr["kariera"]; ?></span>
        <span class="hvr-shutter-out-vertical button-medium left" onclick="Cangel.core.setPage('contact')"><?php echo $tr["kontakt"]; ?></span>
    </div>



</div>

