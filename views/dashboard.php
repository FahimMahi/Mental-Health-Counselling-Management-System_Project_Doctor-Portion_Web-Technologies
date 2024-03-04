<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
	<style>
	body {
		background-image: url('../img/health-still-life-with-copy-space.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
	</style>
</head>
<body>

<div class="container">
    <h2>Welcome to the Dashboard!</h2>

    <div class="dashboard-links">
        <ul>
            <li><a href="view_patient_list.php">View Patient List</a></li>
            <li><a href="create_prescription.php">Create Prescription</a></li>
            <li><a href="prescription_history.php">Prescription History</a></li>
            <li><a href="create_report.php">Create Report</a></li>
			<li><a href="generate_reports.php">Generate Reports</a></li>
            <li><a href="send_notifications.php">Send Notifications</a></li>
            <li><a href="update_profile.php">Update Profile</a></li>
            <li><a href="profile.php">My Profile</a></li>
			<li><a href="change_password.php">Change Password</a></li>
        </ul>
    </div>

    <a href="../controllers/logout.php">Logout</a>
</div>

</body>
</html>
