# DOKUMENTASI PROYEK IMPIDREAM
### Dream Planning Platform — Wujudkan Impianmu, Satu Langkah Setiap Hari

**Jenis Dokumen:** Dokumentasi Teknis & Produk Internal
**Versi Dokumen:** 1.1 (Revisi — Fokus Backend: Landing Page & Admin Panel)
**Status:** Final Draft — Pre-Development
**Klasifikasi:** Internal / Confidential
**Ditujukan untuk:** Product Team, Engineering Team (Backend & Mobile), UI/UX Team, QA Team, Stakeholder

---

## CATATAN REVISI VERSI 1.1

Versi ini menambahkan arahan prioritas baru: sebelum masuk ke pengembangan REST API untuk konsumsi mobile, tim akan **fokus menyelesaikan sisi backend web terlebih dahulu** — yaitu **Landing Page publik** dan **Admin Panel**. Perubahan mencakup:

- Revisi **Bagian 19** (Folder Structure Laravel) — penambahan lapisan `Web/` terpisah dari `Api/`.
- Revisi **Bagian 20** (Dokumentasi UI) — penambahan halaman Landing Page dan Admin Panel (20.13–20.17).
- Revisi **Bagian 25** (Development Roadmap) — urutan minggu kerja diubah agar Landing Page & Admin Panel dikerjakan lebih dulu, REST API/mobile menyusul.

Seluruh bagian lain pada dokumen versi 1.0 tetap berlaku dan tidak berubah.

---

## DAFTAR ISI

1. Executive Summary
2. Product Requirement Document (PRD)
3. Software Requirement Specification (SRS)
4. Functional Requirements
5. Non-Functional Requirements
6. User Persona
7. User Journey
8. User Story
9. Use Case
10. Activity Diagram
11. Sequence Diagram
12. Database Design
13. Entity Relationship Diagram (ERD)
14. REST API Documentation
15. Business Logic & Formula
16. Wallet Architecture
17. Marketplace Architecture
18. Folder Structure — Flutter (Clean Architecture)
19. Folder Structure — Laravel (Service Layer + Repository Pattern) — *direvisi*
20. Dokumentasi UI / Halaman Aplikasi — *direvisi, termasuk Landing Page & Admin Panel*
21. Design System
22. State Management
23. Security
24. Testing Strategy
25. Development Roadmap (MVP) — *direvisi, backend-first*
26. Future Roadmap (Pasca-MVP)
27. Prioritas Fitur (MoSCoW)
28. Risiko Proyek & Mitigasi
29. Deployment
30. Kesimpulan

---

## 1. EXECUTIVE SUMMARY

### 1.1 Latar Belakang

Hampir setiap orang memiliki impian yang berkaitan dengan kepemilikan barang atau pencapaian tertentu — laptop baru untuk bekerja, motor untuk mobilitas harian, kamera untuk hobi, tas idaman, liburan bersama keluarga, hingga momen pernikahan. Namun pada praktiknya, mayoritas masyarakat Indonesia menghadapi permasalahan yang sama ketika mencoba mewujudkan impian tersebut:

- Tidak mengetahui secara pasti **berapa total dana yang dibutuhkan**.
- Tidak memiliki **rencana menabung yang terukur** (harian, mingguan, atau bulanan).
- Tidak tahu **kapan impian tersebut realistis untuk tercapai**.
- Tidak memiliki referensi **produk mana yang paling sesuai dengan budget**.
- Tidak mengetahui **marketplace mana yang menawarkan harga terbaik**.
- Tidak memiliki cara untuk **memantau seberapa dekat mereka dengan target**.

Akibat dari kondisi ini, banyak impian yang tertunda bertahun-tahun, bahkan tidak pernah tercapai, bukan karena keterbatasan finansial semata, melainkan karena **tidak adanya perencanaan yang jelas dan terstruktur**.

### 1.2 Masalah yang Ingin Diselesaikan

| Masalah | Dampak bagi Pengguna |
|---|---|
| Tidak ada target dana yang jelas | Menabung tanpa arah, mudah menyerah |
| Tidak ada estimasi waktu pencapaian | Impian terasa "jauh" dan tidak realistis |
| Tidak ada rekomendasi produk & harga | Berpotensi membeli produk yang lebih mahal dari seharusnya |
| Tidak ada pemantauan progres | Motivasi menurun karena tidak melihat kemajuan |
| Pencatatan tabungan tersebar (dompet fisik, e-wallet, rekening) | Sulit menghitung total dana yang telah terkumpul |

### 1.3 Solusi

ImpiDream hadir sebagai **Dream Planning Platform** — sebuah aplikasi yang membantu pengguna mengubah impian abstrak menjadi rencana yang konkret, terukur, dan dapat dipantau. Melalui ImpiDream, pengguna dapat:

1. Menentukan impian secara spesifik (nama, kategori, target nominal, target tanggal).
2. Memilih atau mereferensikan produk dari marketplace sebagai acuan harga.
3. Mencatat dana yang dialokasikan melalui wallet (manual pada MVP, terintegrasi di masa depan).
4. Mendapatkan perhitungan otomatis mengenai kebutuhan menabung harian/mingguan/bulanan.
5. Memantau progres pencapaian impian secara visual dan real-time.

Penting untuk ditegaskan: **ImpiDream bukan aplikasi budgeting, bukan aplikasi pencatatan keuangan pribadi, dan bukan aplikasi investasi.** ImpiDream murni berfokus pada satu hal: **membantu seseorang merencanakan dan mencapai impiannya**.

### 1.4 Value Proposition

> "ImpiDream mengubah impian yang abstrak menjadi rencana yang jelas — dengan angka, waktu, dan langkah nyata setiap hari."

Nilai utama yang ditawarkan:

- **Kejelasan (Clarity):** Setiap impian memiliki angka pasti — berapa yang dibutuhkan, berapa yang sudah terkumpul, berapa yang harus ditabung.
- **Kesederhanaan (Simplicity):** Tidak ada kerumitan fitur keuangan lanjutan; fokus pada pengalaman inti yang mudah dipahami siapa saja.
- **Motivasi (Motivation):** Visualisasi progres membantu pengguna tetap termotivasi menabung secara konsisten.
- **Keterhubungan (Connectivity):** Arsitektur yang siap terintegrasi dengan marketplace dan layanan finansial di masa depan (Open Finance).

### 1.5 Target Market

**Target Primer:**
- Pelajar dan mahasiswa yang ingin membeli gadget atau kebutuhan studi.
- Fresh graduate yang mulai memiliki penghasilan pertama.
- Karyawan usia produktif (22–35 tahun) dengan impian konsumtif jangka menengah.

**Target Sekunder:**
- Freelancer dan pekerja lepas dengan penghasilan tidak tetap.
- Pebisnis kecil yang ingin membeli aset produktif (laptop, kamera, kendaraan operasional).
- Pasangan yang merencanakan pernikahan.

**Ukuran Pasar (Kontekstual):** Indonesia memiliki populasi digital native yang sangat besar dengan adopsi smartphone dan e-commerce yang tinggi, namun tingkat literasi perencanaan keuangan personal (khususnya untuk tujuan konsumtif) masih rendah — inilah celah pasar yang diisi oleh ImpiDream.

### 1.6 Business Model (Gambaran Awal — Bukan Fokus MVP)

Pada tahap MVP, ImpiDream **tidak memonetisasi** penggunanya secara langsung. Fokus utama adalah **product-market fit** dan **retensi pengguna**. Model bisnis potensial di masa depan (di luar cakupan MVP) antara lain:

| Model | Deskripsi |
|---|---|
| Affiliate Marketplace | Komisi dari transaksi yang terjadi melalui rekomendasi produk (fase lanjutan) |
| Freemium Feature | Fitur lanjutan seperti multi-dream analytics, price alert premium |
| B2B Partnership | Kerja sama dengan bank/e-wallet untuk fitur wallet synchronization |
| Data Insight (Anonim & Agregat) | Insight tren impian masyarakat untuk kebutuhan riset pasar (dengan kepatuhan privasi) |

### 1.7 Future Vision

ImpiDream dirancang sejak awal dengan arsitektur yang **scalable dan extensible**, sehingga di masa depan dapat berkembang menjadi:

- Platform yang terintegrasi dengan berbagai **wallet digital dan rekening bank** (Open Finance).
- Platform yang memiliki **AI Recommendation** untuk menyarankan produk dan strategi menabung yang dipersonalisasi.
- Platform dengan **price history & price alert** yang membantu pengguna membeli di waktu yang tepat.
- Ekosistem yang mendukung **investment goal** bagi pengguna yang ingin mencapai impian melalui instrumen investasi.
- Platform dengan **komunitas** yang saling memotivasi dalam mencapai impian.

Visi jangka panjang ini **tidak dikerjakan pada MVP**, namun menjadi dasar pertimbangan dalam setiap keputusan arsitektur sejak versi pertama.

---

## 2. PRODUCT REQUIREMENT DOCUMENT (PRD)

### 2.1 Product Vision

Menjadikan ImpiDream sebagai aplikasi pertama yang dibuka masyarakat Indonesia ketika mereka memiliki impian untuk dibeli atau dicapai — menggantikan cara lama (mencatat di notes, menghitung manual, atau tidak menghitung sama sekali) dengan pengalaman yang terarah, visual, dan memotivasi.

### 2.2 Product Goals

| # | Goal | Deskripsi |
|---|---|---|
| G1 | Kemudahan Membuat Rencana | Pengguna dapat membuat rencana impian dalam waktu kurang dari 2 menit |
| G2 | Kejelasan Angka | Pengguna selalu mengetahui nominal yang dibutuhkan dan sisa yang harus ditabung |
| G3 | Motivasi Berkelanjutan | Pengguna termotivasi menabung secara konsisten melalui visualisasi progres |
| G4 | Rekomendasi Relevan | Pengguna mendapat gambaran harga produk dari marketplace sebagai referensi |
| G5 | Fondasi yang Scalable | Arsitektur mendukung penambahan wallet & marketplace provider di masa depan tanpa refactor besar |

### 2.3 Success Metrics

| Metrik | Target Indikatif MVP | Cara Ukur |
|---|---|---|
| Activation Rate | ≥ 60% pengguna baru membuat minimal 1 Dream dalam 24 jam pertama | Event tracking: dream_created |
| Retention D7 | ≥ 30% pengguna kembali membuka aplikasi pada hari ke-7 | Analytics cohort |
| Dream Completion Rate | ≥ 10% Dream yang dibuat mencapai status "Tercapai" dalam 3 bulan | Query status dreams |
| Average Wallet Update Frequency | ≥ 2x per minggu per pengguna aktif | Event tracking: wallet_updated |
| Crash-Free Session Rate | ≥ 99% | Crash reporting tool |
| API Response Time (P95) | < 500 ms | APM / server log |

### 2.4 MVP Scope

Fitur yang **termasuk** dalam MVP:

1. Authentication (Register, Login, Logout, Forgot Password sederhana)
2. Dashboard (ringkasan seluruh Dream & progres)
3. Dream Management (CRUD Dream, kategori, target nominal & tanggal)
4. Wallet Management (Manual Wallet — pencatatan dana secara manual)
5. Marketplace Recommendation (referensi produk & harga secara statis/manual admin atau data seed, tanpa integrasi API real-time)
6. Progress Calculator (perhitungan otomatis kebutuhan menabung & estimasi waktu)
7. Profile (data diri pengguna)
8. Settings (notifikasi, keamanan akun, bahasa, tema)

### 2.5 Out of Scope (Tidak Dikerjakan pada MVP)

Sesuai arahan proyek, fitur berikut **secara eksplisit tidak dikerjakan** pada versi MVP:

- Kecerdasan Buatan (AI) dalam bentuk apapun
- Fitur Chat / Live Chat / Customer Service Chat
- Fitur Komunitas / Sosial (comment, like, share antar pengguna)
- Fitur Investasi (reksadana, saham, emas digital, dsb.)
- Fitur Pembayaran (payment gateway, checkout, dompet digital transaksi nyata)
- Gamifikasi (badge, level, leaderboard)
- Sistem Referral
- Sistem Affiliate
- Cashback
- Pinjaman (paylater, kredit)
- Cicilan

Fitur-fitur di atas dipertimbangkan kembali pada **Future Roadmap (Bagian 26)**, namun tidak boleh diimplementasikan pada tahap MVP agar tim dapat fokus membangun pengalaman inti secara matang.

### 2.6 Assumptions

- Pengguna memiliki akses internet stabil saat menggunakan aplikasi (tidak ada mode offline penuh pada MVP).
- Pengguna bersedia menginput data tabungan secara manual pada tahap awal (belum ada sinkronisasi otomatis dengan bank/e-wallet).
- Data harga produk marketplace pada MVP bersifat referensi (diinput manual oleh admin atau melalui data seed), bukan hasil scraping/API real-time.
- Pengguna menggunakan satu mata uang, yaitu Rupiah (IDR).
- Target pengguna awal adalah pengguna individu (single-user account), bukan akun keluarga/bersama.

### 2.7 Risks (Ringkasan — detail pada Bagian 28)

| Risiko | Kategori | Level |
|---|---|---|
| Pengguna malas menginput saldo secara manual sehingga progres tidak akurat | Produk | Tinggi |
| Data harga marketplace menjadi usang karena tidak real-time | Produk | Sedang |
| Ekspektasi pengguna terhadap fitur "menabung otomatis" tidak terpenuhi | Produk | Sedang |
| Kompleksitas arsitektur abstraksi wallet/marketplace pada awal proyek memperlambat development MVP | Teknis | Sedang |
| Skala pengguna melebihi kapasitas server pada awal peluncuran | Teknis | Rendah |

---

## 3. SOFTWARE REQUIREMENT SPECIFICATION (SRS)

### 3.1 Pendahuluan

Dokumen SRS ini disusun mengikuti kerangka standar industri (mengacu pada struktur IEEE 830) untuk memastikan seluruh kebutuhan perangkat lunak ImpiDream terdokumentasi secara jelas, dapat diverifikasi, dan dapat dijadikan acuan pengembangan oleh tim engineering.

### 3.2 Tujuan Dokumen

Dokumen ini bertujuan untuk mendefinisikan kebutuhan fungsional dan non-fungsional sistem ImpiDream versi MVP, sebagai acuan bagi tim Backend (Laravel), tim Mobile (Flutter), tim QA, dan tim Produk dalam proses pengembangan, pengujian, dan evaluasi.

### 3.3 Ruang Lingkup Produk

ImpiDream adalah aplikasi mobile (Flutter) dengan backend REST API (Laravel 12) yang memungkinkan pengguna membuat, mengelola, dan memantau progres impian finansial berbasis target nominal dan target waktu, didukung oleh fitur wallet manual dan referensi produk marketplace.

### 3.4 Definisi, Akronim, dan Singkatan

| Istilah | Definisi |
|---|---|
| Dream | Impian/target yang dibuat pengguna, memiliki nominal target dan tanggal target |
| Wallet | Media pencatatan dana yang dialokasikan pengguna untuk sebuah Dream |
| Dream Progress | Catatan historis penambahan/perubahan dana terhadap sebuah Dream |
| Marketplace Product | Data referensi produk yang berasal dari marketplace (Tokopedia, Shopee, dll) |
| MVP | Minimum Viable Product |
| REST API | Representational State Transfer Application Programming Interface |
| Sanctum | Fitur autentikasi berbasis token milik Laravel |
| Repository Pattern | Pola desain yang memisahkan logika akses data dari logika bisnis |
| Service Layer | Lapisan yang menampung logika bisnis, dipanggil oleh Controller |

### 3.5 Karakteristik Pengguna

| Tipe Pengguna | Karakteristik |
|---|---|
| Pengguna Umum (End User) | Menggunakan aplikasi mobile untuk membuat & memantau Dream |
| Admin (Internal, di luar cakupan UI MVP) | Mengelola data referensi produk marketplace melalui seeder/panel sederhana |

### 3.6 Lingkungan Operasi

- **Client:** Aplikasi mobile Flutter, berjalan di Android (minimum API 24 / Android 7.0) dan iOS (minimum iOS 13).
- **Server:** Laravel 12 di atas PHP 8.3+, dijalankan pada Linux server (Ubuntu) dengan Nginx/PHP-FPM.
- **Database:** MySQL 8.0.

### 3.7 Batasan Desain

- Backend wajib menggunakan arsitektur **REST API + Repository Pattern + Service Layer + MVC**.
- Autentikasi wajib menggunakan **Laravel Sanctum** (token-based, cocok untuk SPA/mobile).
- Seluruh komunikasi client-server wajib melalui **HTTPS**.
- Abstraksi Wallet Provider dan Marketplace Provider wajib disiapkan sejak awal meskipun implementasi API eksternal belum dikerjakan pada MVP.

### 3.8 Kebutuhan Fungsional (Ringkasan)

Dijelaskan lengkap pada **Bagian 4 — Functional Requirements**.

### 3.9 Kebutuhan Non-Fungsional (Ringkasan)

Dijelaskan lengkap pada **Bagian 5 — Non-Functional Requirements**.

### 3.10 Kebutuhan Antarmuka Eksternal

