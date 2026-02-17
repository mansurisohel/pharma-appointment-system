<?php
// config.php - Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'dental_care');

function getDBConnection()
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die('<div style="padding:20px;background:#fee2e2;color:#991b1b;font-family:sans-serif;border-radius:8px;margin:20px;">
            <strong>Database Connection Failed:</strong> ' . htmlspecialchars($conn->connect_error) . '
            <br><small>Please ensure XAMPP MySQL is running and the database <em>dental_care</em> exists.</small>
        </div>');
    }
    $conn->set_charset('utf8mb4');
    return $conn;
}

// Site-wide constants
define('SITE_NAME', 'Dental Care');
define('SITE_PHONE', '+1 (555) 123-4567');
define('SITE_EMAIL', 'info@dentalcare.com');
define('SITE_ADDRESS', '123 Health Avenue, Medical District, NY 10001');
define('BASE_URL', 'http://localhost/dental_care/');
