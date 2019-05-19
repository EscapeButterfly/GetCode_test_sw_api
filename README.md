# GetCode_test_sw_api
test task

## How to run :)
Install docker, then cd into project dir.
```
docker-compose build -d
docker-compose exec app bash
```

edit .env as u need, then run following command inside app container

```
composer install
php artisan key:generate
php artisan migrate
npm install
npm run dev/watch/prod
```
Done :)
