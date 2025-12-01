# 🏔️ SUMMITZ - Admin Dashboard

![Laravel](https://img.shields.io/badge/Laravel-12.x-red?style=flat&logo=laravel)
![Filament](https://img.shields.io/badge/Filament-3.3-orange?style=flat&logo=livewire)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue?style=flat&logo=php)

> **Platform Manajemen Open Trip Gunung Indonesia**

## 📖 Tentang Project

**SUMMITZ Admin Dashboard** adalah sisi Backend (BE) dari platform penjualan paket *open trip* ke berbagai gunung di Indonesia.

Panel admin ini dibangun menggunakan **FilamentPHP** untuk memudahkan pengelolaan konten yang akan ditampilkan di sisi Frontend (User), serta memantau transaksi penjualan. Admin dapat mengelola data gunung, jadwal trip, hingga memverifikasi pembayaran user secara efisien.

### ✨ Fitur Utama

Dashboard ini mencakup fitur **CRUD** (Create, Read, Update, Delete) lengkap dengan kemampuan pencarian (*Search*) untuk modul-modul berikut:

**📍 Admin Zone (Manajemen Konten)**
* **Provinces & Mountains:** Mengelola data lokasi dan destinasi gunung.
* **Trips & Itineraries:** Mengatur paket perjalanan dan susunan acara.
* **Facilities:** Input data fasilitas yang didapat peserta.
* **Galleries & Schedules:** Upload foto destinasi dan pengaturan jadwal keberangkatan.

**👥 Customer Zone (Manajemen Transaksi)**
* **Users:** Memantau data pengguna terdaftar.
* **Bookings:** Melihat pesanan trip yang masuk.
* **Reviews:** Moderasi ulasan dari pendaki.
* **Payments:** Verifikasi status pembayaran.

## 🛠️ Teknologi

Project ini dibangun dengan stack teknologi modern:

* **Framework:** [Laravel 12](https://laravel.com/)
* **Admin Panel:** [Filament 3.3](https://filamentphp.com/)
* **Language:** PHP
* **Database:** MySQL

## 🚀 Instalasi & Cara Menjalankan

Ikuti langkah berikut untuk menjalankan project di local environment:

### 1. Clone Repositori
Clone project ini ke komputer lokal kamu:
```bash
git clone https://github.com/needanzz/RPL-Summitz.git
cd RPL-Summitz
```

### 2. Install Dependencies
Install library PHP yang dibutuhkan menggunakan Composer:
```bash
composer install
```

### 3. Konfigurasi Environment
Salin file contoh environment dan generate key aplikasi:
```bash
cp .env.example .env
php artisan key:generate
```
*Setelah perintah ini, buka file `.env` dan sesuaikan konfigurasi database (DB_DATABASE, DB_USERNAME, dll).*

### 4. Setup Database
Jalankan migrasi database (pastikan database kosong sudah dibuat di phpMyAdmin/MySQL):
```bash
php artisan migrate
```

### 5. Jalankan Server
Jalankan development server Laravel:
```bash
php artisan serve
```

### 6. Akses Admin Panel
Buka browser dan akses URL berikut untuk masuk ke dashboard:
> **URL:** `http://127.0.0.1:8000/admin`

Gunakan kredensial berikut untuk login:
| Role | Email | Password |
| :--- | :--- | :--- |
| **Super Admin** | `summitz12@gmail.com` | `12summitz` |

## 👥 Tim Pengembang

Project ini dikembangkan dengan kolaborasi tim yang hebat:

* **Backend Developer:**
    * 👨‍💻 Muhammad Danil Aminuddin
    * 👨‍💻 Gian Adiansyah
* **Frontend Developer:**
    * 👨‍💻 Dhanu Pandhowo
* **UI/UX Designer:**
    * 🎨 Fairuz Trideas Hilmi

---

**Dibuat dengan ❤️ untuk pendaki Indonesia.**
