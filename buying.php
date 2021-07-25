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
        <a class="c" id="men4" href="buying.php" >Vásárlási feltételek</a>
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
            <h2> Vásárlási feltételek </h2>
        </div> <br>
        <div style="margin-left: 20px; margin-right: 10px; text-indent: 30px;">
            Tájékoztatjuk, hogy amennyiben Ön a honlapon keresztül rendel meg tőlünk
            termékeket, úgy a közöttünk létrejövő szerződés tartalmát – a vonatkozó
            kötelező érvényű jogszabályok rendelkezései mellett – a jelen Általános
            Szerződési Feltételek (a továbbiakban: ÁSZF) határozzák meg.

            Ennek megfelelően tartalmazza a jelen ÁSZF az Önt és a SZAMITOGEP.HU KFT-t illető jogokat és kötelezettségeket, a szerződés létrejöttének
            feltételeit, a teljesítési határidőket, a szállítási és fizetési feltételeket,
            a felelősségi szabályokat, valamint az elállási jog gyakorlásának feltételeit.
            Jelen ÁSZF mellékletét képezik a honlapon elérhető tájékoztatók és nyilatkozat-minták,
            valamint a honlapon külön elérhető tájékoztatások.
            <ol type="I">
                <li> <span style="font-weight: bold">Szerződés</span>: Eladó és Vevő között a Honlap és
                    elektronikus levelezés igénybevételével létrejövő adásvételi szerződés
                </li> <br>
                <li> <span style="font-weight: bold"> Vonatkozó jogszabályok: </span> <br>
                    A Szerződésre különösen az alábbi jogszabályok vonatkoznak:<br>
                    1997. évi CLV. törvény a fogyasztóvédelemről;<br>
                    2001. évi CVIII. törvény az elektronikus kereskedelmi szolgáltatások, valamint az
                    információs társadalommal összefüggő szolgáltatások kérdéseiről;<br>
                    2013. évi V. törvény a Polgári Törvénykönyvről (PTK);<br>
                    151/2003. (IX. 22.) Korm. rendelet az egyes tartós fogyasztási cikkekre vonatkozó kötelező jótállásról;<br>
                    45/2014 (II.26) kormányrendelet a fogyasztó és a vállalkozás közötti szerződések részletes szabályairól;<br>
                    19/2014. (IV. 29.) NGM rendelet a fogyasztó és vállalkozás közöttiszerződéskeretébeneladott dolgokra vonatkozó
                    szavatossági és jótállási igények intézésének eljárási szabályairól
                </li> <br>
                <li> <span style="font-weight: bold"> Az ÁSZF elfogadása: </span> <br>
                    Ön a megrendelése véglegesítése előtt köteles megismerni a jelen ÁSZF rendelkezéseit.
                    A www.szalonszerviz.hu honlapon keresztül történő vásárlással Ön elfogadja a jelen ÁSZF rendelkezéseit,
                    és az ÁSZF maradéktalanul az Ön és az Eladó közöttlétrejövő szerződés részét képezi.
                </li> <br>
                <li> <span style="font-weight: bold"> Szerzői jogok: </span> <br>
                    A szerzői jogról szóló 1999. évi LXXVI. törvény (továbbiakban: Szjt.) 1. § (1)
                    bekezdése értelmében a weboldal szerzői műnek minősül, így annak minden része szerzői
                    jogi védelem alatt áll. Az Szjt. 16. § (1) bekezdése alapján tilos a weboldalon
                    található grafikai és szoftveres megoldások, számítógépi programalkotások engedély
                    nélküli felhasználása, illetve bármely olyan alkalmazás használata, amellyel a weboldal,
                    vagy annak bármely része módosítható. A weboldalról és annak adatbázisából bármilyen
                    anyagot átvenni a LAPTOP.HU Kft. írásos hozzájárulás esetén is csak a weboldalra való
                    hivatkozással, forrás feltüntetésével lehet.
                </li>

            </ol>
        </div>
    </main>
</section>
<?php

include('footer.php');

?>
</body>
</html>

