# UTS Pemrograman Web II 

* **Nama**: Rahmawati Azizah Afriliani
* **NIM**: 60324025

---

## Deskripsi Aplikasi

Aplikasi ini merupakan sistem sederhana berbasis web untuk mengelola data kategori buku pada perpustakaan.
Fitur utama aplikasi meliputi:
* Menampilkan daftar kategori (Read)
* Menambahkan kategori baru (Create)
* Mengedit data kategori (Update)
* Menghapus kategori (Delete)

---

## Cara Instalasi & Menjalankan Aplikasi

1. **Clone repository**
   ```bash
   git clone https://github.com/username/nama-repo.git
   ```
2. **Pindahkan ke folder htdocs (XAMPP)**
   ```
   C:\xampp\htdocs\nama-folder
   ```
3. **Buat database**
   * Buka phpMyAdmin
   * Buat database dengan nama:
     ```
     uts_perpustakaan_60324025 (misal)
     ```
   * Import file `.sql` (klo ada)
4. **Konfigurasi database**
   * Buka file:
     ```
     config/database.php
     ```
   * Sesuaikan:
     ```php
     $host = "localhost";
     $user = "root";
     $pass = "";
     $db   = "uts_perpustakaan_60324025";
     ```
5. **Jalankan aplikasi**
   * Buka browser
   * Akses:
     ```
     http://localhost/nama-folder/index.php
     ```
---
## 📁 Struktur Folder
```
project-folder/
│
├── config/
│   └── database.php
│
├── index.php
├── create.php
├── edit.php
├── delete.php
│
└── README.md
```
---

## 🔗 Link Repository GitHub
https://github.com/lem0nilvs/uts-pemrograman-web-2-60324025.git

