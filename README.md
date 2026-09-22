# Mini Project 1: Product Information System

**Mata Kuliah:** Pemrograman Web  
**Arsitektur:** Modular Programming & Separation of Concerns

## Ringkasan Proyek
Proyek ini adalah sistem manajemen inventaris produk berbasis web yang dibangun menggunakan PHP fundamental. Fokus utama dari pembuatan program ini adalah memisahkan struktur data, logika pemrosesan, dan antarmuka tampilan agar kodenya tetap rapi dan gampang di-maintenance.

## Struktur Direktori
product-information-system/
├── README.md         # Dokumentasi utama proyek
├── SAD.md            # Software Architecture Document
├── products.php      # Data Layer (Penyimpanan array data produk)
├── functions.php     # Processing Layer (Logika bisnis & fungsi kalkulasi)
└── index.php         # Presentation Layer (Antarmuka HTML & integrasi)

## Pembagian Komponen
* **Data Layer (`products.php`)**: Berisi array data produk sementara (*mock data*).
* **Processing Layer (`functions.php`)**: Berisi fungsi matematika untuk menghitung total nilai aset dan pengecekan batas stok.
* **Presentation Layer (`index.php`)**: Menyatukan semua file dan merender data ke dalam tabel HTML interaktif.