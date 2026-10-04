<?php
// Koneksi database (XAMPP default: user root, password kosong)
$host     = "localhost";
$user     = "root";
$password = "";
$database = "toko_online";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
