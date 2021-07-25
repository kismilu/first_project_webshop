<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Számítógép szalon</title>
    <link rel="stylesheet" href="style3.css" type="text/css">
</head>
<body>
<div style=" color:white ; font-size:20px "> Sikeres kijelentkezés </div>
<div id="content-box">


    <div id="kozep"> Számítógép szalon</div>
    <p></p>
    <form  action="login.php" method="post">
        <div style="text-align: center">Felhasználónév:</div>
        <input id="b" type="text" placeholder="Username" name="nev" autofocus tabindex="1">
        <br>
        <div style="text-align: center">Jelszó:</div>
        <input id="b" type="password" placeholder="Password" name="jelszo" autofocus tabindex="1">
        <br> <br>
        <input id="c" type="submit" name="elkuld_log" value="Belépés">
    </form>
    <p><a href="regisztracio.php"> Regisztráció </a></p>
</div>


</body>
</html>
