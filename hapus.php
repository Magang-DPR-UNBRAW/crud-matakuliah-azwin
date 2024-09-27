<?php
include 'config.php'; //Mengimpor file ini yang berisi konfigurasi koneksi ke database

$id = $_GET['id']; //Mengambil nilai id dari parameter URL menggunakan metode GET
$mysqli->query("DELETE FROM mata_kuliah WHERE id = $id"); //Menjalankan query SQL untuk menghapus data dari tabel mata_kuliah di database

header("Location: index.php"); // Setelah data berhasil dihapus, pengguna akan diarahkan kembali ke halaman utama
exit();
?>