# Digitani
Program Pencatatan Keuangan UMKM Desa Tamping Winarno

## Feat
- Pemasukan
- Pengeluaran
- Kategori
- Profil
- Statistik
- Aktivitas Terbaru
- Register

## Instalasi
Clone repo:
```
git clone https://github.com/mhmdfathan/PPK-HMD-Pertanian.git
cd PPK-HMD-Pertanian
```

Install PHP dependencies:
```
composer install
```

Setup env:
```
cp .env.example .env
```

Generate appliaction key:
```
php artisan key:generate
```

Edit .env to connect database (local):
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=digitani_db
DB_USERNAME=root
DB_PASSWORD=
```

Run db migrations:
```
php artisan migrate
```

Run database seeder:
```
php artisan db:seed
```

Run dev server (local development):
```
php artisan serve
```

Default login details:
- username: admin@gmail.com
- password: password

### Special Thanks
- [Mohsin Shaikh](https://github.com/mohsin-shaikh/)
