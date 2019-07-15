## Subscription API example

In this project I am showcasing a simple subscription api, allowing to perform typical tasks connected with operating
 a subscription based company ;).

## Project information

I decided to use Laravel as the basis for the API, as it is the framework I am most familiar with at the moment and
I did not want to be too time constrained due to too many new things. Modifying it to be more DDD like was probably
the greatest challenge in this task - due to little practical knowledge of it. As I have found, there is no perfect
way of combining Laravel with DDD, albeit even taking it into consideration, allows to make more conscious choices
while constructing your application - and that is for me the immediate benefit of this task.

## Docker installation

Running application in docker environment requires docker and docker-compose installed on your system.

1. set permissions for project dir

    ```
    sudo chown -R $USER:$USER <dir_name>
    ```

2. cd into project directory.

3. copy env variables

    ```
    cp .env.example .env
    ```

4. create new sqlite db

    ```
    touch database/database.sqlite
    ```

5. start docker containers

    ```
    docker-compose up -d
    ```

6. install dependencies with composer

    via docker temp container:
    ```
    docker run --rm -v $(pwd):/app composer install
    ```
    via docker running container:
    ```
    docker exec app composer install
    ```
    or locally on your system

7. generate laravel app key
    ```
    docker-compose exec app php artisan key:generate
    ```

8. run migrations and seed db
    ```
    docker-compose exec app php artisan migrate --seed
    ```

9. application is now ready at "localhost:82/api/v1
