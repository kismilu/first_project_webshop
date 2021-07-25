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
        <a class="c" id="men3" href="szallitas.php" >Szállítás</a>
        <a class="b" id="men4" href="buying.php" >Vásárlási feltételek</a>
    </div>
</nav>

<section>
    <aside>
        <p><a class="b" href="laptop.php" >Laptop</a></p>
        <p><a class="b" href="billentyu.php" >Billentyűzet</a></p>
        <p><a class="b" href="eger.php" >Egér</a></p>
        <p><a class="b" href="monitor.php" >Monitor</a></p>
        <p><a class="b" href="kosar.php">Kosár</a></p>
        <p><a class="b" href="kijelentkezve.php" >kijelentkezés</a></p>
    </aside>
    <main>
        <div id="content-box">
            <h2> Szállítási információk </h2>
        </div> <br>
        <div style="margin-left: 20px; text-indent: 30px;">Az oldalunkon megrendelt termékeket utánvételes (a csomag átvételekor a
            kézbesítőnek fizetendő) küldeményként tudjuk eljuttatni hozzád, amennyiben azt szeretnéd.
            Futárszolgálatunk, a <span style="font-weight: bold">G4S Kft</span> az egész ország területén igénybe vehető. Ha mégis a személyes
            átvételt preferálod, úgy üzletünkben készpénzfizetés ellenében (1067 Budapest xx utca zz.) veheted át a terméket.
        </div>
        <h3 style="margin-left: 20px"> Futárszolgálat </h3>

        <img src="img/haz.png" alt="crashed" style="margin-left: 100px; width:200px; height:230px;">
        <div class="text1">
            Futárszolgálatunk a <span style="font-weight: bold">G4S Futárszolgálat</span> szolgáltatásai keretében igénybevehető.

            <ul>
                <br>
                <li> Házhoz-szállítás minden címre</li> <br>
                <li> Sms értesítő a kiszállítás napján, e-mail értesítés előző este</li> <br>
                <li> Országosan 1 munkanap kézbesítési idő</li>
            </ul>
        </div>

        <div style="margin-left: 20px; text-indent: 30px;">
            Országosan választható a G4S- futárszolgálattal történő kézbesítés.
            A futárszolgálat munkatársai a feladástól számított 24 órán belül
            vállalják a csomagok kézbesítését. Mivel a futárok napközben dolgoznak,
            kérjük, hogy olyan szállítási címet adj meg, ahol <span style="color: red">munkanapokon 9-17 óra
            között </span> át tudja valaki venni a csomagot!
        </div>
        <br>
        <div style="margin-left: 20px; text-indent: 30px;">
            A futárszolgálat munkatársai szükség esetén telefonon is egyeztetnek
            a címzettel, ezért kérünk, hogy a megrendelőlap kitöltésekor olyan telefonszámot
            adj meg, amelyen általában elérhető vagy! Ha a címzett az első kézbesítéskor nem
            tartózkodik a címen, a kézbesítő értesítést hagy a csomag érkezéséről. Ezen az értesítőn
            általában a futár megadja a saját telefonszámát is, hogy egyeztetni lehessen az újabb kézbesítésről.
            Sikertelen kézbesítés esetén a futár másnap ismét megpróbálja kivinni a csomagot.
        </div>


    </main>
</section>

<?php

include('footer.php');

?>

</body>
</html>

