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
        <div id="content-box">
            <h2> Vásárlás </h2>
        </div><br>

        <table style="color: black">
            <tr>
                <td>
                    <fieldset style="margin-left: 40px; height: 250px">
                        <legend style="font-weight: bold">Szállítási adatok:  </legend>

                        <form method="post" action="rendel.php">
                            <label>Név: <input type="text" name="eredetinev" placeholder="Név" maxlength="20" required autofocus tabindex="1" /></label>
                            <br><br>
                            <label>Irányítószám: <input type="number" name="iranyitoszam" placeholder="1234" required maxlength="4" autofocus tabindex="1" /></label>
                            <br><br>
                            <label>Város: <input type="text" name="varos" placeholder="Budapest" maxlength="20" required autofocus tabindex="1" /></label>
                            <br><br>
                            <label>Utca, házszám: <input type="text" name="hazszam" placeholder="Kossuth u. 20"  required maxlength="20" autofocus tabindex="1" /></label>
                            <br><br>
                            <label>Telefonszám <input type="number" name="tel" placeholder="06701212311" maxlength="11" required autofocus tabindex="1" /></label>
                            <br><br>


                            <div>Szállítás/Fizetés: </div>
                            <label for="szallitas">Utánvétel </label>
                            <input type="radio" id="szallitas" name="szallitas" value="1" checked/>
                            <div style="text-align: right; "><input class="btnAddAction" type="submit" name="rendel" value="Megrendelem"></div>
                        </form>


                    </fieldset>
                </td>
                <td>
                    <fieldset style="margin-left: 40px; height: 230px; width: 170px">
                        <legend style="font-weight: bold; text-align: center">Rendelésed:  </legend><br>
                        <?php
                        $item_total = 0;
                        foreach ($_SESSION["cart_item"] as $item){
                                echo $item["quantity"]." db ".$item["name"];
                                $item_total += ($item["price"] * $item["quantity"]); ?> <br> <?php
                            }
                        ?><br>
                        <div style="font-weight: bold; font-size: 20px">
                        <?php
                        echo "Fizetendő: ";?>

                        <br>

                        <?php
                        echo $item_total." huf";
                        ?>
                        </div>
                    </fieldset>
                </td>
            </tr>
            <br><br>
            <div style="margin-left: 40px; color: green;">
                <span style="font-weight: bold">FIGYELEM!</span> A Megrendelem gombra kattintva a
                <span style="text-decoration: underline">Feltételeket</span>
                illetve az <span style="text-decoration: underline">Adatvédelmi nyilatkozatot</span> elfogadja, és
                rendelését véglegesíti!
            </div>



        </table>

    </main>
</section>

<?php

include('footer.php');

?>

</body>
</html>