<?php

if(isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'login';
}

switch ($action) {
    case 'login':
        include 'views/doctor_login.php';
        break;
    case 'dashboard':
        // Logic for handling dashboard
        $dashboardController = new DashboardController();
        $dashboardController->showDashboard();
        break;
    case 'logout':
        include 'logout.php';
        break;
    default:
        break;
}

?>
