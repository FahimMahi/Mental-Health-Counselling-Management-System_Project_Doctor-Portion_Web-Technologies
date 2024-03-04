<?php

require_once '../models/Database.php';
require_once '../models/DoctorModel.php';

class DoctorController {
    public function login() {
        include '../views/doctor_login.php';
    }
}

?>
