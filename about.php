<?php
require_once 'config.php';
$page_title = 'About Us';
include 'includes/header.php';
?>

<!-- PAGE HEADER -->
<div class="page-header">
    <div class="container page-header-inner">
        <div class="breadcrumb">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <span>About Us</span>
        </div>
        <h1>About Dental Care</h1>
        <p>Delivering exceptional dental experiences with compassion, innovation, and a commitment to your long-term oral health.</p>
    </div>
</div>

<!-- ABOUT INTRO -->
<section class="section">
    <div class="container">
        <div class="about-grid">
            <div class="about-img-wrap">
                <i class="fas fa-hospital"></i>
            </div>
            <div class="about-text">
                <span class="section-label">Our Story</span>
                <h2 class="section-title">Caring for Smiles Since 2009</h2>
                <p style="margin-bottom:16px; line-height:1.8;">
                    Dental Care was founded in 2009 with a simple but powerful vision: to create a dental practice that patients actually look forward to visiting. Starting as a small two-chair clinic in the heart of the Medical District, we quickly grew a reputation for combining clinical excellence with genuine warmth and patient comfort.
                </p>
                <p style="margin-bottom:16px; line-height:1.8;">
                    Over the past fifteen years, we have expanded into a full-service, multi-specialist dental centre equipped with the very latest diagnostic and treatment technology. Today, our team of eight board-certified specialists serves over 12,000 patients annually, from routine cleaning appointments to full-mouth reconstructions.
                </p>
                <p style="margin-bottom:32px; line-height:1.8;">
                    We believe that oral health is deeply connected to overall well-being, and every decision we make — from the materials we use to the way we greet you at reception — reflects our unwavering commitment to your health, comfort, and confidence.
                </p>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                    <div style="display:flex; align-items:center; gap:12px; padding:16px; background:var(--teal-pale); border-radius:var(--radius);">
                        <i class="fas fa-certificate" style="color:var(--teal); font-size:1.5rem; flex-shrink:0;"></i>
                        <div>
                            <strong style="color:var(--navy); display:block; font-size:0.9rem;">ADA Accredited</strong>
                            <span style="font-size:0.8rem; color:var(--text-body);">Fully certified clinic</span>
                        </div>
                    </div>
                    <div style="display:flex; align-items:center; gap:12px; padding:16px; background:var(--teal-pale); border-radius:var(--radius);">
                        <i class="fas fa-award" style="color:var(--teal); font-size:1.5rem; flex-shrink:0;"></i>
                        <div>
                            <strong style="color:var(--navy); display:block; font-size:0.9rem;">Award Winning</strong>
                            <span style="font-size:0.8rem; color:var(--text-body);">Best Clinic 2022 &amp; 2023</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MISSION & VISION -->
<section class="section section-alt">
    <div class="container">
        <div class="section-center">
            <span class="section-label">Our Direction</span>
            <h2 class="section-title">Mission &amp; Vision</h2>
            <p class="section-subtitle">Guided by purpose, driven by passion — our mission and vision shape every aspect of the care we provide.</p>
        </div>
        <div class="mission-vision-grid">
            <div class="mv-card mission">
                <i class="fas fa-bullseye mv-icon"></i>
                <h3><i class="fas fa-bullseye"></i> Our Mission</h3>
                <p>To provide every patient with personalised, evidence-based dental care delivered in a safe, welcoming, and anxiety-free environment. We are committed to improving oral health outcomes in our community through education, innovation, and compassionate service that treats every individual with dignity and respect.</p>
            </div>
            <div class="mv-card vision">
                <i class="fas fa-eye mv-icon"></i>
                <h3><i class="fas fa-eye"></i> Our Vision</h3>
                <p>To be the most trusted dental care provider in the region, recognised for clinical excellence, patient-centred values, and our transformative impact on the health and confidence of the communities we serve. We envision a future where quality dental care is accessible to all, free from fear, and built on lasting relationships.</p>
            </div>
        </div>
    </div>
</section>

