# STT Pro - Sistem PMB (Laravel + Filament)

## Struktur Project

```
laravel-project/
├── app/
│   ├── Filament/Resources/
│   │   ├── PendaftarResource.php
│   │   └── PendaftarResource/Pages/
│   │       ├── ListPendaftars.php
│   │       ├── CreatePendaftar.php
│   │       └── EditPendaftar.php
│   ├── Http/Controllers/
│   │   └── PendaftarController.php
│   └── Models/
│       └── Pendaftar.php
├── database/migrations/
│   └── 2026_01_01_000001_create_pendaftars_table.php
├── resources/views/
│   ├── layouts/app.blade.php
│   ├── welcome.blade.php
│   └── components/
│       ├── navbar.blade.php
│       ├── hero.blade.php
│       ├── about.blade.php
│       ├── programs.blade.php
│       ├── timeline.blade.php
│       ├── requirements.blade.php
│       ├── registration-form.blade.php
│       ├── faq.blade.php
│       └── footer.blade.php
├── routes/web.php
└── README.md
```

## Instalasi

```bash
# 1. Buat project Laravel baru
composer create-project laravel/laravel stt-pro-pmb
cd stt-pro-pmb

# 2. Install Filament
composer require filament/filament:"^3.2" -W
php artisan filament:install --panels

# 3. Copy file-file dari folder laravel-project/ ke project Laravel

# 4. Jalankan migration
php artisan migrate

# 5. Buat user admin Filament
php artisan make:filament-user

# 6. Jalankan development server
npm install && npm run build
php artisan serve
```

## Fitur

- Landing page PMB dengan Tailwind CSS via Vite
- Form pendaftaran calon mahasiswa baru
- Admin panel Filament untuk mengelola pendaftar
- Filter & pencarian data pendaftar
- Export data pendaftar
- Badge status verifikasi (pending/verified/rejected)
