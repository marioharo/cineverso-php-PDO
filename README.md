# CineVerso

Web application for cinema management built with native PHP and PDO. Allows users to register, log in, and manage a movie catalog.

## Features

- User registration with server-side validation
- Login / logout with PHP sessions and cookies
- Password hashing with `password_hash()` and verification with `password_verify()`
- Movie catalog: add and list movies
- Flash alert messages via session
- SQL injection prevention using PDO prepared statements

## Tech Stack

- PHP 8.x (native, no framework)
- MySQL 8.x
- PDO with `bindValue()`
- Bootstrap 5
- HTML5 / CSS3 / JavaScript

## Database Schema

Two tables are used:

**`users`** — stores registered users with hashed passwords and a profile level (`perfil`).

**`movies`** — stores movie data: title, rating, awards, release date, duration, genre, and image URL.

SQL dump files are available in the `/bd` folder.

## Getting Started

### Requirements

> Dockerfile and docker-compose with:

- PHP 8.x
- MySQL 8.x
- A local server such as MAMP, XAMPP, or Laragon

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/marioharo/cineverso-php-PDO.git
   ```
2. Start Dockerfile and docker compose and open the project in your browser.

   ```
   docker compose up -d --build
   ```
3. Import the database using **phpMyAdmin** in the localhost (recommended):

   - Open `http://localhost:8081`
   - Create a new database named `cine_isil`
   - Go to **Import** and upload `bd/cine_isil.sql`, then `db/users.sql`

   Or via terminal (MAMP):

   ```bash
   /Applications/MAMP/Library/bin/mysql -u root -p cine_isil < bd/cine_isil.sql
   /Applications/MAMP/Library/bin/mysql -u root -p cine_isil < bd/users.sql
   ```
4. Set up your credentials:

   ```bash
   mv config.example.php config.php
   ```

   Then edit `config.php` with your database host, name, user, and password.

## Project Structure

```
cineverso-php-PDO/
├── docker-compose.yml
├── Dockerfile
├── README.md
├── db/
│   ├── movies.sql		# Movies table schema + seed data
│   └── users.sql		# Users table schema + seed data
└── src/
    ├── cerrarSesion.php
    ├── config.example.php	# Credentials template (safe to commit)
    ├── home.php
    ├── iniciarSesion.php
    ├── registrarPelicula.php	# Add movie
    ├── registrarUsuario.php	# User registration
    ├── css/
    │   └── styles.css
    ├── functions/
    │   └── functions.php	# DB connection, CRUD, validation helpers
    ├── img/
    │   └── banner-01.jpg
    ├── js/
    │   └── scripts.js
    └── partials/
        ├── footer.php
        └── navbar.php
```

## Security Notes

- `config.php` is listed in `.gitignore` and must never be committed.
- All database queries use PDO prepared statements to prevent SQL injection.
- Passwords are never stored in plain text.
