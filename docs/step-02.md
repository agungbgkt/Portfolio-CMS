# PERANCANGAN DATABASE & ERD
1. Merancang 16 tabel custom PostgreSQL (ditambah users dan personal_access_tokens bawaan Laravel) dengan standar normalisasi 3NF.
2. Memetakan relasi antar-tabel: 1:1 (users ↔ profiles), 1:N (skill_categories → skills, projects → project_images), dan M:N (projects ↔ technologies melalui tabel pivot project_technology).
3. Menggunakan tipe data jsonb pada profiles.social_links agar daftar media sosial mudah ditambah tanpa mengubah struktur tabel.
4. Menerapkan ON DELETE CASCADE pada data turunan (seperti project_images), ON DELETE SET NULL pada page_views, index pada kolom filter utama, serta Soft Delete pada projects dan messages.
5. Menuliskan cetak biru skema dalam format DBML (docs/database.dbml) untuk divisualisasikan di dbdiagram.io.

Tahap ini dilakukan agar penyimpanan data rapi, bebas duplikasi, dan query pencarian maupun filter proyek tetap cepat saat data bertambah. Aturan relasi dan Soft Delete juga mencegah data yatim (orphan records) sekaligus menjaga histori kunjungan website tetap utuh meskipun suatu proyek dihapus.