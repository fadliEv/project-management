# 📌 Project Management System

## 📖 Deskripsi Proyek
Project Management System adalah aplikasi berbasis web yang dirancang untuk **mengelola proyek dan task** secara efisien. Sistem ini memungkinkan user untuk **create, edit, delete, dan monitoring proyek serta task yang terkait** dengan fitur notifikasi untuk deadline yang mendekat.

---

## 🎯 **Fitur Utama**
### 1️⃣ **Manajemen Proyek**
✅ CRUD Proyek
✅ Menetapkan **tanggal mulai & deadline proyek**.  
✅ Menentukan **status proyek**: `Aktif`, `Selesai`, atau `Dibatalkan`.

### 2️⃣ **Manajemen Task**
✅ Setiap proyek dapat memiliki banyak task.  
✅ Menetapkan **status task**: `Belum Dimulai`, `Dalam Proses`, atau `Selesai`.  
✅ Menentukan **deadline task** untuk mengontrol progres.

### 3️⃣ **Dashboard dengan Visualisasi Data**
✅ **Pie Chart**: Status proyek (`Aktif`, `Selesai`, `Dibatalkan`).  
✅ **Bar Chart**: Jumlah proyek berdasarkan status.  
✅ **Line Chart**: Tren proyek baru per bulan.  
✅ **Doughnut Chart**: Monitoring task berdasarkan status.

### 4️⃣ **Notifikasi & Reminder**
✅ **Dropdown notifikasi** untuk proyek dan task yang mendekati deadline.  
✅ **Toast notifikasi otomatis** saat proyek/task hampir jatuh tempo.  
✅ **Badge jumlah notifikasi** pada navbar.

### 5️⃣ **DataTables untuk Pengelolaan Data**
✅ **Pagination otomatis** untuk daftar proyek.  
✅ **Search & Filter berdasarkan status proyek**.  
✅ **Sorting proyek berdasarkan kolom tertentu**.

### 6️⃣ **Tampilan UI yang Responsif**
✅ **Sidebar navigasi** untuk akses cepat ke Dashboard dan Projects.  
✅ **Navbar tetap di atas (`fixed-top`)** agar selalu terlihat.  
✅ **Sidebar tidak tertumpuk navbar** dan tetap terlihat.  
✅ **Menggunakan Bootstrap 5 untuk tampilan yang modern & responsif.**

---

## 📌 **Teknologi yang Digunakan**
- **Laravel 11** – Backend framework utama.
- **MySQL** – Database untuk menyimpan proyek & task.
- **Bootstrap 5** – UI framework untuk tampilan responsif.
- **Chart.js** – Visualisasi data proyek & task.
- **jQuery & DataTables** – Pengelolaan tabel proyek dengan pagination & filter.

---

## 🚀 **Cara Menjalankan Proyek**
1️⃣ Clone repository ini:
```sh
git clone https://github.com/username/project-management.git
cd project-management
```

2️⃣ Install dependencies Laravel:
```sh
composer install
```

3️⃣ Buat file `.env` dan atur konfigurasi database:
```sh
cp .env.example .env
```
Edit `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project_management
DB_USERNAME=root
DB_PASSWORD=
```

4️⃣ Generate application key:
```sh
php artisan key:generate
```

5️⃣ Jalankan migrasi database:
```sh
php artisan migrate --seed
```

6️⃣ Jalankan server Laravel:
```sh
php artisan serve
```
Akses aplikasi di **http://127.0.0.1:8000**.

---

## 📌 **Struktur Folder**
```
project-management/
│── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── DashboardController.php
│   │   │   ├── ProjectController.php
│   │   ├── Models/
│   │   │   ├── Project.php
│   │   │   ├── Task.php
│── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php
│   │   ├── projects/
│   │   │   ├── index.blade.php
│   │   │   ├── create.blade.php
│   │   │   ├── edit.blade.php
│   │   │   ├── show.blade.php
│── database/
│   ├── migrations/
│── public/
│── routes/
│   ├── web.php
│── .env
│── composer.json
│── package.json
│── README.md
```

