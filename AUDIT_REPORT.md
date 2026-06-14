# 📋 LAPORAN AUDIT PROYEK: PresensiOnline
> **Tanggal Audit:** 13 Juni 2026  
> **Dibuat oleh:** Antigravity AI Code Auditor  
> **Lokasi Proyek:** `d:\Koding\Projects\PresensiOnline`

---

## 📌 RINGKASAN EKSEKUTIF

Project ini adalah **Sistem Presensi Online (Absensi Karyawan)** yang dibangun menggunakan framework Laravel. Sistem ini dirancang untuk mencatat kehadiran/absensi pegawai secara digital dengan fitur validasi lokasi GPS (geolokasi). Kemungkinan besar digunakan oleh sebuah instansi pemerintah (terlihat dari kode ID "DCPSMG-" yang kemungkinan singkatan dari Dinas Kependudukan dan Pencatatan Sipil).

---

## 1. 🛠️ FRAMEWORK & TEKNOLOGI UTAMA

### A. Bahasa & Framework Inti

| Komponen | Versi | Keterangan |
|---|---|---|
| **PHP** | ^8.2 | Bahasa pemrograman utama (server-side) |
| **Laravel** | ^11.9 | Framework PHP utama (MVC pattern) |
| **Laravel UI** | ^4.5 | Paket untuk scaffolding autentikasi (login/register) |
| **Laravel Tinker** | ^2.9 | REPL interaktif untuk debug via terminal |

### B. Frontend (Tampilan)

| Library | Versi | Fungsinya |
|---|---|---|
| **Bootstrap** | ~5.1.3 | Framework CSS untuk tampilan responsif dan komponen UI (tombol, tabel, card, dll.) |
| **Vite** | ^5.4.3 | Build tool modern — mengkompilasi dan meng-bundle file CSS & JS |
| **Laravel Vite Plugin** | ^1.0 | Integrasi Vite ke dalam ekosistem Laravel |
| **SASS** | ^1.72.0 | Preprocessor CSS (membuat CSS lebih terstruktur) |
| **Font Awesome** | ^5.15.4 | Library ikon (ikon-ikon yang terlihat di tampilan) |
| **Axios** | ^1.7.4 | Library HTTP client JavaScript (untuk AJAX request) |
| **@popperjs/core** | ^2.10.2 | Dependensi Bootstrap untuk dropdown dan tooltip |
| **Simplebar** | ^5.3.6 | Custom scrollbar yang lebih elegan |
| **Smooth-scroll** | ^16.1.3 | Animasi scroll yang halus |

### C. Database

| Komponen | Detail |
|---|---|
| **Database Engine** | MySQL |
| **Host** | 127.0.0.1:3306 |
| **Nama Database** | `presensi_msib` |
| **Username** | root |
| **ORM (Object-Relational Mapping)** | Eloquent (bawaan Laravel) |

### D. Tools Development (Khusus untuk proses pengembangan)

| Tool | Fungsinya |
|---|---|
| **Faker PHP** | Generate data dummy untuk testing |
| **Laravel Pint** | Code formatter PHP |
| **Laravel Sail** | Menjalankan Laravel di Docker |
| **PHPUnit** | Framework untuk automated testing |
| **Larastarters** | Starter kit Laravel dengan template siap pakai |

---

## 2. 📦 DAFTAR FITUR PROJECT

Berdasarkan analisis kode, project ini memiliki fitur-fitur berikut:

### ✅ Fitur 1: Autentikasi (Authentication)
- **Login & Logout** — Pegawai dan Admin bisa masuk ke sistem
- **Register** — Pendaftaran akun (kemungkinan dinonaktifkan untuk publik)
- **Reset Password** — Fitur lupa password via email
- **Verifikasi Email** — Terdapat halaman verifikasi email
- **Role-Based Access** — Ada 2 peran: `admin` dan `pegawai`/`karyawan`

