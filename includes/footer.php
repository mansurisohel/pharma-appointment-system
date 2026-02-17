<?php // includes/footer.php ?>

<footer class="footer">
    <div class="footer-top">
        <div class="container footer-grid">
            <!-- Brand -->
            <div class="footer-col footer-brand">
                <div class="footer-logo">
                    <i class="fas fa-tooth"></i>
                    <span>Dental Care</span>
                </div>
                <p>Providing exceptional dental care with compassion, precision, and the latest technology. Your healthy smile is our greatest achievement.</p>
                <div class="footer-social">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php"><i class="fas fa-chevron-right"></i> Home</a></li>
                    <li><a href="about.php"><i class="fas fa-chevron-right"></i> About Us</a></li>
                    <li><a href="doctors.php"><i class="fas fa-chevron-right"></i> Our Doctors</a></li>
                    <li><a href="services.php"><i class="fas fa-chevron-right"></i> Services</a></li>
                    <li><a href="appointment.php"><i class="fas fa-chevron-right"></i> Book Appointment</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div class="footer-col">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="services.php"><i class="fas fa-chevron-right"></i> General Dentistry</a></li>
                    <li><a href="services.php"><i class="fas fa-chevron-right"></i> Teeth Whitening</a></li>
                    <li><a href="services.php"><i class="fas fa-chevron-right"></i> Root Canal Treatment</a></li>
                    <li><a href="services.php"><i class="fas fa-chevron-right"></i> Dental Implants</a></li>
                    <li><a href="services.php"><i class="fas fa-chevron-right"></i> Orthodontics</a></li>
                    <li><a href="services.php"><i class="fas fa-chevron-right"></i> Cosmetic Dentistry</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="footer-col">
                <h4>Contact Us</h4>
                <ul class="contact-list">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?= SITE_ADDRESS ?></span>
                    </li>
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <a href="tel:<?= SITE_PHONE ?>"><?= SITE_PHONE ?></a>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a>
                    </li>
                    <li>
                        <i class="fas fa-clock"></i>
                        <span>Mon – Sat: 8:00 AM – 7:00 PM</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container footer-bottom-inner">
            <p>&copy; <?= date('Y') ?> <?= SITE_NAME ?>. All Rights Reserved. Designed with <i class="fas fa-heart" style="color:#e74c3c"></i> for better smiles.</p>
            <p><a href="#">Privacy Policy</a> &nbsp;|&nbsp; <a href="#">Terms of Service</a></p>
        </div>
    </div>
</footer>

<script src="js/main.js"></script>
</body>
</html>
