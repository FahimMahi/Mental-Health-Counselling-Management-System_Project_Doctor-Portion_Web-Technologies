<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient List</title>
    <link rel="stylesheet" href="../css/style.css">
	<style>
	body {
		background-image: url('../img/top-view-health-still-life-with-copy-space.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
	</style>
</head>
<body>

<div class="container">
    <h2>View Patient List</h2>

    <?php
    require_once '../controllers/DashboardController.php';
    $dashboardModel = new DashboardModel();

    $loggedInDoctorId = 1;

    $patients = $dashboardModel->getPatientList($loggedInDoctorId);

    if (!empty($patients)) {
        echo '<ul>';
        foreach ($patients as $patient) {
            echo '<li>';
            echo 'Name: ' . $patient['full_name'] . '<br>';
            echo 'Email: ' . $patient['email'] . '<br>';
            echo 'Phone Number: ' . $patient['phone_number'] . '<br>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No patients found.</p>';
    }
    ?>

    <br><a href="dashboard.php">Back to Dashboard</a>
</div>

</body>
</html>
