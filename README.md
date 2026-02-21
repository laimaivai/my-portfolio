# Laima's Portfolio Website

A personal portfolio website showcasing my web development projects and skills.

## 🚀 Features

- Responsive design for all devices
- Project showcases with detailed case studies
- Contact form with database integration
- Smooth animations and modern UI
- Downloadable CV

## 🛠️ Technologies Used

- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Server:** Apache (XAMPP)

## 📋 Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/portfolio.git
   ```

2. **Configure Database**
   - Copy `config/database.php.example` to `config/database.php`
   - Update with your database credentials
   ```bash
   cp config/database.php.example config/database.php
   ```

3. **Import Database**
   - Import `contact_messages.sql` into your MySQL database

4. **Update CV**
   - Place your CV file in the `storage/` folder
   - Update the filename in `includes/header.php` if needed

5. **Run the project**
   - Place files in your web server root (e.g., `htdocs/`)
   - Access via `http://localhost/Portfolio/`

## 📂 Project Structure

```
Portfolio/
├── config/          # Configuration files
├── css/            # Stylesheets
├── Images/         # Images and favicon
├── includes/       # Reusable PHP components (header, footer, forms)
├── js/             # JavaScript files
├── src/            # Source files (CSRF, database helpers)
├── storage/        # CV and other files
├── index.php       # Homepage
├── about.php       # About page
├── project1.php    # Project showcase 1
└── project2.php    # Project showcase 2
```

## 🔒 Security Note

- Never commit `config/database.php` with real credentials
- The `.gitignore` file is configured to exclude sensitive files

## 📧 Contact

Feel free to reach out through the contact form on the website!

---

© 2026 Laima Vainina
