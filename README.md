# Sistem Informasi PPDB (Penerimaan Peserta Didik Baru)

<p align="center">
  <strong>School Admission Management System</strong><br/>
  Built with Laravel 12, Filament v3, Tailwind CSS v4, and Livewire 3<br/>
  <em>Academic Project for University Final Examination (UAS)</em>
</p>

---

## 📋 Table of Contents

- [Tentang Proyek](#tentang-proyek)
- [Fitur Utama](#fitur-utama)
- [Tech Stack](#tech-stack)
- [Arsitektur Sistem](#arsitektur-sistem)
- [Database Schema](#database-schema)
- [Instalasi & Setup](#instalasi--setup)
- [Panduan Penggunaan](#panduan-penggunaan)
- [Struktur File](#struktur-file)
- [API Routes](#api-routes)
- [Catatan Keamanan](#catatan-keamanan)
- [Lisensi](#lisensi)

---

## 🎯 Tentang Proyek

**Sistem Informasi PPDB** adalah aplikasi web terintegrasi untuk mengelola penerimaan peserta didik baru di sebuah institusi pendidikan. Sistem ini dirancang dengan prinsip **minimalis, formal, dan terpercaya** untuk memberikan pengalaman pengguna yang optimal bagi calon siswa dan panitia.

Proyek ini merupakan **tugas akhir (UAS)** yang mengimplementasikan best practices dalam pengembangan aplikasi enterprise dengan Laravel, Filament, dan Tailwind CSS v4.

### Tujuan Sistem:
- ✅ Menyediakan portal pendaftaran online yang user-friendly
- ✅ Memfasilitasi verifikasi dokumen secara digital oleh panitia
- ✅ Mengotomasi proses approval dan rejection dengan feedback
- ✅ Menghasilkan bukti pendaftaran (PDF) otomatis
- ✅ Menjaga transparansi status pendaftaran secara real-time

---

## ✨ Fitur Utama

### 🎓 Panel Siswa (`/student`)
- **Dashboard Interaktif**: Menampilkan status pendaftaran & registration number
- **Registration Wizard** (Multi-Step Form):
  - **Step 1**: Data Pribadi (NISN, NIK, TTL, Alamat, No. HP)
  - **Step 2**: Data Orang Tua (Nama, Pekerjaan, Penghasilan)
  - **Step 3**: Data Sekolah Asal (Nama Sekolah, NPSN, Tahun Lulus)
  - **Step 4**: Upload Dokumen (Foto, KK, Ijazah, Akta Kelahiran)
- **Download Bukti Pendaftaran**: Menghasilkan PDF formal otomatis jika status disetujui
- **Real-time Status Tracking**: Menampilkan feedback dari panitia

### 👨‍💼 Panel Admin (`/admin`)
- **Dashboard Overview**: Statistik Total Registrant, Pending, Approved, Rejected
- **RegistrantResource**: Mengelola seluruh data calon siswa dengan:
  - Relation Managers untuk StudentDetail, ParentDetail, SchoolOrigin, Documents
  - Pencarian & filter berdasarkan status
- **VerificationResource**: Hub khusus untuk verifikasi dokumen dengan:
  - Custom Actions: **Verify**, **Approve**, **Reject**
  - Modal dengan admin notes untuk penolakan
  - Preview gambar dokumen langsung
  - Download link untuk berkas pendukung
- **Role-Based Access**: Hanya admin yang dapat mengakses panel ini

### 🌐 Landing Page (`/`)
- Halaman penyambutan yang minimalis & informatif
- Penjelasan 4-tahap proses pendaftaran
- CTA (Call to Action) untuk register/login
- Dynamic navbar dengan auth state detection

---

## 🛠 Tech Stack

| Layer | Technology | Version |
|-------|-----------|---------|
| **Backend** | Laravel Framework | 12.x |
| **Frontend** | Filament Admin Panel | v3.x |
| **Styling** | Tailwind CSS | v4.0 |
| **Interactivity** | Livewire | 3.x |
| **CSS Utilities** | Alpine.js | (bundled) |
| **Database** | MySQL | 5.7+ |
| **PDF Generation** | barryvdh/laravel-dompdf | 3.1.x |
| **Package Manager** | Composer | latest |
| **Build Tool** | Vite | 7.x |
| **Node Package Manager** | npm | latest |

### Key Dependencies:
```json
{
  "php": "^8.2",
  "laravel/framework": "^12.0",
  "filament/filament": "^3.0",
  "livewire/livewire": "^3.0",
  "barryvdh/laravel-dompdf": "^3.1",
  "tailwindcss": "^4.0"
}
```

---

## 🏗 Arsitektur Sistem

### Multi-Panel Architecture
Sistem menggunakan **Filament v3 Multiple Panels** untuk memisahkan akses berdasarkan role:

```
┌─────────────────────────────────────────┐
│        Public Landing Page (/)          │
│     [Register] [Login] [Prosedur]       │
└─────────────────────────────────────────┘
          ↓                    ↓
    [Student/Register]   [Admin/Login]
          ↓                    ↓
┌──────────────────────────┬──────────────────────────┐
│  Student Panel (/student)│  Admin Panel (/admin)   │
├──────────────────────────┼──────────────────────────┤
│ • Dashboard              │ • Dashboard (Stats)      │
│ • Wizard Pendaftaran     │ • RegistrantResource     │
│ • Download PDF Bukti     │ • VerificationResource   │
│ • Status Tracking        │ • Relation Managers      │
└──────────────────────────┴──────────────────────────┘
```

### Role-Based Access Control (RBAC)
- **Admin**: Full akses ke `/admin` panel, mengelola registrasi
- **Student**: Akses ke `/student` panel, mengisi & monitor pendaftaran

Implementasi via `User::canAccessPanel(Panel $panel)` di model.

---

## 💾 Database Schema

### ERD (Entity-Relationship Diagram)

```
┌─────────────┐
│    User     │ (id, name, email, password, role)
└──────┬──────┘
       │ (1)
       │ (many)
       ├──────→ StudentDetail (user_id, nisn, nik, place_of_birth, ...)
       │
       ├──────→ ParentDetail (user_id, father_name, mother_name, ...)
       │
       ├──────→ SchoolOrigin (user_id, school_name, npsn, ...)
       │
       ├──────→ Document (user_id, document_type, file_path, status)
       │
       └──────→ Registration (user_id, registration_number, status, ...)
```

### Tabel Utama

#### 1. **users**
```sql
CREATE TABLE users (
    id BIGINT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    role ENUM('admin', 'student') DEFAULT 'student',
    email_verified_at TIMESTAMP NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

#### 2. **student_details**
```sql
CREATE TABLE student_details (
    id BIGINT PRIMARY KEY,
    user_id BIGINT UNIQUE FOREIGN KEY,
    nisn VARCHAR(10),
    nik VARCHAR(16),
    place_of_birth VARCHAR(255),
    date_of_birth DATE,
    gender ENUM('male', 'female'),
    address TEXT,
    phone_number VARCHAR(20),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

#### 3. **parent_details**
```sql
CREATE TABLE parent_details (
    id BIGINT PRIMARY KEY,
    user_id BIGINT UNIQUE FOREIGN KEY,
    father_name VARCHAR(255),
    father_occupation VARCHAR(255),
    father_income BIGINT,
    mother_name VARCHAR(255),
    mother_occupation VARCHAR(255),
    mother_income BIGINT,
    guardian_phone VARCHAR(20),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

#### 4. **school_origins**
```sql
CREATE TABLE school_origins (
    id BIGINT PRIMARY KEY,
    user_id BIGINT UNIQUE FOREIGN KEY,
    school_name VARCHAR(255),
    npsn VARCHAR(20),
    graduation_year YEAR,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

#### 5. **documents**
```sql
CREATE TABLE documents (
    id BIGINT PRIMARY KEY,
    user_id BIGINT FOREIGN KEY,
    document_type ENUM('foto', 'kk', 'ijazah', 'akta'),
    file_path VARCHAR(255),
    status ENUM('pending', 'verified', 'rejected') DEFAULT 'pending',
    notes TEXT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

#### 6. **registrations**
```sql
CREATE TABLE registrations (
    id BIGINT PRIMARY KEY,
    user_id BIGINT UNIQUE FOREIGN KEY,
    registration_number VARCHAR(50) UNIQUE,
    status ENUM('pending', 'verified', 'approved', 'rejected') DEFAULT 'pending',
    admin_notes TEXT NULL,
    registered_at TIMESTAMP,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### Foreign Key Strategy
- **Cascade on Delete**: Semua relasi child otomatis terhapus ketika parent (User) dihapus
- **Soft Deletes**: Optional untuk audit trail (dapat ditambahkan kemudian)

---

## 🚀 Instalasi & Setup

### Prerequisites
- PHP 8.2+
- MySQL 5.7+ atau MariaDB
- Node.js 18+ (untuk Vite)
- Composer

### Step 1: Clone Repository
```bash
git clone <repository-url>
cd uas-ppdb
```

### Step 2: Install Dependencies
```bash
composer install
npm install
```

### Step 3: Configure Environment
```bash
cp .env.example .env
php artisan key:generate
```

Sesuaikan `.env` untuk database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ppdb
DB_USERNAME=root
DB_PASSWORD=
```

### Step 4: Run Migrations & Seeders
```bash
php artisan migrate:fresh --seed
```

Ini akan membuat:
- Tabel aplikasi (users, student_details, dll)
- Admin user: `admin@ppdb.test` / password
- Student user: `siswa@ppdb.test` / password

### Step 5: Setup Storage Link
```bash
php artisan storage:link
```

Ini membuat symlink dari `public/storage` ke `storage/app/public` untuk file uploads.

### Step 6: Start Development Server
```bash
# Terminal 1: Laravel server
php artisan serve

# Terminal 2: Vite dev server (untuk CSS/JS hot reload)
npm run dev
```

Aplikasi akan berjalan di:
- Landing: `http://localhost:8000`
- Admin Panel: `http://localhost:8000/admin`
- Student Panel: `http://localhost:8000/student`

---

## 📖 Panduan Penggunaan

### Sebagai Calon Siswa

1. **Akses Landing Page** (`http://localhost:8000`)
   - Baca prosedur & timeline PPDB
   - Klik "Daftar Sekarang" atau "Masuk"

2. **Register Akun Baru** (jika belum)
   - Email: `siswa@test.example.com`
   - Password: Sesuai keinginan
   - Akan otomatis mendapat role `student`

3. **Akses Dashboard Siswa** (`/student`)
   - Klik "Mulai Pendaftaran Sekarang"

4. **Isi Wizard Pendaftaran** (4 Steps)
   - Lengkapi semua field yang ditandai required
   - Upload dokumen berformat JPG/PNG (max 2MB per file)
   - Klik "Submit Pendaftaran"

5. **Monitor Status**
   - Kembali ke Dashboard
   - Lihat status: Pending → Verified → Approved (atau Rejected)
   - Jika Approved, bisa download Bukti Pendaftaran PDF

### Sebagai Admin/Panitia

1. **Login ke Admin Panel** (`/admin`)
   - Email: `admin@ppdb.test`
   - Password: `password`

2. **Dashboard Admin**
   - Lihat statistik: Total Siswa, Menunggu, Disetujui, Ditolak

3. **Kelola Registrasi** (RegistrantResource)
   - Cari siswa berdasarkan nama/email
   - Klik "Edit" untuk lihat detail lengkap
   - Expand Relation Managers:
     - **Student Detail**: Lihat biodata
     - **Parent Detail**: Lihat data orang tua
     - **School Origin**: Lihat asal sekolah
     - **Documents**: Preview & download dokumen

4. **Verifikasi Pendaftaran** (VerificationResource)
   - Tabel cepat semua registrasi
   - Filter berdasarkan status
   - Aksi per row:
     - **Verifikasi**: Ubah status pending → verified
     - **Setujui**: Ubah status verified → approved
     - **Tolak**: Ubah status → rejected + input alasan

---

## 📁 Struktur File

```
uas-ppdb/
├── app/
│   ├── Enums/
│   │   ├── Gender.php                    # Enum: male, female
│   │   └── UserRole.php                  # Enum: admin, student
│   ├── Filament/
│   │   ├── Resources/
│   │   │   ├── RegistrantResource.php    # Admin resource: User (filter student only)
│   │   │   ├── VerificationResource.php  # Admin resource: Registration (with custom actions)
│   │   │   └── */RelationManagers/       # Relation managers untuk StudentDetail, ParentDetail, etc.
│   │   └── Student/
│   │       └── Pages/
│   │           ├── Dashboard.php         # Student dashboard (status tracker)
│   │           └── RegistrationWizard.php # Multi-step form wizard
│   ├── Http/
│   │   └── Controllers/
│   │       └── PdfController.php         # Generate & download Bukti Pendaftaran
│   ├── Models/
│   │   ├── User.php                      # Main auth model
│   │   ├── StudentDetail.php
│   │   ├── ParentDetail.php
│   │   ├── SchoolOrigin.php
│   │   ├── Document.php
│   │   └── Registration.php
│   └── Providers/
│       └── Filament/
│           ├── AdminPanelProvider.php    # Admin panel config
│           └── StudentPanelProvider.php  # Student panel config
├── database/
│   ├── migrations/                       # All 6 table migrations + defaults
│   ├── factories/
│   │   └── UserFactory.php
│   └── seeders/
│       └── DatabaseSeeder.php            # Seeds admin & student test user
├── resources/
│   ├── css/
│   │   └── app.css                       # Tailwind v4 config with @theme colors
│   ├── js/
│   │   └── app.js
│   └── views/
│       ├── welcome.blade.php             # Landing page
│       ├── pdf/
│       │   └── registration-proof.blade.php # PDF template
│       └── filament/
│           ├── admin/pages/              # Admin panel views
│           └── student/pages/            # Student panel views
├── routes/
│   └── web.php                           # Routes: /, /student/download-proof
├── public/
│   ├── storage/                          # Symlink to storage/app/public
│   └── index.php
├── storage/
│   ├── app/
│   │   ├── documents/                    # Uploaded documents organized by type
│   │   │   ├── fotos/
│   │   │   ├── kks/
│   │   │   ├── ijazahs/
│   │   │   └── aktas/
│   │   └── public/
│   └── logs/
├── config/
│   ├── app.php
│   ├── database.php
│   ├── filament.php                      # Filament brand colors & themes
│   └── ... (standard Laravel configs)
├── .env.example
├── artisan
├── composer.json
├── package.json
├── vite.config.js                        # Vite + Tailwind v4 config
├── tailwind.config.js                    # (NOT USED - v4 uses @theme in CSS)
└── README.md
```

---

## 🔌 API Routes

### Public Routes
| Method | Route | Description |
|--------|-------|-------------|
| GET | `/` | Landing page |
| GET/POST | `/student/register` | Student registration form (Filament managed) |
| GET/POST | `/student/login` | Student login (Filament managed) |

### Authenticated Routes (Student)
| Method | Route | Middleware | Description |
|--------|-------|-----------|-------------|
| GET | `/student` | auth, role:student | Student dashboard |
| GET/POST | `/student/pendaftaran` | auth, role:student | Registration wizard |
| GET | `/student/download-proof` | auth, role:student | Download PDF bukti pendaftaran |

### Authenticated Routes (Admin)
| Method | Route | Middleware | Description |
|--------|-------|-----------|-------------|
| GET | `/admin` | auth, role:admin | Admin dashboard |
| GET/POST | `/admin/resources/registrants` | auth, role:admin | Manage registrants (CRUD) |
| GET/POST | `/admin/resources/verifications` | auth, role:admin | Verify registrations |

---

## 🔒 Catatan Keamanan

### Authentication & Authorization
- ✅ Laravel default password hashing (bcrypt)
- ✅ CSRF protection via `@csrf` directive
- ✅ Role-based access control di `User::canAccessPanel()`
- ✅ Middleware: `auth`, role-checking built-in Filament
- ✅ PDF download: Pastikan user terautentikasi & statusnya `verified`/`approved`

### File Upload Security
- ✅ File upload dibatasi max 2MB per file
- ✅ Tipe file dibatasi: JPG, PNG (images), PDF
- ✅ File disimpan di `storage/app/public/documents/` (OUTSIDE web root)
- ✅ Akses via symlink `public/storage` dengan kontrol Laravel

### Database Security
- ✅ Password hashed dengan bcrypt
- ✅ Sensitive data (phone, income) protected by Laravel ORM
- ✅ SQL Injection prevented via Eloquent Query Builder
- ✅ Foreign keys with Cascade On Delete untuk data consistency

### Recommended Best Practices (Production)
1. Gunakan `.env` file untuk semua credentials (jangan hardcode)
2. Aktifkan HTTPS & enforce SSL
3. Setup rate limiting untuk login forms
4. Implement audit logging untuk admin actions
5. Regular backups database
6. Use environment-specific config (production, staging, local)
7. Setup monitoring & error tracking (e.g., Sentry)

---

## 🧪 Testing & Development

### Running Tests
```bash
php artisan test
```

### Database Refresh (Development)
```bash
php artisan migrate:fresh --seed
```

### Clear Cache
```bash
php artisan optimize:clear
```

### Building for Production
```bash
# Build CSS/JS
npm run build

# Optimize Laravel
php artisan optimize
```

---

## 📚 File Structure Highlights

### Key Model Relationships
```php
// User has many relationships
User::studentDetail() // HasOne
User::parentDetail() // HasOne
User::schoolOrigin() // HasOne
User::documents() // HasMany
User::registration() // HasOne

// Inverse relationships
StudentDetail::user() // BelongsTo
Document::user() // BelongsTo
Registration::user() // BelongsTo
```

### Custom Enums
```php
// UserRole enum (app/Enums/UserRole.php)
enum UserRole: string {
    case Admin = 'admin';
    case Student = 'student';
    
    public function getLabel(): string { ... }
}

// Gender enum (app/Enums/Gender.php)
enum Gender: string {
    case Male = 'male';
    case Female = 'female';
    
    public function getLabel(): string { ... }
}
```

### Filament Customization
- **Color Palette**: Sky 600 (`#0284c7`), Slate 800, Emerald 600 (success), Rose 600 (danger)
- **Theme File**: `resources/css/app.css` dengan `@theme` directive
- **Vite Integration**: `vite.config.js` dengan `@tailwindcss/vite` plugin

---

## 📞 Kontak & Support

Untuk pertanyaan atau issues, silakan hubungi:
- **Email**: [project-email@example.com]
- **Repository**: [GitHub Link]

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---

**Developed with ❤️ for UAS Final Examination**  
Laravel 12 | Filament v3 | Tailwind CSS v4 | Livewire 3
