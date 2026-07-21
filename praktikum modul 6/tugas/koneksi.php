<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_toko";

// 1. Koneksi awal ke server MySQL (tanpa memilih database terlebih dahulu)
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// 2. Buat database jika belum ada
$sql_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if (!$conn->query($sql_db)) {
    die("Gagal membuat database: " . $conn->error);
}

// 3. Pilih database
$conn->select_db($dbname);

// 4. Buat tabel produk jika belum ada
$sql_table = "CREATE TABLE IF NOT EXISTS produk (
    id_produk INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(150) NOT NULL,
    harga INT NOT NULL,
    stok INT NOT NULL
)";
if (!$conn->query($sql_table)) {
    die("Gagal membuat tabel: " . $conn->error);
}
