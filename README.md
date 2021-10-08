<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Tutorial Github

## Mengcloning Repository

1. Buka Halaman [Repo](https://github.com/Harun1804/penomoran-surat.git)

2. Pada Komputer Anda Buka Console / Command Promt

3. Ketikan Perintah Berikut

```
git clone https://github.com/Harun1804/penomoran-surat.git
```

4. Masuk Ke Dalam Folder Hasil Clone

```
cd penomoran-surat
```

# Tutorial Penggunaan & Konfigurasi Laravel

1. Install Composer Terlebih Dahulu <br>
   [Download disini](https://getcomposer.org/download/)
2. Install Packagenya Terlebih Dahulu

```
composer install
```

3. Copy isi file .env.example

```
cp .env.example .env
```

4. Generate Key Baru

```
php artisan key:generate
```

5. Buatlah database kosong di phpmyadmin dengan nama **db_penomoran**
6. Kemudian Database Tersebut Atur Di File .env pada bagian DB_DATABASE
7. Lakukan Migrasi Database

```
php artisan migrate
```

8. Jalankan aplikasi

```
php artisan serve
```
