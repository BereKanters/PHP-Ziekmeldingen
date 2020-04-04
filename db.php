<?php
$dsn = 'mysql:host=localhost;dbname=ziekmeldingen';
$username = 'root';
$password = '';
$options = [];
try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}