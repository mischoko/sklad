<?php

require 'start.php';

if (!empty($_POST)){
    $kod    = !empty($_POST['kod']) ? htmlentities($_POST['kod']) : "";
    $nazov  = !empty($_POST['nazov']) ? htmlentities($_POST['nazov']) : "";
    $cena   = !empty($_POST['cena']) ? htmlentities($_POST['cena']) : "";
    $znacka = !empty($_POST['znacka']) ? htmlentities($_POST['znacka']) : "";


    $insertPage = $db->prepare("
        INSERT INTO products (code, name, price, brand, created)
        VALUES (:kod, :nazov, :cena, :znacka, NOW())
    ");

    $insertPage->execute([
        'kod'   => $kod,
        'nazov' => $nazov,
        'cena'  => $cena,
        'znacka'   => $znacka,
    ]);
    header('location: login.php');
}
?>