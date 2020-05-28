<?php

ob_start();

$connect = mysqli_connect('localhost', 'root', '','konyv');
$query = "SET NAMES utf8";
mysqli_query($connect,$query);

if (!$connect) {
    die("Adatbázis hiba: " . mysqli_connect_error());
  }


?>