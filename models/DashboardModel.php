<?php

class DashboardModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getDoctorInfo($doctorId) {
        $stmt = $this->db->prepare("SELECT * FROM doctors WHERE id = :doctor_id");
        $stmt->bindParam(':doctor_id', $doctorId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getPatients($doctorId) {
        $stmt = $this->db->prepare("SELECT * FROM patients WHERE doctor_id = :doctor_id");
        $stmt->bindParam(':doctor_id', $doctorId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

	public function getPatientList($doctorId) {
		$stmt = $this->db->prepare("SELECT * FROM patients WHERE doctor_id = :doctor_id");
		$stmt->bindParam(':doctor_id', $doctorId);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	
	public function getPrescriptionHistory($doctorId) {
		$stmt = $this->db->prepare("SELECT * FROM prescription_history WHERE doctor_id = :doctor_id");
		$stmt->bindParam(':doctor_id', $doctorId);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function createPrescription($doctorId, $patientName, $medication, $datePrescribed) {
		$stmt = $this->db->prepare("INSERT INTO prescription_history (doctor_id, patient_name, medication, date_prescribed) VALUES (:doctor_id, :patient_name, :medication, :date_prescribed)");
		$stmt->bindParam(':doctor_id', $doctorId);
		$stmt->bindParam(':patient_name', $patientName);
		$stmt->bindParam(':medication', $medication);
		$stmt->bindParam(':date_prescribed', $datePrescribed);
		return $stmt->execute();
	}

	public function generateReports($doctorId) {
		$stmt = $this->db->prepare("SELECT * FROM reports WHERE doctor_id = :doctor_id");
		$stmt->bindParam(':doctor_id', $doctorId);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	public function createReport($doctorId, $title, $description, $dateGenerated) {
		$stmt = $this->db->prepare("INSERT INTO reports (doctor_id, title, description, date_generated) VALUES (:doctor_id, :title, :description, :date_generated)");
		$stmt->bindParam(':doctor_id', $doctorId);
		$stmt->bindParam(':title', $title);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':date_generated', $dateGenerated);
		return $stmt->execute();
	}

	public function sendNotification($doctorId, $recipient, $message, $dateSent) {
		$stmt = $this->db->prepare("INSERT INTO notifications (doctor_id, recipient, message, date_sent) VALUES (:doctor_id, :recipient, :message, :date_sent)");
		$stmt->bindParam(':doctor_id', $doctorId);
		$stmt->bindParam(':recipient', $recipient);
		$stmt->bindParam(':message', $message);
		$stmt->bindParam(':date_sent', $dateSent);

		return $stmt->execute();
	}

	public function updateProfile($doctorId, $newUsername, $newFullName, $newEmail) {
		$stmt = $this->db->prepare("UPDATE doctors SET username = :username, full_name = :full_name, email = :email WHERE id = :doctor_id");
		$stmt->bindParam(':username', $newUsername);
		$stmt->bindParam(':full_name', $newFullName);
		$stmt->bindParam(':email', $newEmail);
		$stmt->bindParam(':doctor_id', $doctorId);

		return $stmt->execute();
	}
	
	public function getDoctorProfile($doctorId) {
		$stmt = $this->db->prepare("SELECT * FROM doctors WHERE id = :doctor_id");
		$stmt->bindParam(':doctor_id', $doctorId);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}


	public function changePassword($doctorId, $currentPassword, $newPassword) {

		$stmt = $this->db->prepare("SELECT password FROM doctors WHERE id = :doctor_id");
		$stmt->bindParam(':doctor_id', $doctorId);
		$stmt->execute();
		$storedPassword = $stmt->fetchColumn();

		if ($currentPassword === $storedPassword) {
			$stmt = $this->db->prepare("UPDATE doctors SET password = :password WHERE id = :doctor_id");
			$stmt->bindParam(':password', $newPassword);
			$stmt->bindParam(':doctor_id', $doctorId);
			return $stmt->execute();
		}

		return false;
	}



}

?>
