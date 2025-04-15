<?php
$host = 'localhost';      // Server database
$username = 'root';       // Username MySQL
$password = '';           // Password MySQL (kosong untuk XAMPP default)
$database = 'web_builder_id'; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>

