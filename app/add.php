<?php

require 'start.php';

if (!empty($_POST)){
    $kod    = !empty($_POST['kod']) ? htmlentities($_POST['kod']) : "";
    $nazov  = !empty($_POST['nazov']) ? htmlentities($_POST['nazov']) : "";
    $cena   = !empty($_POST['cena']) ? htmlentities($_POST['cena']) : "";
    $znacka = !empty($_POST['znacka']) ? htmlentities($_POST['znacka']) : "";
    $typ    = !empty($_POST['typ']) ? htmlentities($_POST['typ']) : "";


    $insertPage = $db->prepare("
        INSERT INTO products (code, name, price, brand, created, type)
        VALUES (:kod, :nazov, :cena, :znacka, NOW(), :typ)
    ");

    $insertPage->execute([
        'kod'    => $kod,
        'nazov'  => $nazov,
        'cena'   => $cena,
        'znacka' => $znacka,
        'typ'    => $typ,
    ]);
    header('location: login.php');
}
?>