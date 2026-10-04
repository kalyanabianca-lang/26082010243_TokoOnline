-- schema.sql : Toko Online (3 tabel berelasi)
-- Relasi: pelanggan 1-to-many penjualan, produk 1-to-many penjualan

CREATE DATABASE IF NOT EXISTS toko_online;
USE toko_online;

-- DDL
CREATE TABLE pelanggan (
    id_pelanggan INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    kota VARCHAR(50),
    no_hp VARCHAR(20)
);

CREATE TABLE produk (
    id_produk INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100) NOT NULL,
    kategori VARCHAR(50),
    harga INT NOT NULL,
    stok INT NOT NULL
);

CREATE TABLE penjualan (
    id_penjualan INT AUTO_INCREMENT PRIMARY KEY,
    id_pelanggan INT NOT NULL,
    id_produk INT NOT NULL,
    jumlah INT NOT NULL,
    tanggal DATE NOT NULL,
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id_pelanggan),
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk)
);

-- DML (5 baris per tabel)
INSERT INTO pelanggan (nama, email, kota, no_hp) VALUES
('Andi Saputra', 'andi@mail.com', 'Surabaya', '081200000001'),
('Budi Santoso', 'budi@mail.com', 'Sidoarjo', '081200000002'),
('Citra Lestari', 'citra@mail.com', 'Gresik', '081200000003'),
('Dewi Anggraini', 'dewi@mail.com', 'Malang', '081200000004'),
('Eko Prasetyo', 'eko@mail.com', 'Surabaya', '081200000005');

INSERT INTO produk (nama_produk, kategori, harga, stok) VALUES
('Kaos Polos', 'Pakaian', 65000, 50),
('Celana Jeans', 'Pakaian', 180000, 30),
('Sepatu Sneakers', 'Sepatu', 250000, 20),
('Tas Ransel', 'Aksesoris', 150000, 25),
('Topi Baseball', 'Aksesoris', 45000, 40);

INSERT INTO penjualan (id_pelanggan, id_produk, jumlah, tanggal) VALUES
(1, 1, 2, '2026-10-01'),
(2, 3, 1, '2026-10-01'),
(3, 4, 1, '2026-10-02'),
(1, 5, 3, '2026-10-03'),
(4, 2, 2, '2026-10-04');

-- Query sample (dipakai untuk README / tes di phpMyAdmin)
-- SELECT:
-- SELECT * FROM produk;
-- JOIN:
-- SELECT p.id_penjualan, pl.nama, pr.nama_produk, p.jumlah, (p.jumlah * pr.harga) AS total, p.tanggal
-- FROM penjualan p
-- JOIN pelanggan pl ON p.id_pelanggan = pl.id_pelanggan
-- JOIN produk pr ON p.id_produk = pr.id_produk;
-- UPDATE:
-- UPDATE produk SET stok = 45 WHERE id_produk = 1;
-- DELETE:
-- DELETE FROM penjualan WHERE id_penjualan = 5;
