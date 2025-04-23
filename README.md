# Desa Digital

<div align="center">
  <p>
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" height="100" alt="Laravel Logo">
  </p>

  <p>
    <img src="https://spatie.be/images/og-image.jpg" height="100" alt="Spatie Permission">
  </p>

  <p>
    <img src="https://raw.githubusercontent.com/laravel/breeze/1.x/art/breeze-logo.svg" height="100" alt="Laravel Breeze">
  </p>

  <p>
    <img src="https://camo.githubusercontent.com/544257fca6c1eb70768d5654b4c6456830de1bf5f0fad36742276fd124ecb477/68747470733a2f2f63646e2e6a7364656c6976722e6e65742f67682f74686d73676e722f736e6561742d68746d6c2d61646d696e2d74656d706c6174652d667265652f6173736574732f696d672f736e6561742d6c6f676f2e706e67" height="100" alt="Sneat Admin Template">
  </p>
</div>

## Tentang Desa Digital

Desa Digital adalah sistem informasi manajemen desa yang dibangun menggunakan Laravel 12. Aplikasi ini membantu dalam pengelolaan data desa dengan fitur-fitur:

- Manajemen Data Desa
- Manajemen Penduduk
- Manajemen Pemerintahan Desa
- Manajemen Wilayah
- Layanan Publik
- Pengaduan Masyarakat
- Potensi Desa
- Berita & Galeri
- Download Area
- Transparansi Anggaran
- Interaksi Warga

## Teknologi yang Digunakan

- [Laravel 12](https://laravel.com/docs) - Framework PHP
- [Spatie Permission](https://spatie.be/docs/laravel-permission) - Manajemen Role dan Permission
- [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze) - Authentication
- [Sneat Admin Template](https://themeselection.com/item/sneat-free-bootstrap-html-admin-template/) - Admin Template
- MySQL - Database

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL
- Git

## Instalasi

1. Clone repository
```bash
git clone https://github.com/username/desa-digital.git
cd desa-digital
```

2. Install dependencies PHP
```bash
composer install
```

3. Install dependencies JavaScript
```bash
npm install
```

4. Copy file environment
```bash
cp .env.example .env
```

5. Generate application key
```bash
php artisan key:generate
```

6. Konfigurasi database di file .env
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desa_digital
DB_USERNAME=root
DB_PASSWORD=
```

7. Jalankan migrasi dan seeder
```bash
php artisan migrate --seed
```

8. Build assets
```bash
npm run build
```

9. Jalankan aplikasi
```bash
php artisan serve
```

## Akses Aplikasi

Buka browser dan akses `http://localhost:8000`

Default user:
- Email: admin@admin.com
- Password: password

## Fitur Role dan Permission

Aplikasi ini menggunakan Spatie Permission dengan role default:
- Super Admin
- Admin
- Staff
- User

Setiap role memiliki permission yang berbeda sesuai dengan kebutuhan.

## Kontribusi

Silakan berkontribusi dengan membuat pull request. Untuk perubahan besar, harap buka issue terlebih dahulu untuk mendiskusikan perubahan yang diinginkan.

## Lisensi

Aplikasi ini adalah software open-source yang dilisensikan di bawah [MIT license](https://opensource.org/licenses/MIT).
