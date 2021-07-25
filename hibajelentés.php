<?php

session_start();
$nev = $_SESSION["nev"];

if( !isset($_SESSION["nev"])){
    //hiba: nincs bejelentkezve
    header('Location: belepes.php');
}

if (isset($_POST['title'])) {

    require_once('connect.php');

    if ($stmt = mysqli_prepare($connection, "INSERT INTO post(title, text, posted) VALUES (?, ?, ?)")) {

        $now = date("Y-m-d", time());

        mysqli_stmt_bind_param($stmt, 'sss', $_POST['title'], $_POST['content'], $now);

        if (!mysqli_stmt_execute($stmt)) {
            echo "Hiba a prepared statement végrehajtása során: " . mysqli_stmt_error($stmt);
            mysqli_close($connection);
            exit;
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Hiba a prepared statement létrehozása során: " . mysqli_error($connection);
        mysqli_close($connection);
        exit;
    }

    mysqli_close($connection);
}
$name = "Számítógép szalon";
include('header.php');

?>

<nav>
    <div >
        <a class="b" id="men1" href="index.php" >Főoldal</a>
        <a class="c" id="men2" href="hibajelentés.php" >Hibajelentés</a>
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
        <p><a class="b" href="kosar.php">Kosár</a></p>
        <p><a class="b" href="kijelentkezve.php" >kijelentkezés</a></p>
    </aside>
    <main>
        <div id="content-box">
            <h2> Szervizelés </h2>
        </div> <br> <br>
        <div style="margin-left: 20px; margin-right: 5px; text-indent: 30px">
            Szervizünk bázisát és hibás gépének, alkatrészének cseréjét könnyíti meg webáruházunk,
            ahol az összes gyártó több ezer alkatrészét kínáljuk. Raktárunkból válogathat a vadonatúj,
            gyári alkatrészek mellett, a használt, jó állapotú, kedvezőbb árfekvésű alkatrészek között is.
        </div> <br>
        <div style="margin-left: 20px; margin-right: 5px; text-indent: 30px">
            <div class="transition2">Szamitogepszalon.hu</div> csapata minősített szakemberekből áll. Diagnosztikai és
            technikai eszközeink is elsőrangúak, munkatársaink a legmagasabb színvonalú szolgáltatást nyújtják.
        </div><br>

        <div style="margin-left: 20px; margin-right: 5px; text-indent: 30px">
            Ezért vállalunk <span style="font-weight:bold; color:red;">GARANCIÁT</span> minden általunk szervizelt laptopra, legyen az Fujitsu,
            Toshiba, IBM/Lenovo, Acer, Asus, Sony, HP/Compaq, Dell vagy bármely egyéb gyártó terméke.
        </div> <br>
        <div style="margin-left: 20px; margin-right: 5px; text-indent: 30px">
            A szervizünkbe behozott számítógépeket, laptopokat bevizsgáljuk és megjavításukra
            azonnal ajánlatot teszünk. Nem fogadjuk el a munkadíjat, amennyiben az elvégzett
            munkánkkal nem tudunk érdemi segítséget nyújtani. Mindig az ésszerű, gazdaságos
            megoldásra teszünk javaslatot, a legkisebb munkát is legjobb tudásunk szerint,
            lelkiismeretesen végezzük el. Gyors, pontos, megbízható munkát végzünk.
        </div>
        <div style="margin-left: 20px; margin-right: 5px; text-indent: 30px font-size:">
            <br><b>Amennyiben probléma adódik alkatrészeivel, számítógépével, hardverével a következő ablakban jelentheti: </b>
        </div>

        <br>

        <div style="text-align: center;">
            <form method="post" action="">
                <fieldset>
                    <legend>Hibajelentés</legend>
                    <div >
                    <label for="post-title">Cím: </label>
                        <input type="text" name="title" id="post-title" value="" placeholder="tárgy" maxlength="50" autofocus tabindex="1" />
                    </div><br>
                    <label for="post-content">Tartalom: </label>
                    <div >
                        <textarea name="content" placeholder="leírás.."></textarea>
                    </div>
                    <div class="submit-field">
                        <input type="submit" value="Küldés">
                    </div>

                </fieldset>
            </form>
        </div>
    </main>
</section>

        <?php

            include('footer.php');

        ?>

    </body>
</html>
