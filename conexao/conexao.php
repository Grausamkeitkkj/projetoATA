<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'site_ata';

$mysqli = new mysqli($hostname, $username, $password, $database);
if ($mysqli->connect_error) {
    die('Conexão falhou: ' . $mysqli->connect_error);
}