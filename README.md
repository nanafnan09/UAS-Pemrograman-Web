# Simple Inventory Management System (Project UAS)

Aplikasi berbasis web untuk memanajemen stok barang (Inventaris) yang dibangun menggunakan **PHP Native** dengan arsitektur **MVC (Model-View-Controller)**. Project ini dibuat untuk memenuhi tugas Ujian Akhir Semester (UAS).

---

## 👨‍🎓 Identitas Mahasiswa
* **Nama**: Afnan Dika Ramadhan
* **NIM**: 312410518
* **Kelas**: TI24.A5
* **Mata Kuliah**: Pemrograman Web
* **Youtube**: 

---

## 📋 Deskripsi Project
Aplikasi ini dirancang untuk memudahkan proses pencatatan barang masuk dan keluar dengan antarmuka yang modern dan responsif. Sistem ini menerapkan konsep **Object-Oriented Programming (OOP)** dan **Modularisasi** sesuai ketentuan tugas.

### Fitur Utama:
1.  **Arsitektur MVC & Routing**: Menggunakan struktur folder yang rapi dan URL yang bersih (*Pretty URL*).
2.  **Multi-Role Login**:
    * **Admin**: Memiliki akses penuh (Create, Read, Update, Delete).
    * **User**: Hanya memiliki akses lihat (Read) dan cari (Search).
3.  **CRUD Lengkap**: Menambah, mengedit, dan menghapus data barang.
4.  **Validasi Input**: Harga otomatis dikonversi dari format ribuan (misal: `7.500.000` menjadi `7500000`) agar aman di database.
5.  **Pencarian & Pagination**: Memudahkan pencarian data spesifik dan membagi tampilan data per halaman.
6.  **Desain Responsif**: Tampilan menarik menggunakan **Bootstrap 5** dan **Custom CSS**, mendukung tampilan mobile.

---

## 🛠️ Teknologi yang Digunakan
* **Backend**: PHP 8 (OOP Style)
* **Database**: MySQL / MariaDB
* **Frontend**: Bootstrap 5.3, CSS3 (Custom Glassmorphism Style)
* **Server**: Apache (via XAMPP)

---

## 🚀 Cara Instalasi & Menjalankan

Ikuti langkah-langkah berikut untuk menjalankan project di komputer lokal (Localhost):

### 1. Persiapan Folder
* Pastikan **XAMPP** sudah terinstall.
* Simpan folder project ini ke dalam `C:\xampp\htdocs\` dengan nama folder:
    `project-uas-inventaris`

### 2. Setup Database
* Nyalakan module **Apache** dan **MySQL** di XAMPP Control Panel.
* Buka browser dan akses `http://localhost/phpmyadmin`.
* Buat database baru dengan nama: **`db_inventaris`**.
* Jalankan query SQL berikut pada tab **SQL**:

```sql
-- Tabel Users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user'
);

-- Tabel Items
CREATE TABLE items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    category VARCHAR(50),
    price DECIMAL(15,2),
    stock INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Akun Default
INSERT INTO users (username, password, role) VALUES 
('admin', 'admin123', 'admin'),
('user', 'user123', 'user');

-- Data Dummy Barang
INSERT INTO items (name, category, price, stock) VALUES
('Laptop Asus ROG', 'Elektronik', 15000000, 5),
('Mouse Wireless', 'Aksesoris', 150000, 20),
('Keyboard Mechanical', 'Aksesoris', 450000, 10);
```

3.📂 Struktur Folder & File (Tree Structure)
```plaintext
project-uas-inventaris/
│
├── app/                        <-- FOLDER UTAMA (Logika & Kode Rahasia)
│   ├── config/
│   │   └── Database.php        <-- Mengatur koneksi ke Database MySQL
│   │
│   ├── controllers/            <-- PENGENDALI (Mengatur alur aplikasi)
│   │   ├── AuthController.php  <-- Mengatur Login & Logout
│   │   └── ItemController.php  <-- Mengatur CRUD Barang (Tambah/Edit/Hapus)
│   │
│   ├── core/                   <-- MESIN APLIKASI (Jantung framework MVC)
│   │   ├── App.php             <-- Router (Menerjemahkan URL browser)
│   │   └── Controller.php      <-- Class Induk (Penghubung View & Model)
│   │
│   ├── models/                 <-- DATA (Berhubungan langsung dengan Database)
│   │   ├── ItemModel.php       <-- Query SQL untuk Tabel Barang
│   │   └── UserModel.php       <-- Query SQL untuk Tabel User
│   │
│   └── views/                  <-- TAMPILAN (Antarmuka Pengguna/HTML)
│       ├── auth/
│       │   └── login.php       <-- Halaman Login
│       ├── items/
│       │   ├── create.php      <-- Form Tambah Barang
│       │   ├── edit.php        <-- Form Edit Barang
│       │   └── index.php       <-- Tabel Daftar Barang
│       └── templates/
│           ├── header.php      <-- Bagian Atas (Navbar & CSS)
│           └── footer.php      <-- Bagian Bawah (Script JS)
│
├── public/                     <-- FOLDER PUBLIK (Yang diakses User)
│   ├── css/
│   │   └── style.css           <-- Kode CSS kustom (Desain cantik)
│   ├── .htaccess               <-- Pengaturan URL (Pretty URL)
│   └── index.php               <-- PINTU MASUK UTAMA (Entry Point)
```
4. Konfigurasi Project
Buka file `public/index.php`.

