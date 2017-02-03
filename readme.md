# Blog code source

## Installation

```bash
git clone https://github.com/netwarp/blog.git
cd blog
composer install
cp .env.example .env
```

Edit .env file

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=database_user
DB_PASSWORD=database_password
```

Rest of process
```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
```

go to localhost:8000

/login 
-> email: admin@admin.com
-> password: admin

