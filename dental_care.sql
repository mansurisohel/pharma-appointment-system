-- Dental Care Database Setup
-- Run this file in phpMyAdmin or MySQL CLI

CREATE DATABASE IF NOT EXISTS dental_care;
USE dental_care;

-- Doctors Table
CREATE TABLE IF NOT EXISTS doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    specialization VARCHAR(100) NOT NULL,
    qualification VARCHAR(200) NOT NULL,
    experience INT NOT NULL COMMENT 'Years of experience',
    photo VARCHAR(255) DEFAULT 'default-doctor.jpg',
    contact VARCHAR(50),
    timings VARCHAR(100),
    bio TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Appointments Table
CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    doctor_id INT NOT NULL,
    service VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    message TEXT,
    status ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (doctor_id) REFERENCES doctors(id) ON DELETE CASCADE
);

-- Sample Doctors Data
INSERT INTO doctors (name, specialization, qualification, experience, photo, contact, timings, bio) VALUES
('Dr. Sarah Mitchell', 'General Dentist', 'BDS, MDS - Conservative Dentistry', 12, 'doctor1.jpg', '+1 (555) 101-2030', 'Mon–Fri: 9:00 AM – 5:00 PM', 'Dr. Sarah Mitchell is a highly skilled general dentist with over 12 years of experience. She is passionate about providing comprehensive dental care and ensuring each patient feels comfortable and at ease throughout their treatment.'),
('Dr. James Harrison', 'Orthodontist', 'BDS, MDS - Orthodontics & Dentofacial Orthopedics', 9, 'doctor2.jpg', '+1 (555) 101-2031', 'Mon, Wed, Fri: 10:00 AM – 6:00 PM', 'Dr. James Harrison specializes in orthodontic treatments including braces and Invisalign. He has transformed thousands of smiles over his 9-year career and is known for his meticulous attention to detail and patient-centred approach.'),
('Dr. Emily Chen', 'Cosmetic Dentist', 'BDS, Fellowship in Cosmetic Dentistry (AACD)', 7, 'doctor3.jpg', '+1 (555) 101-2032', 'Tue, Thu, Sat: 9:00 AM – 4:00 PM', 'Dr. Emily Chen is our cosmetic dentistry specialist who believes every patient deserves a smile they are proud of. With expertise in veneers, whitening, and full smile makeovers, she combines artistry with clinical precision.'),
('Dr. Robert Patel', 'Endodontist', 'BDS, MDS - Endodontics, PhD (Dental Sciences)', 15, 'doctor4.jpg', '+1 (555) 101-2033', 'Mon–Thu: 8:00 AM – 4:00 PM', 'Dr. Robert Patel is our root canal specialist with 15 years of experience. His expertise in endodontic procedures ensures patients receive pain-free, efficient treatment. He is renowned for his gentle technique and thorough patient education.');