| Antarmuka | Deskripsi |
|---|---|
| REST API (Laravel ↔ Flutter) | Format JSON, autentikasi Bearer Token (Sanctum) |
| Marketplace Data Source (MVP) | Data seed/manual admin input, disiapkan agar dapat digantikan API resmi marketplace di masa depan |
| Wallet Data Source (MVP) | Input manual pengguna, disiapkan agar dapat digantikan API resmi bank/e-wallet di masa depan |

---

## 4. FUNCTIONAL REQUIREMENTS

### 4.1 Authentication

**Tujuan:** Memungkinkan pengguna membuat akun, masuk ke aplikasi, keluar dari aplikasi, dan memulihkan akses jika lupa kata sandi, dengan aman menggunakan token berbasis Laravel Sanctum.

**Alur Utama:**
1. Pengguna membuka aplikasi → diarahkan ke halaman Login/Register jika belum memiliki sesi aktif.
2. Register: pengguna mengisi nama, email, password, konfirmasi password → sistem membuat akun → sistem membuat token → pengguna diarahkan ke Dashboard.
3. Login: pengguna mengisi email & password → sistem memvalidasi kredensial → sistem menerbitkan token → pengguna diarahkan ke Dashboard.
4. Logout: token yang aktif pada perangkat tersebut dicabut (revoke) oleh server.
5. Forgot Password (versi sederhana MVP): pengguna memasukkan email → sistem mengirimkan tautan/kode reset melalui email → pengguna membuat password baru.

**Validasi:**
- Nama: wajib diisi, minimal 3 karakter, maksimal 100 karakter.
- Email: wajib diisi, format email valid, unik (belum terdaftar).
- Password: wajib diisi, minimal 8 karakter, kombinasi huruf dan angka.
- Konfirmasi Password: wajib sama dengan Password.
- Login: email harus terdaftar, password harus sesuai hash tersimpan.

**Business Rules:**
- Satu email hanya dapat digunakan untuk satu akun.
- Token yang diterbitkan memiliki masa berlaku sesuai konfigurasi Sanctum (dapat di-refresh dengan login ulang).
- Password disimpan dalam bentuk hash (bcrypt), tidak pernah disimpan dalam bentuk plain text.
- Percobaan login yang gagal dibatasi menggunakan rate limiting (lihat Bagian 23 — Security).

**Edge Cases:**
- Pengguna mendaftar dengan email yang sudah terdaftar → sistem menampilkan pesan error spesifik "Email sudah digunakan".
- Pengguna login dengan email yang belum terdaftar → pesan error umum "Email atau password salah" (tidak membocorkan apakah email terdaftar, demi keamanan).
- Koneksi terputus saat proses register/login → aplikasi menampilkan pesan retry, data form tidak hilang.
- Pengguna menekan tombol submit berkali-kali (double tap) → tombol dinonaktifkan sementara (debounce) saat request berlangsung.

**Acceptance Criteria:**
- Pengguna dapat mendaftar dengan data valid dan langsung masuk ke Dashboard.
- Pengguna tidak dapat mendaftar dengan email yang sama dua kali.
- Pengguna dapat login dan mendapatkan token yang tersimpan aman di perangkat (secure storage).
- Pengguna dapat logout dan token sebelumnya tidak lagi valid untuk mengakses endpoint yang memerlukan autentikasi.
- Pengguna dapat memulai proses reset password melalui email terdaftar.

### 4.2 Dashboard

**Tujuan:** Memberikan ringkasan cepat mengenai seluruh Dream milik pengguna, total progres, dan Dream yang paling mendekati pencapaian, sehingga pengguna langsung memahami kondisi terkini begitu membuka aplikasi.

**Alur Utama:**
1. Pengguna login/membuka aplikasi → sistem mengambil data ringkasan (total Dream aktif, total Dream tercapai, total dana terkumpul dari seluruh Dream).
2. Dashboard menampilkan daftar Dream aktif dalam bentuk card ringkas beserta persentase progres.
3. Pengguna dapat menekan salah satu card untuk menuju Dream Detail.
4. Pengguna dapat menekan tombol tambah (+) untuk membuat Dream baru.

**Validasi:** Tidak ada input data pada halaman ini (bersifat read-only/ringkasan), validasi berlaku pada aksi turunan (navigasi ke Create Dream, dsb).

**Business Rules:**
- Dream yang ditampilkan di Dashboard diurutkan berdasarkan: (1) Dream dengan progres tertinggi mendekati 100% terlebih dahulu, atau (2) berdasarkan tanggal target terdekat — sesuai konfigurasi sorting yang dipilih pengguna.
- Dream yang sudah berstatus "Tercapai" ditampilkan pada bagian terpisah (Riwayat/Selesai), tidak bercampur dengan Dream aktif.

**Edge Cases:**
- Pengguna belum memiliki Dream sama sekali → tampilkan Empty State dengan ajakan membuat Dream pertama.
- Gagal memuat data (masalah jaringan) → tampilkan Error State dengan tombol coba lagi.
- Data sangat banyak (puluhan Dream) → gunakan pagination/lazy load agar performa tetap baik.

**Acceptance Criteria:**
- Dashboard menampilkan seluruh Dream aktif dengan progres yang akurat sesuai data wallet terbaru.
- Dashboard menampilkan Empty State jika belum ada Dream.
- Dashboard dapat di-refresh (pull-to-refresh) untuk memperbarui data.

### 4.3 Dream Management

**Tujuan:** Memungkinkan pengguna membuat, melihat, mengubah, dan menghapus impian (Dream) sebagai objek utama dalam aplikasi.

**Alur Utama:**
1. **Create Dream:** pengguna memilih kategori (misal: Elektronik, Kendaraan, Liburan, Pernikahan, Lainnya) → mengisi nama Dream → mengisi target nominal → memilih target tanggal → (opsional) memilih/menautkan produk marketplace sebagai referensi harga → menyimpan.
2. **View Dream List:** menampilkan seluruh Dream dengan status (Aktif/Tercapai/Kadaluarsa).
3. **View Dream Detail:** menampilkan detail lengkap Dream, termasuk progres, riwayat penambahan dana, dan estimasi waktu pencapaian.
4. **Edit Dream:** pengguna dapat mengubah nama, target nominal, target tanggal, kategori, atau produk referensi.
5. **Delete Dream:** pengguna dapat menghapus Dream beserta seluruh riwayat progres terkait (dengan konfirmasi).

**Validasi:**
- Nama Dream: wajib diisi, 3–100 karakter.
- Target Nominal: wajib diisi, harus lebih besar dari 0, maksimal sesuai batas wajar (misal Rp 10.000.000.000).
- Target Tanggal: wajib diisi, harus lebih besar dari tanggal hari ini (tidak boleh tanggal lampau).
- Kategori: wajib dipilih dari daftar kategori yang tersedia.

**Business Rules:**
- Saat Dream dibuat, sistem otomatis membuat 1 Wallet terkait dengan saldo awal 0 (jika pengguna belum menautkan wallet manual).
- Status Dream ditentukan otomatis oleh sistem: `active` (progres < 100%, tanggal target belum lewat), `completed` (progres ≥ 100%), `overdue` (tanggal target telah lewat namun progres < 100%).
- Dream yang dihapus akan melakukan **soft delete** (tidak dihapus permanen dari database) agar data historis tetap dapat diaudit.
- Perubahan target nominal atau target tanggal akan memicu kalkulasi ulang (recalculate) terhadap kebutuhan menabung harian/mingguan/bulanan.

**Edge Cases:**
- Pengguna mengubah target tanggal menjadi tanggal yang sudah lewat setelah Dream berjalan → validasi menolak perubahan tersebut.
- Pengguna menghapus Dream yang memiliki riwayat progres → sistem meminta konfirmasi eksplisit ("Semua riwayat menabung akan ikut terhapus").
- Target nominal diubah menjadi lebih kecil dari dana yang sudah terkumpul → status otomatis berubah menjadi `completed`.

**Acceptance Criteria:**
- Pengguna dapat membuat Dream baru dengan data valid dalam waktu singkat.
- Pengguna dapat melihat detail Dream lengkap dengan progres terkini.
- Pengguna dapat mengedit dan menghapus Dream miliknya sendiri.
- Pengguna tidak dapat mengakses atau mengubah Dream milik pengguna lain.

### 4.4 Wallet Management

**Tujuan:** Menyediakan media pencatatan dana yang dialokasikan pengguna terhadap sebuah Dream, secara manual pada MVP, dengan arsitektur yang siap mendukung integrasi wallet digital/bank di masa depan.

**Alur Utama:**
1. Pengguna membuka menu Wallet dari sebuah Dream Detail atau menu Wallet global.
2. Pengguna menambahkan Wallet baru dengan memilih tipe **Manual** (satu-satunya opsi aktif pada MVP; opsi lain seperti BCA/GoPay/dll ditampilkan namun berstatus "Segera Hadir").
3. Pengguna mencatat penambahan dana (top up) ke Wallet dengan mengisi nominal dan tanggal.
4. Sistem mencatat setiap penambahan dana sebagai entri **Dream Progress** dan memperbarui saldo total Wallet.
5. Pengguna dapat melihat riwayat seluruh penambahan dana.

**Validasi:**
- Nominal top up: wajib diisi, harus lebih besar dari 0.
- Tanggal pencatatan: tidak boleh tanggal di masa depan.
- Wallet harus terhubung dengan tepat satu Dream (pada model MVP: relasi one-to-one/one-to-many sesuai desain di Bagian 12).

**Business Rules:**
- Setiap pencatatan dana pada Wallet secara otomatis memperbarui `current_amount` pada Dream terkait dan menambah satu baris pada `dream_progress`.
- Wallet MVP tidak melakukan validasi terhadap saldo riil rekening (murni pencatatan, bukan verifikasi transaksi).
- Provider wallet lain (BCA, Mandiri, BNI, BRI, SeaBank, Jago, DANA, GoPay, OVO, ShopeePay) telah didefinisikan dalam enum/tabel referensi provider, namun logic sinkronisasi API belum aktif pada MVP (lihat Bagian 16).

**Edge Cases:**
- Pengguna mencatat nominal yang sangat besar secara tidak sengaja (salah ketik) → sistem menampilkan konfirmasi jika nominal melebihi ambang tertentu (misal 10x rata-rata pencatatan sebelumnya) — bersifat soft-warning, bukan blocking.
- Pengguna menghapus satu entri riwayat progres → saldo Wallet dan progres Dream dihitung ulang otomatis.
- Dream terkait Wallet telah dihapus → Wallet ikut dinonaktifkan (soft delete cascading).

**Acceptance Criteria:**
- Pengguna dapat mencatat penambahan dana dan melihat saldo Wallet ter-update secara real-time.
- Pengguna dapat melihat riwayat lengkap seluruh pencatatan dana.
- Sistem menampilkan opsi provider wallet lain sebagai "Segera Hadir" tanpa mengaktifkan fungsinya.

### 4.5 Marketplace Recommendation

**Tujuan:** Membantu pengguna memiliki referensi harga produk nyata yang relevan dengan Dream yang sedang direncanakan, sehingga target nominal yang ditentukan lebih realistis.

**Alur Utama:**
1. Saat membuat/mengedit Dream, pengguna dapat mencari produk berdasarkan kata kunci atau kategori.
2. Sistem menampilkan daftar produk referensi (data dari `marketplace_products`) lengkap dengan nama produk, harga, marketplace asal, dan tautan (link) menuju marketplace tersebut.
3. Pengguna dapat memilih satu produk sebagai referensi → target nominal Dream otomatis terisi (dapat diubah manual jika perlu) sesuai harga produk.
4. Pengguna dapat membuka tautan produk untuk melihat detail lebih lanjut di marketplace (membuka browser eksternal/webview).

**Validasi:**
- Pencarian minimal 2 karakter untuk memicu query.
- Produk yang ditampilkan harus berstatus aktif (`is_active = true`) pada tabel referensi.

**Business Rules:**
- Data produk pada MVP diinput secara manual oleh admin/tim internal (melalui seeder atau panel input sederhana), bukan hasil scraping otomatis.
- Setiap produk memiliki referensi marketplace (Tokopedia, Shopee, Blibli, Lazada, TikTok Shop) melalui `MarketplaceProvider` (lihat Bagian 17).
- Rekomendasi bersifat pasif — murni pencarian berdasarkan kata kunci/kategori, tanpa personalisasi otomatis pada MVP.

**Edge Cases:**
- Pencarian tidak menemukan produk yang relevan → tampilkan Empty State dengan opsi "Lanjutkan tanpa referensi produk".
- Harga produk pada data referensi sudah usang (marketplace mengubah harga) → tampilkan label "Harga terakhir diperbarui pada [tanggal]" agar pengguna menyadari potensi perubahan.
- Produk dihapus/dinonaktifkan admin setelah ditautkan ke Dream pengguna → Dream tetap menyimpan nominal & nama produk terakhir (snapshot), tidak error.

**Acceptance Criteria:**
- Pengguna dapat mencari dan memilih produk referensi saat membuat Dream.
- Target nominal Dream dapat terisi otomatis dari harga produk yang dipilih.
- Pengguna dapat membuka tautan produk menuju marketplace terkait.

### 4.6 Progress Calculator

**Tujuan:** Menghitung secara otomatis kebutuhan menabung (harian, mingguan, bulanan) serta estimasi tanggal pencapaian Dream berdasarkan target nominal, dana terkumpul, dan sisa waktu.

**Alur Utama:**
1. Sistem mengambil data: target nominal, dana terkumpul saat ini, tanggal target, tanggal hari ini.
2. Sistem menghitung sisa dana yang dibutuhkan (`remaining_amount`).
3. Sistem menghitung sisa hari hingga target tanggal.
4. Sistem menghitung kebutuhan menabung harian, mingguan, dan bulanan (formula lengkap pada Bagian 15).
5. Sistem menampilkan estimasi tanggal pencapaian berdasarkan rata-rata kecepatan menabung historis pengguna (opsional/insight tambahan).
6. Seluruh hasil ditampilkan di Dream Detail secara visual (progress bar + angka).

**Validasi:** Perhitungan hanya dijalankan jika target tanggal > tanggal hari ini; jika tidak, sistem menandai Dream sebagai `overdue` dan menghentikan proyeksi ke depan.

**Business Rules:**
- Perhitungan dilakukan secara real-time setiap kali data Dream/Wallet diperbarui (bukan proses batch terjadwal), memastikan angka yang ditampilkan selalu terbaru.
- Jika dana terkumpul telah mencapai atau melebihi target nominal, seluruh kebutuhan menabung ditampilkan sebagai Rp 0 dan status berubah menjadi `completed`.

**Edge Cases:**
- Sisa hari hingga target adalah 0 (target tanggal = hari ini) namun dana belum cukup → sistem menampilkan peringatan bahwa target tidak lagi realistis.
- Target nominal sangat kecil dan tercapai instan setelah pencatatan pertama → Dream langsung berstatus `completed`.

**Acceptance Criteria:**
- Sistem menampilkan kebutuhan menabung harian, mingguan, dan bulanan yang akurat.
- Perhitungan diperbarui otomatis setiap ada perubahan dana atau target.
- Sistem menandai Dream sebagai kadaluarsa (overdue) jika tanggal target terlewati dan target belum tercapai.

### 4.7 Profile

**Tujuan:** Memungkinkan pengguna melihat dan memperbarui data pribadi dasar mereka.

**Alur Utama:**
1. Pengguna membuka menu Profile → melihat nama, email, foto profil (opsional), dan ringkasan statistik (jumlah Dream, jumlah Dream tercapai).
2. Pengguna dapat mengubah nama dan foto profil.
3. Pengguna dapat mengubah password melalui menu terpisah (dengan verifikasi password lama).

**Validasi:**
- Nama: 3–100 karakter.
- Foto profil: format JPG/PNG, maksimal ukuran file sesuai konfigurasi (misal 2MB).
- Password baru: minimal 8 karakter, harus berbeda dari password lama.

**Business Rules:**
- Email tidak dapat diubah pada MVP (menjadi identitas unik akun); perubahan email dipertimbangkan pada versi lanjutan dengan proses verifikasi ulang.
- Perubahan password akan mencabut seluruh token aktif kecuali sesi yang sedang digunakan (opsional, tergantung kebijakan keamanan final).

**Edge Cases:**
- Pengguna mengunggah foto dengan format tidak didukung → validasi ditolak dengan pesan jelas.
- Pengguna memasukkan password lama yang salah saat ingin mengubah password → ditolak dengan pesan error spesifik.

**Acceptance Criteria:**
- Pengguna dapat melihat dan memperbarui nama serta foto profil.
- Pengguna dapat mengubah password dengan verifikasi password lama.

### 4.8 Settings

**Tujuan:** Memberikan kontrol kepada pengguna atas preferensi aplikasi seperti notifikasi, keamanan akun, bahasa, dan tampilan (tema).

**Alur Utama:**
1. Pengguna membuka menu Settings.
2. Pengguna dapat mengaktifkan/menonaktifkan notifikasi pengingat menabung.
3. Pengguna dapat mengubah bahasa aplikasi (Indonesia/Inggris — jika tersedia pada MVP, minimal Indonesia).
4. Pengguna dapat mengubah tema (Light/Dark).
5. Pengguna dapat menghapus akun (Account Deletion) dengan konfirmasi berlapis.
6. Pengguna dapat logout dari menu Settings.

