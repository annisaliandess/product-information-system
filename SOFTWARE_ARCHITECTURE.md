# Software Architecture Document (SAD)
## Product Information System

## 1. Pendahuluan
Dokumen ini merancang arsitektur perangkat lunak untuk sistem informasi produk. Pendekatan modular diterapkan untuk memastikan setiap bagian kode memiliki tugas yang spesifik (*Single Responsibility Principle*).

## 2. Prinsip Arsitektur
Sistem menggunakan prinsip *Separation of Concerns* dengan membagi program menjadi tiga lapisan:
* **Data Layer:** Mengelola penyimpanan data mentah.
* **Processing Layer:** Menangani kalkulasi dan aturan logika bisnis murni tanpa elemen HTML.
* **Presentation Layer:** Menyajikan data ke peramban web (*browser*).

## 3. Desain Komponen
* **`products.php`**: Menggunakan struktur *multidimensional array* untuk menampung entitas produk secara konsisten (ID, nama, kategori, harga, stok, deskripsi).
* **`functions.php`**: Menyediakan fungsi `hitungTotalAset()` untuk akumulasi nilai inventaris dan `cekStokKritis()` untuk validasi batas stok minimum.
* **`index.php`**: Berperan sebagai file utama yang memanggil modul lain menggunakan `require_once` dan merender tabel HTML dengan penanda visual khusus untuk stok yang menipis.