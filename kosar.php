<?php

session_start();
$nev = $_SESSION["nev"];

if( !isset($_SESSION["nev"])){
    //hiba: nincs bejelentkezve
    header('Location: belepes.php');
}
$name = "Számítógép szalon";
include('header.php');
include('connect.php');

if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}


?>

<nav>
    <div >
        <a class="b" id="men1" href="index.php" >Főoldal</a>
        <a class="b" id="men2" href="hibajelentés.php" >Hibajelentés</a>
        <a class="b" id="men3" href="szallitas.php" >Szállítás</a>
        <a class="b" id="men4" href="buying.php" >Vásárlási feltételek</a>

    </div>

</nav>

<section>
    <aside>
        <p><a class="b" href="laptop.php" >Laptop</a></p>
        <p><a class="b" href="billentyu.php" >Billentyűzet</a></p>
        <p><a class="b" href="eger.php" >Egér</a></p>
        <p><a class="b" href="monitor.php" >Monitor</a></p>
        <p><a class="c" href="kosar.php">Kosár</a></p>
        <p><a class="b" href="kijelentkezve.php" >kijelentkezés</a></p>
    </aside>
    <main>
        <div id="shopping-cart">
            <div class="txt-heading">Kosár tartalma <a id="btnEmpty" href="kosar.php?action=empty">Kosár ürítése</a></div>
            <?php
            if(isset($_SESSION["cart_item"])){
                $item_total = 0;
                ?>
                <table cellpadding="10" cellspacing="1" style="color: black; margin-left: 30px">
                    <tbody>
                    <tr >
                        <th style="text-align:left;"><strong>Név</strong></th>
                        <th style="text-align:left;"><strong>Kód</strong></th>
                        <th style="text-align:right;"><strong>Mennyiség</strong></th>
                        <th style="text-align:right;"><strong>Ár</strong></th>
                        <th style="text-align:center;"><strong>Művelet</strong></th>
                    </tr>
                    <?php
                    foreach ($_SESSION["cart_item"] as $item){
                        ?>
                        <tr>
                            <td style="text-align:left;border-bottom:red 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
                            <td style="text-align:left;border-bottom:red 1px solid;"><?php echo $item["code"]; ?></td>
                            <td style="text-align:right;border-bottom:red 1px solid;"><?php echo $item["quantity"]; ?></td>
                            <td style="text-align:right;border-bottom:red 1px solid;"><?php echo "huf ".$item["price"]; ?></td>
                            <td style="text-align:center;border-bottom:red 1px solid;"><a href="kosar.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Törlés </a></td>
                        </tr>
                        <?php
                        $item_total += ($item["price"]*$item["quantity"]);
                    }
                    ?>

                    <tr>
                        <td style="border-bottom:red 1px solid;" colspan="5" align=right><strong>Összesen:</strong> <?php echo $item_total." huf"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="5" align=right> <a href="vasar.php" class="btnAddAction" > Tovább a fizetéshez </a></td>

                    </tr>
                    </tbody>
                </table>
                <?php
            }
            ?>

        </div>





    </main>
</section>

<?php

include('footer.php');

?>

</body>
</html>