Pastikan konfigurasi BASEURL sudah sesuai:

```php
define('BASEURL', 'http://localhost/project-uas-inventaris/public');
```
5.📝 Penjelasan Fungsi Per File
Berikut adalah penjelasan teknis yang bisa kamu pakai di laporan:

A. Folder app/core/ (Mesin MVC)
Ini adalah "otak" dari sistem MVC buatanmu.

App.php: Berfungsi sebagai Router. File ini memecah URL (misalnya: `public/item/create`) menjadi 3 bagian: Controller (Item), Method (Create), dan Parameter. File inilah yang menentukan halaman mana yang harus dibuka.

Controller.php: Class induk. Semua controller lain mewarisi (`extends`) file ini agar bisa menggunakan fungsi `view()` untuk memanggil tampilan dan `model()` untuk memanggil database.

B. Folder `app/config/`
Database.php: Berisi konfigurasi server `(Localhost)`, username `(root)`, dan nama database (`db_inventaris`). Menggunakan mysqli untuk membuka jalur komunikasi ke database.

C. Folder `app/controllers/` (Pengendali)
Bertugas menerima perintah dari user dan meneruskannya ke Model atau View. 4. `AuthController.php`: Menangani logika otentikasi. Mengecek apakah `username/password` benar saat login, dan menghancurkan session saat logout. 5. `ItemController.php`: Logika utama inventaris. * Mengecek apakah user sudah login atau belum. * Mengecek role (Admin/User). * Memerintahkan Model untuk mengambil, menyimpan, atau menghapus data barang.

D. Folder `app/models/` (Data)
Satu-satunya tempat di mana kode SQL (`SELECT, INSERT, UPDATE`) ditulis. 6. UserModel.php: Mencari data user berdasarkan username untuk proses login. 7. `ItemModel.php`: Melakukan operasi `CRUD` ke tabel items. * Di sini juga terdapat logika pembersihan data (seperti menghapus titik pada format harga rupiah) sebelum disimpan agar database tidak error).

E. Folder `app/views/` (Tampilan)
Berisi kode HTML yang dilihat pengguna. 8. templates/header.php: Menyimpan menu navigasi (`Navbar`) dan link CSS. Dipisah agar kita tidak perlu menulis menu berulang-ulang di setiap halaman. 9. `items/index.php`: Menampilkan tabel data. Di sini terdapat logika perulangan (`foreach`) untuk menampilkan baris data dan logika Pagination (halaman 1, 2, dst). 10. `items/create.php` & `edit.php`: Form input. Menggunakan tipe input number untuk harga agar validasi lebih aman.

F. Folder `public/` (Akses Luar)
Hanya folder ini yang boleh diakses langsung oleh browser demi keamanan. 11. `.htaccess`: Mengubah URL jelek (`index.php?url=item/index`) menjadi URL cantik (`item/index`). 12. `index.php`: `Entry Point`. Semua request masuk lewat sini. File ini yang memulai `session_start()` dan memanggil file `App.php` (`Bootstrapping`). 13. `css/style.css`: File desain tambahan (Custom CSS) untuk membuat tampilan tombol, tabel, dan card login menjadi lebih modern (efek `glassmorphism dan shadow`).

6. Jalankan Aplikasi
Buka browser dan kunjungi alamat: 👉 `http://localhost/project-uas-inventaris/public`

🔐 Akun Demo (Login)
Gunakan akun berikut untuk masuk ke dalam sistem:

User : Admin

Password : Admin123

7. UI

![Foto](https://github.com/nanafnan09/UAS-Pemrograman-Web/blob/f75eafe33cbf8c587b2dee2b09ce3c0019de4948/Pict%20UAS%20Pemrograman%20Web/Cuplikan%20layar%202026-01-08%20135957.png)

# Tampilan Login 

![Foto](https://github.com/nanafnan09/UAS-Pemrograman-Web/blob/3d646540e83363ef2b024309f7b6465db2821b88/Pict%20UAS%20Pemrograman%20Web/1.png)

# Dashboard

![Foto](https://github.com/nanafnan09/UAS-Pemrograman-Web/blob/34578f4273dbf30e86130176fdccd1564f623d2b/Pict%20UAS%20Pemrograman%20Web/2.png)

# Input Item


