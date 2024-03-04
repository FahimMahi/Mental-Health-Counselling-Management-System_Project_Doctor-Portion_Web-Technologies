<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Notifications</title>
    <link rel="stylesheet" href="../css/style.css">
	<style>
	body {
		background-image: url('../img/9526667.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
	</style>
</head>
<body>

<div class="container">
    <h2>Send Notifications</h2>

    <?php
    require_once '../controllers/DashboardController.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $recipient = $_POST['recipient'];
        $message = $_POST['message'];
        $dateSent = $_POST['date_sent'];

        if (empty($recipient) || empty($message) || empty($dateSent)) {
            echo '<p style="color: red;">All fields are required.</p>';
        } 
		else {
			$loggedInDoctorId = 1; $dashboardModel = new DashboardModel();

            $result = $dashboardModel->sendNotification($loggedInDoctorId, $recipient, $message, $dateSent);

            if ($result) {
                echo '<p style="color: green;">Notification sent successfully.</p>';
            } 
			else {
                echo '<p style="color: red;">Error sending notification.</p>';
            }
        }
    }
    ?>

    <form action="send_notifications.php" method="post">
        <label for="recipient">Recipient:</label>
        <input type="text" id="recipient" name="recipient" required><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea><br>

        <label for="date_sent">Date Sent:</label>
        <input type="date" id="date_sent" name="date_sent" required><br>

        <input type="submit" value="Send Notification">
    </form>

    <br><a href="dashboard.php">Back to Dashboard</a>
</div>

</body>
</html>
