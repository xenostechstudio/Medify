# 💊 Medify - Pharmacy Management System

A comprehensive pharmacy management system built with Laravel 12 and Filament 4.0, designed specifically for Indonesian apotec (pharmacy) needs.

## 🚀 Features

### 📦 **Inventory Management**
- Complete medicine catalog with categories
- Batch tracking with expiry dates
- Low stock alerts and monitoring
- Supplier management and purchase tracking

### 💊 **Medicine Database**
- Generic and brand name tracking
- Dosage forms and strengths
- Prescription requirements
- Category organization

### 👥 **Customer Management**
- Patient records and medical history
- Allergy and medical condition tracking
- Prescription history

### 📋 **Prescription Processing**
- Digital prescription management
- Doctor verification
- Dosage instructions tracking
- Prescription to sales conversion

### 🛒 **Point of Sale (POS)**
- Complete sales management
- Multiple payment methods
- Receipt generation
- Inventory deduction automation

### 📊 **Analytics & Reports**
- Real-time inventory dashboard
- Sales analytics
- Expiry date monitoring
- Stock movement tracking

## 🛠️ Tech Stack

- **Backend**: Laravel 12
- **Admin Panel**: Filament 4.0
- **Database**: PostgreSQL
- **Frontend**: Blade Templates with Tailwind CSS
- **Testing**: Pest PHP

## 📋 Requirements

- PHP 8.2 or higher
- Composer
- PostgreSQL 13+
- Node.js & NPM

## ⚡ Quick Start

### 1. Clone & Install
```bash
git clone <repository-url> medify
cd medify
composer install
npm install
```

### 2. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Database Configuration
Update your `.env` file:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=medify
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Run Migrations & Seed Data
```bash
php artisan migrate
php artisan db:seed
```

### 5. Create Admin User
```bash
php artisan make:filament-user
```

### 6. Start Development Server
```bash
php artisan serve
```

Visit `http://localhost:8000/admin` to access the admin panel.

## 📊 Dashboard Features

### **Stock Overview Widget**
- Total medicines count
- Current inventory levels
- Low stock alerts
- Expiring items monitoring
- Daily sales tracking

### **Key Metrics**
- 📈 Real-time inventory status
- ⚠️ Low stock notifications
- ⏰ Expiry date alerts
- 💰 Sales performance

## 🗂️ Database Schema

### Core Tables
- `categories` - Medicine categories
- `medicines` - Medicine catalog
- `suppliers` - Supplier information
- `customers` - Patient records
- `inventories` - Stock management
- `stock_movements` - Inventory tracking
- `prescriptions` - Prescription management
- `prescription_items` - Prescription details
- `sales` - Sales transactions
- `sale_items` - Sale line items

## 🎨 Admin Interface

Built with Filament 4.0, featuring:
- **Modern UI/UX** with Tailwind CSS
- **Responsive Design** for all devices
- **Role-based Access Control**
- **Advanced Data Tables** with filtering and search
- **Rich Form Components**
- **Real-time Notifications**

## 🔧 Development

### Running Tests
```bash
php artisan test
```

### Code Style
```bash
./vendor/bin/pint
```

### Asset Compilation
```bash
npm run dev
# or for production
npm run build
```

## 📖 Usage Guide

### Adding New Medicine
1. Navigate to **Medicines** → **Create**
2. Fill in medicine details (name, category, dosage, etc.)
3. Set minimum stock level for alerts
4. Mark if prescription is required

### Managing Inventory
1. Go to **Inventory** → **Create**
2. Select medicine and supplier
3. Enter batch details and quantities
4. Set cost and selling prices

### Processing Sales
1. Access **Sales** → **Create**
2. Add customer (optional) and prescription (if applicable)
3. Select medicines and quantities
4. Choose payment method and complete sale

## 🔒 Security Features

- User authentication and authorization
- Role-based access control
- Audit logging for critical operations
- Data validation and sanitization

## 🌐 Localization

Currently supports:
- English (default)
- Indonesian locale formatting

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📞 Support

For support and questions:
- Create an issue on GitHub
- Contact: support@medify.com

---

**Built with ❤️ for Indonesian pharmacies**
