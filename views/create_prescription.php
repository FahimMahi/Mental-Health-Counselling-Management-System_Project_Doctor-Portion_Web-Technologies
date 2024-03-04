<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Prescription</title>
    <link rel="stylesheet" href="../css/style.css">
	<style>
	body {
		background-image: url('../img/clipboard-stethoscope.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
	</style>
</head>
<body>

<div class="container">
    <h2>Create Prescription</h2>

    <?php
    require_once '../controllers/DashboardController.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $patientName = $_POST['patient_name'];
        $medication = $_POST['medication'];
        $datePrescribed = $_POST['date_prescribed'];

        if (empty($patientName) || empty($medication) || empty($datePrescribed)) {
            echo '<p style="color: red;">All fields are required.</p>';
        } 
		else {
            $loggedInDoctorId = 1; // Replace with actual ID retrieval mechanism

            $dashboardModel = new DashboardModel();

            $result = $dashboardModel->createPrescription($loggedInDoctorId, $patientName, $medication, $datePrescribed);

            if ($result) {
                echo '<p style="color: green;">Prescription created successfully.</p>';
            } 
			else {
                echo '<p style="color: red;">Error creating prescription.</p>';
            }
        }
    }
    ?>

    <form action="create_prescription.php" method="post">
        <label for="patient_name">Patient Name:</label>
        <input type="text" id="patient_name" name="patient_name" required><br>

        <label for="medication">Medication:</label>
        <textarea id="medication" name="medication" required></textarea><br>

        <label for="date_prescribed">Date Prescribed:</label>
        <input type="date" id="date_prescribed" name="date_prescribed" required><br>

        <input type="submit" value="Create Prescription">
    </form>

    <br><a href="dashboard.php">Back to Dashboard</a>
</div>

</body>
</html>
