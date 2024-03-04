<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="../css/style.css">
	<style>
	body {
		background-image: url('../img/copy-space-phone-desk.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
	</style>
</head>
<body>

<div class="container">
    <h2>Update Profile</h2>

    <?php
    require_once '../controllers/DashboardController.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newUsername = $_POST['new_username'];
        $newFullName = $_POST['new_full_name'];
        $newEmail = $_POST['new_email'];

        if (empty($newUsername) || empty($newFullName) || empty($newEmail)) {
            echo '<p style="color: red;">All fields are required.</p>';
        } 
		else {
			$loggedInDoctorId = 1;
            $dashboardModel = new DashboardModel();
            $result = $dashboardModel->updateProfile($loggedInDoctorId, $newUsername, $newFullName, $newEmail);

            if ($result) {
                echo '<p style="color: green;">Profile updated successfully.</p>';
            } else {
                echo '<p style="color: red;">Error updating profile.</p>';
            }
        }
    }
    ?>

    <form action="update_profile.php" method="post">
        <label for="new_username">New Username:</label>
        <input type="text" id="new_username" name="new_username" required><br>

        <label for="new_full_name">New Full Name:</label>
        <input type="text" id="new_full_name" name="new_full_name" required><br>

        <label for="new_email">New Email:</label>
        <input type="email" id="new_email" name="new_email" required><br>

        <input type="submit" value="Update Profile">
    </form>

    <br><a href="dashboard.php">Back to Dashboard</a>
</div>

</body>
</html>
