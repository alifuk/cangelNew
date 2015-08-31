<?php
include 'part/translation.php';
?>
<?php
$img = "";
switch (htmlspecialchars($_POST["parameter"])) {
    case "grinded":
        $img = "./img/produktyMenu/hranovane.jpg";
        break;
}
?>

<div class="category-header background-cover" style="background-image: url(<?php echo $img ?>)">
    <h1 class="produktText text-center" style="font-size:50px; line-height: 50px;">
        <?php echo $tr[htmlspecialchars($_POST["parameter"])]; ?>
    </h1>
</div>



<div  class="product-bar" class="">



    <?php
    require_once './connect.php';

    $stmt = $conn->prepare("SELECT nadpis, nadpis, foto FROM detaily WHERE podkategorie = ?");
    $stmt->bind_param('s', $podKategorie);

    $podKategorie = htmlspecialchars($_POST["parameter"]);

    $stmt->execute();
    $stmt->bind_result($nazev, $nadpis, $foto);
    while ($stmt->fetch()) {
        include './part/product-preview.php';
    }
    $stmt->close();
    ?>


    <!--   
    <td onclick="zobraz('detail', 'bowl')">
        <div class="sProdukt pulseHover">
            <img src="./img/small/Beveling bowl.jpg"  >
            <h4>Beveling bowl</h4>

        </div>
    </td>

    -->


</div>
