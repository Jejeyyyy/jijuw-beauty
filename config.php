<?php
// Konfigurasi koneksi database
$host     = "localhost";   // default XAMPP pakai localhost
$user     = "root";        // default user XAMPP
$password = "";            // default password XAMPP biasanya kosong
$dbname   = "jijuw_beauty"; // nama database kamu

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