> 💡 **Cara kerjanya:** Saat login, sistem mengecek kolom `role` di database. Jika `admin`, diarahkan ke dashboard admin. Jika `pegawai`, diarahkan ke dashboard pegawai.

---

### ✅ Fitur 2: Presensi/Absensi Online (Fitur Utama)
- **Absen Masuk** — Pegawai bisa absen masuk (jam masuk dicatat otomatis)
- **Absen Pulang** — Pegawai bisa absen pulang (jam pulang dicatat)
- **Validasi Lokasi GPS** — Sebelum absen, pegawai WAJIB mengambil lokasi via GPS browser
- **Kontrol Buka/Tutup Absen** — Admin bisa membuka atau menutup sesi absensi
- **Status Presensi** — Setiap presensi punya status (default: "belum di acc")
- **Manajemen Absensi (Admin)** — Admin bisa melihat, menambah, menghapus data absensi

---

### ✅ Fitur 3: Manajemen User / Pegawai
- **CRUD User** — Admin bisa Create, Read, Update, Delete data pengguna/pegawai
- **Reset Password Pegawai** — Admin bisa mereset password pegawai ke default (`user123`)
- **Data Karyawan** — Sistem menyimpan data lengkap: nama, No ID, tanggal lahir, jenis kelamin, status, telepon
- **Auto-Generate No ID** — Saat user/karyawan baru dibuat, sistem otomatis generate ID dengan format `DCPSMG-XXXX`
- **Pencarian Real-time** — Tabel user bisa dicari tanpa reload halaman (AJAX)

---

### ✅ Fitur 4: Logbook (Catatan Harian)
- **Buat Catatan** — Pegawai bisa menulis catatan kegiatan harian (logbook)
- **Lihat Logbook** — Pegawai hanya bisa melihat logbook miliknya sendiri
- **Edit & Hapus Logbook** — Pegawai bisa mengelola entri logbook-nya
- **Logbook Admin** — Admin punya controller terpisah untuk melihat semua logbook

---

### ✅ Fitur 5: Konfigurasi Sistem (Admin)
- **Buka/Tutup Absensi** — Admin bisa mengatur status: `buka` atau `ditutup`
- **Jam Buka & Tutup** — Admin bisa mengatur jam operasional absensi

---

### ✅ Fitur 6: Profil Pengguna
- **Lihat Profil** — User bisa melihat data profilnya
- **Update Profil** — User bisa memperbarui datanya

---

### ✅ Fitur 7: Dashboard
- **Dashboard Admin** — Halaman ringkasan data untuk admin
- **Dashboard Pegawai** — Halaman utama setelah pegawai login

---

## 3. 🗺️ PEMETAAN STRUKTUR FILE BERDASARKAN FITUR

