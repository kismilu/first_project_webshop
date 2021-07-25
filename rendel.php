<?php
session_start();
include("connect.php");

$nev = $_SESSION["nev"];
$enev = $_POST['eredetinev'];
$iranyitoszam = $_POST['iranyitoszam'];
$varos = $_POST['varos'];
$utca = $_POST['hazszam'];
$tel = $_POST['tel'];

$string1='';
$item_total = 0;
foreach ($_SESSION["cart_item"] as $item) {
    $string1 = $string1.$item["quantity"].' db '.$item["name"].' || ';
    $item_total += ($item["price"] * $item["quantity"]);
}

mysqli_query($connection, "INSERT INTO `rendelesek` (`fnev`, `enev`, `iranyitoszam`,`varos`,`utca`,`telefonszam`,`termek`,`összesen`)
 VALUES ('$nev', '$enev', '$iranyitoszam', '$varos', '$utca','$tel', '$string1', '$item_total')");

unset($_SESSION["cart_item"]);
mysqli_close($connection);
header('Location: rendelesvege.php');
?>