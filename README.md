## About Project

This Project is a simple and basic e-learning using laravel

## Packages Used

-   laravel/ui
-   spatie/laravel-permission
-   intervention/image

## Tech/framework used

<b>Built with</b>

-   [Laravel](https://laravel.com)

## Features

For Student:

-   Student can Enroll or Cancel enroll in one or more courses.
-   After Registeration Student must verify his mail to ba able to enroll courses
-   Student can edit his profile picture.

For Admin:

-   Admin has all CRUD on Students and Courses

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/7.x/installation#installation)

Clone the repository

```
git clone https://github.com/NourhanAymanElstohy/simple-e_learning.git
```

Switch to the repo folder

```
cd simple-e_learning
```

Install all the dependencies using composer

```
composer install
```

Copy the example env file and make the required configuration changes in the .env file

```
cp .env.example .env
```

Generate a new application key

```
php artisan key:generate
```

Run the database migrations and seed (**Set the database credentials in .env before migrating**)

```
php artisan migrate:fresh --seed
```

Start the local development server

```
php artisan serve
```

You can now access the server at http://localhost:8000

**Command List**

```
git clone https://github.com/NourhanAymanElstohy/simple-e_learning.git
cd simple-e_learning
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```
