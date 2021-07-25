<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Számítógép szalon </title>
    <link rel="stylesheet" href="style2.css" type="text/css">
</head>
<body>
<div id="content-box">
    <br> <div id="kozep"> Számítógép szalon </div>
    <h3> Adatok </h3>


    <form action="reg.php" method="POST">
        Felhasználónév:<br>
            <input type="text" name="nev" placeholder="userid" required autofocus tabindex="1" /> <br><br>

        Jelszó:<br>
            <input type="password" name="jelszo1" placeholder="password" id="pwid" required autofocus tabindex="1" /> <br><br>
        Jelszó mégegyszer:<br>
            <input type="password" name="jelszo2" placeholder="password" id="pwid" required autofocus tabindex="1" /> <br><br>
        E-mail:<br>
            <input type="email" name="email" value="" placeholder="E-mail" tabindex="1" required /> <br><br>

        <p> A Regisztráció gombra kattintva visszairányítjuk a belépő oldalra ahol aktiválás nélkül bejelentkezhet. </p>
        <br>
        <input id="c" type="submit" name="elkuld" value="Regisztráció">

    </form>

    <p><a href="belepes.php"> vissza </a></p>

</div>


</body>
</html>