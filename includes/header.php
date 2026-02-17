<?php
// includes/header.php
if (!defined('SITE_NAME')) {
    require_once dirname(__DIR__) . '/config.php';
}
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dental Care - Professional Dental Clinic offering comprehensive dental services. Book your appointment today.">
    <title><?= isset($page_title) ? htmlspecialchars($page_title) . ' | ' . SITE_NAME : SITE_NAME . ' — Advanced Dental Excellence' ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Top Bar -->
<div class="topbar">
    <div class="container topbar-inner">
        <div class="topbar-left">
            <span><i class="fas fa-phone-alt"></i> <?= SITE_PHONE ?></span>
            <span><i class="fas fa-envelope"></i> <?= SITE_EMAIL ?></span>
        </div>
        <div class="topbar-right">
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</div>

<!-- Navigation -->
<nav class="navbar" id="navbar">
    <div class="container nav-inner">
        <a href="index.php" class="logo">
            <div class="logo-icon"><i class="fas fa-tooth"></i></div>
            <div class="logo-text">
                <span class="logo-name">Dental Care</span>
                <span class="logo-tagline">Advanced Dental Excellence</span>
            </div>
        </a>

        <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
            <span></span><span></span><span></span>
        </button>

        <ul class="nav-links" id="navLinks">
            <li><a href="index.php" class="<?= $current_page === 'index' ? 'active' : '' ?>">Home</a></li>
            <li><a href="about.php" class="<?= $current_page === 'about' ? 'active' : '' ?>">About</a></li>
            <li><a href="doctors.php" class="<?= $current_page === 'doctors' || $current_page === 'doctor-detail' ? 'active' : '' ?>">Doctors</a></li>
            <li><a href="services.php" class="<?= $current_page === 'services' ? 'active' : '' ?>">Services</a></li>
            <li><a href="appointment.php" class="nav-cta <?= $current_page === 'appointment' ? 'active' : '' ?>">Book Appointment</a></li>
        </ul>
    </div>
</nav>
