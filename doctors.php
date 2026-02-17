<?php
require_once 'config.php';
$page_title = 'Our Doctors';
include 'includes/header.php';

$conn = getDBConnection();
$result = $conn->query("SELECT * FROM doctors ORDER BY id ASC");
$doctors = $result->fetch_all(MYSQLI_ASSOC);
$conn->close();
?>

<!-- PAGE HEADER -->
<div class="page-header">
    <div class="container page-header-inner">
        <div class="breadcrumb">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <span>Our Doctors</span>
        </div>
        <h1>Meet Our Specialists</h1>
        <p>Our team of highly qualified, experienced dental professionals is dedicated to your oral health and well-being.</p>
    </div>
</div>

<!-- DOCTORS GRID -->
<section class="section">
    <div class="container">
        <?php if (empty($doctors)): ?>
            <div style="text-align:center; padding:80px 0; color:var(--gray-400);">
                <i class="fas fa-user-doctor" style="font-size:4rem; margin-bottom:20px; display:block; opacity:0.3;"></i>
                <h3 style="font-family:'DM Sans',sans-serif; color:var(--gray-400);">No doctors found</h3>
                <p style="margin-top:8px;">Please ensure the database is set up correctly and sample data is inserted.</p>
            </div>
        <?php else: ?>
            <div style="text-align:center; margin-bottom:56px;">
                <span class="section-label">Expert Team</span>
                <h2 class="section-title">Qualified &amp; Experienced Dentists</h2>
                <p class="section-subtitle">Each member of our team brings specialist expertise, ongoing education, and a genuine commitment to your smile.</p>
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
                            <p><?= htmlspecialchars(substr($doc['bio'] ?? 'Experienced dental professional committed to exceptional patient care.', 0, 90)) ?>...</p>
                        </div>
                        <div class="doctor-card-footer">
                            <span><i class="fas fa-briefcase"></i> <?= intval($doc['experience']) ?> Years Experience</span>
                            <span><i class="fas fa-graduation-cap"></i> <?= htmlspecialchars(explode(',', $doc['qualification'])[0]) ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- CTA -->
<section class="cta-banner">
    <div class="container">
        <h2>Book a Consultation with Our Experts</h2>
        <p>Choose your preferred specialist and schedule an appointment at a time that suits you.</p>
        <div class="cta-actions">
            <a href="appointment.php" class="btn btn-outline">
                <i class="fas fa-calendar-check"></i> Book Appointment
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
