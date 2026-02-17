<?php
require_once 'config.php';
$page_title = 'Book Appointment';

// ── Form Processing ──────────────────────────────────────────
$success = false;
$errors  = [];
$old     = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old = $_POST;

    // Sanitise & validate
    $patient_name = trim($_POST['patient_name'] ?? '');
    $email        = trim($_POST['email'] ?? '');
    $phone        = trim($_POST['phone'] ?? '');
    $doctor_id    = intval($_POST['doctor_id'] ?? 0);
    $service      = trim($_POST['service'] ?? '');
    $date         = trim($_POST['date'] ?? '');
    $time         = trim($_POST['time'] ?? '');
    $message      = trim($_POST['message'] ?? '');

    // Validation
    if (empty($patient_name) || strlen($patient_name) < 2)
        $errors['patient_name'] = 'Please enter your full name (at least 2 characters).';

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors['email'] = 'Please enter a valid email address.';

    if (empty($phone) || !preg_match('/^\d{7,15}$/', $phone))
        $errors['phone'] = 'Please enter a valid phone number (digits only, 7–15 characters).';

    if ($doctor_id <= 0)
        $errors['doctor_id'] = 'Please select a doctor.';

    if (empty($service))
        $errors['service'] = 'Please select a service.';

    if (empty($date))
        $errors['date'] = 'Please select an appointment date.';
    elseif (strtotime($date) < strtotime('today'))
        $errors['date'] = 'Appointment date cannot be in the past.';

    if (empty($time))
        $errors['time'] = 'Please select an appointment time.';

    // Save to DB if no errors
    if (empty($errors)) {
        $conn = getDBConnection();

        // Verify doctor exists
        $chk = $conn->prepare("SELECT id FROM doctors WHERE id = ?");
        $chk->bind_param('i', $doctor_id);
        $chk->execute();
        $chk->store_result();

        if ($chk->num_rows === 0) {
            $errors['doctor_id'] = 'Selected doctor not found. Please try again.';
        } else {
            $stmt = $conn->prepare(
                "INSERT INTO appointments (patient_name, email, phone, doctor_id, service, date, time, message)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
            );
            $stmt->bind_param("sssissss", $patient_name, $email, $phone, $doctor_id, $service, $date, $time, $message
);


            // Fix: correct bind param for 8 params
            $stmt = $conn->prepare(
                "INSERT INTO appointments (patient_name, email, phone, doctor_id, service, date, time, message)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
            );
            $stmt->bind_param('ssiissss', $patient_name, $email, $phone, $doctor_id, $service, $date, $time, $message);
            
            if ($stmt->execute()) {
                $success = true;
                $old = [];
            } else {
                $errors['general'] = 'A database error occurred. Please try again or call us directly.';
            }
            $stmt->close();
        }
        $chk->close();
        $conn->close();
    }
}

// Fetch doctors for dropdown
$conn    = getDBConnection();
$doctors = $conn->query("SELECT id, name, specialization FROM doctors ORDER BY name")->fetch_all(MYSQLI_ASSOC);

// Pre-select doctor if passed via URL (from doctor detail page)
$preselect_doctor = isset($_GET['doctor']) ? intval($_GET['doctor']) : intval($old['doctor_id'] ?? 0);
$conn->close();

include 'includes/header.php';
?>

<!-- PAGE HEADER -->
<div class="page-header">
    <div class="container page-header-inner">
        <div class="breadcrumb">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <span>Book Appointment</span>
        </div>
        <h1>Book an Appointment</h1>
        <p>Complete the form below and our team will confirm your booking within 24 hours. For urgent inquiries, please call us directly.</p>
    </div>
</div>

