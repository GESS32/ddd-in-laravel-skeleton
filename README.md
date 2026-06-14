# Skeleton for Domain-Driven Design (DDD) in Laravel Framework

This repository provides a foundational structure for implementing DDD in Laravel.
It includes:
- A well-organized directory structure tailored for DDD principles.
- Detailed documentation in markdown (`.md`) files to guide you through the concepts and practices of DDD within the Laravel ecosystem.

This skeleton serves as a starting point for developers looking to build scalable, maintainable, and modular applications in Laravel.

---

## Application Stack Technologies
* [PHP (v8.5+)](https://www.php.net/releases/8.5/en.php)
* [Laravel Framework (v12.0+)](https://laravel.com/docs/12.x/releases)

---

## Getting Started

Install dependencies:

```bash
composer install
```

Prepare local environment files:

```bash
cp laravel/.env.example laravel/.env
cp docker/.env.example docker/.env
php artisan key:generate
```

Start the Docker stack:

```bash
make up
```

Open the application at `http://localhost:8080` by default. Change `NGINX_PORT` in `docker/.env` if that port is already in use.

Run the default validation workflow:

```bash
composer check
```

Useful individual commands:

```bash
composer test      # run PHPUnit
composer format    # format PHP with Laravel Pint
composer lint      # check formatting without modifying files
composer analyse   # validate Composer metadata until static analysis is added
make down          # stop Docker services
```

---

## Code Architecture

The project structure is designed to separate concerns and reflect the core principles of Domain-Driven Design:

* **[laravel](./laravel/):** the default Laravel application structure;
* **[src](./src/README.md):** documentation and examples of DDD patterns.

---

## Useful Links
* [Laravel directory structure](https://laravel.com/docs/12.x/structure)
* [Awesome DDD](https://github.com/heynickc/awesome-ddd)
