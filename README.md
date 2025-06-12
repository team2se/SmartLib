-----

# Aplikasi Perpustakaan

Sebuah aplikasi web yang komprehensif untuk mengelola koleksi buku, anggota, dan transaksi peminjaman di perpustakaan. Dibangun di atas framework **Laravel** yang tangguh, aplikasi ini menawarkan antarmuka pengguna yang modern dan interaktif berkat integrasi **Tailwind CSS** dan **Alpine.js**.

-----

## Teknologi yang Digunakan

  * **Backend:** PHP 8.x, Laravel 11.x
  * **Frontend:**
      * Tailwind CSS 4.x
      * Alpine.js 3.x
      * Vite
  * **Basis Data:** MySQL / MariaDB (dapat dikonfigurasi di `.env`). Untuk penggunaan cepat, SQLite juga didukung.
  * **Alat Pengembangan:** Composer, Node.js, npm

-----

## Fitur Utama

  * Ringkasan Dasbor
  * Manajemen Buku (CRUD)
  * Manajemen Anggota
  * Manajemen Peminjaman
  * Antarmuka Modern & Responsif
  * Komponen Interaktif: dropdown, modal, pencarian real-time
  * Sistem Autentikasi Aman

-----

## Dokumentasi Aplikasi

Berikut adalah cuplikan antarmuka dari aplikasi perpustakaan ini:

### Halaman Login

<img width="1440" alt="Screenshot 2025-06-12 at 20 26 04" src="https://github.com/user-attachments/assets/c1cd35de-d19a-4ad7-8808-ea8e43f5dd23" />

### Dasbor Utama

<img width="1440" alt="Screenshot 2025-06-12 at 20 26 21" src="https://github.com/user-attachments/assets/5bb240d9-5348-43b8-8658-6faab789a81b" />

Menampilkan statistik jumlah buku, anggota, dan peminjaman.

### Manajemen Buku

<img width="1440" alt="Screenshot 2025-06-12 at 20 26 34" src="https://github.com/user-attachments/assets/99bb2dc8-b730-411e-b252-4309a4efcebe" />

### Manajemen Peminjaman

<img width="1440" alt="Screenshot 2025-06-12 at 20 26 40" src="https://github.com/user-attachments/assets/ca9ddf3b-232a-4600-a17e-06c20b7d0447" />


Lihat status peminjaman, tanggal jatuh tempo, dan pengembalian buku.

-----

## Prasyarat

Pastikan Anda telah menginstal:

  * PHP (\>= 8.1)
  * Composer
  * Node.js & npm
  * Database server (MySQL/MariaDB/SQLite)
  * Git (opsional tapi disarankan)

-----

## Instruksi Instalasi / Pengaturan

```bash
git clone https://github.com/team2se/SmartLib.git
cd <direktori_repositori> # Masuk ke direktori proyek Anda

composer install
npm install

cp .env.example .env
php artisan key:generate

# Konfigurasikan .env sesuai pengaturan database Anda

php artisan migrate
php artisan db:seed # untuk mengisi database dengan data awal
npm run dev # Untuk pengembangan, kompilasi aset secara berkelanjutan
# npm run build # Untuk persiapan produksi, kompilasi dan minimalkan aset

php artisan serve
```

-----

## Menjalankan Aplikasi

Akses aplikasi di browser melalui:

```
http://localhost:8000
```

Untuk pengembangan, jalankan `npm run dev`. Untuk persiapan produksi, jalankan `npm run build` agar aset frontend berfungsi dengan benar.

-----

## Menjalankan Tes

```bash
php artisan test
```

-----

## Penutup

Terima kasih telah menggunakan Aplikasi Perpustakaan ini\! Dibuat untuk mempermudah pengelolaan perpustakaan dengan teknologi modern dan fleksibel.
