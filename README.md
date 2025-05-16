# Laravel Starter Kit Framework 🚀

A reusable and extensible Laravel starter kit designed for rapid development of modern web and API applications. Built with best practices and developer experience in mind, this starter kit includes pre-configured modules for authentication, role-based access, payment integration, and more.

---

## 🔧 Features

- ⚙️ **Modular Architecture** – Easily generate new modules dynamically via the developer dashboard.
- 👥 **OAuth 2.0 Authentication** – Supports social login with Google, Facebook, and GitHub.
- 🌐 **Multi-Interface Support** – Built to support both Blade-based web apps and RESTful APIs.
- 🛂 **RBAC (Role-Based Access Control)** – Fine-grained permission layers using built-in roles and policies.
- 🧰 **Built-in Helpers** – Utility functions for:
  - Image upload and processing
  - Dark mode toggle
  - Language translation (i18n)
- 💳 **Payment Integration** – MyFatoorah, Paymob supported with secure webhook handling.
- 🔔 **Real-Time Features** – WebSocket notifications powered by Laravel Echo and Pusher (working on).
- ⚡ **Performance Optimized** – Query profiling, and DB indexing implemented.

---

## 📦 Tech Stack

- **Framework**: Laravel 10
- **Frontend**: Blade (with Tailwind CSS optional)
- **Auth**: Laravel Sanctum + Socialite (OAuth 2.0)
- **Real-time**: Laravel Echo + Pusher/WebSockets
- **Payment**: MyFatoorah, Paymob (Custom integration)

---

## 📂 Folder Structure Highlights
app/
├── Controllers/ # Handles HTTP request logic
├── Helpers/ # Global helper functions accessible throughout the app
├── Modules/ # Custom-built modules generated dynamically via dashboard
├── Interfaces/ # Interface contracts for services and repositories
├── Services/ # Core service classes (e.g., PaymentService, third-party APIs)

resources/
├── views/ # Blade templates (includes support for RTL/LTR and dark mode)

routes/
├── web.php # Web interface routes
├── api.php # RESTful API routes

---

## ⚙️ Installation

```bash
git clone https://github.com/abdelhamed19/my-base.git
cd my-base
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
```
## 🔐 Social Login Setup
Add your credentials to `.env`:
```bash
FACEBOOK_CLIENT_ID=***************
FACEBOOK_CLIENT_SECRET=******************************
FACEBOOK_REDIRECT_URI="***************"

GOOGLE_CLIENT_ID=***************
GOOGLE_CLIENT_SECRET=******************************
GOOGLE_REDIRECT_URI="***************"

GITHUB_CLIENT_ID=***************
GITHUB_CLIENT_SECRET=******************************
GITHUB_REDIRECT_URI="***************"
```

💳 Payment Gateway Setup
Add your credentials to `.env`:
```bash
PAYMOB_API_KEY=*********************************************
PAYMOB_API_SECRET=***************
PAMOB_PUBLIC_KEY=***************
PAYMOB_CARD_INTEGRATION_ID=***************
PAYMOB_PAYPAL_INTEGRATION_ID=***************
PAYMOB_MOBILE_INTEGRATION_ID=***************

MY_FATORAH_API_KEY=*********************************************

```
