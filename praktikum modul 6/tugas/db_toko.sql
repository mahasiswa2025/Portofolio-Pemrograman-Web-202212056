CREATE DATABASE IF NOT EXISTS db_toko;
USE db_toko;

CREATE TABLE IF NOT EXISTS produk (
    id_produk INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(150) NOT NULL,
    harga INT NOT NULL,
    stok INT NOT NULL
);

-- Seed data produk untuk demo awal jika kosong
INSERT INTO produk (nama_produk, harga, stok)
SELECT 'Laptop Asus ROG', 18500000, 5
FROM DUAL
WHERE NOT EXISTS (SELECT * FROM produk WHERE nama_produk='Laptop Asus ROG');

INSERT INTO produk (nama_produk, harga, stok)
SELECT 'Mouse Gaming Logitech', 450000, 15
FROM DUAL
WHERE NOT EXISTS (SELECT * FROM produk WHERE nama_produk='Mouse Gaming Logitech');

INSERT INTO produk (nama_produk, harga, stok)
SELECT 'Keyboard Mechanical Keychron', 1200000, 0
FROM DUAL
WHERE NOT EXISTS (SELECT * FROM produk WHERE nama_produk='Keyboard Mechanical Keychron');
