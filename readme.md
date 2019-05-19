# GetCode_test_sw_api
test task

## How to run :)
Install docker, then cd into project dir.
```
docker-compose up --build -d
docker-compose exec app bash
```

edit .env, 
```
...
DB_DATABASE=star_wars
DB_USERNAME=root
DB_PASSWORD=root
...
```

Then run following command inside app container
```
composer install
php artisan key:generate
php artisan migrate
```

To run front-end u need locally installed npm
```
npm install
npm run dev/watch/prod
```
Go to http://localhost:3088 and press Get default data.

## DONE
