## Installation instructions

- Run the following commands
```
  composer install
  cp .env.example .env
  php artisan key:generate
```

- Change the values in .env so that they are coordinated with the rest of the services (including a local db)
- Run the following to start the redis service

```
  docker-compose -f docker/docker-compose.yml up -d
```

- Run the following command to start the server

```
  php artisan serve
```

- In a different terminal, run the following to process the queue

```
  php artisan queue:work
```

You can find the Kubernetes yml objects under the `k8s` directory.
