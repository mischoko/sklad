<?php

ini_set('display_errors','On');

define('APP_ROOT', __DIR__);
define('BASE_URL', 'http://localhost:3000/app');

$db = new PDO("mysql:host=mariadb101.websupport.sk;port=3312;dbname=dbsklad", "dbsklad", "ZmenS1Heslo!");

?>