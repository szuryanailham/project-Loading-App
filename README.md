---
# 🎟️ Registration & Event Management System

Sebuah aplikasi berbasis web untuk mengelola pendaftaran event, approval peserta, export data, dan notifikasi otomatis. Dibuat menggunakan **Laravel**.
---

## ✨ Fitur Utama

-   🔐 **Registrasi Peserta** dengan data lengkap (nama, email, nomor telepon, alamat, dll).
-   🔎 **Pencarian** data berdasarkan nama atau email.
-   📊 **Export Excel** data registrasi dengan nama event.
-   🗑️ **Delete Data** dengan konfirmasi.
-   📱 **Responsive UI** dengan Tailwind CSS pada form pendaftaraan

---

## 🛠️ Teknologi yang Digunakan

-   **Framework**: Laravel 10
-   **Database**: MySQL / MariaDB
-   **Frontend**: Blade + Tailwind CSS
-   **Library**:

    -   [Maatwebsite/Excel](https://laravel-excel.com/) → export data ke Excel
    -   Laravel Mail → kirim email notifikasi

---

## ⚙️ Instalasi & Setup

1. Clone repository:

    ```bash
    git clone <repo-url>
    cd project-folder
    ```

2. Install dependencies:

    ```bash
    composer install
    ```

3. Setup environment:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    Sesuaikan konfigurasi database & mail di file `.env`.

4. Migrasi database:

    ```bash
    php artisan migrate --seed
    ```

5. Jalankan server:

    ```bash
    php artisan serve
    ```

---

## 📂 Struktur Folder Penting

```
app/
 ├── Exports/RegistrationsExport.php   # Export data ke Excel
 ├── Http/Controllers/RegistrationController.php
 ├── Models/Registration.php
 └── Mail/ (jika ada email custom)

resources/views/registrations/
 ├── index.blade.php   # List + pencarian + export
 ├── show.blade.php    # Detail registrasi
 └── form.blade.php    # Form input data

routes/
 └── web.php           # Daftar route
```

---

## 🗄️ Database Schema (ERD)

**Tabel utama**:

-   `events` (id, name, date, location, …)
-   `registrations` (id, event_id, name, email, phone, alamat, birth_date, gender, source, payment_proof, status, notes)

Relasi:

-   `registrations.event_id → events.id`

---

## 📈 Flow Aplikasi

1. User mendaftar event.
2. Data masuk ke dashboard admin.
3. Admin bisa **approve** atau **reject**.
4. Jika approve → email berisi link Zoom & eBook dikirim.
   Jika reject → email notifikasi gagal dikirim.
5. Admin bisa mencari data, menghapus, atau export Excel.

---

## 🚀 Next Progress

-   Export PDF laporan.
-   Integrasi Payment Gateway.
-   Multi-role (Admin, User, Superadmin).
-   Dashboard analitik (jumlah peserta, status, dll).

---

## 📜 Lisensi

Proyek ini dibuat untuk kebutuhan internal **Loading insight Process **.

---