**Validasi:** Penghapusan akun memerlukan konfirmasi ulang password sebagai lapisan keamanan tambahan.

**Business Rules:**
- Penghapusan akun bersifat soft delete pada level data (untuk kebutuhan audit/kepatuhan), namun pengguna tidak dapat login kembali dan seluruh data personal disembunyikan dari akses normal.
- Pengaturan notifikasi disimpan per pengguna dan memengaruhi apakah sistem mengirimkan push notification pengingat.

**Edge Cases:**
- Pengguna menghapus akun namun masih memiliki Dream aktif → sistem tetap memproses penghapusan, seluruh data Dream ikut dinonaktifkan.
- Pengguna offline saat mengubah pengaturan → perubahan disimpan lokal sementara dan disinkronkan saat online kembali (opsional, tergantung kompleksitas MVP).

**Acceptance Criteria:**
- Pengguna dapat mengatur preferensi notifikasi, bahasa, dan tema.
- Pengguna dapat menghapus akun dengan alur konfirmasi yang aman.
- Pengguna dapat logout dengan token yang langsung tidak valid.

---

## 5. NON-FUNCTIONAL REQUIREMENTS

### 5.1 Security
- Seluruh komunikasi client-server wajib menggunakan HTTPS/TLS.
- Autentikasi menggunakan token Sanctum yang disimpan pada secure storage perangkat (Keychain untuk iOS, Keystore untuk Android), tidak pernah disimpan pada shared preferences biasa tanpa enkripsi.
- Password disimpan menggunakan hashing bcrypt (default Laravel), tidak pernah plain text maupun reversible encryption.
- Endpoint API menerapkan otorisasi berbasis kepemilikan data (user hanya dapat mengakses Dream/Wallet miliknya sendiri) melalui Policy/Gate Laravel.
- Rate limiting diterapkan pada endpoint sensitif (login, register, forgot password) untuk mencegah brute force.

### 5.2 Performance
- Target waktu respons API rata-rata di bawah 300ms untuk operasi CRUD sederhana, dan di bawah 500ms untuk P95.
- Query database dioptimalkan menggunakan index pada kolom yang sering difilter (user_id, dream_id, status).
- Aplikasi Flutter menerapkan lazy loading dan pagination pada daftar Dream/Progress yang panjang.

### 5.3 Maintainability
- Kode backend mengikuti Repository Pattern + Service Layer agar logika bisnis terpisah dari akses data dan mudah diuji/diubah.
- Kode Flutter mengikuti Clean Architecture agar setiap layer (presentation, domain, data) dapat diubah secara independen.
- Seluruh fungsi/formula bisnis (perhitungan tabungan) didokumentasikan dan diletakkan pada satu lapisan Service khusus agar mudah diaudit.

### 5.4 Scalability
- Arsitektur backend bersifat stateless (autentikasi berbasis token), memudahkan horizontal scaling di belakang load balancer.
- Struktur database dirancang mendukung penambahan tabel/relasi baru (misalnya wallet_providers, marketplace_providers) tanpa mengubah struktur inti.
- Abstraksi Wallet Provider dan Marketplace Provider memungkinkan penambahan integrasi baru tanpa mengubah logika inti aplikasi.

### 5.5 Reliability
- Sistem harus mampu menangani kegagalan parsial (misalnya gagal mengambil data marketplace) tanpa menyebabkan seluruh aplikasi crash.
- Setiap operasi penting (pencatatan dana, perubahan target) dibungkus dalam transaksi database untuk menjaga konsistensi data.

### 5.6 Availability
- Target uptime backend minimal 99.5% pada tahap awal peluncuran.
- Mekanisme health-check endpoint disediakan untuk monitoring otomatis oleh infrastruktur.

### 5.7 Logging
- Seluruh request API dicatat (access log) mencakup endpoint, status code, waktu respons.
- Error level Aplikasi (5xx) dicatat secara detail (stack trace) pada log server, namun response ke client tidak menampilkan detail teknis (mencegah kebocoran informasi).
- Aktivitas penting pengguna (create Dream, delete Dream, delete Account) dicatat pada tabel audit sederhana untuk kebutuhan investigasi di masa depan.

### 5.8 Error Handling
- Seluruh response API mengikuti format standar (lihat Bagian 14) sehingga Flutter dapat menangani error secara konsisten.
- Flutter menampilkan pesan error yang ramah pengguna (bukan pesan teknis mentah dari server).
- Kegagalan jaringan ditangani dengan retry mechanism sederhana dan pesan "Periksa koneksi internet Anda".

### 5.9 Backup
- Database di-backup otomatis setiap hari (daily backup) dengan retensi minimal 7 hari, dan backup mingguan dengan retensi 1 bulan.
- Backup disimpan terpisah dari server utama (offsite/cloud storage).

### 5.10 Accessibility
- Kontras warna teks dan latar mengikuti standar WCAG AA minimal.
- Ukuran font dapat menyesuaikan pengaturan aksesibilitas perangkat (dynamic type/font scaling).
- Seluruh elemen interaktif memiliki label yang dapat dibaca oleh screen reader (semantics label pada Flutter).

### 5.11 Responsiveness
- Tampilan aplikasi menyesuaikan berbagai ukuran layar smartphone (small, medium, large) dengan layout adaptif.
- Orientasi aplikasi difokuskan pada portrait mode untuk MVP.

---

## 6. USER PERSONA

### Persona 1 — Dinda, Sang Mahasiswa Penabung Gadget
- **Umur:** 20 tahun
- **Pekerjaan:** Mahasiswa Semester 5, Desain Komunikasi Visual
- **Goal:** Ingin membeli laptop baru untuk kebutuhan tugas desain dalam 8 bulan ke depan.
- **Pain Point:** Uang saku terbatas, sering tergoda membeli hal lain sehingga tabungan laptop tidak konsisten.
- **Motivasi:** Ingin melihat progres secara visual agar termotivasi menahan diri dari pengeluaran impulsif.

### Persona 2 — Rangga, Fresh Graduate yang Baru Bekerja
- **Umur:** 23 tahun
- **Pekerjaan:** Staff Marketing di perusahaan swasta (gaji pertama)
- **Goal:** Membeli motor untuk menunjang mobilitas kerja dalam 1 tahun.
- **Pain Point:** Belum terbiasa mengatur keuangan sendiri, sering bingung berapa yang harus disisihkan tiap bulan.
- **Motivasi:** Membutuhkan panduan angka pasti agar tidak salah kelola gaji pertamanya.

### Persona 3 — Sari, Freelancer dengan Penghasilan Tidak Tetap
- **Umur:** 27 tahun
- **Pekerjaan:** Freelance graphic designer
- **Goal:** Menabung untuk liburan ke Bali bersama pasangan dalam 6 bulan.
- **Pain Point:** Penghasilan naik turun setiap bulan, sulit menentukan nominal tabungan tetap.
- **Motivasi:** Ingin melihat estimasi waktu pencapaian yang fleksibel menyesuaikan seberapa banyak dana yang berhasil ditabung tiap bulan.

### Persona 4 — Bagus, Karyawan yang Merencanakan Pernikahan
- **Umur:** 29 tahun
- **Pekerjaan:** Software Engineer
- **Goal:** Mengumpulkan dana pernikahan sebesar Rp 150.000.000 dalam 18 bulan.
- **Pain Point:** Target besar terasa berat dan menakutkan tanpa breakdown yang jelas.
- **Motivasi:** Membutuhkan breakdown menabung bulanan yang jelas agar target besar terasa lebih mudah dicapai secara bertahap.

### Persona 5 — Wulan, Pebisnis Kecil yang Ingin Membeli Kamera untuk Kontennya
- **Umur:** 31 tahun
- **Pekerjaan:** Pemilik usaha kecil (UMKM) di bidang kuliner, aktif membuat konten produk
- **Goal:** Membeli kamera mirror-less untuk meningkatkan kualitas konten promosi dalam 4 bulan.
- **Pain Point:** Sulit membandingkan harga kamera yang sama di berbagai marketplace untuk mendapatkan harga terbaik.
- **Motivasi:** Ingin referensi harga produk yang jelas agar bisa menyisihkan dana secara tepat tanpa membeli terlalu mahal.

### Persona 6 — Fikri, Pelajar SMA yang Menabung untuk Sepeda
- **Umur:** 17 tahun
- **Pekerjaan:** Pelajar SMA
- **Goal:** Membeli sepeda gunung impian dalam 5 bulan dari uang saku dan hasil menjual barang bekas.
- **Pain Point:** Belum memiliki rekening bank, hanya menabung dalam bentuk uang tunai/celengan.
- **Motivasi:** Ingin cara sederhana mencatat tabungan tunai tanpa perlu rekening bank, cukup manual.

---

## 7. USER JOURNEY

Alur perjalanan pengguna utama dalam ImpiDream, dari titik unduh aplikasi hingga impian tercapai:

```
Download Aplikasi -> Register Akun -> Login -> Tambah Dream Baru
-> Cari Produk Referensi di Marketplace -> Tentukan Target Nominal & Tanggal
-> Tambah Wallet Manual -> Sistem Menghitung Kebutuhan Menabung
-> Pengguna Menabung Secara Berkala -> Mencatat Penambahan Dana ke Wallet
-> Melihat Progress di Dashboard/Dream Detail
-> [Target Tercapai? Belum -> kembali menabung | Sudah -> Dream Berstatus Tercapai]
-> Pengguna Membeli Produk Impian
```

**Naratif Setiap Tahap:**

1. **Download** — Pengguna mengunduh aplikasi ImpiDream dari Play Store/App Store setelah melihat iklan/rekomendasi/word-of-mouth.
2. **Register** — Pengguna membuat akun baru dengan email dan password.
3. **Login** — Pengguna masuk ke aplikasi dan diarahkan ke Dashboard kosong (pengguna baru).
4. **Tambah Dream** — Pengguna menekan tombol "Tambah Impian" dan mengisi detail dasar.
5. **Cari Produk** — Pengguna mencari referensi harga produk melalui fitur Marketplace Recommendation.
6. **Tambah Wallet** — Pengguna membuat Wallet manual untuk mulai mencatat tabungan.
7. **Lihat Progress** — Sistem menampilkan kebutuhan menabung harian/mingguan/bulanan serta estimasi tanggal tercapai.
8. **Menabung** — Pengguna secara rutin mencatat penambahan dana.
9. **Target Tercapai** — Setelah dana terkumpul mencukupi, status Dream berubah menjadi "Tercapai" dan pengguna dapat melanjutkan ke pembelian produk secara mandiri (di luar aplikasi, karena tidak ada fitur pembayaran pada MVP).

---

## 8. USER STORY

### Authentication
1. Sebagai pengguna baru, saya ingin mendaftar menggunakan email dan password, sehingga saya dapat memiliki akun pribadi di ImpiDream.
2. Sebagai pengguna terdaftar, saya ingin masuk menggunakan email dan password, sehingga saya dapat mengakses Dream saya.
3. Sebagai pengguna, saya ingin keluar dari akun saya, sehingga perangkat lain tidak dapat mengakses data saya tanpa login ulang.
4. Sebagai pengguna yang lupa password, saya ingin melakukan reset password melalui email, sehingga saya tetap dapat mengakses akun saya.

### Dashboard
5. Sebagai pengguna, saya ingin melihat ringkasan seluruh impian saya di satu layar, sehingga saya bisa memahami kondisi keuangan impian saya secara cepat.
6. Sebagai pengguna, saya ingin melihat Dream mana yang paling mendekati tercapai, sehingga saya termotivasi menyelesaikannya.

### Dream Management
7. Sebagai pengguna, saya ingin membuat Dream baru dengan nama, target nominal, dan target tanggal, sehingga saya memiliki rencana yang jelas.
8. Sebagai pengguna, saya ingin memilih kategori untuk Dream saya, sehingga saya dapat mengelompokkan impian saya dengan rapi.
9. Sebagai pengguna, saya ingin mengedit Dream yang sudah dibuat, sehingga saya dapat menyesuaikan target jika ada perubahan rencana.
10. Sebagai pengguna, saya ingin menghapus Dream yang tidak lagi relevan, sehingga daftar impian saya tetap rapi.
11. Sebagai pengguna, saya ingin melihat detail lengkap sebuah Dream termasuk riwayat menabung, sehingga saya dapat mengevaluasi progres saya.

### Wallet Management
12. Sebagai pengguna, saya ingin menambahkan Wallet manual untuk Dream saya, sehingga saya dapat mulai mencatat tabungan.
13. Sebagai pengguna, saya ingin mencatat setiap kali saya menabung, sehingga saldo Wallet saya selalu terbaru.
14. Sebagai pengguna, saya ingin melihat riwayat seluruh pencatatan dana, sehingga saya dapat melacak kebiasaan menabung saya.
15. Sebagai pengguna, saya ingin melihat opsi wallet bank/e-wallet lain meskipun belum aktif, sehingga saya tahu fitur ini akan hadir di masa depan.

### Marketplace Recommendation
16. Sebagai pengguna, saya ingin mencari produk berdasarkan kata kunci, sehingga saya mendapat referensi harga yang relevan dengan impian saya.
17. Sebagai pengguna, saya ingin menautkan produk marketplace ke Dream saya, sehingga target nominal saya lebih realistis.
18. Sebagai pengguna, saya ingin membuka tautan produk ke marketplace aslinya, sehingga saya bisa melihat detail produk lebih lanjut.

### Progress Calculator
19. Sebagai pengguna, saya ingin mengetahui berapa yang harus saya tabung setiap hari, sehingga saya memiliki target harian yang jelas.
20. Sebagai pengguna, saya ingin mengetahui berapa yang harus saya tabung setiap minggu dan bulan, sehingga saya dapat menyesuaikan dengan pola penghasilan saya.
21. Sebagai pengguna, saya ingin mengetahui estimasi kapan impian saya akan tercapai, sehingga saya dapat merencanakan waktu pembelian.
22. Sebagai pengguna, saya ingin melihat persentase progres impian saya secara visual, sehingga saya lebih termotivasi.

### Profile
23. Sebagai pengguna, saya ingin melihat dan mengubah nama serta foto profil saya, sehingga akun saya mencerminkan identitas saya.
24. Sebagai pengguna, saya ingin mengubah password saya, sehingga keamanan akun saya tetap terjaga.

### Settings
25. Sebagai pengguna, saya ingin mengatur notifikasi pengingat menabung, sehingga saya tidak lupa mencatat tabungan saya.
26. Sebagai pengguna, saya ingin mengganti tema aplikasi menjadi gelap/terang, sehingga saya nyaman menggunakan aplikasi sesuai preferensi.
27. Sebagai pengguna, saya ingin menghapus akun saya jika tidak ingin lagi menggunakan aplikasi, sehingga data saya tidak lagi tersimpan aktif.

---

## 9. USE CASE

### UC-01: Register Akun
- **Actor:** Pengguna (Guest/belum login)
- **Precondition:** Pengguna belum memiliki akun terdaftar.
- **Main Flow:** Pengguna membuka halaman Register → mengisi nama, email, password, konfirmasi password → sistem memvalidasi input → sistem membuat akun baru dan menerbitkan token autentikasi → sistem mengarahkan pengguna ke Dashboard.
- **Alternative Flow:** Email sudah terdaftar → sistem menampilkan pesan error, pengguna kembali ke form. Password tidak memenuhi kriteria → sistem menampilkan pesan validasi spesifik.
- **Post Condition:** Akun baru tersimpan di database, pengguna dalam status logged-in.

### UC-02: Login
- **Actor:** Pengguna terdaftar
- **Precondition:** Pengguna memiliki akun aktif.
- **Main Flow:** Pengguna mengisi email dan password pada halaman Login → sistem memvalidasi kredensial → sistem menerbitkan token dan mengarahkan ke Dashboard.
- **Alternative Flow:** Kredensial salah → sistem menampilkan pesan error umum.
- **Post Condition:** Pengguna memiliki sesi aktif (token tersimpan).

### UC-03: Membuat Dream Baru
- **Actor:** Pengguna terautentikasi
- **Precondition:** Pengguna sudah login.
- **Main Flow:** Pengguna menekan tombol "Tambah Dream" → mengisi nama, kategori, target nominal, target tanggal → (opsional) memilih produk referensi dari Marketplace → sistem memvalidasi input dan menyimpan Dream baru beserta Wallet otomatis → sistem menampilkan Dream Detail dengan hasil kalkulasi awal.
- **Alternative Flow:** Target tanggal tidak valid (lampau) → sistem menolak dan menampilkan pesan error. Pengguna melewati pemilihan produk → target nominal diisi manual.
- **Post Condition:** Dream baru tersimpan dengan status `active`, Wallet awal dengan saldo 0 dibuat.

