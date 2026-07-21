<?php
// Aktifkan pelaporan error untuk memudahkan diagnosa di sisi pengguna
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

// Mengambil id_produk dari URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    // Menggunakan Prepared Statement untuk menghapus data secara aman
    $stmt = $conn->prepare("DELETE FROM produk WHERE id_produk = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal menghapus produk dari database: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Gagal mempersiapkan query hapus: " . $conn->error;
    }
} else {
    $conn->close();
    header("Location: index.php");
    exit();
}
$conn->close();
