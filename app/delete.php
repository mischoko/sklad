<?php

require 'start.php';

if (isset($_GET['code'])){
    $deletePage = $db->prepare("
        DELETE FROM products
        WHERE code = :code
    ");
    $deletePage->execute(['code' => $_GET['code']]);
}
header ('Location: login?all.php');
?>