```
PresensiOnline/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/                       ← [FITUR: Autentikasi]
│   │   │   │   └── (LoginController, RegisterController, dll - bawaan Laravel UI)
│   │   │   │
│   │   │   ├── HomeController.php          ← [FITUR: Dashboard] Arahkan ke halaman home setelah login
│   │   │   ├── DashboardAdminController.php← [FITUR: Dashboard Admin]
│   │   │   │
│   │   │   ├── UserController.php          ← [FITUR: Manajemen User] CRUD + Reset Password
│   │   │   ├── KaryawanController.php      ← [FITUR: Manajemen Karyawan] CRUD data karyawan
│   │   │   │
│   │   │   ├── PresensiController.php      ← [FITUR: Presensi - ADMIN] Kelola semua absensi
│   │   │   ├── PresensiPegawaiController.php← [FITUR: Presensi - PEGAWAI] Absen masuk/pulang
│   │   │   ├── PresensiAdminController.php ← [FITUR: Presensi - ADMIN lainnya]
│   │   │   │
│   │   │   ├── LogbookController.php       ← [FITUR: Logbook - PEGAWAI] Catatan harian pegawai
│   │   │   ├── LogbookAdminController.php  ← [FITUR: Logbook - ADMIN]
│   │   │   │
│   │   │   └── ProfileController.php       ← [FITUR: Profil] Lihat & update profil
│   │   │
│   │   └── Middleware/
│   │       ├── isAdmin.php                 ← [KEAMANAN] Blokir non-admin masuk ke area admin
│   │       └── isPegawai.php               ← [KEAMANAN] Kontrol akses pegawai
│   │
│   ├── Models/
│   │   ├── User.php                        ← [DATABASE] Tabel users (akun login pegawai)
│   │   ├── Karyawan.php                    ← [DATABASE] Tabel karyawans (data identitas)
│   │   ├── Presensi.php                    ← [DATABASE] Tabel presensis (data absensi)
│   │   ├── Logbook.php                     ← [DATABASE] Tabel logbook (catatan harian)
│   │   └── Konfigurasi.php                 ← [DATABASE] Tabel konfigurasis (pengaturan sistem)
│   │
│   └── Providers/
│       └── AppServiceProvider.php          ← [SISTEM] Pendaftaran middleware & service
│
├── database/
│   ├── migrations/
│   │   ├── ..._create_users_table.php      ← [FITUR: Auth] Buat tabel users, password_reset, sessions
│   │   ├── ..._create_presensis_table.php  ← [FITUR: Presensi] Buat tabel presensis
│   │   ├── ..._create_konfigurasis_table.php← [FITUR: Konfigurasi] Buat tabel konfigurasis
│   │   └── ..._create_logbooks_table.php   ← [FITUR: Logbook] Buat tabel logbook
│   └── seeders/
│       └── DatabaseSeeder.php              ← [DATA AWAL] Script untuk isi data awal database
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php               ← [TEMPLATE] Layout utama (semua halaman memakai ini)
│       │   ├── navigation.blade.php        ← [UI] Komponen navigasi/menu
│       │   ├── topbar.blade.php            ← [UI] Bar atas halaman
│       │   ├── sidenav.blade.php           ← [UI] Menu sidebar
│       │   └── footer.blade.php            ← [UI] Footer halaman
│       │
│       ├── auth/
│       │   ├── login.blade.php             ← [FITUR: Login] Halaman form login
│       │   ├── register.blade.php          ← [FITUR: Register] Halaman form registrasi
│       │   ├── profile.blade.php           ← [FITUR: Profil]
│       │   └── passwords/                  ← [FITUR: Reset Password]
│       │
│       ├── admin/
│       │   ├── dashboard.blade.php         ← [FITUR: Dashboard Admin]
│       │   ├── presensi/
│       │   │   ├── index.blade.php         ← [FITUR: Presensi Admin] Daftar semua absensi
│       │   │   ├── table.blade.php         ← [FITUR: Presensi Admin] Komponen tabel (AJAX)
│       │   │   └── detail.blade.php        ← [FITUR: Presensi Admin] Detail absensi
│       │   ├── user/                       ← [FITUR: Manajemen User]
│       │   └── karyawan/                   ← [FITUR: Manajemen Karyawan]
│       │
│       ├── pegawai/
│       │   └── presensi/
│       │       └── index.blade.php         ← [FITUR: Absensi Pegawai] Form absen + GPS
│       │
│       ├── logbook/
│       │   └── index.blade.php             ← [FITUR: Logbook]
│       │
│       └── welcome.blade.php               ← [HALAMAN AWAL] Halaman depan Laravel (default)
│
└── routes/
    └── web.php                             ← [ROUTING] Semua URL/endpoint aplikasi
```

---

### 🔗 Pemetaan Fitur → File (Ringkasan Cepat)

