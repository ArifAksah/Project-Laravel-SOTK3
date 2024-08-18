# Safety Observation Tour (SOT) - PT. Semen Tonasa

## Deskripsi
Aplikasi web **Safety Observation Tour (SOT)** adalah platform yang digunakan oleh PT. Semen Tonasa untuk memfasilitasi pendaftaran dan manajemen tur observasi keselamatan. Aplikasi ini memungkinkan tamu atau perusahaan yang berpartisipasi dalam observasi keselamatan untuk melakukan registrasi, serta memberikan dashboard khusus bagi pengguna dan administrator untuk mengelola data dan aktivitas terkait tur observasi.

## Fitur
- **Registrasi Tamu/Perusahaan:** 
  - Tamu atau perusahaan dapat mendaftarkan diri untuk ikut serta dalam observasi tur keselamatan.
  - Proses registrasi meliputi pengisian informasi detail peserta dan perusahaan.

- **Dashboard User:** 
  - Setiap pengguna memiliki akses ke dashboard personal untuk memantau status registrasi, melihat jadwal tur, dan mendapatkan informasi terkait lainnya.
  - Fitur notifikasi untuk pengingat dan update.

- **Dashboard Admin:**
  - Administrator memiliki akses ke dashboard untuk mengelola seluruh proses tur observasi.
  - Fitur manajemen peserta, penjadwalan tur, dan monitoring pelaksanaan tur.

## Teknologi yang Digunakan
- **Frontend:** 
  - React.js
  - HTML5, CSS3, JavaScript
- **Backend:**
  - Node.js dengan Express.js
- **Database:** 
  - MongoDB / MySQL
- **Autentikasi:** 
  - JWT (JSON Web Token)
- **Deployment:** 
  - Docker, Nginx, atau platform lain yang sesuai

## Instalasi
1. Clone repositori ini ke lokal Anda:
    ```bash
    git clone https://github.com/username/repository.git
    ```
2. Masuk ke direktori proyek:
    ```bash
    cd directory-name
    ```
3. Install dependencies:
    ```bash
    npm install
    ```
4. Konfigurasi environment variables:
    - Buat file `.env` di root directory.
    - Tambahkan variabel seperti `DB_CONNECTION`, `JWT_SECRET`, dll.

5. Jalankan aplikasi:
    ```bash
    npm start
    ```

6. Untuk mode produksi, build aplikasi menggunakan:
    ```bash
    npm run build
    ```

## Kontribusi
Kami menyambut kontribusi dari siapa saja. Silakan buat pull request atau ajukan issue untuk perbaikan atau fitur baru.

## Lisensi
Aplikasi ini dilisensikan di bawah lisensi [MIT](LICENSE).

## Kontak
Untuk informasi lebih lanjut, hubungi:
- **Nama:** [Nama Anda]
- **Email:** [email@semen-tonasa.com]
