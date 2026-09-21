# Software Architecture Document (SAD)
## Product Information System (Mini Project 1)

**Mata Kuliah:** Pemrograman Web  
**Fokus Dokumen:** Perancangan Arsitektur Konseptual & Modular Programming  
**Status Dokumen:** *Blueprint / Design Phase* (Sesi Tanpa Implementasi Kode Aktif)

---

## 1. Pendahuluan

### 1.1 Latar Belakang
Dokumen ini mendefinisikan rancangan arsitektur perangkat lunak untuk **Product Information System**, sebuah sistem manajemen inventaris produk berbasis web. Mengingat kompleksitas aplikasi web yang terus berkembang, pendekatan perancangan modular diterapkan sejak fase awal untuk memastikan struktur kode tetap bersih, terisolasi, dan mudah dipelihara (*maintainable*).

### 1.2 Tujuan Dokumen
* Menyediakan cetak biru (*blueprint*) logis mengenai struktur data, alur pemrosesan logika, dan antarmuka sistem.
* Menetapkan batasan tanggung jawab antar komponen melalui prinsip *Separation of Concerns* sebelum proses implementasi pemrograman dilakukan.

---

## 2. Prinsip Arsitektur Sistem

Sistem ini dirancang menggunakan arsitektur **Modular Konseptual**, di mana aplikasi dipecah menjadi tiga lapisan (*layers*) independen yang masing-masing memiliki satu tanggung jawab spesifik (*Single Responsibility Principle*):

1. **Data Layer:** Bertanggung jawab penuh atas penyimpanan dan penyediaan struktur data mentah.
2. **Processing Layer:** Pusat kalkulasi matematis, manipulasi data, dan evaluasi aturan bisnis murni (bebas dari elemen tampilan).
3. **Presentation Layer:** Menggabungkan data dan fungsi untuk disajikan dalam bentuk antarmuka pengguna (*User Interface*).

---

## 3. Desain Komponen Arsitektur

### 3.1 Data Layer (`products.php`)
* **Peran:** Berfungsi sebagai *mock database* sementara di dalam memori runtime sebelum sistem terhubung ke basis data relasional permanen.
* **Struktur Data:** Menggunakan array asosiatif multidimensi. Setiap entitas produk di dalam array wajib memuat atribut seragam berikut:
  * `id`: Identifikasi unik produk (String/Alfanumerik).
  * `nama`: Nama komoditas produk (String).
  * `kategori`: Klasifikasi jenis produk (String).
  * `harga`: Nilai satuan harga produk (Integer/Float).
  * `stok`: Jumlah ketersediaan barang di gudang (Integer).
  * `deskripsi`: Keterangan atau catatan spesifikasi produk (String).

### 3.2 Processing Layer (`functions.php`)
* **Peran:** Pusat logika bisnis dan eksekusi fungsi matematis aplikasi. Berisi kode murni PHP tanpa adanya tag HTML.
* **Spesifikasi Fungsi Utama:**
  * **`hitungTotalAset($data)`:** Melakukan perulangan (*traversal*) untuk mengalikan harga dan stok dari setiap entitas produk, lalu mengakumulasikannya guna menghasilkan nilai total aset keseluruhan.
  * **Pengecekan Stok Kritis:** Menerapkan evaluasi kondisional (`if/else`). Jika ditemukan produk dengan jumlah stok di bawah ambang batas minimum (misal $< 3$), sistem menandainya dengan status khusus.

### 3.3 Presentation Layer (`index.php`)
* **Peran:** Lapisan antarmuka yang berinteraksi langsung dengan pengguna akhir melalui peramban web (*browser*).
* **Mekanisme Kerja:**
  * Mengimpor dependensi data dan fungsi menggunakan instruksi modular (`require_once`).
  * Melakukan perulangan (*looping*) untuk merender baris dan kolom tabel HTML berdasarkan array produk.
  * **Aturan Visual (Conditional UI):** Menerapkan kelas atau gaya visual khusus (seperti warna latar merah) pada baris tabel untuk produk yang berstatus stok kritis guna memberikan peringatan dini (*early warning*) bagi administrator.
  * Menampilkan hasil kalkulasi akhir total nilai aset gudang di bagian bawah halaman.

---

## 4. Struktur Direktori Proyek

Tata letak berkas dirancang secara hierarkis untuk mempermudah navigasi pengembang:

```text
product-information-system/
│
├── README.md             # Ringkasan eksekutif proyek
├── SAD.md                # Dokumen arsitektur perangkat lunak (Dokumen ini)
├── products.php          # Data Layer (Mock Data)
├── functions.php         # Processing Layer (Business Logic)
└── index.php             # Presentation Layer (UI & Integration)