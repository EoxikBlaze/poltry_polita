# Politry Polita — Sistem Pendataan Ayam & Produksi Telur

Aplikasi web **IoT Kandang Ayam** (PBL Kelompok 17 — Politeknik Negeri Tanah Laut) untuk pendataan kandang, siklus ayam, pencatatan harian produksi telur, data pekerja, dan data user.

Dibangun dengan **CodeIgniter 4** + **AdminLTE 3** + **MySQL**.

## Fitur

| Modul | Keterangan |
| --- | --- |
| Login | Autentikasi user (password di-hash `password_hash`), sesi dilindungi filter auth |
| Dashboard | Ringkasan jumlah kandang, siklus, pekerja, dan total produksi telur |
| Data Kandang | CRUD kandang + penanggung jawab dari data pekerja |
| Siklus Ayam | CRUD siklus (minggu, tanggal, jumlah ayam, telur utuh, ikat) |
| Pencatatan Harian | CRUD pencatatan harian (telur utuh/retak/putih dalam butir & kg, total otomatis) |
| Data Pekerja | CRUD pekerja (penanggung jawab kandang) |
| Data User | CRUD user aplikasi (level: Admin / Pemilik / Peternak) |
| Monitoring | Tampilan kartu seluruh kandang |

## Kebutuhan

- PHP **8.1 s/d 8.5** (ext-intl, ext-mbstring, ext-mysqli)
- MySQL / MariaDB
- (Opsional) Composer — hanya jika ingin install ulang dependensi

## Cara Menjalankan (XAMPP / localhost)

1. **Salin** folder proyek ini ke `htdocs` (XAMPP) atau folder web server lain.
2. **Buat database** `iot_telor` di phpMyAdmin, lalu **Import** file `database/iot_telor.sql`.
3. Pastikan konfigurasi database di `app/Config/Database.php` sesuai (default: `127.0.0.1`, user `root`, password kosong, database `iot_telor`).
4. Buka `http://localhost/IoT%20Kandang%20Ayam/public/` (atau arahkan VirtualHost ke folder `public/`).
5. Login dengan akun bawaan:

   | Username | Password | Level |
   | --- | --- | --- |
   | `admin` | `admin123` | Admin |

   > **Segera ganti password bawaan** melalui menu **Data User**.

> Folder `public/` adalah web root. Jika memakai Apache, `.htaccess` sudah disediakan agar URL bersih tanpa `index.php`. Jika server tidak mendukung rewrite, set `public string $indexPage = 'index.php';` di `app/Config/App.php`.

## Cara Deploy ke Hosting (cPanel / DirectAdmin)

1. Upload seluruh isi folder ini ke hosting (bisa zip lalu Extract di File Manager), pastikan folder `public/` menjadi web root (atau salin isi `public/` ke `public_html`).
2. Buat database via phpMyAdmin hosting lalu import `database/iot_telor.sql`.
3. Sesuaikan kredensial database di `app/Config/Database.php` (hostname/username/password/database hosting).
4. Pastikan folder `writable/` dapat ditulis (permission 755/775).
5. Buka domain — `baseURL` terdeteksi otomatis, tidak perlu diubah.

## Konfigurasi Penting

| File | Fungsi |
| --- | --- |
| `app/Config/Database.php` | Koneksi MySQL |
| `app/Config/App.php` | `baseURL` (auto-detect; isi manual jika ingin tetap) dan `indexPage` |
| `.env` | Salin dari `.env.example` jika ingin override lingkungan (`CI_ENVIRONMENT`) |

## Struktur Database

- `user` — akun login aplikasi
- `data_pekerja` — pekerja / penanggung jawab
- `kandang` — data kandang (FK ke `data_pekerja`)
- `siklus_ayam` — siklus per kandang (FK ke `kandang`)
- `pencatatan_harian` — pencatatan harian (FK ke `kandang` & `siklus_ayam`)

Skema lengkap + data contoh ada di **`database/iot_telor.sql`**.

## Pengujian

```bash
php vendor/bin/phpunit
```

## Catatan Teknis

- Framework CodeIgniter **4.6.3** (kompatibel PHP 8.1–8.5).
- `vendor/` disertakan agar proyek langsung jalan tanpa `composer install`. Jika ingin install ulang: `composer install`.
- Route aplikasi ada di `app/Config/Routes.php`. Halaman di luar `/login` dilindungi filter `auth` (`app/Filters/AuthFilter.php`).
