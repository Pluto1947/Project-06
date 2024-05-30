# Project-06
# Dormitory Management System

The Dormitory Management System is a web-based application designed to manage and streamline the operations of a dormitory. The system supports both administrative and student functionalities, providing a comprehensive solution for managing dormitory-related activities.

## Features

### Admin Features
- Student Management: Create, update, and delete student records.
- Room Allocation: Assign and manage room allocations for students.
- Announcements: Post announcements for students.
- Reports: Generate various reports related to dormitory operations.

### Student Features
- Profile Management: View and update personal profile information.
- Room Details: View room details.
- Dorm Details: View Dorm details
- Announcements: View announcements posted by the admin.
- Request Management: Submit and track requests (e.g., maintenance, complaints).


### Student Features
- Profile Management: View and update personal profile information.
- Room Details: View room details.
- Dorm Details: View Dorm details
- Announcements: View announcements posted by the admin.
- Request Management: Submit and track requests (e.g., maintenance, complaints).

## Installation

### Prerequisites
- Web Server: Apache or Nginx
- Database: MySQL or MariaDB
- PHP: Version 7.4 or higher
- Composer: Dependency Manager for PHP

### Steps
1. Clone the Repository
    ```bash
    git clone https://github.com/yourusername/dormitory-management-system.git
    cd dormitory-management-system
    ```

2. **Install Dependencies**
    ```bash
    composer install
    ```

3. **Configure Database**
    - Create a database in MySQL.
    - Update the `config.php` file with your database credentials.
    ```php
    <?php
    return [
        'host' => 'localhost',
        'dbname' => 'your_database_name',
        'user' => 'your_database_user',
        'password' => 'your_database_password',
        'charset' => 'utf8mb4',
    ];
    ```

4. **Run Database Migrations**
    ```bash
    php migrate.php
    ```

5. **Set Up Virtual Host (Optional)**
    Configure your web server to point to the `public` directory of the project.

6. **Start the Server**
    - If using a built-in PHP server for development:
    ```bash
    php -S localhost:8000 -t public
    ```

## Usage

### Admin Login
- URL: `http://localhost/admin/login.php`
- Default Credentials: 
  - Username: `admin`
  - Password: `admin123`

### Student Login
- URL: `http://localhost/login.php`
- Use the credentials provided during student creation by the admin.

## Directory Structure

- `config/` - Configuration files.
- `public/` - Publicly accessible files (entry point for the application).
- `src/` - Application source code.
- `templates/` - HTML templates.
- `migrate.php` - Script to run database migrations.

## Contributing

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature-name`).
3. Commit your changes (`git commit -am 'Add new feature'`).
4. Push to the branch (`git push origin feature/your-feature-name`).
5. Create a new Pull Request.

## Contact

For any inquiries, please contact [berkemdana00@gmail.com].


