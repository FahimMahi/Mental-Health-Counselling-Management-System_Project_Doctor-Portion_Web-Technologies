<?php

require_once '../models/Database.php';
require_once '../models/DashboardModel.php';

class DashboardController {
    public function showDashboard() {
        $dashboardModel = new DashboardModel();

        $loggedInDoctorId = 1; 

        $patients = $dashboardModel->getPatientList($loggedInDoctorId);

        include '../views/dashboard.php';
    }

    public function viewPatientList() {
        $dashboardModel = new DashboardModel();

        $loggedInDoctorId = 1; 

        $patients = $dashboardModel->getPatientList($loggedInDoctorId);

        include '../views/view_patient_list.php';
    }
	
	public function viewPrescriptionHistory() {
        $dashboardModel = new DashboardModel();

        $loggedInDoctorId = 1;

        $prescriptions = $dashboardModel->getPrescriptionHistory($loggedInDoctorId);

        include '../views/prescription_history.php';
    }
	
	public function createPrescription() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$patientName = $_POST['patient_name'];
			$medication = $_POST['medication'];
			$datePrescribed = $_POST['date_prescribed'];

			$loggedInDoctorId = 1;

			$dashboardModel = new DashboardModel();

			$result = $dashboardModel->createPrescription($loggedInDoctorId, $patientName, $medication, $datePrescribed);

			if ($result) {
				echo '<p>Prescription created successfully.</p>';
			} 
			else {
				echo '<p>Error creating prescription.</p>';
			}
		}

		include '../views/create_prescription.php';
	}
	
	public function generateReports() {
		$dashboardModel = new DashboardModel();
		$loggedInDoctorId = 1; 
		$reports = $dashboardModel->generateReports($loggedInDoctorId);
		include '../views/generate_reports.php';
	}

	public function createReport() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$title = $_POST['title'];
			$description = $_POST['description'];
			$dateGenerated = $_POST['date_generated'];

			if (empty($title) || empty($description) || empty($dateGenerated)) {
				echo '<p style="color: red;">All fields are required.</p>';
			} 
			else {
				$loggedInDoctorId = 1; // Replace with actual ID retrieval mechanism
				$dashboardModel = new DashboardModel();
				$result = $dashboardModel->createReport($loggedInDoctorId, $title, $description, $dateGenerated);

				if ($result) {
					echo '<p style="color: green;">Report created successfully.</p>';
				} 
				else {
					echo '<p style="color: red;">Error creating report.</p>';
				}
			}
		}

		include '../views/create_report.php';
	}
	
	public function sendNotifications() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$recipient = $_POST['recipient'];
			$message = $_POST['message'];
			$dateSent = $_POST['date_sent'];

			if (empty($recipient) || empty($message) || empty($dateSent)) {
				echo '<p style="color: red;">All fields are required.</p>';
			} else {
				$loggedInDoctorId = 1; 
				$dashboardModel = new DashboardModel();

				$result = $dashboardModel->sendNotification($loggedInDoctorId, $recipient, $message, $dateSent);

				if ($result) {
					echo '<p style="color: green;">Notification sent successfully.</p>';
				} else {
					echo '<p style="color: red;">Error sending notification.</p>';
				}
			}
		}

		include '../views/send_notifications.php';
	}


	public function updateProfile() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$newUsername = $_POST['new_username'];
			$newFullName = $_POST['new_full_name'];
			$newEmail = $_POST['new_email'];

			if (empty($newUsername) || empty($newFullName) || empty($newEmail)) {
				echo '<p style="color: red;">All fields are required.</p>';
			} else {
				$loggedInDoctorId = 1; // Replace with actual ID retrieval mechanism

				$dashboardModel = new DashboardModel();

				$result = $dashboardModel->updateProfile($loggedInDoctorId, $newUsername, $newFullName, $newEmail);

				if ($result) {
					echo '<p style="color: green;">Profile updated successfully.</p>';
				} 
				else {
					echo '<p style="color: red;">Error updating profile.</p>';
				}
			}
		}

		include '../views/update_profile.php';
	}
	

	public function showProfile() {
		$loggedInDoctorId = 1; 
		$dashboardModel = new DashboardModel();
		$profileDetails = $dashboardModel->getDoctorProfile($loggedInDoctorId);

		include '../views/profile.php';
	}

	public function changePassword() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$currentPassword = $_POST['current_password'];
			$newPassword = $_POST['new_password'];
			$confirmNewPassword = $_POST['confirm_new_password'];

			if (empty($currentPassword) || empty($newPassword) || empty($confirmNewPassword)) {
				echo '<p style="color: red;">All fields are required.</p>';
			} 
			elseif ($newPassword !== $confirmNewPassword) {
				echo '<p style="color: red;">New password and confirm new password do not match.</p>';
			} 
			else {
				$loggedInDoctorId = 1;
				$dashboardModel = new DashboardModel();
				$result = $dashboardModel->changePassword($loggedInDoctorId, $currentPassword, $newPassword);

				if ($result) {
					echo '<p style="color: green;">Password changed successfully.</p>';
				} 
				else {
					echo '<p style="color: red;">Error changing password. Please make sure your current password is correct.</p>';
				}
			}
		}

		include '../views/change_password.php';
	}


}
?>
