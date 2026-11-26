# DATABASE MIGRATIONS
1. Menyusun 16 file migration custom dalam dua batch
   - 7 tabel profil & konten portofolio
   - 9 tabel proyek, operasional CMS, & analitik
2. Membuat migrations(php artisan make:migration create_nama_table_table)
3. Menjalankan migrasi dari dalam container PHP (php artisan migrate) lalu memverifikasi status tabel melalui migrate:status