<!-- CLINIC HISTORY TIMELINE -->
<section class="section">
    <div class="container">
        <div class="section-center">
            <span class="section-label">Our Journey</span>
            <h2 class="section-title">Milestones &amp; Growth</h2>
            <p class="section-subtitle">From humble beginnings to a leading multi-specialist centre — here is how we grew.</p>
        </div>
        <div style="max-width:700px; margin:0 auto; position:relative; padding-left:40px;">
            <div style="position:absolute; left:20px; top:0; bottom:0; width:2px; background:var(--gray-200);"></div>
            <?php
            $milestones = [
                ['2009', 'Foundation', 'Dental Care opens with 2 dental chairs and a team of 3, focusing on general dentistry in Medical District.'],
                ['2012', 'Expansion', 'Expanded to 8 chairs. Added orthodontic and cosmetic dentistry services. Welcomed Dr. James Harrison to the team.'],
                ['2015', 'Technology Upgrade', 'Invested in digital 3D X-ray systems, intraoral cameras, and CAD/CAM same-day crown technology.'],
                ['2018', 'Specialist Centre', 'Achieved multi-specialist clinic status. Opened dedicated oral surgery and implantology suite.'],
                ['2022', 'Award Recognition', 'Named "Best Dental Practice" by the Regional Health Excellence Awards for two consecutive years.'],
                ['2024', 'Present Day', 'Proudly serving 12,000+ patients annually with a team of 8 specialists, 15 support staff, and a modern 18-chair facility.'],
            ];
            foreach ($milestones as $m): ?>
                <div style="position:relative; margin-bottom:40px; padding-left:24px;">
                    <div style="position:absolute; left:-29px; top:4px; width:18px; height:18px; background:var(--teal); border-radius:50%; border:3px solid white; box-shadow:0 0 0 2px var(--teal);"></div>
                    <div style="background:var(--off-white); border-radius:var(--radius); padding:20px 24px; border-left:3px solid var(--teal);">
                        <div style="font-size:0.78rem; font-weight:700; color:var(--teal); text-transform:uppercase; letter-spacing:0.1em; margin-bottom:6px;"><?= $m[0] ?></div>
                        <h4 style="color:var(--navy); margin-bottom:8px;"><?= $m[1] ?></h4>
                        <p style="font-size:0.9rem; line-height:1.65;"><?= $m[2] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FACILITIES -->
<section class="section section-alt">
    <div class="container">
        <div class="section-center">
            <span class="section-label">Our Facilities</span>
            <h2 class="section-title">State-of-the-Art Environment</h2>
            <p class="section-subtitle">Every aspect of our clinic is designed with your comfort, safety, and optimal treatment outcomes in mind.</p>
        </div>
        <div class="facilities-grid">
            <?php
            $facilities = [
                ['fas fa-x-ray',             '3D Digital X-Ray'],
                ['fas fa-chair',             '18 Treatment Chairs'],
                ['fas fa-flask',             'On-Site Laboratory'],
                ['fas fa-microscope',        'Laser Dentistry Suite'],
                ['fas fa-shield-virus',      'Sterilisation Unit'],
                ['fas fa-wifi',             'Free Patient Wi-Fi'],
                ['fas fa-parking',           'Free Parking'],
                ['fas fa-universal-access',  'Disability Access'],
                ['fas fa-baby',              'Children\'s Play Area'],
                ['fas fa-tv',               'Ceiling-Mount Screens'],
            ];
            foreach ($facilities as $f): ?>
                <div class="facility-item">
                    <i class="<?= $f[0] ?>"></i>
                    <h5><?= $f[1] ?></h5>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-banner">
    <div class="container">
        <h2>Experience Excellence in Dental Care</h2>
        <p>Join thousands of satisfied patients and take the first step toward your healthiest smile.</p>
        <div class="cta-actions">
            <a href="appointment.php" class="btn btn-outline">
                <i class="fas fa-calendar-check"></i> Book Appointment
            </a>
            <a href="doctors.php" class="btn" style="background:white;color:var(--teal);font-weight:700;">
                <i class="fas fa-user-doctor"></i> Meet Our Team
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
