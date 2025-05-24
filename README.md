# Aplikasi Perpustakaan 

Sebuah aplikasi web untuk mengelola koleksi buku, anggota, dan peminjaman di perpustakaan. Dibangun dengan framework Laravel dan menampilkan antarmuka pengguna yang modern dan interaktif menggunakan Tailwind CSS dan Alpine.js.

## Teknologi yang Digunakan

* **Backend:** PHP 8.x, Laravel 11.x
* **Frontend:**
    * Tailwind CSS 4.x
    * Alpine.js 3.x
    * Vite
* **Basis Data:** MySQL / MariaDB (bawaan, dapat dikonfigurasi di `.env`)
* **Alat Pengembangan:** Composer, Node.js, npm

## Fitur Utama

* Ringkasan dasbor.
* Manajemen Buku Komprehensif (Buat, Baca, Perbarui, Hapus - CRUD).
* Manajemen Anggota.
* Manajemen Peminjaman.
* Antarmuka pengguna (UI) modern dan responsif dibangun dengan Tailwind CSS.
* Elemen interaktif didukung oleh Alpine.js:
    * Menu navigasi mobile dinamis.
    * Menu dropdown pengguna.
    * Modal konfirmasi interaktif (misalnya, untuk aksi hapus).
    * Pencarian dan pemfilteran sisi klien pada daftar buku.
* Autentikasi aman (Login, Register, Logout).

## Prasyarat

Sebelum Anda memulai, pastikan Anda telah menginstal yang berikut ini:

* PHP (versi yang kompatibel dengan Laravel, mis., `>= 8.1`)
* Composer
* Node.js (versi LTS terbaru direkomendasikan)
* npm (biasanya disertakan dengan Node.js)
* Server basis data (mis., MySQL, MariaDB, PostgreSQL)

## Instruksi Instalasi / Pengaturan

1.  **Clone repositori:**
    ```bash
    git clone <url_repositori>
    cd <direktori_repositori>
    ```

2.  **Instal dependensi PHP:**
    ```bash
    composer install
    ```

3.  **Instal dependensi JavaScript:**
    ```bash
    npm install
    ```

4.  **Buat file environment Anda:** Salin `.env.example` ke `.env`:
    ```bash
    cp .env.example .env
    ```

5.  **Buat kunci aplikasi:**
    ```bash
    php artisan key:generate
    ```

6.  **Konfigurasi basis data Anda:** Buka file `.env` dan perbarui pengaturan `DB_*` (mis., `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

7.  **Jalankan migrasi basis data:** Ini akan membuat tabel yang diperlukan di basis data Anda.
    ```bash
    php artisan migrate
    ```

8.  **Seed basis data (opsional namun direkomendasikan untuk data awal):** Ini akan mengisi basis data dengan data contoh jika seeder dikonfigurasi.
    ```bash
    php artisan db:seed
    ```

9.  **Build aset frontend:**
    * Untuk pengembangan dengan hot reloading:
        ```bash
        npm run dev
        ```
    * Untuk build produksi:
        ```bash
        npm run build
        ```

## Menjalankan Aplikasi (Server Pengembangan)

* Jalankan server pengembangan Laravel (biasanya pada port 8000):
    ```bash
    php artisan serve
    ```
* Jika Anda tidak menggunakan `npm run build` dan menginginkan hot module replacement untuk aset frontend, pastikan `npm run dev` juga berjalan di terminal terpisah.
* Akses aplikasi di `http://localhost:8000` (atau port yang ditampilkan oleh `php artisan serve`).

## Menjalankan Tes

Untuk menjalankan tes fitur dan unit bawaan:
```bash
php artisan test