### UC-04: Mencatat Penambahan Dana ke Wallet
- **Actor:** Pengguna terautentikasi (pemilik Dream)
- **Precondition:** Dream dan Wallet terkait telah ada.
- **Main Flow:** Pengguna membuka Dream Detail → menu Wallet → menekan "Tambah Dana", mengisi nominal dan tanggal → sistem memvalidasi input → sistem mencatat entri pada `dream_progress`, memperbarui `current_amount` pada Dream → sistem menghitung ulang progres dan kebutuhan menabung.
- **Alternative Flow:** Nominal ≤ 0 → sistem menolak dengan pesan error. Dana yang tercatat menyebabkan target tercapai → status Dream berubah menjadi `completed`.
- **Post Condition:** Saldo Wallet dan progres Dream diperbarui secara konsisten.

### UC-05: Mencari Produk Referensi
- **Actor:** Pengguna terautentikasi
- **Precondition:** Pengguna sedang membuat/mengedit Dream.
- **Main Flow:** Pengguna mengetik kata kunci pencarian → sistem menampilkan daftar produk yang relevan dari `marketplace_products` → pengguna memilih salah satu produk → sistem mengisi target nominal Dream berdasarkan harga produk terpilih.
- **Alternative Flow:** Tidak ada hasil relevan → sistem menampilkan Empty State.
- **Post Condition:** Dream tertaut dengan referensi produk (snapshot nama & harga).

### UC-06: Menghapus Dream
- **Actor:** Pengguna terautentikasi (pemilik Dream)
- **Precondition:** Dream yang akan dihapus milik pengguna yang sedang login.
- **Main Flow:** Pengguna membuka Dream Detail → menekan "Hapus Dream" → sistem menampilkan dialog konfirmasi → pengguna mengonfirmasi penghapusan → sistem melakukan soft delete terhadap Dream dan data terkait (Wallet, Progress).
- **Alternative Flow:** Pengguna membatalkan → tidak ada perubahan data.
- **Post Condition:** Dream tidak lagi muncul pada daftar aktif pengguna.

---

## 10. ACTIVITY DIAGRAM

### 10.1 Activity Diagram — Membuat Dream Baru

```
Mulai -> Buka Halaman Tambah Dream -> Isi Nama & Kategori
-> Isi Target Nominal & Tanggal
-> [Ingin Menautkan Produk Marketplace? Ya -> Cari & Pilih Produk -> Target Nominal Terisi Otomatis | Tidak -> Lewati]
-> Submit Form
-> [Validasi Berhasil? Tidak -> Tampilkan Pesan Error -> kembali ke Isi Nama & Kategori | Ya -> Simpan Dream & Buat Wallet Otomatis]
-> Hitung Kebutuhan Menabung -> Tampilkan Dream Detail -> Selesai
```

### 10.2 Activity Diagram — Mencatat Penambahan Dana

```
Mulai -> Buka Dream Detail -> Pilih Menu Wallet -> Tekan Tambah Dana -> Isi Nominal & Tanggal
-> [Nominal Valid? Tidak -> Tampilkan Error Validasi -> kembali isi ulang | Ya -> Simpan Entri Dream Progress]
-> Update Saldo Wallet -> Hitung Ulang Progress Dream
-> [Target Tercapai? Ya -> Ubah Status Dream Menjadi Tercapai | Tidak -> Tetap Status Aktif]
-> Tampilkan Notifikasi Sukses -> Selesai
```

### 10.3 Activity Diagram — Login

```
Mulai -> Buka Halaman Login -> Isi Email & Password -> Tekan Tombol Masuk
-> [Kredensial Valid? Tidak -> Tampilkan Pesan Error -> kembali isi ulang | Ya -> Terbitkan Token Sanctum]
-> Simpan Token di Secure Storage -> Arahkan ke Dashboard -> Selesai
```

---

## 11. SEQUENCE DIAGRAM

### 11.1 Sequence Diagram — Register

```
Pengguna -> Flutter App: Isi form register
Flutter App -> Laravel API: POST /api/v1/auth/register
Laravel API -> Laravel API: Validasi request (FormRequest)
Laravel API -> MySQL DB: Cek email sudah terdaftar?
MySQL DB --> Laravel API: Hasil pengecekan
alt Email sudah terdaftar:
  Laravel API --> Flutter App: 422 Validation Error
  Flutter App --> Pengguna: Tampilkan pesan error
else Email tersedia:
  Laravel API -> MySQL DB: Insert data user (password di-hash)
  MySQL DB --> Laravel API: User berhasil dibuat
  Laravel API -> Laravel API: Buat token Sanctum
  Laravel API --> Flutter App: 201 Created + token + data user
  Flutter App -> Flutter App: Simpan token di secure storage
  Flutter App --> Pengguna: Arahkan ke Dashboard
```

### 11.2 Sequence Diagram — Membuat Dream & Kalkulasi Progress

```
Pengguna -> Flutter App: Submit form Tambah Dream
Flutter App -> DreamController: POST /api/v1/dreams (Bearer Token)
DreamController -> DreamController: Validasi request (CreateDreamRequest)
DreamController -> DreamService: createDream(data)
DreamService -> DreamRepository: save(dream)
DreamRepository -> MySQL DB: INSERT INTO dreams
MySQL DB --> DreamRepository: Dream tersimpan (id)
DreamService -> DreamRepository: createDefaultWallet(dream_id)
DreamRepository -> MySQL DB: INSERT INTO wallets
MySQL DB --> DreamRepository: Wallet tersimpan
DreamService -> DreamService: calculateSavingPlan(dream)
DreamService --> DreamController: DreamResource (lengkap dengan progress)
DreamController --> Flutter App: 201 Created + data dream
Flutter App --> Pengguna: Tampilkan Dream Detail
```

### 11.3 Sequence Diagram — Mencatat Dana ke Wallet

```
Pengguna -> Flutter App: Input nominal & tanggal top up
Flutter App -> WalletController: POST /api/v1/wallets/{id}/progress
WalletController -> WalletController: Validasi request (AddProgressRequest)
WalletController -> WalletService: addProgress(wallet_id, amount, date)
WalletService -> WalletRepository: createProgressEntry(...)
WalletRepository -> MySQL DB: INSERT INTO dream_progress
WalletService -> DreamRepository: updateCurrentAmount(dream_id)
DreamRepository -> MySQL DB: UPDATE dreams SET current_amount
WalletService -> WalletService: recalculateStatus(dream)
alt Target tercapai:
  WalletService -> DreamRepository: updateStatus('completed')
  DreamRepository -> MySQL DB: UPDATE dreams SET status='completed'
WalletService --> WalletController: WalletResource (saldo & progress terbaru)
WalletController --> Flutter App: 200 OK + data terbaru
Flutter App --> Pengguna: Tampilkan saldo & progress terkini
```

---

## 12. DATABASE DESIGN

Database dirancang menggunakan MySQL 8.0 dengan prinsip normalisasi hingga 3NF, mempertimbangkan kebutuhan audit (soft delete) dan skalabilitas untuk fitur wallet/marketplace di masa depan.

### 12.1 Tabel `users`

**Alasan:** Menyimpan data identitas dan kredensial pengguna sebagai pusat autentikasi seluruh sistem.

| Kolom | Tipe Data | Constraint | Alasan |
|---|---|---|---|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | Identitas unik pengguna |
| name | VARCHAR(100) | NOT NULL | Nama tampilan pengguna |
| email | VARCHAR(150) | NOT NULL, UNIQUE | Identitas login utama, harus unik |
| password | VARCHAR(255) | NOT NULL | Password ter-hash (bcrypt) |
| avatar_path | VARCHAR(255) | NULLABLE | Path foto profil pengguna |
| email_verified_at | TIMESTAMP | NULLABLE | Menandai status verifikasi email |
| remember_token | VARCHAR(100) | NULLABLE | Dukungan fitur "ingat saya" |
| created_at | TIMESTAMP | NOT NULL | Audit waktu pembuatan |
| updated_at | TIMESTAMP | NOT NULL | Audit waktu perubahan terakhir |
| deleted_at | TIMESTAMP | NULLABLE | Soft delete untuk penghapusan akun |

**Index:** UNIQUE index pada `email`.

### 12.2 Tabel `dreams`

**Alasan:** Menyimpan data inti impian pengguna sebagai objek utama aplikasi.

| Kolom | Tipe Data | Constraint | Alasan |
|---|---|---|---|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | Identitas unik Dream |
| user_id | BIGINT UNSIGNED | FK -> users.id, NOT NULL | Pemilik Dream |
| marketplace_product_id | BIGINT UNSIGNED | FK -> marketplace_products.id, NULLABLE | Referensi produk (opsional) |
| category | VARCHAR(50) | NOT NULL | Kategori impian (Elektronik, Kendaraan, dll) |
| name | VARCHAR(100) | NOT NULL | Nama impian yang ditentukan pengguna |
| target_amount | DECIMAL(15,2) | NOT NULL | Nominal target yang harus dicapai |
| current_amount | DECIMAL(15,2) | NOT NULL, DEFAULT 0 | Akumulasi dana terkumpul saat ini |
| target_date | DATE | NOT NULL | Tanggal target pencapaian |
| status | ENUM('active','completed','overdue') | NOT NULL, DEFAULT 'active' | Status Dream saat ini |
| notes | TEXT | NULLABLE | Catatan tambahan pengguna |
| created_at | TIMESTAMP | NOT NULL | Audit |
| updated_at | TIMESTAMP | NOT NULL | Audit |
| deleted_at | TIMESTAMP | NULLABLE | Soft delete |

**Index:** index pada `user_id`, index pada `status`, composite index pada (`user_id`, `status`).
**Constraint:** `target_amount` > 0 (validasi di level aplikasi & check constraint bila didukung).

### 12.3 Tabel `wallets`

**Alasan:** Menyimpan media pencatatan dana untuk setiap Dream, dirancang mendukung multi-provider di masa depan.

| Kolom | Tipe Data | Constraint | Alasan |
|---|---|---|---|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | Identitas unik Wallet |
| dream_id | BIGINT UNSIGNED | FK -> dreams.id, NOT NULL | Wallet terikat pada satu Dream |
| user_id | BIGINT UNSIGNED | FK -> users.id, NOT NULL | Denormalisasi untuk query performa (kepemilikan langsung) |
| provider_type | ENUM('manual','bca','mandiri','bni','bri','seabank','jago','dana','gopay','ovo','shopeepay') | NOT NULL, DEFAULT 'manual' | Jenis provider wallet (lihat Bagian 16) |
| provider_status | ENUM('active','coming_soon') | NOT NULL, DEFAULT 'active' | Menandai provider yang benar-benar aktif vs baru ditampilkan sebagai preview |
| balance | DECIMAL(15,2) | NOT NULL, DEFAULT 0 | Saldo akumulasi Wallet saat ini |
| created_at | TIMESTAMP | NOT NULL | Audit |
| updated_at | TIMESTAMP | NOT NULL | Audit |
| deleted_at | TIMESTAMP | NULLABLE | Soft delete cascading dari Dream |

**Index:** index pada `dream_id`, index pada `user_id`.

### 12.4 Tabel `marketplace_products`

**Alasan:** Menyimpan data referensi produk dari berbagai marketplace sebagai bahan rekomendasi harga.

| Kolom | Tipe Data | Constraint | Alasan |
|---|---|---|---|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | Identitas unik produk |
| marketplace_provider | ENUM('tokopedia','shopee','blibli','lazada','tiktokshop') | NOT NULL | Sumber marketplace produk (lihat Bagian 17) |
| product_name | VARCHAR(150) | NOT NULL | Nama produk |
| category | VARCHAR(50) | NOT NULL | Kategori produk, dicocokkan dengan kategori Dream |
| price | DECIMAL(15,2) | NOT NULL | Harga produk (referensi) |
| product_url | VARCHAR(500) | NOT NULL | Tautan menuju halaman produk di marketplace |
| image_url | VARCHAR(500) | NULLABLE | Tautan gambar produk |
| is_active | BOOLEAN | NOT NULL, DEFAULT TRUE | Menandai apakah produk masih relevan ditampilkan |
| price_updated_at | TIMESTAMP | NULLABLE | Menandai kapan harga terakhir diperbarui admin |
| created_at | TIMESTAMP | NOT NULL | Audit |
| updated_at | TIMESTAMP | NOT NULL | Audit |

**Index:** index pada `category`, index pada `is_active`, full-text index pada `product_name` (untuk pencarian).

### 12.5 Tabel `dream_progress`

**Alasan:** Menyimpan riwayat setiap penambahan dana terhadap Dream, menjadi dasar perhitungan grafik progres dan histori menabung.

| Kolom | Tipe Data | Constraint | Alasan |
|---|---|---|---|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | Identitas unik entri progres |
| dream_id | BIGINT UNSIGNED | FK -> dreams.id, NOT NULL | Dream terkait |
| wallet_id | BIGINT UNSIGNED | FK -> wallets.id, NOT NULL | Wallet asal pencatatan dana |
| amount | DECIMAL(15,2) | NOT NULL | Nominal dana yang dicatat pada entri ini |
| recorded_date | DATE | NOT NULL | Tanggal pencatatan dana oleh pengguna |
| note | VARCHAR(255) | NULLABLE | Catatan opsional (misal: "Bonus kerja") |
| created_at | TIMESTAMP | NOT NULL | Audit |
| updated_at | TIMESTAMP | NOT NULL | Audit |
| deleted_at | TIMESTAMP | NULLABLE | Soft delete (jika entri dihapus, saldo dihitung ulang) |

**Index:** index pada `dream_id`, index pada `wallet_id`, index pada `recorded_date`.

### 12.6 Tabel Pendukung — `user_settings`

**Alasan:** Menyimpan preferensi pengguna terkait notifikasi, bahasa, dan tema, dipisah dari tabel `users` agar tabel inti tetap ringkas.

| Kolom | Tipe Data | Constraint | Alasan |
|---|---|---|---|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | Identitas unik pengaturan |
| user_id | BIGINT UNSIGNED | FK -> users.id, UNIQUE, NOT NULL | Satu pengaturan per pengguna |
| notification_enabled | BOOLEAN | NOT NULL, DEFAULT TRUE | Status notifikasi aktif/nonaktif |
| language | VARCHAR(5) | NOT NULL, DEFAULT 'id' | Preferensi bahasa |
| theme | ENUM('light','dark') | NOT NULL, DEFAULT 'light' | Preferensi tema tampilan |
| created_at | TIMESTAMP | NOT NULL | Audit |
| updated_at | TIMESTAMP | NOT NULL | Audit |

### 12.7 Tabel Pendukung — `personal_access_tokens` (Standar Sanctum)

Tabel bawaan Laravel Sanctum untuk menyimpan token autentikasi (`tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`). Tidak memerlukan modifikasi khusus pada MVP.

---

## 13. ENTITY RELATIONSHIP DIAGRAM (ERD)

```
USERS ||--o{ DREAMS : memiliki
USERS ||--o{ WALLETS : memiliki
USERS ||--|| USER_SETTINGS : memiliki
DREAMS ||--o{ WALLETS : memiliki
DREAMS ||--o{ DREAM_PROGRESS : memiliki
WALLETS ||--o{ DREAM_PROGRESS : mencatat
MARKETPLACE_PRODUCTS ||--o{ DREAMS : dijadikan_referensi

USERS { id PK, name, email, password, avatar_path, email_verified_at, deleted_at }
DREAMS { id PK, user_id FK, marketplace_product_id FK, category, name, target_amount,
         current_amount, target_date, status, deleted_at }
WALLETS { id PK, dream_id FK, user_id FK, provider_type, provider_status, balance, deleted_at }
MARKETPLACE_PRODUCTS { id PK, marketplace_provider, product_name, category, price, product_url, is_active }
DREAM_PROGRESS { id PK, dream_id FK, wallet_id FK, amount, recorded_date, deleted_at }
USER_SETTINGS { id PK, user_id FK, notification_enabled, language, theme }
```

---

## 14. REST API DOCUMENTATION

**Base URL (contoh):** `https://api.impidream.com/api/v1`
**Format:** JSON
**Autentikasi:** Bearer Token (Laravel Sanctum) — kecuali endpoint yang ditandai publik.

**Format Response Standar (Sukses):**
```json
{
  "success": true,
  "message": "Berhasil mengambil data",
  "data": { }
}
```

**Format Response Standar (Error):**
```json
{
  "success": false,
  "message": "Data tidak valid",
  "errors": {
    "field_name": ["Pesan error spesifik"]
  }
}
```

### 14.1 Authentication

**POST /auth/register** — Mendaftarkan pengguna baru. Headers: `Content-Type: application/json` (publik). Validation: `name` required|string|min:3|max:100; `email` required|email|unique:users; `password` required|min:8|confirmed. Status Code: 201 Created, 422 Unprocessable Entity.

**POST /auth/login** — Autentikasi pengguna dan menerbitkan token. Validation: `email` required|email; `password` required. Status Code: 200 OK, 401 Unauthorized, 429 Too Many Requests (rate limit).

**POST /auth/logout** — Mencabut token aktif perangkat saat ini. Headers: `Authorization: Bearer {token}`. Status Code: 200 OK, 401 Unauthorized.

**POST /auth/forgot-password** — Mengirim tautan/kode reset password ke email pengguna. Validation: `email` required|email|exists:users. Status Code: 200 OK, 422 Unprocessable Entity.

### 14.2 Dashboard

**GET /dashboard** — Mengambil ringkasan seluruh Dream pengguna. Headers: `Authorization: Bearer {token}`. Status Code: 200 OK, 401 Unauthorized.

