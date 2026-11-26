# MEMBUAT ELOQUENT MODEL DAN RELASINYA
Kita Perlu Eloquent Model Sebelum Membuat API karena sebagai berikut:
1. Keamanan Mass Assignment ( $fillable )
   - Mencegah penyerang menyuntikkan kolom sensitif (misal views_count atau id) lewat request API.
2. Casting Otomatis ( casts() )
   - Mengonversi tipe data PostgreSQL secara otomatis.
3. Relasi Antar-Tabel
   - Menghubungkan Project ↔ Technology, SkillCategory → Skill, dan User ↔ Profile agar nanti pengambilan data di API cukup 1 baris (Eager Loading) dan terhindar dari masalah performa N+1 Query.
4. Menghindari Jebakan Penamaan Tabel Laravel
   - Secara bawaan, Laravel menganggap bentuk jamak dari Education adalah education (tanpa huruf s), padahal tabel kita di PostgreSQL bernama educations. Maka kita wajib mendefinisikan protected $table = 'educations'; secara eksplisit.

# Langkah pertama generate menggunakan ( php artisan make:model nama_model )

# Di table User menggunakan HasApiTokens agar Laravel Sanctum bisa menerbitkan Bearer Token saat admin login.

# Di table User menggunakan HasOne untuk mendefinisikan relasi one-to-one (satu ke satu) antara tabel users dan profiles. Artinya 1 user untuk 1 profile.

# HasFactory memungkinkan model menggunakan Factory untuk menghasilkan data secara otomatis. menggunakan php artisan make:factory kemudian menggunakan php artisan tinker dan User::factory()->count(10)->create(); untuk generate 10 akun dummy.

# Di table Profile ada BelongsTo yang berarti Profile ini dimiliki 1 User.