<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription History</title>
    <link rel="stylesheet" href="../css/style.css"><style>
	body {
		background-image: url('../img/medicine-blue-background-top-view.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
	</style>
</head>
<body>

<div class="container">
    <h2>Prescription History</h2>

    <?php
    require_once '../controllers/DashboardController.php';
    $dashboardModel = new DashboardModel();

    $loggedInDoctorId = 1; 
	
    $prescriptions = $dashboardModel->getPrescriptionHistory($loggedInDoctorId);

    if (!empty($prescriptions)) {
        echo '<ul>';
        foreach ($prescriptions as $prescription) {
            echo '<li>';
            echo 'Patient Name: ' . $prescription['patient_name'] . '<br>';
            echo 'Medication: ' . $prescription['medication'] . '<br>';
            echo 'Date Prescribed: ' . $prescription['date_prescribed'] . '<br>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No prescription history found.</p>';
    }
    ?>

    <br><a href="dashboard.php">Back to Dashboard</a>
</div>

</body>
</html>