### 14.3 Dream Management

**GET /dreams** — Mengambil daftar seluruh Dream milik pengguna (dengan pagination & filter status). Query Params: `status` (optional: active|completed|overdue), `page`, `per_page`. Status Code: 200 OK, 401 Unauthorized.

**POST /dreams** — Membuat Dream baru. Validation: `name` required|string|min:3|max:100; `category` required|string; `target_amount` required|numeric|min:1; `target_date` required|date|after:today; `marketplace_product_id` nullable|exists:marketplace_products,id. Status Code: 201 Created, 422 Unprocessable Entity, 401 Unauthorized.

**GET /dreams/{id}** — Mengambil detail satu Dream beserta progres dan kalkulasi tabungan. Status Code: 200 OK, 404 Not Found, 403 Forbidden (jika bukan pemilik).

**PUT /dreams/{id}** — Memperbarui data Dream. Validation: sama seperti create, seluruh field optional (partial update). Status Code: 200 OK, 422 Unprocessable Entity, 403 Forbidden, 404 Not Found.

**DELETE /dreams/{id}** — Menghapus (soft delete) Dream beserta data terkait. Status Code: 200 OK, 403 Forbidden, 404 Not Found.

### 14.4 Wallet Management

**POST /wallets** — Membuat Wallet baru untuk sebuah Dream. Validation: `dream_id` required|exists:dreams,id; `provider_type` required|in:manual,bca,mandiri,bni,bri,seabank,jago,dana,gopay,ovo,shopeepay. Business Rule: jika `provider_type` selain `manual` dipilih pada MVP, sistem mengembalikan error karena provider berstatus `coming_soon`. Status Code: 201 Created, 422 Unprocessable Entity.

**POST /wallets/{id}/progress** — Mencatat penambahan dana ke Wallet. Validation: `amount` required|numeric|min:1; `recorded_date` required|date|before_or_equal:today; `note` nullable|string|max:255. Status Code: 201 Created, 422 Unprocessable Entity, 403 Forbidden.

**GET /wallets/{id}/progress** — Mengambil riwayat seluruh pencatatan dana pada Wallet tertentu. Status Code: 200 OK, 403 Forbidden, 404 Not Found.

**DELETE /wallets/{id}/progress/{progressId}** — Menghapus satu entri riwayat pencatatan dana (memicu recalculation saldo & progres). Status Code: 200 OK, 403 Forbidden, 404 Not Found.

### 14.5 Marketplace Recommendation

**GET /marketplace/products** — Mencari produk referensi berdasarkan kata kunci dan/atau kategori. Query Params: `keyword` (min 2 karakter), `category` (optional). Status Code: 200 OK, 401 Unauthorized.

**GET /marketplace/products/{id}** — Mengambil detail satu produk referensi. Status Code: 200 OK, 404 Not Found.

### 14.6 Profile

**GET /profile** — Mengambil data profil pengguna yang sedang login. Status Code: 200 OK, 401 Unauthorized.

**PUT /profile** — Memperbarui nama dan/atau foto profil. Validation: `name` nullable|string|min:3|max:100; `avatar` nullable|image|max:2048. Status Code: 200 OK, 422 Unprocessable Entity.

**PUT /profile/password** — Mengubah password pengguna. Validation: `current_password` required; `new_password` required|min:8|different:current_password|confirmed. Status Code: 200 OK, 422 Unprocessable Entity.

### 14.7 Settings

**GET /settings** — Mengambil preferensi pengguna (notifikasi, bahasa, tema). Status Code: 200 OK, 401 Unauthorized.

**PUT /settings** — Memperbarui preferensi pengguna. Validation: `notification_enabled` boolean; `language` in:id,en; `theme` in:light,dark. Status Code: 200 OK, 422 Unprocessable Entity.

**DELETE /account** — Menghapus akun pengguna (soft delete) beserta seluruh data terkait. Validation: `password` required (konfirmasi ulang password). Status Code: 200 OK, 422 Unprocessable Entity, 401 Unauthorized.

---

## 15. BUSINESS LOGIC & FORMULA

Seluruh formula berikut diimplementasikan pada `DreamProgressCalculatorService` di sisi backend agar konsisten dan tidak diduplikasi di sisi Flutter.

### 15.1 Remaining Amount (Sisa Dana yang Dibutuhkan)
```
remaining_amount = target_amount - current_amount
(jika hasilnya negatif, dianggap 0)
```
Contoh: target_amount = Rp 12.000.000, current_amount = Rp 7.500.000 -> remaining_amount = Rp 4.500.000

### 15.2 Days Remaining (Sisa Hari)
```
days_remaining = target_date - today
(jika hasilnya negatif, Dream ditandai status = overdue)
```
Contoh: target_date = 2027-03-01, today = 2026-11-01 -> days_remaining = 120 hari

### 15.3 Daily Saving (Kebutuhan Menabung Harian)
```
daily_saving = remaining_amount / days_remaining
```
Contoh: 4.500.000 / 120 = Rp 37.500 / hari

### 15.4 Weekly Saving (Kebutuhan Menabung Mingguan)
```
weeks_remaining = days_remaining / 7
weekly_saving = remaining_amount / weeks_remaining
```
Contoh: days_remaining = 120 -> weeks_remaining ~ 17.14 -> weekly_saving ~ Rp 262.500 / minggu

### 15.5 Monthly Saving (Kebutuhan Menabung Bulanan)
```
months_remaining = days_remaining / 30
monthly_saving = remaining_amount / months_remaining
```
Contoh: days_remaining = 120 -> months_remaining = 4 -> monthly_saving = Rp 1.125.000 / bulan

### 15.6 Progress Percentage
```
progress_percentage = (current_amount / target_amount) * 100
(dibatasi maksimal 100%)
```
Contoh: (7.500.000 / 12.000.000) * 100 = 62.5%

### 15.7 Estimated Completion Date (Estimasi Tanggal Tercapai)

Dihitung berdasarkan rata-rata kecepatan menabung historis pengguna (bukan hanya target linear), untuk memberikan insight tambahan yang lebih realistis:
```
average_daily_rate = total_amount_saved_last_30_days / 30
estimated_days_to_complete = remaining_amount / average_daily_rate
estimated_completion_date = today + estimated_days_to_complete
```
Contoh: Dalam 30 hari terakhir pengguna menabung total Rp 900.000 -> average_daily_rate = Rp 30.000/hari -> estimated_days_to_complete = 150 hari -> estimated_completion_date = today + 150 hari

> Catatan: jika `estimated_completion_date` melewati `target_date`, sistem menampilkan peringatan bahwa kecepatan menabung saat ini tidak akan mencapai target tepat waktu, sebagai insight motivasional (bukan blocking action).

### 15.8 Status Determination Logic
```
IF current_amount >= target_amount THEN status = 'completed'
ELSE IF today > target_date THEN status = 'overdue'
ELSE status = 'active'
```

---

## 16. WALLET ARCHITECTURE

### 16.1 Tujuan Arsitektur

Pada versi MVP, satu-satunya jenis wallet yang berfungsi penuh adalah **Manual Wallet** — pengguna mencatat dana secara manual tanpa integrasi API perbankan/e-wallet. Namun, arsitektur backend dirancang menggunakan pola **abstraction (Wallet Provider Interface)** agar penambahan provider baru di masa depan (BCA, Mandiri, BNI, BRI, SeaBank, Jago, DANA, GoPay, OVO, ShopeePay) tidak memerlukan perubahan besar pada logika inti aplikasi.

### 16.2 Struktur Abstraksi

```
WalletProviderInterface (interface)
  + getBalance(walletId): Decimal
  + syncTransactions(walletId): List
  + isAvailable(): Boolean

ManualWalletProvider   implements WalletProviderInterface
BcaWalletProvider      implements WalletProviderInterface
GopayWalletProvider    implements WalletProviderInterface
```

### 16.3 Penjelasan Komponen

| Komponen | Peran |
|---|---|
| `WalletProviderInterface` | Kontrak yang wajib dipenuhi oleh setiap provider wallet, terlepas dari sumber datanya |
| `ManualWalletProvider` | Implementasi aktif pada MVP — `getBalance()` membaca akumulasi dari tabel `dream_progress`, `syncTransactions()` mengembalikan riwayat input manual, `isAvailable()` selalu `true` |
| `BcaWalletProvider`, `GopayWalletProvider`, dst. | Implementasi placeholder pada MVP — `isAvailable()` mengembalikan `false` (status `coming_soon`), belum ada koneksi API riil |
| `WalletProviderFactory` | Kelas factory yang menentukan implementasi provider mana yang dipanggil berdasarkan `provider_type` pada tabel `wallets` |

### 16.4 Alasan Pemilihan Arsitektur

- **Open/Closed Principle:** Penambahan provider baru (misalnya integrasi BCA di versi 1.1) dilakukan dengan membuat kelas baru yang mengimplementasikan `WalletProviderInterface`, tanpa mengubah kode Service/Controller yang sudah ada.
- **Testability:** Setiap provider dapat diuji secara terpisah (unit test) tanpa bergantung pada provider lain.
- **Konsistensi UX:** Aplikasi Flutter dapat menampilkan seluruh daftar provider (aktif maupun "Segera Hadir") tanpa perlu mengetahui detail implementasi di baliknya — cukup membaca field `provider_status` dari API.

### 16.5 Daftar Provider yang Didefinisikan (Status MVP)

| Provider | Status MVP | Keterangan |
|---|---|---|
| Manual | Aktif | Satu-satunya provider fungsional pada MVP |
| BCA | Coming Soon | Placeholder, disiapkan untuk Open Banking API |
| Mandiri | Coming Soon | Placeholder |
| BNI | Coming Soon | Placeholder |
| BRI | Coming Soon | Placeholder |
| SeaBank | Coming Soon | Placeholder |
| Jago | Coming Soon | Placeholder (API Jago dikenal cukup terbuka untuk integrasi) |
| DANA | Coming Soon | Placeholder |
| GoPay | Coming Soon | Placeholder |
| OVO | Coming Soon | Placeholder |
| ShopeePay | Coming Soon | Placeholder |

---

## 17. MARKETPLACE ARCHITECTURE

### 17.1 Tujuan Arsitektur

Serupa dengan Wallet Architecture, referensi produk marketplace juga menggunakan pola abstraksi **MarketplaceProvider** agar sistem dapat berkembang dari data manual/seed (MVP) menjadi integrasi API resmi marketplace (masa depan) tanpa perombakan struktur inti.

### 17.2 Struktur Abstraksi

```
MarketplaceProviderInterface (interface)
  + searchProducts(keyword, category): List
  + getProductDetail(productId): Product
  + isLiveIntegration(): Boolean

ManualSeedProvider   implements MarketplaceProviderInterface
TokopediaProvider    implements MarketplaceProviderInterface
ShopeeProvider       implements MarketplaceProviderInterface
```

### 17.3 Penjelasan Komponen

| Komponen | Peran |
|---|---|
| `MarketplaceProviderInterface` | Kontrak pencarian & detail produk yang wajib dipenuhi setiap provider |
| `ManualSeedProvider` | Implementasi aktif MVP — membaca data dari tabel `marketplace_products` yang diisi manual oleh tim admin/internal |
| `TokopediaProvider`, `ShopeeProvider`, `BlibliProvider`, `LazadaProvider`, `TiktokShopProvider` | Placeholder untuk integrasi API resmi masing-masing marketplace di masa depan |
| `AmazonProvider`, `AlibabaProvider` (Future) | Disiapkan sebagai perluasan jangka panjang untuk produk internasional |

### 17.4 Alasan Arsitektur

- **Fleksibilitas Sumber Data:** Kolom `marketplace_provider` pada tabel `marketplace_products` sudah menggunakan enum yang mencakup seluruh marketplace target, sehingga penambahan data dari sumber baru tidak memerlukan migrasi struktural besar.
- **Isolasi Perubahan Eksternal:** Jika suatu saat kebijakan API sebuah marketplace berubah, hanya kelas provider terkait yang perlu disesuaikan, tanpa memengaruhi fitur Dream/Wallet.
- **Kesiapan Skala:** Struktur ini memungkinkan tim menambahkan `AmazonProvider` atau `AlibabaProvider` pada versi jauh ke depan (lihat Future Roadmap) hanya dengan menambahkan implementasi baru.

---

## 18. FOLDER STRUCTURE — FLUTTER (CLEAN ARCHITECTURE)

```
lib/
├── core/
│   ├── constants/         # Konstanta aplikasi (warna, string, endpoint, dsb.)
│   ├── errors/             # Kelas Failure & Exception kustom
│   ├── network/            # Konfigurasi Dio/HTTP client, interceptor token
│   ├── utils/              # Helper umum (formatter mata uang, tanggal, dsb.)
│   ├── theme/              # Definisi ThemeData, text style global
│   └── widgets/            # Widget reusable lintas fitur (button, card, dsb.)
│
├── features/
│   ├── auth/            (data / domain / presentation)
│   ├── dashboard/        (data / domain / presentation)
│   ├── dream/            (data / domain / presentation)
│   ├── wallet/           (data / domain / presentation)
│   ├── marketplace/      (data / domain / presentation)
│   ├── profile/          (data / domain / presentation)
│   └── settings/         (data / domain / presentation)
│
├── injection/               # Dependency Injection setup (get_it/injectable)
├── routes/                  # Konfigurasi navigasi (go_router)
└── main.dart                 # Entry point aplikasi
```

**Penjelasan Setiap Folder Utama:**

| Folder | Penjelasan |
|---|---|
| `core/` | Berisi kode yang digunakan lintas fitur — tidak boleh bergantung pada satu fitur tertentu. Menjaga prinsip shared kernel pada Clean Architecture. |
| `features/{nama_fitur}/data/` | Lapisan Data — bertanggung jawab mengambil data dari sumber eksternal (API) dan mengubahnya menjadi entity yang dipahami lapisan domain. |
| `features/{nama_fitur}/domain/` | Lapisan Domain — inti bisnis aplikasi, sepenuhnya independen dari framework (tidak mengenal Flutter/HTTP). Berisi Entity, kontrak Repository, dan Use Case. |
| `features/{nama_fitur}/presentation/` | Lapisan Presentation — UI dan state management, satu-satunya lapisan yang "mengenal" Flutter widget. |
| `injection/` | Menyusun seluruh dependency injection (repository, use case, bloc) agar dapat digunakan lintas layer tanpa coupling langsung. |
| `routes/` | Mengatur seluruh navigasi antar halaman secara terpusat. |

**Alasan Pemilihan Clean Architecture:**
- Memisahkan logika bisnis dari framework, memudahkan pengujian (unit test) tanpa perlu menjalankan UI.
- Memudahkan pergantian data source di masa depan (misal dari REST API ke GraphQL) tanpa mengubah lapisan domain/presentation.
- Struktur per-fitur (feature-first) memudahkan tim bekerja secara paralel tanpa saling tumpang tindih file.

---

## 19. FOLDER STRUCTURE — LARAVEL (SERVICE LAYER + REPOSITORY PATTERN)

> **Direvisi (v1.1):** ditambahkan lapisan `Http/Controllers/Web/` yang terpisah dari `Http/Controllers/Api/`, karena fokus pengembangan saat ini diarahkan ke Landing Page dan Admin Panel (berbasis Blade, session-auth) sebelum masuk ke REST API untuk mobile.

```
app/
├── Console/
│   └── Commands/                  # Artisan command kustom (misal: recalculate dream status)
│
├── Exceptions/
│   └── Handler.php                 # Penanganan exception terpusat, format response error konsisten
│
├── Http/
│   ├── Controllers/
│   │   ├── Api/V1/                        # (dikerjakan belakangan, lihat Bagian 14)
│   │   │   ├── AuthController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── DreamController.php
│   │   │   ├── WalletController.php
│   │   │   ├── MarketplaceController.php
│   │   │   ├── ProfileController.php
│   │   │   └── SettingsController.php
│   │   │
│   │   └── Web/                            # BARU — fokus pengerjaan saat ini
│   │       ├── LandingController.php       # Halaman landing publik
│   │       └── Admin/
│   │           ├── AuthController.php       # Login admin (session-based)
│   │           ├── DashboardController.php
│   │           ├── MarketplaceProductController.php
│   │           └── UserManagementController.php
│   │
│   ├── Requests/                   # FormRequest untuk validasi tiap endpoint (Api & Web)
│   │   ├── Auth/
│   │   ├── Dream/
│   │   ├── Wallet/
│   │   └── Admin/
│   │       └── MarketplaceProductRequest.php
│   │
│   ├── Resources/                  # API Resource untuk transformasi response JSON (Api)
│   │   ├── UserResource.php
│   │   ├── DreamResource.php
│   │   ├── WalletResource.php
│   │   └── MarketplaceProductResource.php
│   │
│   └── Middleware/
│       ├── EnsureTokenIsValid.php  # Middleware API (Sanctum)
│       └── EnsureAdmin.php          # BARU — Guard khusus admin panel (session-based)
│
├── Models/
│   ├── User.php
│   ├── Dream.php
│   ├── Wallet.php
│   ├── MarketplaceProduct.php
│   ├── DreamProgress.php
│   └── UserSetting.php
│
├── Repositories/
│   ├── Contracts/                  # Interface repository (kontrak)
│   └── Eloquent/                   # Implementasi konkret berbasis Eloquent
│
├── Services/
│   ├── AuthService.php
│   ├── DreamService.php
│   ├── WalletService.php
│   ├── MarketplaceService.php
│   ├── DreamProgressCalculatorService.php   # Berisi seluruh formula Bagian 15
│   └── Providers/
│       ├── Wallet/          # WalletProviderInterface + implementasi (Bagian 16)
│       └── Marketplace/     # MarketplaceProviderInterface + implementasi (Bagian 17)
│
└── Providers/
    └── RepositoryServiceProvider.php  # Binding interface repository ke implementasi Eloquent

resources/
└── views/
    ├── landing/
    │   ├── index.blade.php
    │   └── partials/
    ├── admin/
    │   ├── layouts/
    │   │   └── app.blade.php
    │   ├── dashboard.blade.php
    │   ├── marketplace-products/
    │   │   ├── index.blade.php
    │   │   ├── create.blade.php
    │   │   └── edit.blade.php
    │   └── users/
    │       ├── index.blade.php
    │       └── show.blade.php
    └── auth/
        └── admin-login.blade.php

database/
├── migrations/                     # Seluruh migration tabel (users, dreams, wallets, dsb.)
├── seeders/
│   ├── MarketplaceProductSeeder.php # Data awal produk referensi
│   └── DatabaseSeeder.php
└── factories/                      # Factory untuk kebutuhan testing

routes/
├── web.php                          # BARU (prioritas saat ini) — Landing + Admin, session-auth (guard 'admin')
└── api.php                          # Definisi seluruh route API v1 (dikerjakan setelah web selesai)

tests/
├── Feature/                         # API Test (end-to-end per endpoint)
└── Unit/                            # Unit Test (Service, Repository, formula)
```