<!-- APPOINTMENT FORM -->
<section class="appointment-section">
    <div class="container">
        <div class="appointment-grid">

            <!-- INFO SIDEBAR -->
            <div class="appt-info">
                <span class="section-label">Get in Touch</span>
                <h2>We're Here to Help</h2>
                <p>Our friendly reception team is available Monday to Saturday to assist with your appointment and answer any questions.</p>

                <div class="appt-contact-list">
                    <div class="appt-contact-item">
                        <div class="appt-contact-icon"><i class="fas fa-phone-alt"></i></div>
                        <div>
                            <strong>Call Us</strong>
                            <span><?= SITE_PHONE ?></span>
                        </div>
                    </div>
                    <div class="appt-contact-item">
                        <div class="appt-contact-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <strong>Email Us</strong>
                            <span><?= SITE_EMAIL ?></span>
                        </div>
                    </div>
                    <div class="appt-contact-item">
                        <div class="appt-contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <strong>Visit Us</strong>
                            <span><?= SITE_ADDRESS ?></span>
                        </div>
                    </div>
                    <div class="appt-contact-item">
                        <div class="appt-contact-icon"><i class="fas fa-clock"></i></div>
                        <div>
                            <strong>Opening Hours</strong>
                            <span>Mon – Sat: 8:00 AM – 7:00 PM</span>
                        </div>
                    </div>
                </div>

                <!-- Notice box -->
                <div style="margin-top:40px; background:rgba(26,140,140,0.15); border:1px solid rgba(37,181,181,0.3); border-radius:var(--radius); padding:24px;">
                    <h4 style="color:var(--teal-light); font-size:0.95rem; margin-bottom:10px; display:flex; align-items:center; gap:8px;">
                        <i class="fas fa-circle-info"></i> What to Expect
                    </h4>
                    <ul style="color:rgba(255,255,255,0.65); font-size:0.87rem; list-style:none; display:flex; flex-direction:column; gap:10px;">
                        <li style="display:flex; gap:10px; align-items:flex-start;"><i class="fas fa-check" style="color:var(--teal-light); margin-top:3px; flex-shrink:0;"></i> Confirmation call/email within 24 hours</li>
                        <li style="display:flex; gap:10px; align-items:flex-start;"><i class="fas fa-check" style="color:var(--teal-light); margin-top:3px; flex-shrink:0;"></i> Arrive 10 mins early for first appointments</li>
                        <li style="display:flex; gap:10px; align-items:flex-start;"><i class="fas fa-check" style="color:var(--teal-light); margin-top:3px; flex-shrink:0;"></i> Bring your insurance card if applicable</li>
                        <li style="display:flex; gap:10px; align-items:flex-start;"><i class="fas fa-check" style="color:var(--teal-light); margin-top:3px; flex-shrink:0;"></i> Free cancellation up to 24 hours in advance</li>
                    </ul>
                </div>
            </div>

            <!-- FORM CARD -->
            <div class="form-card">
                <h3 class="form-title"><i class="fas fa-calendar-plus" style="color:var(--teal); margin-right:10px;"></i>Appointment Request Form</h3>

                <?php if ($success): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-circle-check"></i>
                        <div>
                            <strong>Appointment Requested Successfully!</strong><br>
                            Thank you for choosing Dental Care. We will contact you within 24 hours to confirm your appointment details.
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (isset($errors['general'])): ?>
                    <div class="alert alert-error">
                        <i class="fas fa-circle-xmark"></i>
                        <?= htmlspecialchars($errors['general']) ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="appointment.php" novalidate>
                    <!-- Row 1: Name & Email -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="patient_name">Full Name <span>*</span></label>
                            <input type="text" id="patient_name" name="patient_name" class="form-control <?= isset($errors['patient_name']) ? 'is-invalid' : '' ?>"
                                   placeholder="Your full name" value="<?= htmlspecialchars($old['patient_name'] ?? '') ?>" required>
                            <?php if (isset($errors['patient_name'])): ?>
                                <div class="form-error"><i class="fas fa-circle-exclamation"></i> <?= $errors['patient_name'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address <span>*</span></label>
                            <input type="email" id="email" name="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                                   placeholder="you@example.com" value="<?= htmlspecialchars($old['email'] ?? '') ?>" required>
                            <?php if (isset($errors['email'])): ?>
                                <div class="form-error"><i class="fas fa-circle-exclamation"></i> <?= $errors['email'] ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Row 2: Phone & Doctor -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number <span>*</span></label>
                            <input type="tel" id="phone" name="phone" class="form-control <?= isset($errors['phone']) ? 'is-invalid' : '' ?>"
                                   placeholder="Digits only (e.g. 5551234567)" value="<?= htmlspecialchars($old['phone'] ?? '') ?>" required>
                            <?php if (isset($errors['phone'])): ?>
                                <div class="form-error"><i class="fas fa-circle-exclamation"></i> <?= $errors['phone'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="doctor_id">Select Doctor <span>*</span></label>
                            <select id="doctor_id" name="doctor_id" class="form-control <?= isset($errors['doctor_id']) ? 'is-invalid' : '' ?>" required>
                                <option value="">— Choose a Doctor —</option>
                                <?php foreach ($doctors as $doc): ?>
                                    <option value="<?= $doc['id'] ?>" <?= $preselect_doctor == $doc['id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($doc['name']) ?> — <?= htmlspecialchars($doc['specialization']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (isset($errors['doctor_id'])): ?>
                                <div class="form-error"><i class="fas fa-circle-exclamation"></i> <?= $errors['doctor_id'] ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Service -->
                    <div class="form-group">
                        <label for="service">Service Required <span>*</span></label>
                        <select id="service" name="service" class="form-control <?= isset($errors['service']) ? 'is-invalid' : '' ?>" required>
                            <option value="">— Select a Service —</option>
                            <?php
                            $services_list = ['General Dentistry', 'Teeth Whitening', 'Root Canal Treatment', 'Dental Implants', 'Orthodontics', 'Cosmetic Dentistry', 'Dental Check-Up', 'Emergency Dental Care', 'Other'];
                            foreach ($services_list as $svc): ?>
                                <option value="<?= $svc ?>" <?= ($old['service'] ?? '') === $svc ? 'selected' : '' ?>><?= $svc ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($errors['service'])): ?>
                            <div class="form-error"><i class="fas fa-circle-exclamation"></i> <?= $errors['service'] ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- Row 3: Date & Time -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="appt-date">Preferred Date <span>*</span></label>
                            <input type="date" id="appt-date" name="date" class="form-control <?= isset($errors['date']) ? 'is-invalid' : '' ?>"
                                   value="<?= htmlspecialchars($old['date'] ?? '') ?>" required>
                            <?php if (isset($errors['date'])): ?>
                                <div class="form-error"><i class="fas fa-circle-exclamation"></i> <?= $errors['date'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="time">Preferred Time <span>*</span></label>
                            <select id="time" name="time" class="form-control <?= isset($errors['time']) ? 'is-invalid' : '' ?>" required>
                                <option value="">— Select a Time —</option>
                                <?php
                                $times = ['08:00 AM','08:30 AM','09:00 AM','09:30 AM','10:00 AM','10:30 AM','11:00 AM','11:30 AM','12:00 PM','12:30 PM','01:00 PM','01:30 PM','02:00 PM','02:30 PM','03:00 PM','03:30 PM','04:00 PM','04:30 PM','05:00 PM','05:30 PM','06:00 PM'];
                                foreach ($times as $t): ?>
                                    <option value="<?= $t ?>" <?= ($old['time'] ?? '') === $t ? 'selected' : '' ?>><?= $t ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (isset($errors['time'])): ?>
                                <div class="form-error"><i class="fas fa-circle-exclamation"></i> <?= $errors['time'] ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="form-group">
                        <label for="message">Additional Notes <small style="color:var(--gray-400);font-weight:400;">(Optional)</small></label>
                        <textarea id="message" name="message" class="form-control" placeholder="Describe your symptoms, concerns, or any specific requests..."><?= htmlspecialchars($old['message'] ?? '') ?></textarea>
                    </div>

                    <!-- Privacy notice -->
                    <p style="font-size:0.8rem; color:var(--gray-400); margin-bottom:16px; line-height:1.6;">
                        <i class="fas fa-lock" style="color:var(--teal);"></i>
                        Your information is encrypted and stored securely. We will never share your data with third parties.
                    </p>

                    <div class="form-submit">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-calendar-check"></i> Confirm Appointment Request
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
