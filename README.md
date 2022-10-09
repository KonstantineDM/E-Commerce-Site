# Setting UP

1. Publish vendor files `php artisan vendor:publish`. Enter `0` to publish all files.

2. Run all migrations `php artisan migrate`.

3. Insert test product data to database: `./database/products.sql.txt`.

4. Run database seeders `php artisan db:seed`. Make sure seeder classes have this line: `namespace Database\Seeders;`.

