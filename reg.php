<?php
include("connect.php");
$query = mysqli_query($connection,"SELECT * FROM regisztracio");
$adat = mysqli_fetch_assoc($query);

$nev = $_POST['nev'];
$jelszo1 = $_POST['jelszo1'];
$jelszo2 = $_POST['jelszo2'];
$email = $_POST['email'];
$szetszed = explode("@", $email);
$valos_email = $szetszed[1];

$query1 = mysqli_query($connection,"SELECT * FROM regisztracio WHERE nev='$nev'");
$adat1 = mysqli_fetch_assoc($query1);
$query2 = mysqli_query($connection, "SELECT * FROM regisztracio WHERE email='$email'");
$adat2 = mysqli_fetch_assoc($query2);

$letezik_email = $adat2['email'];
$letezik_nev = $adat1['nev'];

if($nev == ""){
    echo "A név nem lehet üres";
}else{
    if($jelszo1 == ""){
        echo "A jelszó nem lehet üres";
    }else{
        if($jelszo2 == ""){
            echo "A jelszó nem lehet üres";
        }else{
            if($email == ""){
                echo "Az email nem lehet üres";
            }else{
                if($jelszo1 !== $jelszo2){
                    echo "Nem azonos a két jelszó";
                }else{
                    if($valos_email == ""){
                        echo "Ez egy érvénytelen email cím";
                    }else{
                        if($letezik_nev == ""){
                            if($letezik_email == ""){

                                $result = mysqli_query($connection,"INSERT INTO regisztracio (nev ,jelszo ,email)
									VALUES ('$nev', '$jelszo1', '$email')");

                                header('Location: belepes.php');

                            }else{
                                echo "Ez az email cím már használatban van";
                            }
                        }else{
                            echo "Ez a felhasználónév már foglalt";
                        }
                    }
                }
            }
        }
    }
}


/*
echo "<br>";echo "<br>";echo "<br>";
echo $nev; echo "<br>";
echo $jelszo1; echo "<br>";
echo $jelszo2; echo "<br>";
echo $email; echo "<br>";
echo $adat1["nev"]; echo "<br>";
echo $adat2["email"]; echo "<br>";

*/

?>