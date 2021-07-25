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
        case "add":
            if(!empty($_POST["quantity"])) {


                $result = mysqli_query($connection, "SELECT * FROM laptop WHERE code='" . $_GET["code"] . "'");
                while($row=mysqli_fetch_assoc($result)) {
                    $resultset[] = $row;
                }

                if(!empty($resultset)){ $productByCode = $resultset; }


                $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));

                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["code"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
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
        <p><a class="c" href="laptop.php" >Laptop</a></p>
        <p><a class="b" href="billentyu.php" >Billentyűzet</a></p>
        <p><a class="b" href="eger.php" >Egér</a></p>
        <p><a class="b" href="monitor.php" >Monitor</a></p>
        <p><a class="b" href="kosar.php">Kosár</a></p>
        <p><a class="b" href="kijelentkezve.php" >kijelentkezés</a></p>
    </aside>
    <main style="background-image: url('img/indexhatter.jpg')">
        <div id="content-box">
            <h2> Laptopok </h2>
        </div><br><br>

        <div style="margin-left: 30px">
            <?php

            $res = mysqli_query($connection, "SELECT * FROM laptop ORDER BY id ASC");
            while($row=mysqli_fetch_assoc($res)) {
                $resul[] = $row;
            }

            if(!empty($resul)){ $product_array = $resul; }

            if (!empty($product_array)) {
                foreach($product_array as $key=>$value){
                    ?>
                    <div class="product-item">
                        <form method="post" action="laptop.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                            <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
                            <div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
                            <div class="product-price"><?php echo "huf ".$product_array[$key]["price"]; ?></div>
                            <div><input type="text" name="quantity" value="1" size="2" />
                                <input type="submit" value="Kosárba tesz" class="btnAddAction" /></div>
                        </form>
                    </div>
                    <?php
                }
            }
            mysqli_close($connection);
            ?>
        </div>


    </main>
</section>

<?php

include('footer.php');

?>

</body>
</html>