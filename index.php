<?php
require_once 'config.php';
$page_title = 'Home';
include 'includes/header.php';

// Fetch doctors for preview
$conn = getDBConnection();
$result = $conn->query("SELECT id, name, specialization, photo, experience FROM doctors LIMIT 4");
$doctors = $result->fetch_all(MYSQLI_ASSOC);
$conn->close();
?>

<!-- HERO -->
<section class="hero">
    <div class="hero-pattern"></div>
    <div class="hero-container">
        <div class="hero-content" data-animate>
            <div class="hero-badge">
                <i class="fas fa-award"></i>
                Trusted by 10,000+ Patients
            </div>
            <h1 class="hero-title">
                Your Smile Deserves<br>
                <span>Expert Care</span>
            </h1>
            <p class="hero-subtitle">
                At Dental Care, we combine advanced technology with compassionate expertise to deliver exceptional dental treatment. Healthy smiles. Lasting confidence.
            </p>
            <div class="hero-actions">
                <a href="appointment.php" class="btn btn-primary">
                    <i class="fas fa-calendar-check"></i> Book Appointment
                </a>
                <a href="services.php" class="btn btn-outline">
                    <i class="fas fa-list-ul"></i> Our Services
                </a>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">15+</div>
                    <div class="stat-label">Years of Excellence</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">12k+</div>
                    <div class="stat-label">Happy Patients</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">4.9★</div>
                    <div class="stat-label">Patient Rating</div>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="hero-img-wrap">
                <div class="hero-img-placeholder">
                    <i class="fas fa-tooth"></i>
                    <p>Dental Care Clinic</p>
                </div>
            </div>
            <div class="hero-card">
                <div class="hero-card-icon"><i class="fas fa-shield-halved"></i></div>
                <div class="hero-card-text">
                    <strong>100% Safe &amp; Sterile</strong>
                    <span>ISO certified procedures</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- INTRO STRIP -->
<section style="background:var(--teal); padding: 28px 0;">
    <div class="container">
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px,1fr)); gap:8px; text-align:center;">
            <?php
            $strips = [
                ['fas fa-syringe', 'Pain-Free Treatment'],
                ['fas fa-microscope', 'Advanced Technology'],
                ['fas fa-user-doctor', 'Expert Specialists'],
                ['fas fa-clock', 'Flexible Timings'],
                ['fas fa-shield-heart', 'Safe &amp; Hygienic'],
            ];
            foreach ($strips as $s): ?>
                <div style="display:flex;align-items:center;justify-content:center;gap:10px;color:rgba(255,255,255,0.9);font-size:0.9rem;font-weight:600;padding:8px 16px;">
                    <i class="<?= $s[0] ?>" style="color:rgba(255,255,255,0.7);font-size:1rem;"></i>
                    <?= $s[1] ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SERVICES -->
<section class="section section-alt">
    <div class="container">
        <div class="section-center">
            <span class="section-label">What We Offer</span>
            <h2 class="section-title">Comprehensive Dental Services</h2>
            <p class="section-subtitle">From routine check-ups to complex procedures, we provide all the dental care you need under one roof.</p>
        </div>
        <div class="services-grid">
            <?php
            $services = [
                ['fas fa-tooth',         'General Dentistry',    'Regular exams, cleanings, and preventive care to keep your teeth and gums healthy throughout your lifetime.'],
                ['fas fa-star',          'Teeth Whitening',      'Professional whitening treatments that safely remove stains and discolouration for a brilliantly bright smile.'],
                ['fas fa-syringe',       'Root Canal Treatment', 'Gentle endodontic therapy to save infected teeth, eliminate pain and restore full function effectively.'],
                ['fas fa-screwdriver',   'Dental Implants',      'State-of-the-art titanium implants that replace missing teeth with a natural look, feel, and lasting durability.'],
                ['fas fa-arrows-h',      'Orthodontics',         'Modern braces and clear aligner systems to straighten teeth and correct bite issues at any age.'],
                ['fas fa-magic-wand-sparkles', 'Cosmetic Dentistry', 'Veneers, bonding, and smile makeovers tailored to give you the confident, beautiful smile you deserve.'],
            ];
            foreach ($services as $svc): ?>
                <div class="service-card">
                    <div class="service-icon"><i class="<?= $svc[0] ?>"></i></div>
                    <h3><?= $svc[1] ?></h3>
                    <p><?= $svc[2] ?></p>
                    <a href="services.php" class="service-link">
                        Learn more <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- WHY CHOOSE US -->