| Fitur | Controller | Model | View |
|---|---|---|---|
| **Login/Logout** | `Auth/LoginController` (hidden) | `User.php` | `auth/login.blade.php` |
| **Register** | `Auth/RegisterController` (hidden) | `User.php` | `auth/register.blade.php` |
| **Dashboard Admin** | `HomeController` | — | `admin/dashboard.blade.php` |
| **Dashboard Pegawai** | `HomeController` | — | `home.blade.php` |
| **Absensi Pegawai** | `PresensiPegawaiController` | `Presensi.php` | `pegawai/presensi/index.blade.php` |
| **Kelola Absensi (Admin)** | `PresensiController` | `Presensi.php` | `admin/presensi/index.blade.php` |
| **Manajemen User** | `UserController` | `User.php` | `admin/user/` |
| **Manajemen Karyawan** | `KaryawanController` | `Karyawan.php` | `admin/karyawan/` |
| **Logbook** | `LogbookController` | `Logbook.php` | `logbook/index.blade.php` |
| **Profil** | `ProfileController` | `User.php` | `auth/profile.blade.php` |
| **Konfigurasi** | (belum ada controller khusus) | `Konfigurasi.php` | — |

---

## 4. 🚀 LANGKAH MENJALANKAN PROJECT SECARA LOKAL

### Prasyarat (Harus sudah terpasang di komputer Anda)
- ✅ **PHP 8.2+** (cek dengan `php -v`)
- ✅ **Composer** (cek dengan `composer -v`)
- ✅ **Node.js & NPM** (cek dengan `node -v` dan `npm -v`)
- ✅ **MySQL** (bisa pakai XAMPP, Laragon, atau WAMP)
- ✅ **Git** (opsional, sudah ada di project)

---

### Langkah Demi Langkah

#### Step 1: Persiapkan File Konfigurasi
File `.env` sudah ada di project. Cek dan pastikan isinya sesuai:
```env
APP_NAME=PresensiOnline
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=presensi_msib   ← Nama database yang harus Anda buat
DB_USERNAME=root
DB_PASSWORD=                 ← Isi jika MySQL Anda ada password
```

#### Step 2: Buat Database di MySQL
Buka phpMyAdmin atau MySQL client, lalu jalankan:
```sql
CREATE DATABASE presensi_msib;
```

#### Step 3: Install Dependensi PHP
Buka terminal di folder project, jalankan:
```bash
composer install
```
Perintah ini mengunduh semua library PHP yang tercantum di `composer.json`.

#### Step 4: Generate Application Key
```bash
php artisan key:generate
```
Perintah ini membuat kunci enkripsi unik untuk aplikasi.

#### Step 5: Jalankan Migrasi Database
```bash
php artisan migrate
```
Perintah ini membuat semua tabel di database (`users`, `presensis`, `logbook`, `konfigurasis`, dll.).

#### Step 6: Isi Data Awal (Opsional)
```bash
php artisan db:seed
```
Jika ada data awal (seeder), perintah ini akan mengisinya.

#### Step 7: Install Dependensi Frontend
```bash
npm install
```
Perintah ini mengunduh Bootstrap, Font Awesome, dan library JavaScript lainnya.

#### Step 8: Build/Compile Asset Frontend
Untuk development (dengan auto-reload):
```bash
npm run dev
```

#### Step 9: Jalankan Server PHP
```bash
php artisan serve
```
Aplikasi akan berjalan di: **http://localhost:8000**

#### Step 10: Buka Aplikasi
Buka browser dan kunjungi: **http://localhost:8000**

---

### 🔑 Akses Default
Anda perlu membuat akun admin secara manual di database atau melalui seeder.
- Default password user yang di-reset oleh admin: **`user123`**
- Format No ID: **`DCPSMG-XXXX`** (otomatis di-generate)

---

## 5. 📍 GEOLOKASI: Penjelasan Lengkap

Ini adalah salah satu fitur paling menarik di project ini. Mari kita bahas dari A sampai Z.

---

### 🌐 Apa itu Geolokasi di Project Ini?

Geolokasi di project ini digunakan sebagai **validasi lokasi saat absen**. Sebelum pegawai bisa klik tombol "Absen Masuk", mereka WAJIB mengambil koordinat GPS (latitude & longitude) dari browser mereka. Tujuannya: **memastikan pegawai benar-benar berada di lokasi kerja saat absen**.

