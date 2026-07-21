CREATE DATABASE IF NOT EXISTS db_perusahaan;
USE db_perusahaan;

CREATE TABLE IF NOT EXISTS karyawan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    jabatan VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Seed data awal jika kosong
INSERT INTO karyawan (nama, jabatan, email) 
SELECT 'Yudha Achmad M.', 'Web Developer', 'yudha@stitek.ac.id'
FROM DUAL 
WHERE NOT EXISTS (SELECT * FROM karyawan WHERE email='yudha@stitek.ac.id');

INSERT INTO karyawan (nama, jabatan, email) 
SELECT 'Budi Santoso', 'System Administrator', 'budi@stitek.ac.id'
FROM DUAL 
WHERE NOT EXISTS (SELECT * FROM karyawan WHERE email='budi@stitek.ac.id');
