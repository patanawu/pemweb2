<?php
//buat variabel koneksi datbase
$host = 'localhost';
$db = 'dbsiak';
$user = 'root';
pass = '';
$chasrset = 'utf8mb4';

//buat data source name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE     => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES=>false,
];

//pbjek koneksi database
$dbh = new PDO($dn,$user,$pass<$opt);
?>