---

### 🔧 Bagaimana Geolokasi Dibuat?

Geolokasi menggunakan **Web Geolocation API** — fitur bawaan browser modern (Chrome, Firefox, Edge) yang memungkinkan website mengakses koordinat GPS perangkat pengguna. **Tidak ada library khusus** yang diinstall untuk ini.

#### Kode JavaScript Geolokasi
**File:** `resources/views/pegawai/presensi/index.blade.php` (baris 117-136)

```javascript
// Fungsi 1: Meminta izin akses GPS dari pengguna
function getLocation() {
    if (navigator.geolocation) {
        // Jika browser mendukung GPS, minta koordinat
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        // Jika browser tidak mendukung GPS, tampilkan pesan error
        alert("Geolocation is not supported by this browser.");
    }
}

// Fungsi 2: Setelah koordinat berhasil diambil, masukkan ke form
function showPosition(position) {
    var latitude = position.coords.latitude;    // Garis lintang
    var longitude = position.coords.longitude;  // Garis bujur
    var locationString = latitude + ', ' + longitude; // Gabungkan: "lat, long"

    // Masukkan koordinat ke dalam <select> sebagai pilihan
    var lokasiSelect = document.getElementById('lokasiSelect');
    var option = document.createElement('option');
    option.value = locationString;   // Value yang dikirim ke server: "-7.123, 110.456"
    option.text = locationString;    // Teks yang tampil di dropdown
    lokasiSelect.add(option);
}
```

---

### ⚙️ Bagaimana Geolokasi Diatur (Alur Kerja Lengkap)?

```
[PEGAWAI membuka halaman Absensi]
        ↓
[Sistem cek: Apakah absen DIBUKA oleh Admin?]
   ↙ Tidak                    ↘ Ya
[Tampil pesan:           [Tampil form absen]
"Absen ditutup"]                ↓
                    [Pegawai klik "Ambil Lokasi"]
                                ↓
                    [Browser meminta izin GPS]
                    popup: "Izinkan lokasi Anda?"
                                ↓
                ↙ Tolak              ↘ Izinkan
        [GPS gagal]         [Koordinat berhasil didapat]
                            latitude: -7.1234
                            longitude: 110.5678
                                ↓
                    [Koordinat muncul di dropdown]
                    Contoh: "-7.1234, 110.5678"
                                ↓
                    [Pegawai klik "Absen Masuk"]
                                ↓
                    [Form dikirim ke server]
                    Field yang dikirim:
                    - lokasi: "-7.1234, 110.5678"
                    - tanggal: (dari sistem)
                    - user_id: (dari session)
                                ↓
                    [Server menyimpan ke database]
                    Tabel: presensis
                    Kolom: lokasi (VARCHAR 500)
```

---

### 💾 Bagaimana Geolokasi Disimpan di Database?

**Tabel:** `presensis`  
**Kolom:** `lokasi` (tipe: `VARCHAR(500)`)

Data lokasi disimpan dalam format **string teks biasa**:
```
"-7.123456789, 110.456789123"
```

Bukan dalam format terpisah (lat dan long di kolom berbeda), melainkan **digabung dalam satu string**.

**File migrasi:** `database/migrations/2024_09_10_012613_create_presensis_table.php`
```php
$table->string('lokasi', 500);  // Menyimpan "lat, long" sebagai teks
```

**Model:** `app/Models/Presensi.php`
```php
protected $fillable = [
    'user_id',
    'tanggal',
    'status',
    'lokasi',      // ← Field lokasi GPS disimpan di sini
    'jam_masuk',
    'jam_pulang',
];
```

---

### 🔒 Validasi & Penggunaan Geolokasi

#### Sisi Admin (Kontrol Absensi)
**File:** `app/Models/Konfigurasi.php` & tabel `konfigurasis`

