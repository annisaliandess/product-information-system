# Blueprint Mini Project 1: Product Information System
**Tema Studi Kasus:** Inventaris Material Toko Bangunan

**Deskripsi Singkat:**
Proyek ini merupakan rancangan cetak biru (blueprint) untuk sistem manajemen inventaris material bangunan. Sistem dirancang menggunakan pendekatan modular (pemisahan layer data, logika, dan presentasi) tanpa implementasi kode akhir, guna mempersiapkan alur logika arsitektur yang matang.

---

## Arsitektur Desain Konseptual

Sistem ini dipecah menjadi tiga bagian utama agar lebih rapi dan terstruktur:

### 1. Data Layer (`products.php`)
**Fungsi:** 
Bertugas sebagai tempat penyimpanan data sementara (pengganti database utama).

**Logika Desain:**
Data inventaris akan disimpan dalam bentuk array multidimensi. Tiap item material di dalamnya wajib memiliki atribut: ID, Nama, Kategori, Harga, Stok, dan Deskripsi.

*Contoh Pseudocode Data:*
```text
Data_Material = [
  [ID: "TB-01", Nama: "Semen Padang 50kg", Kategori: "Material Dasar", Harga: 65000, Stok: 45, Deskripsi: "Semen abu-abu sak"],
  [ID: "TB-02", Nama: "Cat Tembok Putih 5kg", Kategori: "Finishing", Harga: 150000, Stok: 2, Deskripsi: "Cat interior (Stok Kritis)"],
  [ID: "TB-03", Nama: "Pipa PVC 1/2 Inch", Kategori: "Plumbing", Harga: 25000, Stok: 120, Deskripsi: "Pipa air per batang"]
]
```
### 2. Processing Layer (`functions.php`)
**Fungsi:**
Merupakan pusat logika yang murni memproses hitung-hitungan matematis dan aturan kondisi (tanpa ada sintaks tampilan HTML).

**Logika Desain:**
- **Fungsi `hitungTotalAset`:** Sistem akan melakukan perulangan pada Data Layer untuk mengalikan *Harga* dan *Stok* dari masing-masing material. Hasil perkalian dari seluruh material kemudian dijumlahkan untuk mendapat total nilai aset toko.
- **Aturan Stok Kritis:** Membuat pengecekan kondisi (If/Else). Jika ada material yang nilai stoknya di bawah 3 (seperti Cat Tembok pada contoh di atas), sistem akan menyiapkan penanda status kritis.

### 3. Presentation Layer (`index.php`)
**Fungsi:**
Berfungsi sebagai antarmuka (User Interface) yang menggabungkan data dan fungsi untuk ditampilkan ke layar pengguna dalam wujud tabel HTML.

**Logika Desain:**
- File ini pertama-tama akan mengimpor komponen dari `products.php` dan `functions.php`.
- Dibuat kerangka layout tabel HTML.
- Dilakukan perulangan (foreach) untuk membaca setiap isi array material dan mencetaknya ke dalam baris dan kolom tabel.
- **Penerapan Aturan Visual:** Saat merender tabel, sistem akan mengecek status dari Processing Layer. Untuk material dengan stok kritis (< 3), baris tabelnya akan diberi warna latar khusus (misalnya merah) sebagai peringatan visual bagi admin toko.
- Di bawah tabel, sistem memanggil fungsi `hitungTotalAset` untuk menampilkan hasil akhir penjumlahan aset ke layar.