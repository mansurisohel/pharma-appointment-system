<?php
require_once 'config.php';
$page_title = 'Our Services';
include 'includes/header.php';
?>

<!-- PAGE HEADER -->
<div class="page-header">
    <div class="container page-header-inner">
        <div class="breadcrumb">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <span>Services</span>
        </div>
        <h1>Our Dental Services</h1>
        <p>Comprehensive care covering every aspect of your oral health — from prevention to advanced cosmetic and restorative treatments.</p>
    </div>
</div>

<!-- SERVICES OVERVIEW -->
<section class="section">
    <div class="container">
        <div class="section-center">
            <span class="section-label">What We Provide</span>
            <h2 class="section-title">Complete Dental Care Under One Roof</h2>
            <p class="section-subtitle">We offer the full spectrum of dental services using the latest technology, delivered by specialist practitioners who genuinely care.</p>
        </div>

        <?php
        $services = [
            [
                'icon'    => 'fas fa-tooth',
                'title'   => 'General Dentistry',
                'tagline' => 'The Foundation of a Healthy Smile',
                'desc'    => 'Our general dentistry services provide the essential building blocks for lifelong oral health. Regular examinations allow us to detect issues early, when treatment is simplest and most effective. We offer professional cleans, fluoride treatments, fissure sealants, fillings in tooth-coloured composite or traditional amalgam, and customised oral hygiene education to keep your teeth and gums in peak condition.',
                'items'   => ['Comprehensive Oral Examinations', 'Professional Teeth Cleaning (Scale & Polish)', 'Composite & Amalgam Fillings', 'Tooth Extractions', 'Fluoride Treatments', 'Fissure Sealants', 'Gum Disease (Periodontal) Treatment', 'Custom Mouthguards & Night Guards'],
                'colour'  => 'var(--teal)',
            ],
            [
                'icon'    => 'fas fa-star',
                'title'   => 'Teeth Whitening',
                'tagline' => 'A Brighter Smile in as Little as One Hour',
                'desc'    => 'Professional teeth whitening is one of the quickest and most affordable ways to enhance your smile. We offer both in-clinic power whitening (Zoom! and Enlighten systems) and custom take-home whitening trays, each carefully monitored to achieve natural-looking, long-lasting brightness without sensitivity.',
                'items'   => ['In-Chair Power Whitening (60-90 mins)', 'Custom Take-Home Whitening Kits', 'Enlighten Deep Bleaching System', 'Post-Whitening Maintenance Plans', 'Sensitivity Management Protocol'],
                'colour'  => 'var(--gold)',
            ],
            [
                'icon'    => 'fas fa-syringe',
                'title'   => 'Root Canal Treatment',
                'tagline' => 'Save Your Tooth. Eliminate the Pain.',
                'desc'    => 'Root canal therapy has an undeserved reputation for being painful — in reality, our endodontic specialists use advanced techniques and effective anaesthesia to make the procedure no more uncomfortable than a routine filling. We use rotary instrumentation and digital apex locators to precisely clean and seal the root canal system, protecting your tooth for years to come.',
                'items'   => ['Single & Multi-Canal Endodontics', 'Re-treatment of Failed Root Canals', 'Endodontic Surgery (Apicoectomy)', 'Digital Apex Location', 'Thermoplastic Root Canal Obturation', 'Post-Treatment Restoration (Crowns)'],
                'colour'  => '#e74c3c',
            ],
            [
                'icon'    => 'fas fa-screwdriver',
                'title'   => 'Dental Implants',
                'tagline' => 'Permanent. Natural-Looking. Life-Changing.',
                'desc'    => 'Dental implants are the gold standard solution for replacing missing teeth. A titanium post is surgically placed in the jawbone, where it fuses to become a permanent anchor for a crown, bridge, or denture. With proper care, implants can last a lifetime and are indistinguishable from natural teeth in both appearance and function.',
                'items'   => ['Single Tooth Implants', 'Implant-Supported Bridges', 'All-on-4 & All-on-6 Full-Arch Solutions', 'Bone Grafting & Sinus Lifts', 'Implant-Retained Dentures', '3D CT Scan & Digital Treatment Planning'],
                'colour'  => '#3498db',
            ],
            [
                'icon'    => 'fas fa-arrows-h',
                'title'   => 'Orthodontics',
                'tagline' => 'Straighter Teeth. Better Bite. Greater Confidence.',
                'desc'    => 'Our orthodontic team provides comprehensive treatment for children, teenagers, and adults. Whether you prefer traditional metal braces, discreet ceramic braces, or virtually invisible clear aligners such as Invisalign, we tailor every treatment plan to achieve optimal alignment efficiently and comfortably.',
                'items'   => ['Traditional Metal Braces', 'Ceramic (Tooth-Coloured) Braces', 'Invisalign Clear Aligners', 'Lingual (Behind-the-Teeth) Braces', 'Retainers & Post-Treatment Maintenance', 'Early Interceptive Orthodontics (Children)'],
                'colour'  => '#9b59b6',
            ],
            [
                'icon'    => 'fas fa-magic-wand-sparkles',
                'title'   => 'Cosmetic Dentistry',
                'tagline' => 'Artistry Meets Clinical Precision',
                'desc'    => 'Our cosmetic dentistry services are designed to enhance the appearance of your smile while maintaining its health and function. Using premium materials and artisanal technique, our cosmetic specialists create results that are not only beautiful but uniquely natural — reflecting your personality and desired aesthetic.',
                'items'   => ['Porcelain & Composite Veneers', 'Smile Makeover Planning (Digital Smile Design)', 'Dental Bonding & Contouring', 'Gum Contouring (Gummy Smile Correction)', 'CEREC Same-Day Ceramic Crowns', 'Full Smile Reconstruction'],
                'colour'  => '#e67e22',
            ],
        ];
        foreach ($services as $i => $svc):
            $flip = $i % 2 === 1;
        ?>
            <div style="display:grid; grid-template-columns:<?= $flip ? '1fr 1fr' : '1fr 1fr' ?>; gap:64px; align-items:center; margin-bottom:80px; <?= $flip ? 'direction:rtl' : '' ?>">
                <div style="<?= $flip ? 'direction:ltr' : '' ?>">
                    <div style="width:80px; height:80px; background:<?= $svc['colour'] ?>1a; border-radius:20px; display:flex; align-items:center; justify-content:center; margin-bottom:24px;">
                        <i class="<?= $svc['icon'] ?>" style="font-size:2rem; color:<?= $svc['colour'] ?>;"></i>
                    </div>
                    <p style="font-size:0.78rem; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:<?= $svc['colour'] ?>; margin-bottom:8px;"><?= $svc['tagline'] ?></p>
                    <h2 style="font-size:clamp(1.6rem,2.5vw,2.2rem); margin-bottom:16px;"><?= $svc['title'] ?></h2>
                    <p style="line-height:1.8; margin-bottom:24px;"><?= $svc['desc'] ?></p>
                    <a href="appointment.php" class="btn btn-primary" style="background:<?= $svc['colour'] ?>; box-shadow: 0 6px 20px <?= $svc['colour'] ?>44;">
                        <i class="fas fa-calendar-check"></i> Book This Service
                    </a>
                </div>
                <div style="<?= $flip ? 'direction:ltr' : '' ?>; background:var(--off-white); border-radius:var(--radius-lg); padding:32px;">
                    <h4 style="margin-bottom:20px; font-size:1rem; color:var(--navy);">
                        <i class="fas fa-list-check" style="color:<?= $svc['colour'] ?>; margin-right:8px;"></i>
                        Treatments Included
                    </h4>
                    <ul style="display:flex; flex-direction:column; gap:12px;">
                        <?php foreach ($svc['items'] as $item): ?>
                            <li style="display:flex; align-items:center; gap:12px; font-size:0.92rem; color:var(--text-body);">
                                <i class="fas fa-check-circle" style="color:<?= $svc['colour'] ?>; font-size:1rem; flex-shrink:0;"></i>
                                <?= $item ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php if ($i < count($services) - 1): ?>
                <hr style="border:none; border-top:1px solid var(--gray-100); margin-bottom:80px;">
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>

<!-- CTA -->
<section class="cta-banner">
    <div class="container">
        <h2>Not Sure Which Treatment You Need?</h2>
        <p>Book a consultation and our specialists will assess your needs and create a personalised treatment plan.</p>
        <div class="cta-actions">
            <a href="appointment.php" class="btn btn-outline">
                <i class="fas fa-calendar-check"></i> Book Consultation
            </a>
            <a href="tel:<?= SITE_PHONE ?>" class="btn" style="background:white;color:var(--teal);font-weight:700;">
                <i class="fas fa-phone-alt"></i> Call Us
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
