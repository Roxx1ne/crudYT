# Simple CRUD Laravel 9 versi 1

## Route product yang digunakan (view dan controller berbeda dengan versi 2), bisa di cek di `routes/web.php`

```php
Route::get('product', [ProductController::class, 'index'])->name('product');
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('product/update/{product}', [ProductController::class, 'update'])->name('product.update');
Route::delete('product/delete/{product}', [ProductController::class, 'destroy'])->name('product.delete');
```


# Cara menjalankan project dengan menggunakan docker

## git clone repo ini dan hapus folder .git (jika perlu dihapus .git nya)

```shell
git clone git@github.com:Cryxto/simple-crud-laravel9-1.git && cd simple-crud-laravel9-1 && rm -rf .git
```

## build project (jangan lupa untuk hapus project yg lain jika terjadi container conflict)

```shell
docker-compose up -d --build
```

## Masuk ke shell atau bash container

```shell
docker exec -it pemweb bash
```

## Jika error laravel log gunakan ini didalam container shell atau bash

```shell
chown -R www-data:www-data /var/www
```

## buat file environment laravel

```shell
cp .env.example .env
```

## edit beberapa environment laravel nya di file .env 
```shell
DB_HOST=mysql_pemweb
DB_PORT=3306
DB_DATABASE=simple_crud_product
DB_USERNAME=root
DB_PASSWORD=p455w0rd
```

## install depedencies

```shell
composer install
```

## generate key

```shell
php artisan key:generate
```

## migrate serta seeding database

```shell
php artisan migrate:fresh --seed --seeder=ProductSeeder
```