<section class="section section-dark">
    <div class="container">
        <div class="section-center">
            <span class="section-label">Why Dental Care</span>
            <h2 class="section-title">The Standard of Dental Excellence</h2>
            <p class="section-subtitle" style="color:rgba(255,255,255,0.6); margin-left:auto; margin-right:auto;">We go beyond dentistry — we build lasting relationships founded on trust, transparency, and exceptional outcomes.</p>
        </div>
        <div class="features-grid">
            <?php
            $features = [
                ['fas fa-user-doctor',       'Expert Specialists',   'Board-certified dentists with decades of combined experience across all dental specialties.'],
                ['fas fa-microscope',        'Modern Technology',    'Digital X-rays, 3D imaging, laser dentistry and CAD/CAM same-day restorations.'],
                ['fas fa-hand-holding-heart','Patient-First Care',   'Every treatment plan is personalised. We listen, explain, and never rush your decisions.'],
                ['fas fa-shield-virus',      'Sterilisation Safety', 'Hospital-grade sterilisation protocols and single-use instruments for your complete protection.'],
                ['fas fa-comments-dollar',   'Transparent Pricing',  'No hidden costs. We provide clear quotes and offer flexible payment options for all patients.'],
                ['fas fa-clock',             'Convenient Hours',     'Early morning, evening, and Saturday appointments available to fit your busy schedule.'],
            ];
            foreach ($features as $i => $f): ?>
                <div class="feature-item">
                    <div class="feature-icon"><i class="<?= $f[0] ?>"></i></div>
                    <h4><?= $f[1] ?></h4>
                    <p><?= $f[2] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- DOCTORS PREVIEW -->
<?php if (!empty($doctors)): ?>
<section class="section">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:16px; margin-bottom:48px;">
            <div>
                <span class="section-label">Meet the Team</span>
                <h2 class="section-title" style="margin-bottom:0">Our Expert Dentists</h2>
            </div>
            <a href="doctors.php" class="btn btn-teal-outline">
                View All Doctors <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="doctors-grid">
            <?php foreach ($doctors as $doc): ?>
                <a href="doctor-detail.php?id=<?= $doc['id'] ?>" class="doctor-card">
                    <div class="doctor-card-img">
                        <?php if (!empty($doc['photo']) && file_exists('images/' . $doc['photo'])): ?>
                            <img src="images/<?= htmlspecialchars($doc['photo']) ?>" alt="<?= htmlspecialchars($doc['name']) ?>">
                        <?php else: ?>
                            <i class="fas fa-user-doctor"></i>
                        <?php endif; ?>
                    </div>
                    <div class="doctor-card-body">
                        <h3><?= htmlspecialchars($doc['name']) ?></h3>
                        <div class="doctor-spec"><?= htmlspecialchars($doc['specialization']) ?></div>
                    </div>
                    <div class="doctor-card-footer">
                        <span><i class="fas fa-briefcase"></i> <?= $doc['experience'] ?> Years Exp.</span>
                        <span style="color:var(--teal); font-weight:600; font-size:0.83rem;">View Profile →</span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA BANNER -->
<section class="cta-banner">
    <div class="container">
        <h2>Ready to Transform Your Smile?</h2>
        <p>Schedule your consultation today and take the first step towards exceptional dental health.</p>
        <div class="cta-actions">
            <a href="appointment.php" class="btn btn-outline">
                <i class="fas fa-calendar-check"></i> Book Appointment
            </a>
            <a href="tel:<?= SITE_PHONE ?>" class="btn" style="background:white; color:var(--teal); font-weight:700;">
                <i class="fas fa-phone-alt"></i> Call Now
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
