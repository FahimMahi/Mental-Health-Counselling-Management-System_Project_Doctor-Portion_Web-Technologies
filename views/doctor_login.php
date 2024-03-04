<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
    <link rel="stylesheet" href="../css/style.css">
	<style>
	body {
		background-image: url('../img/stethoscope-copy-space.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
	</style>
    <script src="../controllers/validation.js" defer></script>
</head>
<body>
<div class="container">
    <h2>Doctor Login</h2>
    <?php
    require_once '../controllers/DoctorController.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $doctor = DoctorModel::validateCredentials($username, $password);

        if ($doctor) {
            header('Location: dashboard.php');
            exit();
        } else {
            echo '<p class="error">Invalid username or password</p>';
        }
    }
    ?>

    <form id="yourFormId" method="post" onsubmit="return validateForm()">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username">

		<label for="password">Password:</label>
		<input type="password" id="password" name="password">

		<button type="submit">Login</button>
	</form>

</div>

</body>
</html>
