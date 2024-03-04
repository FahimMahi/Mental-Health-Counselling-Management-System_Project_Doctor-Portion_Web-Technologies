<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Reports</title>
    <link rel="stylesheet" href="../css/style.css">
	<style>
	body {
		background-image: url('../img/27374040_7283494.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
	</style>
</head>
<body>

<div class="container">
    <h2>Generate Reports</h2>

    <?php
    require_once '../controllers/DashboardController.php';
    $dashboardModel = new DashboardModel();
	$loggedInDoctorId = 1; 
    $reports = $dashboardModel->generateReports($loggedInDoctorId);

    if (!empty($reports)) {
        echo '<ul>';
        foreach ($reports as $report) {
            echo '<li>';
            echo 'Report Title: ' . $report['title'] . '<br>';
            echo 'Description: ' . $report['description'] . '<br>';
            echo 'Date Generated: ' . $report['date_generated'] . '<br>';
            echo '</li>';
        }
        echo '</ul>';
    } 
	else {
        echo '<p>No reports found.</p>';
    }
    ?>

    <br><a href="dashboard.php">Back to Dashboard</a>
</div>

</body>
</html>
