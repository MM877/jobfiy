# Jobfiy - Laravel Job Posting Platform

Jobfiy is a full-stack Laravel application that allows employers to post jobs and manage them easily. Built with authentication, validation, mail notifications, and clean UI using TailwindCSS, it's ideal for companies to showcase open positions and users to apply or manage postings.

## 🚀 Features

- 📝 Create, edit, and delete job listings
- ✅ Employer association with each job
- 🔐 User authentication (Register, Login, Logout)
- 📧 Email notification to employer after job is posted
- 🔍 Job search with pagination
- 🌐 Remote or in-country job flags
- 📄 Validation with helpful error messages
- 🎨 Clean UI with Tailwind CSS
- 🧪 Policy-based authorization for job management

## 🛠 Tech Stack

- **Framework**: Laravel 12
- **Frontend**: Blade + TailwindCSS
- **Database**: MySQL
- **Mail**: Laravel Mailables (Gmail SMTP)
- **Auth**: Laravel Breeze (or default auth scaffolding)
- **Queue**: Laravel Queue (for queued emails)

## 📦 Installation

```bash
git clone https://github.com/yourusername/jobfiy.git
cd jobfiy

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"


✅ Testing Email Job Posting
Ensure you have a user logged in. Once a job is posted, an email will be queued to the employer's email address.

To process the queue:

bash
Copy
Edit
php artisan queue:work



Author: Mohamed Ayman
