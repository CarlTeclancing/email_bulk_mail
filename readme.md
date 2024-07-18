Student Email Collection Platform
Overview
This project is a web-based platform for collecting students' names and emails. It includes an admin panel where administrators can view submissions, export them as CSV, upload emails, and send bulk emails to the collected addresses. The application is built using PHP with a focus on object-oriented principles and does not use any frameworks.

Features
Student Interface
Submit Email: Students can submit their name and email through a simple form.
Admin Interface
Admin Login/Logout: Secure login and logout functionality for administrators.
Dashboard: View the total number of submissions for today, this week, and all time.
Email Management: View, export, and upload email addresses.
Bulk Email: Send bulk emails to all collected addresses.
Technologies Used
PHP: Server-side scripting.
PDO: Database operations.
MySQL: Database management.
HTML/CSS: Frontend structure and styling.
Color Scheme
Primary Color: #006EFF
Secondary Color: #FFBC10
Background Color: #F4F7FE
Text Color: #2B3674
Folder Structure
Copy code
student_email_collection/
├── db.php
├── index.php
├── submit.php
├── admin_login.php
├── admin_authenticate.php
├── admin_dashboard.php
├── admin_emails.php
├── admin_logout.php
├── styles.css
└── uploads/
Setup Instructions
Clone the Repository:

bash
Copy code
git clone <repository_url>
Database Setup:

Create a database and import the following table structure:

sql
Copy code
CREATE TABLE `submissions` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

CREATE TABLE `users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);

-- Insert a sample admin user
INSERT INTO `users` (`username`, `password`) VALUES ('admin', '$2y$10$KbQiX5vHqJ6dQyb.nhQIOOPg1DPJODRsy6QPA1ThE6VFoWg5rjZJ2'); -- Password: admin
Configure Database Connection:

Update the database connection details in db.php.
Run the Application:

Open index.php in your web browser to access the student submission form.
Open admin_login.php in your web browser to access the admin panel.
Usage
Student Submission
Navigate to the root of the project to submit your name and email.
Admin Panel
Navigate to /admin_login.php to log in as an admin.
Use the dashboard to view submission metrics.
Use the email management interface to view, export, and upload emails.
Use the bulk email interface to send emails to all collected addresses.
License
This project is open source and available under the MIT License.

Author
Yuven Carlson