**Penjelasan Setiap Folder Utama:**

| Folder | Penjelasan |
|---|---|
| `Http/Controllers/Api` | Lapisan tipis untuk konsumsi mobile (dikerjakan setelah Web selesai) — hanya menerima request, memanggil Service, mengembalikan Resource. |
| `Http/Controllers/Web` | **BARU** — Controller untuk Landing Page publik dan Admin Panel, menggunakan Blade + session auth, menjadi fokus pengerjaan saat ini. |
| `Http/Requests` | Menampung seluruh aturan validasi per endpoint (FormRequest), baik untuk Api maupun Web, menjaga Controller tetap bersih. |
| `Http/Resources` | Mengatur format transformasi data Model menjadi JSON response yang konsisten (dipakai lapisan Api). |
| `Models` | Representasi tabel database (Eloquent ORM), hanya berisi relasi dan accessor/mutator sederhana. |
| `Repositories/Contracts` | Interface yang mendefinisikan operasi akses data (menjaga prinsip Dependency Inversion). |
| `Repositories/Eloquent` | Implementasi konkret dari kontrak repository menggunakan Eloquent ORM. |
| `Services` | Lapisan yang menampung seluruh logika bisnis (kalkulasi, aturan status, orkestrasi antar repository) — dipakai bersama oleh Controller Web maupun Api. |
| `Services/Providers/Wallet` & `Marketplace` | Implementasi pola abstraksi sesuai Bagian 16 & 17. |
| `Providers/RepositoryServiceProvider` | Tempat binding antara interface repository dengan implementasi Eloquent, memudahkan penggantian implementasi (misalnya untuk testing dengan mock). |

**Alasan Pemilihan Arsitektur Service Layer + Repository Pattern:**
- Controller tetap ramping dan mudah dibaca, fokus pada HTTP concern semata.
- Logika bisnis terpusat di Service, memudahkan reuse antar Controller (baik Web maupun Api nantinya), Command/Job.
- Repository memungkinkan penggantian sumber data (misalnya caching layer atau berpindah dari MySQL) tanpa mengubah Service.
- Karena Service Layer sudah dipisah sejak awal, transisi dari fokus Web (Landing + Admin) ke Api tidak memerlukan penulisan ulang logika bisnis — Controller Api tinggal memanggil Service yang sama.
- Struktur ini juga memudahkan penulisan Unit Test karena Service dapat diuji dengan me-mock Repository Interface.

---

## 20. DOKUMENTASI UI / HALAMAN APLIKASI

### 20.1 Splash Screen
- **Tujuan:** Menampilkan identitas merek saat aplikasi pertama dibuka, sekaligus memeriksa status sesi (apakah token masih valid).
- **Widget:** Logo aplikasi, tagline singkat, indikator loading minimal.
- **Layout:** Logo terpusat secara vertikal-horizontal, latar warna brand utama.
- **Action:** Otomatis mengarahkan ke Onboarding (pengguna baru) atau Dashboard (pengguna dengan sesi aktif) setelah 1–2 detik.
- **Loading:** Indikator kecil di bawah logo selama pengecekan token berlangsung.
- **Error:** Jika pengecekan token gagal karena masalah jaringan, aplikasi tetap mengarahkan ke Login (fallback aman).
- **Empty State:** Tidak berlaku.

### 20.2 Onboarding
- **Tujuan:** Memperkenalkan konsep utama ImpiDream kepada pengguna baru sebelum mendaftar.
- **Widget:** 3 slide ilustrasi (PageView) — "Tentukan Impianmu", "Hitung Rencana Menabung", "Pantau Progresmu" — indikator dot, tombol "Lewati" dan "Lanjut/Mulai".
- **Layout:** Ilustrasi besar di tengah atas, judul & deskripsi di bawah, navigasi di bagian bawah layar.
- **Action:** Swipe antar slide, tombol "Mulai" pada slide terakhir menuju halaman Register.
- **Loading:** Tidak ada (konten statis).
- **Error:** Tidak berlaku.
- **Empty State:** Tidak berlaku.

### 20.3 Login
- **Tujuan:** Memungkinkan pengguna terdaftar masuk ke akunnya.
- **Widget:** TextField Email, TextField Password (dengan toggle show/hide), tombol "Masuk", tautan "Lupa Password?", tautan "Belum punya akun? Daftar".
- **Layout:** Form terpusat secara vertikal, logo kecil di bagian atas.
- **Action:** Submit form → validasi → autentikasi ke server.
- **Loading:** Tombol "Masuk" berubah menjadi loading spinner, dinonaktifkan sementara.
- **Error:** Pesan error inline di bawah field terkait, atau snackbar untuk error umum (kredensial salah).
- **Empty State:** Tidak berlaku.

### 20.4 Register
- **Tujuan:** Memungkinkan pengguna baru membuat akun.
- **Widget:** TextField Nama, Email, Password, Konfirmasi Password, checkbox persetujuan (Terms & Privacy), tombol "Daftar".
- **Layout:** Form scrollable, terutama untuk perangkat layar kecil.
- **Action:** Submit form → validasi client-side → validasi server-side → redirect ke Dashboard.
- **Loading:** Tombol submit menampilkan spinner.
- **Error:** Pesan error per-field (email sudah digunakan, password terlalu pendek, dsb).
- **Empty State:** Tidak berlaku.

### 20.5 Dashboard
- **Tujuan:** Titik masuk utama pengguna setelah login, menampilkan ringkasan seluruh Dream.
- **Widget:** App bar dengan sapaan nama pengguna, ringkasan statistik (total Dream, total tercapai), list card Dream aktif dengan progress bar mini, Floating Action Button "Tambah Dream".
- **Layout:** Scrollable vertical list, card dengan elevation ringan.
- **Action:** Tap card → Dream Detail; tap FAB → Create Dream; pull-to-refresh untuk memuat ulang data.
- **Loading:** Skeleton loading pada card saat data sedang dimuat.
- **Error:** Ilustrasi error + tombol "Coba Lagi" jika gagal memuat data.
- **Empty State:** Ilustrasi ramah + teks "Belum ada impian, yuk mulai yang pertama!" + tombol "Tambah Dream".

### 20.6 Dream List
- **Tujuan:** Menampilkan seluruh Dream pengguna dengan kemampuan filter berdasarkan status.
- **Widget:** Tab/Segmented Control (Semua, Aktif, Tercapai, Kadaluarsa), list card Dream.
- **Layout:** Tab di bagian atas, list di bawahnya, dapat di-scroll dengan lazy loading.
- **Action:** Tap tab untuk memfilter, tap card untuk melihat detail.
- **Loading:** Skeleton loading per item.
- **Error:** Pesan error dengan tombol retry.
- **Empty State:** Berbeda tiap tab (misal tab "Tercapai" kosong → "Belum ada impian yang tercapai, terus semangat menabung!").

### 20.7 Dream Detail
- **Tujuan:** Menampilkan seluruh informasi satu Dream: progres, kalkulasi tabungan, riwayat, dan aksi terkait.
- **Widget:** Header dengan nama & kategori Dream, progress bar besar dengan persentase, card kalkulasi (harian/mingguan/bulanan), tombol "Tambah Dana", daftar riwayat progress, menu edit/hapus (ikon titik tiga).
- **Layout:** Scrollable, informasi terpenting (progress) berada paling atas.
- **Action:** Tap "Tambah Dana" → bottom sheet input dana; tap menu → Edit Dream / Hapus Dream.
- **Loading:** Shimmer loading saat detail sedang diambil.
- **Error:** Pesan error dengan tombol retry, atau redirect ke Dream List jika Dream tidak ditemukan (404).
- **Empty State:** Bagian riwayat menampilkan "Belum ada catatan menabung" jika belum ada entri progress.

### 20.8 Create Dream
- **Tujuan:** Formulir pembuatan Dream baru.
- **Widget:** TextField Nama Dream, Dropdown Kategori, TextField Target Nominal (dengan format Rupiah otomatis), Date Picker Target Tanggal, tombol "Cari Produk Referensi" (opsional), tombol "Simpan".
- **Layout:** Form vertikal scrollable dengan step visual sederhana (bukan wizard multi-step, cukup satu halaman panjang untuk MVP).
- **Action:** Submit form → validasi → simpan → redirect ke Dream Detail.
- **Loading:** Tombol submit menampilkan spinner; loading terpisah saat pencarian produk referensi.
- **Error:** Pesan error per-field, snackbar untuk error umum server.
- **Empty State:** Pada pencarian produk, tampilkan "Produk tidak ditemukan, coba kata kunci lain".

### 20.9 Wallet
- **Tujuan:** Menampilkan detail Wallet dan riwayat pencatatan dana dari sebuah Dream, serta daftar provider wallet (aktif & coming soon).
- **Widget:** Card saldo Wallet saat ini, tombol "Tambah Dana", list riwayat (tanggal, nominal, catatan), section "Hubungkan Wallet Lain" menampilkan logo bank/e-wallet dengan label "Segera Hadir".
- **Layout:** Card saldo di atas, riwayat di bawah dalam bentuk list timeline.
- **Action:** Tap "Tambah Dana" → bottom sheet input; tap provider "Segera Hadir" → dialog informasi bahwa fitur belum tersedia.
- **Loading:** Skeleton pada saldo & list riwayat.
- **Error:** Pesan error dengan retry.
- **Empty State:** "Belum ada riwayat menabung, mulai catat tabungan pertamamu!"

### 20.10 Marketplace
- **Tujuan:** Memungkinkan pengguna mencari dan menjelajah produk referensi harga.
- **Widget:** Search bar, filter kategori (chip), grid/list card produk (gambar, nama, harga, logo marketplace asal), tombol "Lihat di Marketplace".
- **Layout:** Search bar sticky di atas, grid 2 kolom untuk hasil produk.
- **Action:** Tap card produk → detail produk (bottom sheet/halaman) → pilih "Gunakan sebagai referensi Dream" atau "Buka di Marketplace" (membuka webview/browser eksternal).
- **Loading:** Skeleton grid saat pencarian berlangsung.
- **Error:** Pesan error dengan retry.
- **Empty State:** "Produk tidak ditemukan untuk kata kunci ini."

### 20.11 Profile
- **Tujuan:** Menampilkan dan memungkinkan pengeditan data pribadi pengguna.
- **Widget:** Foto profil (dengan opsi ubah), Nama, Email (read-only), ringkasan statistik singkat, tombol "Edit Profil", tombol "Ubah Password".
- **Layout:** Header foto & nama di atas, list menu di bawahnya.
- **Action:** Tap "Edit Profil" → form edit; tap "Ubah Password" → form khusus dengan verifikasi password lama.
- **Loading:** Skeleton pada header saat data dimuat.
- **Error:** Snackbar error jika gagal memperbarui data.
- **Empty State:** Tidak berlaku (data profil selalu ada untuk pengguna yang login).

### 20.12 Settings
- **Tujuan:** Mengelola preferensi aplikasi dan akun.
- **Widget:** List menu — Toggle Notifikasi, Dropdown Bahasa, Toggle Tema Gelap/Terang, tautan "Kebijakan Privasi", tautan "Syarat & Ketentuan", tombol "Hapus Akun" (warna destruktif), tombol "Keluar".
- **Layout:** List menu sederhana dengan pembagian section (Preferensi, Akun, Tentang).
- **Action:** Toggle langsung menyimpan perubahan; tap "Hapus Akun" → dialog konfirmasi berlapis (memasukkan password); tap "Keluar" → dialog konfirmasi sederhana.
- **Loading:** Indikator kecil saat menyimpan preferensi.
- **Error:** Snackbar jika gagal menyimpan preferensi.
- **Empty State:** Tidak berlaku.

### 20.13 Landing Page *(BARU — v1.1)*
- **Tujuan:** Halaman publik untuk memperkenalkan ImpiDream kepada calon pengguna sebelum mereka mengunduh aplikasi.
- **Widget:** Hero section (headline + CTA utama), section "Kenapa ImpiDream" (menampilkan value proposition dari Bagian 1.4), section "Cara Kerja" (3 langkah visual: Rencanakan → Tabung → Wujudkan), section showcase kategori Dream populer (Elektronik, Kendaraan, Liburan, Pernikahan), footer dengan tautan Kebijakan Privasi/Syarat & Ketentuan.
- **Layout:** Single-page scroll, responsive (mobile-first, karena mayoritas traffic diperkirakan dari browsing HP).
- **Action:** Tombol CTA mengarah ke tautan Play Store/App Store (dapat berupa placeholder terlebih dahulu apabila aplikasi belum dipublikasikan).
- **Loading:** Konten statis, tidak memerlukan loading state kompleks; gambar menggunakan lazy-load standar browser.
- **Error:** Tidak berlaku (halaman statis, tanpa dependency data dinamis pada versi awal).
- **Empty State:** Tidak berlaku.

### 20.14 Admin — Login *(BARU — v1.1)*
- **Tujuan:** Titik masuk khusus tim internal untuk mengelola data aplikasi melalui Admin Panel, terpisah dari autentikasi pengguna aplikasi mobile.
- **Widget:** Form email + password sederhana, tombol "Masuk".
- **Layout:** Form terpusat, tanpa elemen branding konsumen (didesain lebih fungsional/utilitarian dibanding halaman Login pengguna).
- **Action:** Submit form → autentikasi session-based (guard `admin`) → redirect ke Dashboard Admin.
- **Loading:** Tombol submit menampilkan spinner.
- **Error:** Pesan error umum jika kredensial salah, tanpa membocorkan apakah email admin terdaftar.
- **Empty State:** Tidak berlaku.

### 20.15 Admin — Dashboard *(BARU — v1.1)*
- **Tujuan:** Memberikan gambaran cepat kondisi platform kepada tim internal begitu masuk ke Admin Panel.
- **Widget:** Card ringkasan (total user terdaftar, total Dream aktif, total Dream tercapai), grafik sederhana pertumbuhan user per minggu (menggunakan chart.js), daftar produk marketplace yang harganya belum diperbarui dalam waktu lama (untuk ditindaklanjuti admin).
- **Layout:** Grid card ringkasan di bagian atas, grafik dan tabel highlight di bawahnya.
- **Action:** Tap card ringkasan → menuju halaman terkait (misal card "Total User" → halaman Kelola User).
- **Loading:** Skeleton pada card saat data dimuat.
- **Error:** Pesan error dengan tombol coba lagi jika gagal memuat data ringkasan.
- **Empty State:** Tidak berlaku secara umum (dashboard tetap menampilkan angka nol jika data belum ada).

### 20.16 Admin — Kelola Marketplace Products *(BARU — v1.1)*
- **Tujuan:** Modul paling krusial di tahap awal, karena pada MVP seluruh data referensi produk (Bagian 4.5, 17) diisi secara manual oleh admin.
- **Widget:** Tabel list produk (gambar thumbnail, nama, kategori, harga, marketplace asal, status aktif, tanggal update harga terakhir) dengan search dan filter kategori/marketplace; form create/edit (nama produk, kategori, harga, marketplace asal via dropdown enum, URL produk, upload gambar, toggle status aktif).
- **Layout:** Tabel dengan pagination di halaman index; form terpisah pada halaman create/edit.
- **Action:** Tombol "Tambah Produk" → form create; ikon edit per baris → form edit; toggle status aktif langsung dari tabel (tanpa masuk ke form); aksi "Update Harga" cepat (inline) yang otomatis memperbarui `price_updated_at`.
- **Loading:** Skeleton pada tabel saat memuat data; spinner pada tombol submit form.
- **Error:** Pesan error per-field pada form; snackbar/alert jika gagal memuat atau menyimpan data.
- **Empty State:** "Belum ada produk referensi, tambahkan produk pertama" jika tabel kosong.