Admin bisa membuka/menutup absensi. Saat absensi ditutup, form GPS pun tidak ditampilkan:
```php
// Di view pegawai/presensi/index.blade.php
@if (!empty($konfigurasi) && $konfigurasi->status_presensi === 'buka')
    // Tampilkan form absen + tombol GPS
@else
    // Tampilkan pesan "Absen ditutup"
@endif
```

#### Pengiriman Data ke Server
Koordinat GPS dikirim melalui **HTTP POST form biasa** (bukan AJAX):
- **Action URL:** `route('karyawan.presensi.store')`
- **Method:** POST
- **Field:** `lokasi` berisi string `"lat, long"`

#### Validasi di Controller
**File:** `app/Http/Controllers/PresensiController.php`
```php
$request->validate([
    'user_id' => 'required|exists:users,id',
    'tanggal' => 'required|date',
    // ⚠️ CATATAN: Kolom 'lokasi' tidak divalidasi secara ketat
    //    (tidak ada validasi apakah koordinat valid atau tidak)
]);
```

> ⚠️ **Catatan Penting untuk Developer:** Validasi koordinat GPS di server-side masih **sangat minim**. Saat ini tidak ada pengecekan apakah koordinat yang dikirim valid (bisa saja dimanipulasi pengguna yang tidak jujur). Untuk meningkatkan keamanan, perlu ditambahkan validasi koordinat di server dan pengecekan radius lokasi (geofencing).

---

### 📊 Ringkasan Implementasi Geolokasi

| Aspek | Detail |
|---|---|
| **Teknologi** | Browser Web Geolocation API (native, tanpa library tambahan) |
| **Trigger** | Tombol "Ambil Lokasi" diklik oleh pengguna |
| **Izin** | Browser meminta izin ke pengguna (popup standar browser) |
| **Data yang Diambil** | Latitude & Longitude (koordinat GPS) |
| **Format Penyimpanan** | String: `"latitude, longitude"` (contoh: `-7.1234, 110.5678`) |
| **Tabel Database** | `presensis` → kolom `lokasi` (VARCHAR 500) |
| **Kontrol On/Off** | Dikendalikan oleh admin melalui tabel `konfigurasis` |
| **Validasi Server** | Minimal (hanya required, tidak ada geofencing/radius check) |
| **Tampilan ke User** | Dropdown `<select>` yang terisi otomatis koordinat GPS |
| **File Utama** | `resources/views/pegawai/presensi/index.blade.php` |

---

## 6. 🗄️ STRUKTUR DATABASE

### ERD (Entity Relationship Diagram) Sederhana

```
┌─────────────┐         ┌──────────────────┐         ┌───────────────┐
│    users    │         │    presensis     │         │    logbook    │
├─────────────┤         ├──────────────────┤         ├───────────────┤
│ id (PK)     │───┐     │ id (PK)          │         │ id (PK)       │
│ name        │   └────►│ user_id (FK)     │   ┌────►│ user_id (FK)  │
│ email       │         │ tanggal          │   │     │ description   │
│ password    │◄─────┐  │ status           │   │     │ created_at    │
│ role        │      │  │ lokasi (GPS)     │   │     │ updated_at    │
│ no_id       │      └──│ jam_masuk        │   │     └───────────────┘
│ tanggal_lahir│         │ jam_pulang       │   │
│ status      │         │ created_at       │   │     ┌───────────────┐
│ jenis_kelamin│         │ updated_at       │   │     │  konfigurasis │
│ telepon     │         └──────────────────┘   │     ├───────────────┤
│ created_at  │─────────────────────────────────┘     │ id (PK)       │
│ updated_at  │                                       │ status_presensi│
└─────────────┘                                       │ jam_buka      │
                                                       │ jam_tutup     │
                                                       └───────────────┘
```

### Detail Kolom Penting

