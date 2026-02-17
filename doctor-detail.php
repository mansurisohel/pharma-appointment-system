<?php
require_once 'config.php';

// Validate & sanitise ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    header('Location: ' . BASE_URL . 'doctors.php');
    exit;
}

$conn = getDBConnection();
$stmt = $conn->prepare("SELECT * FROM doctors WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$doctor = $result->fetch_assoc();
$stmt->close();
$conn->close();

if (!$doctor) {
    header('Location: ' . BASE_URL . 'doctors.php');
    exit;
}

$page_title = 'Dr. ' . $doctor['name'];
include 'includes/header.php';
?>

<!-- PAGE HEADER -->
<div class="page-header">
    <div class="container page-header-inner">
        <div class="breadcrumb">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="doctors.php">Doctors</a>
            <i class="fas fa-chevron-right"></i>
            <span><?= htmlspecialchars($doctor['name']) ?></span>
        </div>
        <h1>Doctor Profile</h1>
        <p>Full details, qualifications, and contact information for your chosen specialist.</p>
    </div>
</div>

<!-- DOCTOR DETAIL -->
<section class="section">
    <div class="container">
        <div class="doctor-detail-grid">
            <!-- Photo -->
            <div>
                <div class="doctor-detail-photo">
                    <?php if (!empty($doctor['photo']) && file_exists('images/' . $doctor['photo'])): ?>
                        <img src="images/<?= htmlspecialchars($doctor['photo']) ?>" alt="<?= htmlspecialchars($doctor['name']) ?>">
                    <?php else: ?>
                        <i class="fas fa-user-doctor"></i>
                    <?php endif; ?>
                </div>
                <div style="margin-top:24px; background:var(--off-white); border-radius:var(--radius); padding:24px;">
                    <h4 style="margin-bottom:16px; font-size:1rem; color:var(--navy);">Book with <?= htmlspecialchars(explode(' ', $doctor['name'])[1] ?? $doctor['name']) ?></h4>
                    <a href="appointment.php?doctor=<?= $doctor['id'] ?>" class="btn btn-primary" style="width:100%; justify-content:center;">
                        <i class="fas fa-calendar-check"></i> Book Appointment
                    </a>
                    <a href="doctors.php" class="btn btn-teal-outline" style="width:100%; justify-content:center; margin-top:12px;">
                        <i class="fas fa-arrow-left"></i> All Doctors
                    </a>
                </div>
            </div>

            <!-- Info -->
            <div class="doctor-detail-info">
                <div class="detail-badge"><?= htmlspecialchars($doctor['specialization']) ?></div>
                <h2 class="detail-name"><?= htmlspecialchars($doctor['name']) ?></h2>
                <p class="detail-qual"><?= htmlspecialchars($doctor['qualification']) ?></p>

                <div class="detail-stats">
                    <div class="detail-stat">
                        <div class="num"><?= intval($doctor['experience']) ?>+</div>
                        <div class="lbl">Years Experience</div>
                    </div>
                    <div class="detail-stat">
                        <div class="num">5k+</div>
                        <div class="lbl">Patients Treated</div>
                    </div>
                    <div class="detail-stat">
                        <div class="num">4.9</div>
                        <div class="lbl">Patient Rating</div>
                    </div>
                </div>

                <p class="detail-bio"><?= nl2br(htmlspecialchars($doctor['bio'] ?? 'Experienced dental professional dedicated to providing exceptional patient care with the latest techniques and a compassionate approach.')) ?></p>

                <div class="detail-meta-grid">
                    <div class="detail-meta-item">
                        <i class="fas fa-stethoscope"></i>
                        <div>
                            <strong style="display:block; color:var(--navy); font-size:0.85rem; margin-bottom:2px;">Specialization</strong>
                            <span><?= htmlspecialchars($doctor['specialization']) ?></span>
                        </div>
                    </div>
                    <div class="detail-meta-item">
                        <i class="fas fa-graduation-cap"></i>
                        <div>
                            <strong style="display:block; color:var(--navy); font-size:0.85rem; margin-bottom:2px;">Qualification</strong>
                            <span><?= htmlspecialchars($doctor['qualification']) ?></span>
                        </div>
                    </div>
                    <div class="detail-meta-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <strong style="display:block; color:var(--navy); font-size:0.85rem; margin-bottom:2px;">Working Hours</strong>
                            <span><?= htmlspecialchars($doctor['timings'] ?? 'Mon – Fri: 9:00 AM – 5:00 PM') ?></span>
                        </div>
                    </div>
                    <div class="detail-meta-item">
                        <i class="fas fa-phone-alt"></i>
                        <div>
                            <strong style="display:block; color:var(--navy); font-size:0.85rem; margin-bottom:2px;">Contact</strong>
                            <span><?= htmlspecialchars($doctor['contact'] ?? SITE_PHONE) ?></span>
                        </div>
                    </div>
                </div>

                <!-- Services offered -->
                <div style="margin-top:8px;">
                    <h4 style="margin-bottom:16px; font-size:1rem; color:var(--navy);">Areas of Expertise</h4>
                    <div style="display:flex; flex-wrap:wrap; gap:10px;">
                        <?php
                        $expertise_map = [
                            'General Dentist'   => ['Cleanings', 'Fillings', 'Crowns', 'Extractions', 'Preventive Care'],
                            'Orthodontist'      => ['Metal Braces', 'Clear Aligners', 'Retainers', 'Bite Correction'],
                            'Cosmetic Dentist'  => ['Veneers', 'Whitening', 'Bonding', 'Smile Makeover'],
                            'Endodontist'       => ['Root Canal', 'Pulp Therapy', 'Endodontic Surgery', 'Re-treatment'],
                        ];
                        $tags = $expertise_map[$doctor['specialization']] ?? ['Dental Consultation', 'Treatment Planning', 'Patient Care'];
                        foreach ($tags as $tag): ?>
                            <span style="background:var(--teal-pale); color:var(--teal); padding:6px 16px; border-radius:50px; font-size:0.83rem; font-weight:600;">
                                <?= $tag ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
