# E-Surat

## Deskripsi Singkat

E-Surat adalah sebuah website berbasis Laravel yang digunakan untuk membuat dan mencetak surat secara digital.  
Aplikasi ini dirancang untuk membantu proses pembuatan surat secara lebih cepat, terstruktur, dan efisien, mulai dari pemilihan jenis surat hingga pencetakan dalam format PDF.

---

## Fitur Utama

-   Pemilihan jenis surat sesuai kebutuhan pengguna
-   Form pengisian data surat
-   Proses pembuatan surat secara digital
-   Cetak surat dalam format PDF
-   Antarmuka responsif menggunakan Tailwind CSS

---

## Alur Penggunaan Aplikasi

1. **Halaman Pemilihan Surat**  
   Pengguna memilih jenis surat yang akan dibuat.

2. **Halaman Form Pengisian Surat**  
   Pengguna mengisi data yang dibutuhkan sesuai dengan jenis surat.  
   Data yang telah diisi akan diproses untuk pembuatan dokumen surat.

3. **Halaman Success dan Print**  
   Sistem menampilkan pesan bahwa surat berhasil dibuat.  
   Pengguna dapat mencetak surat dalam format PDF.

---

## Teknologi yang Digunakan

-   Laravel
-   Tailwind CSS
-   Library Laravel untuk generate PDF (to PDF)

---

## Cara Instalasi

Buka terminal di folder project, lalu **copy-paste seluruh blok berikut sekaligus**:

```bash
git clone https://github.com/username/e-surat.git
cd e-surat
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

## Cara Menjalankan Project

Setelah server dijalankan, aplikasi dapat diakses melalui browser pada alamat:

http://127.0.0.1:8000

Pengguna dapat memilih jenis surat, mengisi data, dan mencetak surat dalam format PDF.
