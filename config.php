<?php

$host = "mysqlpraktikum017.mysql.database.azure.com";
$user = "adminmysql";
$password = "Mysql@12345";
$database = "praktikumsubmit_db";
$port = 3306;

$conn = mysqli_init();

mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

mysqli_real_connect(
    $conn,
    $host,
    $user,
    $password,
    $database,
    $port,
    NULL,
    MYSQLI_CLIENT_SSL
);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>
