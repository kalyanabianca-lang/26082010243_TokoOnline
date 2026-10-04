# Toko Online

Web sederhana (PHP + MySQL) yang menampilkan data dari 3 tabel database.

## Entitas dan Atribut

| Entitas | Atribut |
|---|---|
| pelanggan | id_pelanggan (PK), nama, email, kota, no_hp |
| produk | id_produk (PK), nama_produk, kategori, harga, stok |
| penjualan | id_penjualan (PK), id_pelanggan (FK), id_produk (FK), jumlah, tanggal |

## Relasi dan Kardinalitas

- pelanggan **1 : N** penjualan (satu pelanggan bisa punya banyak transaksi)
- produk **1 : N** penjualan (satu produk bisa terjual dalam banyak transaksi)

## Cara Menjalankan

1. Install XAMPP, lalu Start **Apache** dan **MySQL**.
2. Buka `localhost/phpmyadmin`, klik tab **Impor**, pilih `database/schema.sql`.
3. Salin folder project ke `C:\xampp\htdocs\`.
4. Buka `localhost/NPM_TokoOnline` di browser.

## Struktur Folder

```
NPM_TokoOnline/
├── services/config.php
├── database/schema.sql
├── index.php
├── style.css
└── README.md
```
