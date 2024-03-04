<?php

class DoctorModel {
    public static function validateCredentials($username, $password) {
        $conn = Database::connect();
        $stmt = $conn->prepare("SELECT * FROM doctors WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