### 20.17 Admin — Kelola User *(BARU — v1.1)*
- **Tujuan:** Memungkinkan tim internal memantau dan melakukan investigasi dasar terhadap akun pengguna aplikasi.
- **Widget:** Tabel list user (nama, email, tanggal daftar, jumlah Dream, status akun) dengan search; halaman detail user menampilkan ringkasan Dream & Wallet milik user tersebut secara read-only.
- **Layout:** Tabel index dengan pagination; halaman detail terpisah per user.
- **Action:** Tap baris user → halaman detail (read-only); tombol "Suspend/Nonaktifkan Akun" pada halaman detail (dengan dialog konfirmasi) untuk kasus investigasi/pelanggaran.
- **Loading:** Skeleton pada tabel dan halaman detail saat data dimuat.
- **Error:** Pesan error dengan tombol coba lagi jika gagal memuat data.
- **Empty State:** Tidak berlaku (selalu ada minimal admin yang login, dan tabel user akan terisi seiring registrasi berjalan).

---

## 21. DESIGN SYSTEM

### 21.1 Color Palette

| Token | Hex | Penggunaan |
|---|---|---|
| Primary | #2E7D64 (hijau tosca gelap) | Warna utama brand, tombol utama, elemen penting |
| Primary Light | #6FBF9A | Aksen ringan, progress bar, highlight |
| Secondary | #F5A623 | Aksen motivasi (misal ikon pencapaian, badge status) |
| Background Light | #FAFAF8 | Latar halaman mode terang |
| Background Dark | #121412 | Latar halaman mode gelap |
| Surface Light | #FFFFFF | Latar card mode terang |
| Surface Dark | #1E211F | Latar card mode gelap |
| Text Primary | #1A1C1A | Teks utama |
| Text Secondary | #6B7268 | Teks sekunder/caption |
| Success | #2E7D64 | Status tercapai |
| Warning | #F5A623 | Status mendekati deadline |
| Error | #D64545 | Pesan error, aksi destruktif |
| Border | #E2E5DF | Garis pembatas, outline field |

### 21.2 Typography

| Token | Font | Ukuran | Weight | Penggunaan |
|---|---|---|---|---|
| Display | Poppins | 28sp | SemiBold | Judul halaman utama (Splash, Onboarding) |
| Heading 1 | Poppins | 22sp | SemiBold | Judul halaman (Dashboard, Dream Detail) |
| Heading 2 | Poppins | 18sp | Medium | Sub judul, nama Dream pada card |
| Body | Inter | 14sp | Regular | Teks umum, deskripsi |
| Body Bold | Inter | 14sp | SemiBold | Label penting, nominal uang |
| Caption | Inter | 12sp | Regular | Keterangan tambahan, timestamp |
| Button Text | Inter | 14sp | Medium | Teks pada tombol |

### 21.3 Spacing

Menggunakan skala berbasis 4px: `4, 8, 12, 16, 24, 32, 48, 64`.
- Padding standar card: 16px
- Jarak antar elemen dalam form: 12px
- Jarak antar section halaman: 24px

### 21.4 Border Radius

| Token | Nilai | Penggunaan |
|---|---|---|
| Small | 8px | Chip, badge kecil |
| Medium | 12px | TextField, Button |
| Large | 16px | Card |
| Extra Large | 24px | Bottom Sheet (sudut atas) |

### 21.5 Shadow

| Token | Deskripsi |
|---|---|
| Shadow XS | Blur 4px, opacity 5% — digunakan pada TextField focus state |
| Shadow SM | Blur 8px, opacity 8% — digunakan pada Card standar |
| Shadow MD | Blur 16px, opacity 12% — digunakan pada Floating Action Button, Bottom Sheet |

### 21.6 Icon
- Menggunakan set ikon line-style konsisten (misal berbasis Phosphor Icons/Lucide) dengan ketebalan garis seragam.
- Ukuran standar: 20px (inline), 24px (navigasi), 32px (ilustratif ringan).

### 21.7 Button
- **Primary Button:** latar warna Primary, teks putih, radius Medium, tinggi 48px.
- **Secondary Button:** outline warna Primary, teks warna Primary, latar transparan.
- **Text Button:** tanpa latar/outline, digunakan untuk aksi sekunder (misal "Lewati").
- **Destructive Button:** latar/outline warna Error, digunakan untuk aksi seperti "Hapus Dream".
- Seluruh tombol memiliki state: default, pressed (opacity 85%), disabled (opacity 40%), loading (spinner menggantikan teks).

### 21.8 Card
- Radius Large (16px), Shadow SM, padding internal 16px, latar Surface sesuai tema.
- Card Dream menampilkan: nama, kategori (chip kecil), progress bar, persentase, target nominal & tanggal.

### 21.9 TextField
- Radius Medium, border 1px warna Border (default), berubah menjadi warna Primary saat fokus.
- Label mengambang (floating label) di atas field saat terisi.
- Pesan error ditampilkan di bawah field dengan warna Error dan ikon peringatan kecil.

### 21.10 Progress Bar
- Bentuk pill/rounded, tinggi 8–12px.
- Warna terisi mengikuti status: Primary (aktif), Success (tercapai), Warning (mendekati deadline namun progres rendah).
- Menampilkan label persentase di sisi kanan atau di atas bar.

### 21.11 Bottom Sheet
- Radius Extra Large pada sudut atas, terdapat handle bar kecil di tengah atas sebagai indikator geser.
- Digunakan untuk aksi cepat seperti "Tambah Dana" agar pengguna tidak berpindah halaman penuh.

### 21.12 Dialog
- Radius Medium, digunakan untuk konfirmasi aksi penting (Hapus Dream, Hapus Akun, Logout).
- Struktur: judul singkat, deskripsi konsekuensi aksi, dua tombol (Batal — Text Button, Konfirmasi — Destructive/Primary Button sesuai konteks).

### 21.13 Snackbar
- Muncul dari bawah, durasi tampil ±3 detik, digunakan untuk notifikasi sukses/error ringan yang tidak memerlukan aksi lanjutan pengguna.
- Warna latar menyesuaikan konteks (hijau untuk sukses, merah untuk error).

### 21.14 Loading
- Skeleton loading (shimmer effect) digunakan pada list/card saat memuat data awal.
- Spinner kecil digunakan di dalam tombol saat proses submit berlangsung.

### 21.15 Empty State
- Ilustrasi sederhana bertema hangat/friendly, judul singkat, deskripsi motivasional, dan Call-to-Action jika relevan (misal tombol "Tambah Dream").

### 21.16 Error State
- Ilustrasi netral (bukan menakutkan), judul "Terjadi Kesalahan" atau serupa, deskripsi singkat non-teknis, tombol "Coba Lagi".

---

## 22. STATE MANAGEMENT

### 22.1 Rekomendasi

Untuk aplikasi ImpiDream, direkomendasikan menggunakan **BLoC (Business Logic Component) / Cubit** sebagai state management utama pada Flutter, dikombinasikan dengan **get_it** untuk dependency injection.

### 22.2 Alasan Pemilihan

| Pertimbangan | BLoC/Cubit | Provider | Riverpod |
|---|---|---|---|
| Kesesuaian dengan Clean Architecture | Sangat sesuai (memisahkan event/state secara eksplisit) | Cukup sesuai | Sesuai |
| Predictability (alur data satu arah) | Tinggi | Sedang | Tinggi |
| Kematangan ekosistem & dokumentasi | Sangat matang, banyak digunakan di proyek skala menengah-besar | Matang | Matang, namun lebih baru |
| Testability | Sangat baik (state dapat diuji secara terisolasi dengan `bloc_test`) | Baik | Baik |
| Learning curve tim | Sedang (perlu memahami konsep Event-State) | Rendah | Sedang-Tinggi |

**Kesimpulan:** BLoC/Cubit dipilih karena kesesuaiannya yang kuat dengan Clean Architecture (satu Cubit per use case/fitur), dukungan pengujian yang matang melalui `bloc_test`, serta pola alur data yang jelas (Event → Business Logic → State) sehingga memudahkan debugging pada aplikasi dengan banyak state turunan seperti kalkulasi progres Dream yang bergantung pada beberapa sumber data (Dream + Wallet + Progress).

### 22.3 Pola Implementasi

- Setiap fitur (`auth`, `dream`, `wallet`, `marketplace`, `profile`, `settings`) memiliki minimal satu Cubit/Bloc pada lapisan `presentation`.
- State direpresentasikan menggunakan sealed class/union type sederhana: `Initial`, `Loading`, `Loaded(data)`, `Error(message)` — pola yang konsisten di seluruh fitur untuk memudahkan penanganan Loading/Error/Empty State pada UI (selaras dengan Bagian 20).
- Cubit tidak pernah memanggil API secara langsung, melainkan melalui Use Case (domain layer), menjaga independensi logika bisnis dari state management.

---

## 23. SECURITY

### 23.1 Authentication
- Menggunakan Laravel Sanctum (token-based authentication) yang cocok untuk kombinasi mobile app + REST API.
- Token disimpan di sisi client menggunakan secure storage (Keychain/Keystore), tidak pernah pada penyimpanan biasa yang mudah diakses.
- Admin Panel menggunakan autentikasi session-based terpisah (guard `admin`), bukan Sanctum, karena diakses melalui browser sebagai web panel internal.

### 23.2 Authorization
- Setiap request terhadap resource (Dream, Wallet) diverifikasi kepemilikannya menggunakan Laravel Policy — pengguna hanya dapat mengakses/memodifikasi data miliknya sendiri.
- Percobaan mengakses resource milik pengguna lain akan mengembalikan `403 Forbidden`, bukan `404`, untuk menjaga clarity namun tetap tidak membocorkan detail struktur data pengguna lain (sesuai kebutuhan; dapat disesuaikan menjadi 404 jika kebijakan produk menghendaki penyembunyian eksistensi resource).
- Middleware `EnsureAdmin` memastikan hanya user dengan role admin yang dapat mengakses seluruh route di bawah prefix `/admin`.

### 23.3 Password Hashing
- Seluruh password disimpan menggunakan algoritma bcrypt (default Laravel `Hash::make()`), dengan cost factor sesuai konfigurasi standar Laravel.
- Tidak pernah menyimpan atau mengirimkan password dalam bentuk plain text melalui log maupun response API.

### 23.4 Rate Limiting
- Endpoint `login`, `register`, dan `forgot-password` dibatasi menggunakan Laravel Throttle Middleware (misal 5 percobaan per menit per IP/email) untuk mencegah brute force attack. Ketentuan yang sama berlaku pada halaman login Admin Panel.

### 23.5 SQL Injection
- Seluruh query menggunakan Eloquent ORM/Query Builder yang secara otomatis melakukan parameter binding, mencegah SQL Injection. Query mentah (raw query) dihindari kecuali benar-benar diperlukan, dan jika digunakan wajib melalui parameter binding eksplisit.

### 23.6 XSS (Cross-Site Scripting)
- Karena aplikasi client mobile berbasis Flutter, risiko XSS klasik lebih rendah pada sisi mobile. Namun karena Landing Page dan Admin Panel berbasis web (Blade), seluruh output yang berasal dari input pengguna/admin (misal `note`, nama produk) wajib di-escape menggunakan `{{ }}` Blade (bukan `{!! !!}`) kecuali benar-benar diperlukan dan telah disanitasi.

### 23.7 CSRF (Cross-Site Request Forgery)
- Untuk API mobile: karena komunikasi menggunakan token Bearer (bukan cookie-based session), risiko CSRF secara signifikan berkurang.
- Untuk Landing Page dan Admin Panel: karena berbasis session cookie, seluruh form wajib menyertakan `@csrf` token Laravel bawaan.

### 23.8 Validation
- Seluruh input divalidasi di sisi server menggunakan Laravel FormRequest sebagai lapisan pertahanan utama (validasi client-side pada Flutter/Blade hanya sebagai UX improvement, bukan satu-satunya lapisan keamanan).

### 23.9 Encryption
- Seluruh trafik data wajib dienkripsi menggunakan TLS/HTTPS.
- Data sensitif tambahan (jika ada di masa depan, misal nomor rekening saat integrasi wallet real) akan dienkripsi at-rest menggunakan Laravel Encryption (`Crypt` facade) dengan key terpisah dari source code.

### 23.10 Secure Storage
- Token autentikasi dan data sensitif lain pada perangkat mobile disimpan menggunakan `flutter_secure_storage` (memanfaatkan Keychain di iOS dan Keystore di Android), bukan `shared_preferences` biasa.

---

## 24. TESTING STRATEGY

### 24.1 Unit Test
- **Cakupan:** Fungsi murni tanpa dependency eksternal — terutama seluruh formula pada `DreamProgressCalculatorService` (Bagian 15), validasi business rule pada Service Layer.
- **Tools:** PHPUnit (backend), `flutter_test` + `mocktail`/`mockito` (frontend, untuk domain layer & use case).
- **Target Coverage:** Minimal 80% pada lapisan Service dan Domain/UseCase.

### 24.2 Widget Test
- **Cakupan:** Komponen UI individual Flutter (misalnya `DreamProgressCard`, `SavingCalculatorWidget`) — memastikan widget menampilkan data dengan benar sesuai state yang diberikan (Loading, Loaded, Error, Empty).
- **Tools:** `flutter_test` dengan `WidgetTester`.

### 24.3 Integration Test
- **Cakupan:** Alur penuh dalam aplikasi Flutter, misalnya alur "Login → Dashboard → Create Dream → Dream Detail", memastikan navigasi dan integrasi antar Cubit/halaman berjalan benar. Untuk sisi web, mencakup alur "Login Admin → Kelola Marketplace Product → Update Harga".
- **Tools:** `integration_test` package (Flutter); PHPUnit Feature Test untuk alur web.

### 24.4 API Test
- **Cakupan:** Seluruh endpoint pada Bagian 14 — memastikan validasi, response format, status code, dan business rule (misal: pengguna tidak dapat mengakses Dream milik pengguna lain) berjalan sesuai spesifikasi.
- **Tools:** PHPUnit Feature Test (Laravel), dilengkapi dengan skenario database menggunakan `RefreshDatabase` trait dan factory data.

### 24.5 Manual Test
- **Cakupan:** Eksplorasi skenario yang sulit diotomatisasi sepenuhnya — pengalaman visual, transisi animasi, perilaku pada berbagai ukuran layar/perangkat fisik, serta tampilan Landing Page dan Admin Panel di berbagai ukuran browser.
- **Metode:** Test case checklist per halaman (mengacu pada Bagian 20), dijalankan oleh QA sebelum setiap rilis.

### 24.6 User Acceptance Test (UAT)
- **Cakupan:** Validasi akhir bersama stakeholder produk/perwakilan pengguna terhadap seluruh User Story (Bagian 8) dan Acceptance Criteria (Bagian 4) sebelum aplikasi dinyatakan siap rilis.
- **Metode:** Sesi terstruktur menggunakan skenario nyata (misal: "Buat Dream membeli laptop, catat 3 kali tabungan, verifikasi kalkulasi sesuai ekspektasi") dengan partisipasi calon pengguna dari kelompok Persona (Bagian 6).

---

## 25. DEVELOPMENT ROADMAP (MVP)

> **Direvisi (v1.1):** urutan pengerjaan diubah — tim akan menyelesaikan **Landing Page** dan **Admin Panel** (sisi web/backend) terlebih dahulu sebelum masuk ke pengembangan REST API untuk konsumsi mobile. Roadmap tetap disusun dalam 6 minggu kerja, mengasumsikan tim inti terdiri dari 1 Backend Developer, 1–2 Mobile Developer, dan 1 QA (dapat merangkap peran pada tim kecil); porsi minggu mobile-facing menyesuaikan karena API baru dikerjakan belakangan.

### Minggu 1 — Fondasi & Landing Page
- Setup project Laravel 12 (struktur folder sesuai Bagian 19, termasuk pemisahan `Web/` dan `Api/`).
- Migrasi database inti: `users`, `personal_access_tokens`, `user_settings`, `dreams`, `wallets`, `marketplace_products`, `dream_progress` (seluruh tabel inti dimigrasikan di awal meski API belum dikerjakan, agar Admin Panel bisa langsung mengelola data).
- Bangun **Landing Page** (halaman publik, non-auth): Hero section, penjelasan value proposition (Bagian 1.4), cara kerja (3 langkah), showcase kategori Dream, CTA "Download Aplikasi"/"Coba Sekarang" (Bagian 20.13).
- Setup guard `admin` dan middleware `EnsureAdmin` untuk Admin Panel.

### Minggu 2 — Admin Panel Inti
- Bangun **Admin Panel** dengan 3 modul utama:
  1. **Login Admin** (Bagian 20.14) — session-based, terpisah dari autentikasi pengguna aplikasi.
  2. **Dashboard Admin** (Bagian 20.15) — ringkasan jumlah user, jumlah Dream aktif/tercapai, grafik pertumbuhan pengguna sederhana.
  3. **Kelola Marketplace Products** (Bagian 20.16) — CRUD penuh untuk tabel `marketplace_products`, karena di MVP data ini diisi manual oleh admin; modul paling krusial di tahap awal. Termasuk upload gambar produk, toggle `is_active`, update cepat `price_updated_at`.
