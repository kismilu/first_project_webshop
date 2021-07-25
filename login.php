<?php
session_start();

include ("connect.php");

$nev = $_POST['nev'];
$jelszo = $_POST['jelszo'];


$query = mysqli_query($connection,"SELECT * FROM regisztracio WHERE nev ='$nev'");
$adat = mysqli_fetch_assoc($query);
$letezik_nev = $adat['nev'];
$letezik_jelszo = $adat['jelszo'];

if($letezik_nev == ""){
    echo "Érvénytelen felhasználónév!";
}else{
    if($nev == $letezik_nev AND $jelszo == $letezik_jelszo){
        $_SESSION['nev'] = $nev;
        header('Location: index.php'); //ide irányít, ha sikeres a login.
    }else{
        echo "Rossz felhasználónév vagy jelszó!";
    }
}

?>