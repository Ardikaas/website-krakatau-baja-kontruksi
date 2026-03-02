<br />
<div align="center">
  <a href="#">
    <img src="public/images/logo-3.png" alt="Logo" width="200">
  </a>

  <h3 align="center">PT Krakatau Baja Konstruksi - Corporate Website</h3>

  <p align="center">
    Sistem Informasi Profil Perusahaan Resmi PT Krakatau Baja Konstruksi
    <br />
    <a href="https://krakataubajakonstruksi.com/"><strong>Kunjungi Website Kkami »</strong></a>
    <br />
    <br />
    <a href="#">Laporkan Bug</a>
    ·
    <a href="#">Ajukan Fitur</a>
  </p>
</div>

<!-- Badges -->
<div align="center">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel"/>
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS"/>
  <img src="https://img.shields.io/badge/Alpine_JS-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=white" alt="Alpine JS"/>
  <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL"/>
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP"/>
</div>

---

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li><a href="#tentang-proyek">Tentang Proyek</a></li>
    <li><a href="#fitur-utama">Fitur Utama</a></li>
    <li><a href="#teknologi-yang-digunakan">Teknologi yang Digunakan</a></li>
    <li><a href="#panduan-instalasi">Panduan Instalasi</a></li>
    <li><a href="#penggunaan-sistem">Penggunaan Sistem</a></li>
    <li><a href="#struktur-database">Struktur Database</a></li>
    <li><a href="#wbs-whistle-blowing-system">WBS (Whistle Blowing System)</a></li>
  </ol>
</details>

## Tentang Proyek

Proyek ini adalah sistem informasi berbasis *web/company profile* resmi untuk **PT Krakatau Baja Konstruksi (KBK)**, perusahaan subholding dari PT Krakatau Steel (Persero) Tbk. Website ini dirancang untuk menyajikan informasi korporat secara komprehensif, modern, dan multibahasa, baik untuk klien domestik maupun internasional.

Sistem ini tidak hanya berfungsi sebagai antarmuka publik, tetapi juga dilengkapi dengan *Content Management System (CMS)* atau Panel Admin secara mandiri (dibangun dari nol) untuk mengelola data perusahaan seperti Banner, Produk, Berita, Histori, Susunan Direksi/Komisaris, hingga Laporan WBS.

## Fitur Utama

- 🌍 **Multilingual System (Bilingual)**: Konten tersedia dalam dua bahasa, yaitu Bahasa Indonesia (ID) dan English (EN). Fitur ini dinamis hingga ke level *Database* (berita, deskripsi produk, sejarah perusahaan, dll dirancang memiliki translasi database langsung).
- 🛠️ **Custom Content Management System (Admin Panel)**:
  - Manajemen Produk & Kategori Baja
  - Manajemen Portfolio Proyek
  - Publikasi Berita / Artikel Perusahaan
  - Pengelolaan Halaman *About Us* (Sejarah, Direksi, Organogram)
  - Pengelolaan Hero Banner & Video Profil
- 📞 **Kontak & Tim Sales**: Halaman direktori Tim Sales perusahaan yang dinamis.
- ⚖️ **Whistle Blowing System (WBS)**: Form pelaporan rahasia bagi publik dan karyawan mengenai pelanggaran *Good Corporate Governance*, terintegrasi aman di Panel Admin.
- 📱 **Fully Responsive Design**: Tampilan website yang adaptif di berbagai ukuran perangkat, mulai dari Mobile, Tablet, hingga Desktop *Widescreen*.

## Teknologi yang Digunakan

- **Backend Framework**: [Laravel 11.x](https://laravel.com)
- **Database**: MySQL
- **Frontend Library/CSS**: [Tailwind CSS](https://tailwindcss.com/) & [Alpine.js](https://alpinejs.dev/)
- **Asset Bundling**: [Vite](https://vitejs.dev/)
- **Rich Text Editor**: Quill.js (Untuk Editor Berita & Spesifikasi di Panel Admin)
- **Font**: [Google Fonts](https://fonts.google.com/) (Red Rose & Figtree)

---

## Panduan Instalasi

Untuk menjalankan proyek ini di *local machine* (komputer lokal) Anda, ikuti langkah-langkah di bawah ini:

### Persyaratan Sistem

Pastikan komputer Anda telah terinstal:
- PHP ^8.2
- Composer
- Node.js (versi terbaru direkomendasikan) & NPM
- MySQL atau MariaDB

### Langkah Instalasi

1. **Clone repositori ini**

   ```bash
   git clone https://github.com/Ardikaas/website-krakatau-baja-kontruksi.git
   cd website-krakatau-baja-kontruksi
   ```

2. **Install dependensi PHP via Composer**

   ```bash
   composer install
   ```

3. **Install dependensi Node.js via NPM**

   ```bash
   npm install
   ```

4. **Siapkan konfigurasi `.env`**

   ```bash
   cp .env.example .env
   ```

   *Buka file `.env` dan atur koneksi database Anda (DB_DATABASE, DB_USERNAME, DB_PASSWORD).*

5. **Generate Application Key**

   ```bash
   php artisan key:generate
   ```

6. **Migrasi dan jalankan Seeder Database**
   *Aplikasi ini telah dilengkapi dengan Seeder khusus yang secara otomatis akan men-download gambar *dummy* berkualitas dari Unsplash dan menyimpannya di folder `storage` lokal Anda untuk preview UI yang realistis.*

   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Tautkan Storage Laravel**

   ```bash
   php artisan storage:link
   ```

8. **Compile Asset Frontend (Tailwind/CSS/JS)**

   ```bash
   npm run build
   # atau untuk pengembangan (hot reload): npm run dev
   ```

9. **Jalankan Aplikasi**

   ```bash
   php artisan serve
   ```

   *Aplikasi Front-End bisa diakses di: `http://localhost:8000`*
   *Aplikasi Panel Admin bisa diakses di: `http://localhost:8000/admin`*

---

## Penggunaan Sistem

### 1. Panel Admin

* Akses rute `/admin`
- Gunakan data kredensial Admin (Dapat dicek pada `AdminSeeder` atau sesuai database lokal Anda).
- Gunakan *Sidebar Menu* untuk mengatur seluruh komponen mulai dari Berita, Produk, Proyek, Halaman Utama, hingga WBS.
- Penting: Setiap penginputan konten (seperti Produk/Berita/Sejarah) akan diminta *Input* untuk **Bahasa Indonesia** dan **Bahasa Inggris** untuk mendukung sistem Bilingual Front-End.

### 2. Front-End (Website Publik)

* **Tombol Switch Bahasa**: Pengunjung dapat mengubah bahasa melalui *dropdown* bergambar bola dunia di sudut kanan atas menu navigasi. Translasi website akan terganti sesuai preferensi.
- **Halaman WBS**: Terletak di menu Footer ("Lapor/WBS"). Masyarakat dapat melapor anomali tata kelola secara *Anonymous*.

---

## WBS (Whistle Blowing System)

Proyek ini mengutamakan kepatuhan terhadap standar GCG (Good Corporate Governance) BUMN. Modul WBS memungkinkan pelapor untuk mencatat:

- Tipe Insiden (Korupsi, Konflik Kepentingan, Pelanggaran Etika)
- Upload Dokumen Bukti (Akan terenkripsi/terlindung dalam penyimpanan lokal server)
- Identitas Pelapor atau secara Anonimous
Laporan ini hanya dapat diulas oleh Admin level tertentu di Dashboard Administrator.

---

<p align="center">
  <i>&copy; 2026 PT Krakatau Baja Konstruksi. All rights reserved.</i>
</p>
