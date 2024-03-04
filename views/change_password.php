<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../css/style.css">
	<style>
	body {
		background-image: url('../img/24600855.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
	</style>
</head>
<body>

<div class="container">
    <h2>Change Password</h2>

    <?php
    require_once '../controllers/DashboardController.php';
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
    ?>

    <form action="change_password.php" method="post">
        <label for="current_password">Current Password:</label>
        <input type="password" id="current_password" name="current_password" required><br>

        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required><br>

        <label for="confirm_new_password">Confirm New Password:</label>
        <input type="password" id="confirm_new_password" name="confirm_new_password" required><br>

        <input type="submit" value="Change Password">
    </form>

    <br><a href="dashboard.php">Back to Dashboard</a>
</div>

</body>
</html>
