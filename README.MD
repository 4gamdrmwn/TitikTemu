
# 📍 TitikTemu

> **Website Lost & Found untuk Warga Politeknik Negeri Malang**

TitikTemu adalah platform terpusat yang menghubungkan mahasiswa yang kehilangan barang dengan mahasiswa yang menemukan barang. Sistem ini melibatkan **Satpam (Petugas)** sebagai verifikator utama untuk memastikan setiap barang temuan valid dan dikembalikan kepada pemilik yang sah.

---

## 📑 Daftar Isi

1. [Tech Stack](#-tech-stack)
2. [Tim Pengembang](#-tim-pengembang)
3. [Konsep PHP Prosedural &amp; Struktur Folder](#-konsep-php-prosedural--struktur-folder)
4. [Cara Setup Environment &amp; Database](#-cara-setup-environment--database)
5. [Aturan Git &amp; Kolaborasi (WAJIB DIBACA)](#-aturan-git--kolaborasi-wajib-dibaca)
6. [Troubleshooting Umum](#-troubleshooting-umum)

---

## 🛠️ Tech Stack

| Komponen                  | Teknologi                    |
| :------------------------ | :--------------------------- |
| **Backend**         | PHP Native (Prosedural)      |
| **Database**        | PostgreSQL                   |
| **Frontend**        | Tailwind CSS (Build via CLI) |
| **Web Server**      | Laragon (Apache)             |
| **Version Control** | Git & GitHub                 |

---

## 👥 Tim Pengembang

| Nama                     | Peran           | Tanggung Jawab                                      |
| :----------------------- | :-------------- | :-------------------------------------------------- |
| **[Nama Kamu]**    | Project Manager | Mengatur timeline, review code, dan integrasi fitur |
| **[Nama Teman 1]** | Frontend/UI-UX  | Desain antarmuka, slicing Tailwind, dan layout      |
| **[Nama Teman 2]** | Backend         | Logika halaman, proses form, dan query database     |
| **[Nama Teman 3]** | Database Admin  | Merancang ERD, migrasi tabel, dan seeder            |

---

## 🏗️ Konsep PHP Prosedural & Struktur Folder

Project ini menggunakan pendekatan **PHP Prosedural Terstruktur**. Setiap halaman memiliki file PHP-nya sendiri, bagian yang berulang (header, footer, fungsi bantu) disimpan di folder `includes/`, dan logika form diproses di folder `proses/`.

### 📁 Struktur Folder

```text
TitikTemu/
├── admin/                # Halaman khusus role Admin
│   └── dashboard.php
├── assets/               # Semua file statis
│   ├── css/              # input.css (source) & style.css (hasil build)
│   ├── img/              # Gambar & ikon
│   └── js/               # JavaScript custom
├── config/
│   └── database.php      # Koneksi PostgreSQL (PDO)
├── includes/             # Komponen yang dipanggil berulang
│   ├── functions.php     # Fungsi bantu (loadEnv, isLoggedIn, dll)
│   ├── header.php        # Layout atas (halaman setelah login)
│   ├── header_auth.php   # Layout atas khusus halaman login/register
│   ├── footer.php        # Layout bawah
│   ├── footer_auth.php   # Layout bawah khusus halaman login/register
│   └── navbar.php        # Navbar adaptif sesuai role
├── mahasiswa/            # Halaman khusus role Mahasiswa
│   ├── dashboard.php
│   ├── barang-temuan.php
│   ├── lapor-hilang.php
│   └── lapor-temuan.php
├── petugas/              # Halaman khusus role Petugas (Satpam)
│   ├── dashboard.php
│   ├── verifikasi.php
│   └── riwayat.php
├── proses/               # Handler form (POST only)
│   ├── login.php
│   ├── logout.php
│   ├── lapor-hilang.php
│   └── lapor-temuan.php
├── uploads/              # Tempat penyimpanan foto dari user
├── .env                  # Konfigurasi rahasia (JANGAN DI-COMMIT)
├── .env.example          # Template konfigurasi
├── .gitignore
├── index.php             # 🏠 Halaman LOGIN (halaman default)
├── package.json          # Untuk Tailwind CLI
├── tailwind.config.js    # Konfigurasi Tailwind
└── README.md
```

### 🔄 Alur Kerja PHP Prosedural

1. **User membuka URL** (misal `index.php`).
2. Halaman PHP memanggil `includes/functions.php` untuk load fungsi bantu.
3. Halaman juga memanggil `config/database.php` jika butuh akses database.
4. Halaman mengecek login/role via `requireLogin()`.
5. Halaman merender tampilan dengan `require includes/header.php` → konten → `require includes/footer.php`.
6. **Form dikirim** ke folder `proses/` (misal `proses/login.php`), lalu diproses, dan user di-redirect ke halaman yang sesuai.

> ⚠️ **Penting:** Jangan pernah mengakses file di dalam folder `config/` atau `proses/` secara langsung dari browser (kecuali melalui form submission). File `.env` harus tetap aman dan tidak boleh di-commit.

---

## 🚀 Cara Setup Environment & Database

### Prasyarat

- Laragon (dengan PHP 8.x, PostgreSQL, dan Apache)
- Node.js (untuk build Tailwind)
- Git
- Code Editor (VS Code)

### Langkah 1: Clone Repository

```bash
git clone https://github.com/melvinkw/titiktemu.git
cd titiktemu
```

### Langkah 2: Setup Environment

Copy file `.env.example` menjadi `.env`, lalu isi kredensial database kamu:

```bash
cp .env.example .env
```

Buka `.env` dan sesuaikan:

```env
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=titiktemu
DB_USERNAME=titiktemu_user
DB_PASSWORD=password_kamu

APP_NAME=TitikTemu
APP_DEBUG=true
```

### Langkah 3: Setup Database PostgreSQL

Buka terminal Laragon, lalu masuk ke psql:

```bash
psql -U postgres
```

Jalankan perintah SQL berikut:

```sql
CREATE DATABASE titiktemu;
CREATE USER titiktemu_user WITH PASSWORD 'password_kamu';
GRANT ALL PRIVILEGES ON DATABASE titiktemu TO titiktemu_user;
\c titiktemu
GRANT ALL ON SCHEMA public TO titiktemu_user;
\q
```

> **Catatan:** Jika kamu menggunakan PostgreSQL versi 15 ke atas, perintah `GRANT ALL ON SCHEMA public` wajib dijalankan.

### Langkah 4: Setup Tailwind CSS

Install dependency dan build Tailwind:

```bash
# Install dependency
npm install

# Build Tailwind (mode watch — biarkan terminal ini berjalan)
npx tailwindcss -i ./assets/css/input.css -o ./assets/css/style.css --watch
```

> **Penting:** Biarkan terminal `--watch` tetap berjalan selama development. Setiap kali kamu menyimpan file `.php`, Tailwind akan otomatis rebuild `style.css`.

### Langkah 5: Jalankan Aplikasi

Buka browser dan akses:

```text
http://localhost/TitikTemu/index.php
```

Login menggunakan akun uji coba:

| Username       | Password       | Role      |
| :------------- | :------------- | :-------- |
| `mahasiswa1` | `mahasiswa1` | mahasiswa |
| `satpam1`    | `satpam1`    | petugas   |
| `admin`      | `admin`      | admin     |

---

## 🌿 Aturan Git & Kolaborasi (WAJIB DIBACA)

Untuk menghindari **tabrakan kode (merge conflict)** dan memastikan kolaborasi berjalan lancar, kita menggunakan aturan berikut:

### 📌 Aturan Utama: 1 Orang = 1 Branch

**Jangan pernah** menulis kode langsung di branch `main`. Setiap anggota tim wajib membuat branch sendiri sesuai fitur yang dikerjakan.

**Format nama branch:**

- `feature/login` — untuk fitur login
- `feature/lapor-temuan` — untuk fitur upload barang temuan
- `feature/lapor-hilang` — untuk fitur lapor kehilangan
- `feature/verifikasi-satpam` — untuk fitur verifikasi
- `bugfix/nama-bug` — untuk perbaikan bug

### 🔄 Alur Kerja Git (Step by Step)

**1. Sebelum Mulai Bekerja (Pagi Hari)**
Selalu tarik update terbaru dari branch `main` agar kode kamu tidak ketinggalan:

```bash
git checkout main
git pull origin main
```

**2. Buat Branch Baru untuk Fitur Kamu**

```bash
git checkout -b feature/nama-fitur-kamu
```

**3. Kerjakan Fitur Kamu**
Lakukan coding seperti biasa. Setelah selesai, simpan perubahan:

```bash
git add .
git commit -m "feat: menambahkan fitur login"
```

**4. Push ke GitHub**

```bash
git push origin feature/nama-fitur-kamu
```

**5. Buat Pull Request (PR)**

- Buka repository di GitHub.
- Klik tombol **"Compare & pull request"**.
- Isi judul dan deskripsi singkat tentang apa yang kamu kerjakan.
- Minta **Project Manager** atau anggota lain untuk review.
- Setelah di-approve, baru di-merge ke `main`.

### ⚠️ Cara Menghindari Tabrakan Kode (Merge Conflict)

**Aturan Emas:** Selalu `git pull` dari `main` **SEBELUM** mulai coding dan **SEBELUM** push.

Jika kamu sudah lama tidak pull, dan ingin menyatukan update dari `main` ke branch kamu:

```bash
# Pindah ke main dulu
git checkout main
git pull origin main

# Balik ke branch kamu
git checkout feature/nama-fitur-kamu

# Gabungkan update dari main ke branch kamu
git merge main
```

Jika ada konflik, VS Code akan menunjukkan file mana yang bentrok. Selesaikan konflik tersebut, lalu:

```bash
git add .
git commit -m "fix: resolve merge conflict"
git push origin feature/nama-fitur-kamu
```

### 🚫 Yang Tidak Boleh Dilakukan

- ❌ Push langsung ke `main` tanpa Pull Request.
- ❌ Commit file `.env` (berisi password database).
- ❌ Commit folder `node_modules/` atau `uploads/` (kecuali `.gitkeep`).
- ❌ Bekerja di branch orang lain tanpa izin.
- ❌ Edit file `assets/css/style.css` secara manual (file ini hasil build otomatis).

### 📝 Konvensi Commit Message

Gunakan format berikut agar riwayat Git rapi dan mudah dibaca:

| Prefix        | Kegunaan                | Contoh                              |
| :------------ | :---------------------- | :---------------------------------- |
| `feat:`     | Menambah fitur baru     | `feat: menambahkan form login`    |
| `fix:`      | Memperbaiki bug         | `fix: perbaiki validasi password` |
| `docs:`     | Update dokumentasi      | `docs: update README`             |
| `style:`    | Perubahan styling/CSS   | `style: ubah warna tombol`        |
| `refactor:` | Perbaikan struktur kode | `refactor: pisahkan logic auth`   |

---

## ⚠️ Troubleshooting Umum

| Masalah                                 | Solusi                                                                                     |
| :-------------------------------------- | :----------------------------------------------------------------------------------------- |
| `could not find driver`               | Aktifkan ekstensi`pdo_pgsql` di Laragon → PHP → Extensions                             |
| `Connection refused`                  | Pastikan PostgreSQL sudah jalan di Laragon                                                 |
| `permission denied for schema public` | Jalankan`GRANT ALL ON SCHEMA public TO titiktemu_user;`                                  |
| Halaman blank/putih                     | Tambahkan`error_reporting(E_ALL); ini_set('display_errors', 1);` di file yang bermasalah |
| `ERR_CONNECTION_REFUSED`              | Cek port Laragon (Apache = 80) atau restart Laragon                                        |
| Tailwind style tidak muncul             | Pastikan terminal`--watch` berjalan dan `assets/css/style.css` sudah ter-*generate*  |
| Gambar pecah (broken image)             | Cek apakah file gambar sudah ada di`assets/img/` dan path menggunakan `baseUrl()`      |
| Form mengirim tapi tidak ada respon     | Cek handler di folder`proses/` — pastikan `action` form menunjuk file yang benar      |

---

## 📞 Kontak

Jika ada pertanyaan atau kendala, hubungi **Project Manager** terlebih dahulu sebelum bertanya ke anggota lain. Mari kita jaga komunikasi yang baik agar project ini selesai tepat waktu! 💪

---

**Dibuat dengan ❤️ oleh Tim TitikTemu — Politeknik Negeri Malang**
