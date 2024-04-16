Steps for install:
1. copy file `.env.example to .env`

2. run command `docker-compose up -d`

3. run command `docker-compose run --rm composer install`

4. copy file `src/.env.example to src/.env` and setting it

5. run command `docker-compose run  --rm artisan key:generate`

6. run command `docker-compose run  --rm artisan migrate`

7. run command `sudo chmod 777 ./src/storage -R`

8. run command `docker-compose run --rm npm install`

9. run command `docker-compose run --rm npm run build`

Application will be available by url http://localhost:1001/ 

The laravel application is in the src folder.






