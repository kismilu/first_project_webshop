<?php
const DATABASE_URL = "localhost";
const DATABASE_USER = "root";
const DATABASE_PW = "";
const DATABASE_NAME = "SZMWACT";

$connection = @mysqli_connect(DATABASE_URL, DATABASE_USER, DATABASE_PW, DATABASE_NAME);


// Ha nem létezik az adatbázis, akkor 1049 hibakódot kapunk
if (mysqli_connect_errno() == 1049) {

    // Új kapcsolat nyitása alapértelmezett adatbázis nélkül
    $connection = @mysqli_connect(DATABASE_URL, DATABASE_USER, DATABASE_PW);

    // Adatbázis létrehozása
    if (!mysqli_query($connection, "CREATE DATABASE IF NOT EXISTS ".DATABASE_NAME)) {
        echo "Adatbázis létrehozása sikertelen!";
        exit;
    }

    // Újonnan létrehozott adatbázis kiválasztása
    mysqli_select_db($connection, DATABASE_NAME);

    // Táblák létrehozása
    if (!mysqli_query($connection, <<<EOD
CREATE TABLE IF NOT EXISTS `regisztracio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nev` text COLLATE utf8_unicode_ci NOT NULL,
  `jelszo` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;
EOD
    )) {
        echo "A regisztráció tábla létrehozása sikertelen!";
        exit;
    }
    if (!mysqli_query($connection, <<<EOD
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `posted` date NOT NULL,
  PRIMARY KEY (`id`)
)
EOD
    )) {
        echo "A post tábla létrehozása sikertelen!";
        exit;
    }

    if (!mysqli_query($connection, <<<EOD
CREATE TABLE IF NOT EXISTS `termekek` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
)
EOD
    )) {
        echo "A termekek tábla létrehozása sikertelen!";
        exit;
    }
    if (!mysqli_query($connection, <<<EOD
CREATE TABLE IF NOT EXISTS `rendelesek` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `fnev` varchar(255) NOT NULL,
  `enev` varchar(255) NOT NULL,
  `iranyitoszam` int(5) NOT NULL,
  `varos` VARCHAR (255) NOT NULL,
  `utca` text NOT NULL,
  `telefonszam` int NOT NULL,
  `termek` text NOT NULL,
  `összesen` int NOT NULL,
  PRIMARY KEY (`id`)
)
EOD
    )) {
        echo "A termekek tábla létrehozása sikertelen!";
        exit;
    }

    if (!mysqli_query($connection, <<<EOD
CREATE TABLE IF NOT EXISTS `egerek` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
)
EOD
    )) {
        echo "Az egerek tábla létrehozása sikertelen!";
        exit;
    }
    if (!mysqli_query($connection, <<<EOD
CREATE TABLE IF NOT EXISTS `monitorok` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
)
EOD
    )) {
        echo "Az monitorok tábla létrehozása sikertelen!";
        exit;
    }
    if (!mysqli_query($connection, <<<EOD
CREATE TABLE IF NOT EXISTS `laptop` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
)
EOD
    )) {
        echo "Az monitorok tábla létrehozása sikertelen!";
        exit;
    }
    if (!mysqli_query($connection, <<<EOD
CREATE TABLE IF NOT EXISTS `billentyu` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
)
EOD
    )) {
        echo "Az monitorok tábla létrehozása sikertelen!";
        exit;
    }
    //billentyu feltöltés
    mysqli_query($connection, "INSERT INTO `billentyu` (`id`, `name`, `code`, `image`, `price`) VALUES
    (1, 'bill1', 'mon1', 'img/billentyuzet/bill1.jpg', 20000),
    (2, 'bill2', 'mon2', 'img/billentyuzet/bill2.jpg', 20000),
    (3, 'bill3', 'mon3', 'img/billentyuzet/bill3.jpg', 20000),
    (4, 'bill4', 'mon4', 'img/billentyuzet/bill4.jpg', 20000),
    (5, 'bill5', 'mon5', 'img/billentyuzet/bill5.jpg', 20000),
    (6, 'bill6', 'mon6', 'img/billentyuzet/bill6.jpg', 20000),
    (7, 'bill7', 'mon7', 'img/billentyuzet/bill7.jpg', 20000),
    (8, 'bill8', 'mon8', 'img/billentyuzet/bill8.jpg', 20000),
    (9, 'bill9', 'mon9', 'img/billentyuzet/bill9.jpg', 20000),
    (10, 'bill10', 'mon10', 'img/billentyuzet/bill10.jpg', 20000);");
    //laptop feltöltés
    mysqli_query($connection, "INSERT INTO `laptop` (`id`, `name`, `code`, `image`, `price`) VALUES
    (1, 'laptop1', 'mon1', 'img/laptop/lap1.jpg', 99999),
    (2, 'laptop2', 'mon2', 'img/laptop/lap2.jpg', 99999),
    (3, 'laptop3', 'mon3', 'img/laptop/lap3.jpg', 99999),
    (4, 'laptop4', 'mon4', 'img/laptop/lap4.jpg', 99999),
    (5, 'laptop5', 'mon5', 'img/laptop/lap5.jpg', 99999),
    (6, 'laptop6', 'mon6', 'img/laptop/lap6.jpg', 99999),
    (7, 'laptop7', 'mon7', 'img/laptop/lap7.jpg', 99999),
    (8, 'laptop8', 'mon8', 'img/laptop/lap8.jpg', 99999),
    (9, 'laptop9', 'mon9', 'img/laptop/lap9.jpg', 99999),
    (10, 'laptop10', 'mon10', 'img/laptop/lap10.jpg', 99999);");
    //monitorok feltöltés
    mysqli_query($connection, "INSERT INTO `monitorok` (`id`, `name`, `code`, `image`, `price`) VALUES
    (1, 'mon1', 'mon1', 'img/monitorok/mon1.jpg', 21999),
    (2, 'mon2', 'mon2', 'img/monitorok/mon2.jpg', 32572),
    (3, 'mon3', 'mon3', 'img/monitorok/mon3.jpg', 21999),
    (4, 'mon4', 'mon4', 'img/monitorok/mon4.jpg', 32572),
    (5, 'mon5', 'mon5', 'img/monitorok/mon5.jpg', 21999),
    (6, 'mon6', 'mon6', 'img/monitorok/mon6.jpg', 32572),
    (7, 'mon7', 'mon7', 'img/monitorok/mon7.jpg', 21999),
    (8, 'mon8', 'mon8', 'img/monitorok/mon8.jpg', 32572),
    (9, 'mon9', 'mon9', 'img/monitorok/mon9.jpg', 21999),
    (10, 'mon10', 'mon10', 'img/monitorok/mon10.jpg', 21999);");
    //egerek feltöltés
    mysqli_query($connection, "INSERT INTO `egerek` (`id`, `name`, `code`, `image`, `price`) VALUES
    (1, 'eger1', 'eger1', 'img/egerek/eger1.jpg', 7999),
    (2, 'eger2', 'eger2', 'img/egerek/eger2.jpg', 7999),
    (3, 'eger3', 'eger3', 'img/egerek/eger3.jpg', 7999),
    (4, 'eger4', 'eger4', 'img/egerek/eger4.jpg', 7999),
    (5, 'eger5', 'eger5', 'img/egerek/eger5.jpg', 7999),
    (6, 'eger6', 'eger6', 'img/egerek/eger6.jpg', 7999),
    (7, 'eger7', 'eger7', 'img/egerek/eger7.jpg', 7999),
    (8, 'eger8', 'eger8', 'img/egerek/eger8.jpg', 7999),
    (9, 'eger9', 'eger9', 'img/egerek/eger9.jpg', 14995),
    (10, 'eger10', 'eger10', 'img/egerek/eger10.jpg', 7999);");

    //Feltöltés
    mysqli_query($connection, "INSERT INTO `termekek` (`id`, `name`, `code`, `image`, `price`) VALUES
    (1, 'Acer F5', 'laptop1', 'img/termek/acerf5.jpg', 94350),
    (2, 'AlienWare 13', 'laptop2', 'img/termek/AlienWare13.jpg', 249880),
    (3, 'Asus 22 monitor', 'monitor1', 'img/termek/asus22.png', 30560),
    (4, 'Asus 1', 'laptop3', 'img/termek/asus1.jpg', 199500),
    (5, 'Logitech Billentyűzet', 'bill1', 'img/termek/bill1.jpg', 7980),
    (6, 'HP Pavilon', 'lapto4', 'img/termek/hp.jpg', 179995),
    (7, 'HP 23 monitor', 'monitor2', 'img/termek/Hp23.jpg', 29995),
    (8, 'Logitech Egér mx620', 'eger1', 'img/termek/logitech_mx620.jpg', 4995),
    (9, 'Logitech Gamer Egér g300', 'eger2', 'img/termek/logitech-g300-gaming-mouse-1-b.jpg', 14995),
    (10, 'Mackbook', 'laptop5', 'img/termek/mackbook.jpg', 299995);");

}

if (mysqli_connect_errno()) {
    echo "Hiba az adatbázishoz kapcsolódás során." . PHP_EOL;
    echo "Hibakód: " . mysqli_connect_errno() . PHP_EOL;
    echo "Hiba üzenet: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


