# Laravel Docker Başlangıç Ortamı

Bu repo, Nginx ve PostgreSQL kullanarak Laravel projeleri geliştirmek için hazır bir Docker ortamı sağlar.

### Gereksinimler
- Docker
- Docker Compose

### Hızlı Kurulum ve Başlangıç

1.  **Repoyu Klonla**

    ```bash
    git clone https://github.com/akadal/laravel
    cd laravel
    ```

2.  **Docker Konteynerlarını Oluştur ve Başlat**

    Bu komut, gerekli imajları indirip build edecek ve konteynerları arka planda çalıştıracaktır.

    ```bash
    docker-compose up -d --build
    ```

3.  **Yeni Bir Laravel Projesi Oluştur**

    Aşağıdaki komut, çalışan `app` konteyneri içinde Composer'ı kullanarak `laravel` adında yeni bir proje oluşturur.

    ```bash
    docker-compose exec app composer create-project laravel/laravel laravel
    ```
    > **Not:** Nginx konfigürasyonu, projenin `laravel` isimli bir alt klasörde olmasını bekleyecek şekilde ayarlanmıştır.

4.  **`.env` Dosyasını Yapılandır**

    Proje ana dizininde, oluşturulan `laravel` klasörünün içindeki `.env.example` dosyasını kopyalayarak `.env` dosyasını oluşturun.

    ```bash
    cp laravel/.env.example laravel/.env
    ```

    Oluşturduğunuz `laravel/.env` dosyasını açın ve veritabanı ayarlarını aşağıdaki gibi güncelleyin:

    ```env
    DB_CONNECTION=pgsql
    DB_HOST=db
    DB_PORT=5432
    DB_DATABASE=laravel
    DB_USERNAME=user
    DB_PASSWORD=password
    ```

5.  **Uygulama Anahtarını (APP_KEY) Oluştur**

    ```bash
    docker-compose exec app php laravel/artisan key:generate
    ```

6. **Veritabanını Hazırla**

    ```bash
    docker-compose exec app php laravel/artisan migrate:fresh
    ```

### Erişim

Kurulum tamamlandı. Artık projenize tarayıcınızdan erişebilirsiniz:

**http://localhost:2020**

### Development

**Create a new controller**

```bash
docker compose exec app php laravel/artisan make:controller TempController
```

**Create a new customer model**

```bash
docker compose exec app php laravel/artisan make:model Customers -m
```

Then, update the migration file `laravel/database/migrations/2025_11_05_082818_create_customers_table.php` to add the `name` and `surname` columns:

```php
Schema::create('customers', function (Blueprint $table) {
    $table->id();
    $table->string("name");
    $table->string("surname");
    $table->timestamps();
});
```

Finally, run the migration:

```bash
docker compose exec app php laravel/artisan migrate:fresh
```
