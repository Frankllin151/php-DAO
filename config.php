<?php
$dbAnme = 'teste';
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$pdo = new PDO('mysql:dbname=' . $dbAnme . ';host=' . $dbHost, $dbUser, $dbPass);
