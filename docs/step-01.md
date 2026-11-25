# REQUIREMENT ANALYSIS & PERANCANGAN SISTEM
1. Memetakan kebutuhan fungsional
   - 6 halaman Public Portfolio dan 8 modul Admin CMS.
2. Kebutuhan standar non-fungsional
   - performa API di bawah 300ms, keamanan autentikasi, dan tampilan mobile-first.
3. Menetapkan aktor dan hak akses
   - Visitor (akses baca publik & kirim pesan)
   - Super Admin (akses penuh CRUD tanpa fitur registrasi publik).
4. Mengevaluasi relevansi fitur dengan mengganti modul Employee menjadi Experiences & Educations.
5. Membagi prioritas fitur menjadi MVP (fitur inti yang wajib rilis lebih dulu) dan Phase 2.
6. Menetapkan keputusan arsitektur (ADR)
   - memisahkan Frontend dan Backend (Decoupled SPA + REST API)
   - Laravel Sanctum (Bearer Token) agar fleksibel lintas domain saat deployment
   - memakai Storage facade agar media mudah dipindahkan dari lokal ke cloud.

Tahap ini dilakukan di awal untuk mengunci ruang lingkup (scope) dan fondasi teknis proyek sebelum menyentuh kode. Tujuannya mencegah feature creep (menumpuk fitur yang tidak relevan) dan menghindari bongkar-pasang arsitektur di tengah jalan, sehingga proses coding lebih terarah dan cepat mencapai tahap siap deploy.