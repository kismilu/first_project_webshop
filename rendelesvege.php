<?php

session_start();
$nev = $_SESSION["nev"];

if( !isset($_SESSION["nev"])){
    //hiba: nincs bejelentkezve
    header('Location: belepes.php');
}
$name = "Számítógép szalon";
include('header.php');

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
            <h2> Rendelés vége </h2>
        </div><br><br>
        <div style="text-align: center; font-size: 18px">
            Kedves <span style="font-weight: bold; text-decoration: underline"><?php echo $nev ?> </span>, rendelését megkaptuk! Rendelése rögzítésre vár ami pár percet vesz igénybe. Ezt követően email-ben értesítjük!
            <p>Köszönjük hogy minket választott,</p>
            <p style="font-weight: bold; text-decoration: underline">Számítógép Szalon Team.</p>
        </div>


    </main>
</section>
<?php

include('footer.php');

?>
</body>
</html>