**Tabel `users`** — Data akun dan profil pegawai
- `role`: `'admin'` atau `'pegawai'` (menentukan akses)
- `no_id`: Format `DCPSMG-XXXX` (auto-generate)

**Tabel `presensis`** — Data absensi harian
- `lokasi`: String GPS `"lat, long"` (diisi dari browser GPS)
- `status`: Default `'belum di acc'` (perlu disetujui admin)
- `jam_masuk` / `jam_pulang`: Nullable, waktu check-in/out

**Tabel `konfigurasis`** — Pengaturan sistem
- `status_presensi`: `'buka'` atau `'ditutup'`

---

## 7. ⚠️ TEMUAN & CATATAN PENTING

### 🔴 Masalah Kritis
1. **Password Hardcoded** — Password default user adalah `'user123'` (plain text, tanpa bcrypt di beberapa tempat)
2. **Validasi Lokasi Lemah** — Server tidak memvalidasi apakah koordinat GPS valid atau dalam radius lokasi kerja
3. **Route Tidak Konsisten** — Beberapa redirect mengarah ke URL yang salah (mis. `redirect('presensis')` tanpa prefix `admin/`)
4. **LogbookController menggunakan `no_id` sebagai foreign key** — Bukan `id`, ini bisa menyebabkan bug jika `no_id` tidak unik

### 🟡 Potensi Pengembangan
1. **Geofencing** — Tambahkan validasi radius (misalnya: hanya bisa absen jika dalam radius 100m dari kantor)
2. **Export Laporan** — Belum ada fitur export data ke Excel/PDF
3. **Notifikasi** — Belum ada sistem notifikasi email/SMS
4. **Dashboard Statistik** — Dashboard masih minim data analitik

---

## 8. 📁 RINGKASAN STRUKTUR FOLDER LENGKAP

```
PresensiOnline/
├── 📄 .env                    ← Konfigurasi lingkungan (database, mail, dll.)
├── 📄 composer.json           ← Dependensi PHP
├── 📄 package.json            ← Dependensi JavaScript/Frontend
├── 📄 vite.config.js          ← Konfigurasi Vite (build tool)
├── 📄 artisan                 ← CLI Laravel (php artisan ...)
│
├── 📁 app/
│   ├── 📁 Http/
│   │   ├── 📁 Controllers/   ← Logika bisnis (MVC: Controller)
│   │   ├── 📁 Middleware/    ← Penjaga akses (isAdmin, isPegawai)
│   │   └── 📁 Requests/      ← Validasi request form
│   ├── 📁 Models/            ← Representasi tabel database (MVC: Model)
│   └── 📁 Providers/         ← Service provider Laravel
│
├── 📁 database/
│   ├── 📁 migrations/        ← Skema tabel database (versi-kontrol database)
│   ├── 📁 seeders/           ← Data awal database
│   └── 📁 factories/         ← Generator data dummy
│
├── 📁 resources/
│   ├── 📁 views/             ← Tampilan HTML (MVC: View) - Blade Template
│   ├── 📁 css/               ← File CSS (dikompilasi Vite)
│   ├── 📁 js/                ← File JavaScript (dikompilasi Vite)
│   └── 📁 sass/              ← File SASS (preprocessor CSS)
│
├── 📁 routes/
│   ├── 📄 web.php            ← Semua URL route aplikasi web
│   └── 📄 console.php        ← Route untuk perintah Artisan
│
├── 📁 public/                ← File yang bisa diakses publik (index.php, assets)
├── 📁 config/                ← File konfigurasi Laravel (app, auth, database, dll.)
├── 📁 storage/               ← File upload, log, cache
├── 📁 vendor/                ← Library PHP (jangan diedit, auto-generate)
├── 📁 node_modules/          ← Library JS (jangan diedit, auto-generate)
└── 📁 tests/                 ← Unit test & Feature test
```

---

*📝 Laporan ini dibuat secara otomatis berdasarkan analisis kode sumber project PresensiOnline. Versi: 1.0*
