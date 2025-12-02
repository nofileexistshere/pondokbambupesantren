# 🕌 Pondok Bambu Pesantren Website

A comprehensive web application built with Laravel 12 and Filament 4 for Pondok Bambu Pesantren (Islamic Boarding School). This website features a modern, responsive design with complete content management system capabilities.

## ✨ Features

### 🎨 Frontend Features
- **Homepage** - Attractive landing page with hero section, vision & mission, statistics, programs, and latest news
- **News/Berita** - News listing and detail pages with category filtering (Prestasi, Kegiatan, Pengumuman)
- **Programs** - Showcase of educational programs (Tahfidz Al-Quran, Kitab Kuning, Languages, Technology)
- **Donation System** - Multi-campaign donation management with payment methods (QRIS, Transfer, E-Wallet)
- **Photo & Video Gallery** - Media gallery with category filtering
- **Student Registration** - Multi-step registration form with document upload
- **Regular Donor Form** - Subscription form for recurring donors
- **WhatsApp Bubble** - Floating WhatsApp button for easy communication
- **Responsive Design** - Mobile-friendly using TailwindCSS

### 🛠️ Admin Panel (Filament)
- **Dashboard** - Overview of all system statistics
- **News Management** - Create, edit, and publish news articles
- **Program Management** - Manage educational programs and their details
- **Donation Campaign Management** - Track donations and campaigns
- **Donation Transactions** - Monitor all donation transactions
- **Regular Donors** - Manage recurring donor subscriptions
- **Gallery Management** - Upload and organize photos/videos
- **Student Registrations** - Review and process student applications
- **Site Settings** - Configure website content (CMS functionality)
- **Testimonials** - Manage donor testimonials

## 🚀 Tech Stack

- **Framework**: Laravel 12
- **Admin Panel**: Filament 4
- **Frontend**: Blade Templates + TailwindCSS
- **Database**: SQLite (can be changed to MySQL/PostgreSQL)
- **PHP Version**: 8.2+

## 📋 Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM (optional, for asset compilation)

## 🔧 Installation

1. **Clone or navigate to the project directory**
```bash
cd d:\pondokbambupesantren
```

2. **Install dependencies** (if needed)
```bash
composer install
```

3. **Set up environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Run migrations and seed data**
```bash
php artisan migrate:fresh --seed
```

5. **Create storage link**
```bash
php artisan storage:link
```

6. **Start development server**
```bash
php artisan serve
```

7. **Access the application**
- Frontend: http://127.0.0.1:8000
- Admin Panel: http://127.0.0.1:8000/admin

## 🔐 Default Credentials

### Admin Panel Access
- **Email**: `admin@pondokbambu.ac.id`
- **Password**: `password`

### Alternative Admin (created during setup)
- **Email**: `test@gmail.com`
- **Password**: `test`

## 📊 Database Structure

The application includes the following main tables:
- `users` - Admin users
- `news` - News articles
- `programs` - Educational programs
- `donation_campaigns` - Donation campaigns
- `donations` - Donation transactions
- `regular_donors` - Recurring donor subscriptions
- `galleries` - Photo and video gallery
- `student_registrations` - Student applications
- `site_settings` - CMS settings
- `testimonials` - Donor testimonials

## 📱 Pages & Routes

### Public Routes
- `/` - Homepage
- `/berita` - News listing
- `/berita/{slug}` - News detail
- `/program` - Programs listing
- `/program/{slug}` - Program detail
- `/donasi` - Donation page
- `/galeri` - Gallery
- `/daftar-santri` - Student registration

### Admin Routes
- `/admin` - Admin dashboard (requires authentication)
- `/admin/login` - Admin login page

## 🎨 Design Reference

The design is based on the modern pesantren website style with:
- Teal/Green color scheme (#10B981)
- Orange accent colors (#F59E0B)
- Clean, modern typography
- Responsive grid layouts
- Card-based components
- Smooth transitions and hover effects

## 🌟 Key Components

### WhatsApp Integration
The floating WhatsApp button is configured in the layout file. Update the phone number in:
- `resources/views/layouts/app.blade.php` (line with `wa.me/`)
- Database: `site_settings` table, key `whatsapp_number`

### Payment Gateway
The donation system is ready for payment gateway integration. Currently, it stores donation records in the database. To integrate with a real payment gateway (Midtrans, Xendit, etc.), modify:
- `app/Http/Controllers/DonationController.php` - `store()` method

### File Uploads
Student registration and gallery features support file uploads. Files are stored in:
- `storage/app/public/registrations/` - Student documents
- `storage/app/public/galleries/` - Gallery media

## 📝 Sample Data

The database seeder includes:
- 1 Admin user
- 17 Site settings (hero, stats, contact info, etc.)
- 4 Programs (Tahfidz, Kitab Kuning, Languages, Technology)
- 3 News articles (Prestasi, Kegiatan, Pengumuman)
- 4 Donation campaigns
- 2 Testimonials

## 🔄 Updating Content

### Via Admin Panel
1. Login to `/admin`
2. Navigate to the desired section
3. Create, edit, or delete records
4. Changes appear immediately on the frontend

### Via Site Settings
Configure these in Admin > Site Settings:
- Site name and tagline
- Hero section text
- Vision and mission
- Statistics (students, teachers, programs)
- Contact information
- WhatsApp number

## 🛡️ Security

- CSRF protection enabled on all forms
- File upload validation
- Authentication required for admin panel
- SQLite database for development (use MySQL/PostgreSQL for production)

## 📦 Deployment

For production deployment:

1. Update `.env` with production settings:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdo main.com
```

2. Configure production database (MySQL/PostgreSQL)

3. Run migrations:
```bash
php artisan migrate --force
```

4. Optimize for production:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

5. Set proper permissions:
```bash
chmod -R 755 storage bootstrap/cache
```

## 🤝 Support

For questions or issues:
- Email: info@pondokbambu.ac.id
- Phone: +62 812-3456-7890
- WhatsApp: https://wa.me/6281234567890

## 📄 License

This project is built with Laravel (MIT License) and Filament (MIT License).

---

**Built with ❤️ for Pondok Bambu Pesantren**

