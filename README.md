# Task Manager API (Laravel + Inertia + Vue)

A simple task management system built with Laravel, Inertia.js, and Vue 3.
The goal of this project is to demonstrate clean architecture, proper API design, and practical frontend integration.

---

## 🚀 Features

* Task CRUD (Create, Read, Update, Delete)
* RESTful API with filtering and sorting
* Pagination support
* Token-based authentication using Laravel Sanctum
* Vue 3 + Inertia frontend
* Form Request validation
* Service layer for business logic separation
* Feature tests included

---

## 🛠 Tech Stack

* Laravel (latest)
* MySQL
* Vue 3
* Inertia.js
* Laravel Sanctum

---

## 📦 Installation

Clone the repository:

```bash
git clone https://github.com/pvshingala1990/Task-Management.git
cd task-manager
```

Install dependencies:

```bash
composer install
npm install
```

Setup environment:

```bash
cp .env.example .env
php artisan key:generate
```

Configure database in `.env`, then run:

```bash
php artisan migrate
```

Start the project:

```bash
php artisan serve
npm run dev
```

---

## 🔐 Authentication

This project uses Laravel Sanctum for API authentication.

To generate a token manually:

```bash
php artisan tinker
```

```php
$user = \App\Models\User::find(1);
$user->createToken('api')->plainTextToken;
```

Use the token in requests:

```
Authorization: Bearer YOUR_TOKEN
```

---

## 📡 API Endpoints

### Public

* `GET /api/tasks`
* `GET /api/tasks/{id}`

### Protected (requires token)

* `POST /api/tasks`
* `PUT /api/tasks/{id}`
* `DELETE /api/tasks/{id}`

### Filters

```
/api/tasks?status=pending&sort=asc
```

---

## 🧱 Project Structure

The application follows a clean and simple structure:

* **Controllers** → Handle HTTP requests
* **Services** → Business logic
* **Form Requests** → Validation
* **Resources** → API responses

This keeps controllers thin and improves maintainability.

---

## 🧪 Testing

Run tests:

```bash
php artisan test
```

Includes:

* Create task
* List tasks
* Update task
* Delete task
* Validation checks

---

## 📝 Notes

* Focus was kept on clarity and maintainability
* Avoided unnecessary packages
* Followed Laravel best practices

---

## 🔍 Small Detail Check

blue river flows quietly

