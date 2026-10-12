# Laravel User Management System

A web-based User Management System built with Laravel, featuring authentication, role-based access control, user management, search, pagination, and a modern dashboard interface.

## Features

- **Authentication:** Login and logout functionality.
- **Role-Based Access Control:** Separate permissions for administrators and regular users.
- **Admin Dashboard:** Dashboard interface with summary cards.
- **User Management (CRUD):** Create, view, edit, and delete users.
- **Search:** Search users by supported fields.
- **Pagination:** Navigate through user records page by page.
- **Role Filter:** Filter users by role.
- **Form Validation:** Validate user input.
- **Modern UI:** Responsive interface with Tailwind CSS and hover animations.

## Tech Stack

- **Backend:** PHP, Laravel
- **Frontend:** Blade Templates, Tailwind CSS, JavaScript
- **Database:** Configurable through Laravel's database settings
- **Build Tool:** Vite
- **Package Managers:** Composer and npm

## Requirements

Before installing the project, make sure you have:

- PHP version compatible with the project
- Composer
- Node.js and npm
- A supported database, such as MySQL or SQLite

## Installation

### 1. Clone the repository

```bash
git clone YOUR_REPOSITORY_URL
cd user-management
```

Replace `YOUR_REPOSITORY_URL` with your actual Git repository URL.

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install frontend dependencies

```bash
npm install
```

### 4. Configure environment variables

Create your environment file:

```bash
copy .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### 5. Configure the database

Open the `.env` file and configure your database connection.

For MySQL, update the following values according to your local database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### 6. Run database migrations

```bash
php artisan migrate
```

### 7. Build frontend assets

```bash
npm run build
```

### 8. Start the development server

```bash
php artisan serve
```

Open the local URL displayed in your terminal, usually:

`http://localhost:8000`

## User Roles

### Administrator

- Access the admin user-management section.
- Create new users.
- Edit user information.
- Delete users.
- Search, filter, and paginate user records.

### Regular User

- Log in to the application.
- Access permitted dashboard functionality.
- Restricted from administrator-only user-management operations.

## Project Structure

```text
user-management/
├── app/
│   ├── Http/Controllers/
│   └── Models/
├── database/
│   └── migrations/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
│   └── web.php
├── public/
├── .env.example
├── composer.json
├── package.json
└── README.md
```

## Security

- Authentication protects restricted application areas.
- Role-based authorization limits administrator-only operations.
- Validation helps ensure submitted data meets application rules.
- Environment-specific credentials should be kept out of version control.

## Future Improvements

- User profile management.
- Password change functionality.
- Automated feature and authorization tests.
- Additional dashboard reporting.

## License

This project is developed for learning and portfolio purposes. Specify a license before distributing it for reuse.
