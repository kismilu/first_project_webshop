<?php

session_start();
$nev = $_SESSION["nev"];

if( !isset($_SESSION["nev"])){
    //hiba: nincs bejelentkezve
    header('Location: belepes.php');
}
include ('connect.php');

$result = mysqli_query($connection, "SELECT id, title, text, posted FROM post");

if (!$result) {
    echo "Hiba a lekérdezés végrehajtása során: " . mysqli_error($connection);
    mysqli_close($connection);
    exit;
}


while ($row = mysqli_fetch_array($result)) {

    echo "Feladó: ".$nev."  |||  Hiba címe: ".$row['title'];
    echo "<p></p>";
    echo "Hiba leírás: ".$row['text']."  |||  ".$row['posted'];
    echo "<p>------------</p>";

}

mysqli_close($connection);

?>