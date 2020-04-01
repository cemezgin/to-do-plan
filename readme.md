## TO-DO LIST PLANNER

This app made with Symfony 4.4. env file configured for mySQL.

You need composer for this application
```
composer install
```

#### For DB Creation
```
 php bin/console doctrine:database:create
 php bin/console doctrine:migrations:migrate
```

#### Fetch plans from providers via command
```
php bin/console app:fetch
```
#### Fetch plans from providers via API Request
```
[POST] http://127.0.0.1:8000/api/v1/tasks/fetch
```
#### Get planned tasks for weeks via command
```
php bin/console app:show-plan
```
#### Get planned tasks for weeks via API Request
```
[GET] http://127.0.0.1:8000/api/v1/tasks
```
#### Serve
```
symfony serve
```
