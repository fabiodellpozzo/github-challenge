<?php

$host = "localhost";
$user = "master";
$pass = "master";
$dbname = "crud_pdo_original";
$port = 3306;

//Conexao com a porta
$conn = new PDO("mysql:host=$host;port=$port;dbname=".$dbname, $user, $pass);

//Conexao sem a porta
//$conn = new PDO("mysql:host=$host;dbname=".$dbname, $user, $pass);

