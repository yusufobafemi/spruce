# Spruce – Laravel Landing Page + Admin Metrics Dashboard

**Spruce** is a Laravel-powered web app featuring a marketing-friendly landing page and an admin-only backend dashboard to monitor key user activity, transactions, and system metrics in real time.

This project showcases Laravel backend skills, frontend integration with Blade and jQuery, and a dashboard with dynamic filtering, AJAX partial updates, and visual data representation.

---

## 🌐 Landing Page Features

- Modern responsive design
- Clear call-to-action for onboarding
- SEO-ready HTML structure
- Optimized for conversion

## 🔒 Admin Dashboard Features

- Role-based admin access
- Metrics dashboard (users, sales, etc.)
- AJAX filtering by date ranges (Today, Week, Month, Year)
- Charts and cards for data summaries
- Transaction logs
- Exportable reports (CSV/Excel-ready)
- Smooth navigation via partial views and jQuery

---

## ⚙️ Tech Stack

- Laravel 10
- Blade templates
- jQuery & AJAX
- Chart.js or ApexCharts
- MySQL
- Guzzle (API handling)

---

## 📦 Installation Guide

```bash
# 1. Clone the repo
git clone https://github.com/yusufobafemi/spruce.git
cd spruce

# 2. Install backend dependencies
composer install

# 3. Install frontend assets
npm install && npm run dev

# 4. Create .env and set keys
cp .env.example .env
php artisan key:generate

# 5. Set DB credentials in .env and run migrations
php artisan migrate --seed

# 6. Serve the app
php artisan serve
