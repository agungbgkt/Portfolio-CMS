# INISIALISASI MONOREPO & INSTALL FRAMEWORK
1. Membentuk struktur monorepo di root proyek yang memisahkan empat zona utama: server/, frontend/, docker/, dan docs/.
2. Menginstal Laravel 12 di server/ dan menjalankan php artisan install:api untuk mengaktifkan routes/api.php beserta Laravel Sanctum.
3. Menginstal React + Vite + Tailwind CSS di frontend/ dengan hanya empat library pendukung inti: react-router-dom, axios, lucide-react, dan recharts.
4. Menyiapkan folder docs/ khusus untuk dokumentasi arsitektur, skema database, dan langkah kerja.

Tahap ini dilakukan untuk memisahkan tanggung jawab antara backend, frontend, infrastruktur, dan dokumentasi secara tegas dalam satu repository. Pembatasan library sejak awal juga menjaga proyek tetap ringan, mudah dirawat, dan bebas dari ketergantungan paket yang tidak benar-benar dibutuhkan.