- Implementasi awal `MarketplaceService` dan `MarketplaceRepository` (dipakai bersama nanti oleh Controller Api).

### Minggu 3 — Admin Panel Lanjutan & Persiapan Domain Inti
- **Kelola User** (Bagian 20.17) — list user, detail Dream & Wallet milik user (read-only untuk investigasi), suspend/soft-delete akun.
- Implementasi `DreamService`, `WalletService`, dan `DreamProgressCalculatorService` (formula Bagian 15) di lapisan Service — disiapkan agar nantinya dapat langsung dipanggil baik dari Controller Web (jika diperlukan tampilan admin atas data Dream/Wallet) maupun Controller Api.
- Implementasi abstraksi `WalletProviderInterface` dan `MarketplaceProviderInterface` (Bagian 16 & 17) di level Service.

### Minggu 4 — REST API (Auth, Dream, Wallet)
- Implementasi endpoint Register, Login, Logout, Forgot Password (Bagian 14.1) menggunakan Laravel Sanctum.
- Implementasi endpoint CRUD Dream beserta kalkulasi progres (Bagian 14.3).
- Implementasi endpoint Wallet & pencatatan progress dana (Bagian 14.4).

### Minggu 5 — REST API (Marketplace, Profile, Settings) & Mulai Mobile
- Implementasi endpoint pencarian & detail produk Marketplace (Bagian 14.5), Profile (14.6), Settings (14.7) — seluruhnya mengonsumsi data yang sama yang sudah dikelola lewat Admin Panel sejak Minggu 2.
- Mulai setup project Flutter (struktur folder Bagian 18) serta implementasi halaman Splash, Onboarding, Login, Register.

### Minggu 6 — Testing & Deployment Awal
- Penulisan dan eksekusi Unit Test, Widget Test, API Test (Bagian 24) untuk Landing Page, Admin Panel, dan REST API yang sudah selesai.
- Bug fixing berdasarkan hasil pengujian; manual test lintas browser (Landing Page/Admin Panel) dan lintas perangkat (jika modul mobile awal sudah tersedia).
- Setup environment production, deployment backend Laravel (Landing Page + Admin Panel + API) ke server production (Bagian 29).
- Dokumentasi serah terima (handover) dan monitoring pasca-rilis awal; pengembangan mobile penuh (Dashboard, Dream, Wallet, Marketplace UI) berlanjut pada siklus berikutnya begitu API stabil.

---

## 26. FUTURE ROADMAP (PASCA-MVP)

### Versi 1.1 — Wallet Synchronization
Integrasi nyata dengan provider wallet/bank (BCA, Mandiri, BNI, BRI, SeaBank, Jago) dan e-wallet (DANA, GoPay, OVO, ShopeePay) melalui implementasi konkret pada `WalletProviderInterface` yang telah disiapkan sejak MVP (Bagian 16), memungkinkan sinkronisasi saldo otomatis.

### Versi 1.2 — Price History
Menyimpan riwayat perubahan harga produk marketplace dari waktu ke waktu, memberikan insight tren harga kepada pengguna sebelum memutuskan target nominal Dream.

### Versi 1.3 — Price Alert
Notifikasi otomatis kepada pengguna ketika harga produk referensi turun secara signifikan, membantu pengguna memutuskan waktu pembelian yang lebih tepat.

### Versi 2.0 — AI Recommendation
Rekomendasi cerdas mengenai strategi menabung yang dipersonalisasi (misalnya menyesuaikan pola pengeluaran historis pengguna) serta rekomendasi produk yang lebih relevan berdasarkan preferensi dan riwayat Dream sebelumnya.

### Versi 3.0 — Investment Goal
Memperluas ImpiDream agar mendukung pencapaian impian tidak hanya melalui tabungan pasif, tetapi juga melalui instrumen investasi sederhana (misalnya reksadana pasar uang) bagi pengguna yang ingin mempercepat pencapaian target dengan toleransi risiko tertentu.

### Versi 4.0 — Community
Fitur sosial yang memungkinkan pengguna saling memotivasi (berbagi progres secara opsional, tantangan menabung bersama), tanpa mengubah sifat inti aplikasi sebagai platform perencanaan personal.

---

## 27. PRIORITAS FITUR (MoSCoW)

### Must Have (Wajib ada di MVP)
| Fitur | Alasan |
|---|---|
| Authentication (Register/Login/Logout) | Fondasi mutlak — tanpa ini tidak ada personalisasi data |
| Dream Management (CRUD) | Inti nilai produk — objek utama yang menjadi alasan aplikasi ini dibuat |
| Wallet Manual | Diperlukan agar progres Dream dapat dihitung dan ditampilkan |
| Progress Calculator | Nilai jual utama — mengubah impian abstrak menjadi angka konkret |
| Dashboard | Titik masuk yang memberikan gambaran cepat kondisi seluruh Dream |
| Landing Page | *(BARU)* Titik kontak pertama calon pengguna dengan brand ImpiDream sebelum unduh aplikasi |
| Admin Panel — Kelola Marketplace Products | *(BARU)* Tanpa ini, data referensi produk (fitur Must Have lain) tidak dapat diisi/dikelola sama sekali |

### Should Have (Sangat diinginkan, namun tidak fatal jika tertunda sedikit)
| Fitur | Alasan |
|---|---|
| Marketplace Recommendation | Meningkatkan relevansi target nominal, namun Dream tetap dapat dibuat tanpa fitur ini (input manual) |
| Profile Management | Penting untuk personalisasi, namun bukan penghalang fungsi inti |
| Settings (notifikasi, tema) | Meningkatkan pengalaman, namun aplikasi tetap berfungsi tanpa kustomisasi ini di hari pertama |
| Admin Panel — Kelola User | *(BARU)* Penting untuk investigasi/dukungan, namun operasional inti tetap berjalan tanpa fitur ini di hari pertama |

### Could Have (Nice to have, dapat ditunda tanpa mengurangi nilai inti)
| Fitur | Alasan |
|---|---|
| Dark Mode | Peningkatan kenyamanan visual, bukan kebutuhan fungsional |
| Estimasi tanggal berbasis kecepatan menabung historis | Insight tambahan yang memperkaya, namun kalkulasi linear dasar sudah mencukupi MVP |
| Multi-bahasa (EN) | Memperluas jangkauan, namun target awal berbahasa Indonesia |
| Grafik pertumbuhan user di Admin Dashboard | Nice-to-have untuk monitoring, namun angka ringkasan sederhana sudah cukup di awal |

### Won't Have (Sengaja tidak dikerjakan pada MVP)
| Fitur | Alasan |
|---|---|
| AI, Chat, Komunitas, Investasi, Pembayaran, Gamifikasi, Referral, Affiliate, Cashback, Pinjaman, Cicilan | Sesuai arahan proyek, fitur-fitur ini berpotensi memperlambat waktu rilis MVP, menambah kompleksitas kepatuhan (khususnya untuk fitur finansial seperti pinjaman/cicilan/investasi), dan tidak esensial untuk memvalidasi nilai inti produk: membantu seseorang merencanakan dan mencapai impian sederhana. |

---

## 28. RISIKO PROYEK & MITIGASI

### 28.1 Risiko Teknis

| Risiko | Dampak | Mitigasi |
|---|---|---|
| Kompleksitas abstraksi Wallet/Marketplace Provider memperlambat development awal | Keterlambatan rilis MVP | Implementasi provider aktif (Manual) dibuat sesederhana mungkin di awal; provider lain cukup didefinisikan sebagai kontrak/enum tanpa logic penuh |
| Ketidakkonsistenan kalkulasi progres akibat race condition saat pencatatan dana bersamaan | Data progres tidak akurat | Membungkus operasi pencatatan dana dan update saldo dalam database transaction |
| Skalabilitas server saat lonjakan pengguna pasca-peluncuran | Downtime/response lambat | Arsitektur stateless (token-based) memudahkan horizontal scaling; monitoring dini melalui health-check |
| *(BARU)* Fokus backend-first (Landing + Admin) menunda validasi API oleh tim mobile | Mobile developer idle atau mulai terlambat | Service Layer (Dream/Wallet/Marketplace) dibangun sejak Minggu 3 meski Controller Api baru menyusul, sehingga begitu API dikerjakan prosesnya cepat karena logika bisnis sudah matang |

### 28.2 Risiko Produk

| Risiko | Dampak | Mitigasi |
|---|---|---|
| Pengguna malas mencatat dana secara manual | Progres tidak mencerminkan kondisi nyata, pengguna kehilangan minat | Notifikasi pengingat rutin (Settings), UX pencatatan dana yang sangat cepat (bottom sheet, minim langkah) |
| Data harga marketplace usang | Target nominal menjadi tidak relevan | Label transparan "harga terakhir diperbarui pada [tanggal]", proses update data berkala oleh tim admin melalui Admin Panel |
| Ekspektasi pengguna terhadap fitur yang belum ada (misal sinkronisasi otomatis bank) | Kekecewaan, ulasan negatif | Komunikasi jelas melalui label "Segera Hadir" pada provider yang belum aktif, serta onboarding yang menjelaskan cakupan MVP |

### 28.3 Risiko Bisnis

| Risiko | Dampak | Mitigasi |
|---|---|---|
| Belum ada model monetisasi jelas pada MVP | Ketergantungan pada pendanaan untuk keberlanjutan | Fokus MVP pada validasi product-market fit terlebih dahulu, model bisnis dieksplorasi bertahap (Bagian 1.6) |
| Kompetitor dengan fitur lebih lengkap (misal aplikasi budgeting umum) muncul lebih dulu | Kehilangan peluang pasar | Diferensiasi jelas: ImpiDream fokus spesifik pada "dream planning", bukan budgeting umum — nilai jual unik yang lebih sederhana dan mudah dipahami |

---

## 29. DEPLOYMENT

### 29.1 Deployment Backend (Laravel 12)

**Environment:**
- PHP 8.3+, Composer, Nginx sebagai web server, PHP-FPM sebagai process manager.
- Environment variables dikelola melalui file `.env` (tidak pernah di-commit ke repository), mencakup: `APP_ENV=production`, `APP_DEBUG=false`, kredensial database, konfigurasi Sanctum (`SANCTUM_STATEFUL_DOMAINS` jika diperlukan), dan konfigurasi mail (untuk Forgot Password).

**Konfigurasi Dasar:**
- Menjalankan `php artisan migrate --force` pada setiap deployment untuk menerapkan migration terbaru.
- Menjalankan `php artisan config:cache`, `route:cache`, `view:cache` untuk optimasi performa production.
- Queue worker (jika digunakan untuk pengiriman email/notifikasi) dijalankan sebagai service terpisah (misal melalui Supervisor).

**Proses Deployment (Ringkasan Alur):**
1. Kode di-pull dari branch production/main melalui pipeline CI/CD.
2. Dependency diinstal (`composer install --no-dev --optimize-autoloader`).
3. Migration dijalankan.
4. Cache konfigurasi dan route diperbarui.
5. Restart PHP-FPM/queue worker.

### 29.2 Deployment Database (MySQL)

- Menggunakan MySQL 8.0 pada server terkelola (managed database service) atau instance terpisah dari application server untuk memudahkan scaling independen.
- Backup otomatis harian (sesuai Bagian 5.9), disimpan pada storage terpisah (cloud object storage).
- Koneksi database ke aplikasi dibatasi melalui firewall/security group, hanya mengizinkan akses dari application server.

### 29.3 Deployment Storage

- File upload (misal foto profil, gambar produk marketplace) disimpan menggunakan disk storage terkonfigurasi Laravel — pada tahap awal dapat menggunakan local disk dengan symbolic link publik, namun direkomendasikan menggunakan object storage (S3-compatible) untuk skalabilitas dan keandalan jangka panjang.

### 29.4 Deployment Aplikasi Flutter — Android

1. Konfigurasi `applicationId`, versi (`versionCode`/`versionName`), dan signing key (keystore) pada `android/app/build.gradle`.
2. Build rilis menggunakan `flutter build appbundle` (format App Bundle, format yang direkomendasikan Google Play).
3. Upload ke Google Play Console, mulai dari track **Internal Testing** → **Closed Testing** → **Production**, mengikuti kebijakan review Google Play.

### 29.5 Deployment Aplikasi Flutter — iOS

1. Konfigurasi Bundle Identifier, versi, dan provisioning profile melalui Xcode/App Store Connect.
2. Build rilis menggunakan `flutter build ipa`.
3. Upload melalui Xcode Organizer atau Transporter ke App Store Connect, mulai dari **TestFlight** (internal/eksternal testing) sebelum diajukan ke **App Store Review**.

---

## 30. KESIMPULAN

ImpiDream dirancang sebagai **Dream Planning Platform** yang secara sengaja dijaga tetap sederhana pada versi MVP — berfokus sepenuhnya pada satu masalah inti: membantu seseorang mengubah impian yang abstrak menjadi rencana menabung yang jelas, terukur, dan dapat dipantau. Keputusan untuk **tidak** menyertakan fitur AI, chat, komunitas, investasi, pembayaran, gamifikasi, dan fitur finansial kompleks lainnya pada tahap awal bukan merupakan keterbatasan, melainkan strategi disiplin agar tim dapat memvalidasi nilai inti produk terlebih dahulu sebelum menambah kompleksitas.

Pada revisi ini (v1.1), tim juga secara sengaja menyusun ulang **urutan pengerjaan** agar **Landing Page** dan **Admin Panel** diselesaikan lebih dulu sebelum REST API/mobile — sebuah keputusan pragmatis, karena data referensi produk marketplace (fitur Must Have) tidak dapat diisi tanpa Admin Panel, dan Landing Page memberikan titik kontak publik paling awal dengan biaya pengembangan yang relatif rendah.

**Mengapa Arsitektur Ini Dipilih:**

- **REST API + Repository Pattern + Service Layer (Laravel)** dipilih karena memberikan pemisahan tanggung jawab yang jelas antara akses data, logika bisnis, dan penyajian HTTP — memudahkan pengujian, pemeliharaan, dan perluasan fitur di masa depan tanpa perlu menulis ulang fondasi yang sudah ada. Pemisahan Controller `Web/` dan `Api/` (Bagian 19) memastikan strategi backend-first ini tidak mengorbankan kerapian arsitektur saat API mobile menyusul.
- **Clean Architecture (Flutter)** dipilih karena memisahkan logika bisnis dari framework UI, memungkinkan tim mobile bekerja secara paralel per fitur dan menjaga kode tetap dapat diuji secara menyeluruh.
- **Abstraksi Wallet Provider dan Marketplace Provider** sengaja disiapkan sejak MVP — meskipun implementasinya masih sederhana (Manual Wallet, data referensi manual) — agar transisi menuju integrasi nyata (BCA, GoPay, Tokopedia, dan lainnya) di versi mendatang tidak memerlukan perombakan struktural yang mahal.
- **BLoC/Cubit** dipilih sebagai state management karena keselarasannya dengan Clean Architecture dan kemudahan pengujian, terutama untuk menangani state turunan yang kompleks seperti kalkulasi progres Dream yang bergantung pada beberapa sumber data sekaligus.

**Rekomendasi Pengembangan Setelah MVP Selesai:**

1. Prioritaskan **Wallet Synchronization (v1.1)** terlebih dahulu setelah MVP tervalidasi, karena permasalahan terbesar yang teridentifikasi dari pengguna kemungkinan besar adalah kelalaian mencatat dana secara manual — sinkronisasi otomatis akan memberikan dampak retensi paling signifikan.
2. Gunakan data dari fitur Progress Calculator dan pola penggunaan MVP sebagai dasar keputusan sebelum berinvestasi pada fitur **AI Recommendation (v2.0)** — pastikan terdapat cukup data historis pengguna agar rekomendasi yang diberikan benar-benar relevan, bukan sekadar fitur tempelan.
3. Pertimbangkan **Investment Goal (v3.0)** dan **Community (v4.0)** hanya setelah basis pengguna cukup besar dan loyal, mengingat kedua fitur ini membawa kompleksitas kepatuhan (investasi) dan moderasi konten (komunitas) yang signifikan.
4. Jaga konsistensi filosofi produk di setiap fase pengembangan: ImpiDream tetap menjadi platform **perencanaan impian**, bukan aplikasi keuangan umum — setiap fitur baru harus dievaluasi terhadap kesesuaiannya dengan misi inti ini sebelum ditambahkan.

Dengan fondasi arsitektur yang matang sejak MVP, dokumentasi yang lengkap pada seluruh aspek produk, teknis, dan desain di atas, tim pengembang memiliki panduan yang cukup untuk membangun ImpiDream dari nol hingga siap dirilis ke publik, sekaligus memiliki jalur pertumbuhan yang jelas untuk versi-versi berikutnya.

---

*Dokumen ini merupakan dokumentasi internal proyek ImpiDream versi 1.1 dan bersifat rahasia (confidential). Dokumen dapat diperbarui seiring perkembangan proyek.*

**— Akhir Dokumen —**