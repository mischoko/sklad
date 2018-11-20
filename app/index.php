<?php

require 'start.php';

$pages = $db->query("
    SELECT id, code, name
    FROM products
")->fetchAll(PDO::FETCH_ASSOC);

require 'home.php';
?>