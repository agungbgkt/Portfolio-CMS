# Tujuan
Dokumentasi ini menjelaskan proses awal pembuatan Portofolio CMS (Content Management System), mulai dari membuat project Frontend hinggal memastikan project dapat dijalankan dengan baik.

Project Portofolio dikembangkan menggunakan:
1. Frontend  : React.js
2. Build Tool: Vite
3. Styling   : Tailwind CSS
4. Backend   : Laravel
5. Database  : PostgreSQL
Fokus utama di tahap ini adalah menyiapkan environtment dan struktur awal project Frontend.

# Persiapan Environment
Node.js            => Menjalankan Javascript dan package manager (node -v)
npm                => Mengelola dependecies (npm -v)
Git                => Version Control (git --version)
Visual Studio Code => Code Editor 
PostgreSQL         => Database
PHP                => Menjalankan Laravel (php -v)
Composer           => Dependency manager Laravel (composer -v)

# Membuat Project React dengan Vite
Project Frontend dibuat menggunakan Vite karena proses development dan build lebih cepat serta konfigurasi awalnya yang sederhana.
Jalankan:
    npm create vite@latest
Menentukan konfigurasi project:
    Project name: Portofolio_CMS
    Framework: React
    Variant: Javascript
    => npm create vite@latest Portofolio_CMS -- --template react