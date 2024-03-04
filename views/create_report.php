<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Report</title>
    <link rel="stylesheet" href="../css/style.css">
	<style>
	body {
		background-image: url('../img/stethoscope-glasses-near-clipboard.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
	</style>
</head>
<body>

<div class="container">
    <h2>Create Report</h2>
	
    <?php
    require_once '../controllers/DashboardController.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $dateGenerated = $_POST['date_generated'];

        if (empty($title) || empty($description) || empty($dateGenerated)) {
            echo '<p style="color: red;">All fields are required.</p>';
        } 
		else {
            $loggedInDoctorId = 1;
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
    ?>

    <form action="create_report.php" method="post">
        <label for="title">Report Title:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="date_generated">Date Generated:</label>
        <input type="date" id="date_generated" name="date_generated" required><br>

        <input type="submit" value="Create Report">
    </form>

    <br><a href="dashboard.php">Back to Dashboard</a>
</div>

</body>
</html>
