<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
    <link rel="stylesheet" href="../css/style.css">
	<style>
	body {
		background-image: url('../img/14730071_rm118-ken-12.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
	</style>
</head>
<body>

<div class="container">
    <h2>Doctor Profile</h2>

    <?php
    require_once '../controllers/DashboardController.php';
    $loggedInDoctorId = 1;
    $dashboardModel = new DashboardModel();
    $profileDetails = $dashboardModel->getDoctorProfile($loggedInDoctorId);

    if (!empty($profileDetails)) {
        echo '<p><strong>Username:</strong> ' . $profileDetails['username'] . '</p>';
        echo '<p><strong>Full Name:</strong> ' . $profileDetails['full_name'] . '</p>';
        echo '<p><strong>Email:</strong> ' . $profileDetails['email'] . '</p>';
    } else {
        echo '<p style="color: red;">Error fetching profile details.</p>';
    }
    ?>

    <br><a href="dashboard.php">Back to Dashboard</a>
</div>

</body>
</html>
