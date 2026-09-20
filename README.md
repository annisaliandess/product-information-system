# Mini Project 1: Product Information System (Blueprint)

**Mata Kuliah:** Pemrograman Web  
**Fokus Proyek:** Perancangan Arsitektur Modular & Pemisahan Layer (*Separation of Concerns*)

---

## 1. Ringkasan Proyek
Proyek ini adalah rancangan cetak biru (*blueprint*) untuk sistem manajemen inventaris produk berbasis web. Sesuai instruksi akademik, sesi ini berfokus murni pada perancangan logika arsitektur dan pemisahan tanggung jawab kode di atas kertas, tanpa implementasi kode PHP aktif (*Sesi Tanpa Coding*).

---

## 2. Struktur Direktori Proyek
Berikut adalah rancangan tata letak folder dan file yang direncanakan untuk menjaga kerapian proyek:

product-information-system/
│
├── README.md         # Dokumentasi & cetak biru arsitektur sistem
├── products.php      # Data Layer (Penyimpanan array multidimensi)
├── functions.php     # Processing Layer (Logika bisnis & fungsi matematika)
└── index.php         # Presentation Layer (Antarmuka HTML & integrasi modul)

---

## 3. Pembagian Arsitektur & Logika Desain

Sistem dipecah menjadi tiga modul utama agar kode terisolasi dengan baik:

### A. Data Layer (`products.php`)
* **Tujuan:** Berfungsi sebagai *mock database* sementara sebelum terhubung ke sistem basis data permanen.
* **Mekanisme:** Menggunakan struktur data *multidimensional associative array*. Setiap entitas produk wajib memiliki atribut konsisten:
  * `id` (Identifikasi unik produk)
  * `nama` (Nama komoditas produk)
  * `kategori` (Klasifikasi jenis produk)
  * `harga` (Nilai satuan produk)
  * `stok` (Jumlah ketersediaan barang di gudang)
  * `deskripsi` (Keterangan singkat spesifikasi produk)

### B. Processing Layer (`functions.php`)
* **Tujuan:** Pusat pemrosesan data, kalkulasi matematis, dan evaluasi aturan bisnis (bebas dari elemen HTML).
* **Fungsi Utama:**
  * **`hitungTotalAset($data)`:** Melakukan perulangan (*traversal*) pada array produk, mengalikan harga dengan stok setiap item, lalu mengakumulasikannya untuk mendapatkan total nilai aset keseluruhan.
  * **Pengecekan Stok Kritis:** Menerapkan evaluasi kondisional (`if/else`). Jika ditemukan produk dengan jumlah stok di bawah batas minimal (misal < 3), sistem menandainya sebagai status kritis.

### C. Presentation Layer (`index.php`)
* **Tujuan:** Antarmuka pengguna (*User Interface*) yang menyajikan data ke peramban web.
* **Alur Kerja:**
  * Memuat file komponen menggunakan mekanisme modular `require_once`.
  * Merender data produk ke dalam bentuk baris dan kolom tabel HTML menggunakan *looping* (`foreach`).
  * **Penerapan Aturan Visual:** Memberikan penanda warna latar khusus pada baris tabel bagi produk yang berstatus stok kritis sebagai peringatan dini bagi administrator.
  * Menampilkan hasil kalkulasi akhir total nilai aset gudang di bagian bawah halaman.

---

## 4. Alur Kerja Sistem (*Data Flow*)
1. File `index.php` dijalankan oleh server.
2. File tersebut memanggil `products.php` untuk mengambil data mentah berupa array.
3. File tersebut memanggil `functions.php` untuk memproses perhitungan aset dan evaluasi status stok.
4. Data yang sudah siap dirakit dan dicetak ke dalam tabel HTML untuk ditampilkan ke layar pengguna.

---