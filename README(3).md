# Smart Expense Tracker

A simple PHP-based web application to manage and track daily expenses. Users can add, view, and manage their expense records through a clean web interface.

## Features

- Add and manage daily expenses
- View expense records
- Track expense details in one place
- Simple and user-friendly PHP interface
- MySQL database support
- Can be deployed on an AWS EC2 instance

## Technologies Used

- **Frontend:** HTML, CSS
- **Backend:** PHP
- **Database:** MySQL
- **Server:** Apache
- **Cloud:** AWS EC2
- **Version Control:** Git & GitHub

## Project Structure

```text
smart_expense_tracker/
├── index.php
├── css/
├── js/
├── images/
├── includes/
└── database/
```

> The exact files/folders may vary depending on the project version.

## Requirements

- PHP 8.x
- Apache Web Server
- MySQL
- Web browser
- AWS EC2 (for cloud deployment)

## Local Setup

1. Clone the repository:
   ```bash
   git clone <your-github-repository-url>
   ```
2. Move the project into your web server directory.
3. Configure the database connection in the project.
4. Create/import the required MySQL database.
5. Start Apache and MySQL.
6. Open the project in your browser.

## AWS EC2 Deployment

The project can be deployed on an AWS EC2 instance using a Linux-based server.

Basic deployment steps:

1. Launch an EC2 instance.
2. Connect to the instance using SSH.
3. Install Apache, PHP and required PHP extensions.
4. Clone the project from GitHub.
5. Configure the project and database connection.
6. Start and enable Apache.
7. Allow HTTP (Port 80) in the EC2 Security Group.
8. Access the application using the EC2 public IP address.

## Database

The application uses MySQL to store expense-related data. Configure the database name, username, password, and host according to your environment.

## Future Enhancements

- User authentication and registration
- Expense categories and filters
- Monthly expense reports
- Charts and analytics
- Export expenses to PDF/CSV

## Author

**Tejas Gandhare**
