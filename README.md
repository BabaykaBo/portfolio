# Portfolio App
Project for portfolio website.

### Dependencies:

* PHP >=7.4.0
* Yii2
* Composer 2.4.1
* MySQL 8.0 / MariaDB 15.1
* Apache2

### Installation:

1. Clone the project.

2. Install composer packages:
```commandline
composer install
```
3. Rename `.env.example` into `.env` (or make copy and rename it). Set database connection.

4. Use command for init:
```commandline
php init
```
5. Use command for making migrations:
```commandline
php yii migrate
```
6. It is Yii advanced template, so you need to set Apache (or what you prefer). Apache portfolio.conf file example:
```
<VirtualHost *:80>
     ServerAdmin admin@portfolio.test
     ServerName portfolio.test
     DocumentRoot /var/www/html/portfolio
     ErrorLog /var/log/httpd/portfolio.log
     CustomLog /var/log/httpd/portfolio-access.log combined
    
    <Directory "/var/www/html/portfolio">
        AllowOverride All
        Require all granted  
    </Directory>
  
  <FilesMatch \.(php|phar)$>
    SetHandler "proxy:unix:/var/run/php-fpm/www.sock|fcgi://localhost"
  </FilesMatch>

</VirtualHost>
```

I use Fedora, so I have set `/etc/hosts`:
```
127.0.0.1  portfolio.test
```
7. Open your project in browser with route `backend/web/`, you must see signup page.

### Features:
You have two apps at project: admin panel (backend) and site for showing your portfolio (frontend).

#### Frontend
* Watching projects and blog.

#### Backend
* Creating users with different roles (Admin and Testimonial Manager)
* Manage your projects, testimonials and blog posts.
