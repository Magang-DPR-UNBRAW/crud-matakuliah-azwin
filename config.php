<?php
$host = 'localhost';
$user = 'root';  // sesuaikan dengan user MySQL Anda
$password = '';  // sesuaikan dengan password MySQL Anda
$database = 'matakuliah_db';

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
?>