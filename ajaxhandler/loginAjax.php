<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once $path . "/Attendance-App/database/database.php";
require_once $path . "/Attendance-App/database/facultyDetails.php";

session_start(); // ✅ Always start the session

$action = $_REQUEST["action"];

if (!empty($action)) {
    if ($action == "verifyUser") {
        $un = $_POST["user_name"] ?? '';
        $pw = $_POST["password"] ?? '';

        $dbo = new Database();
        $fdo = new faculty_details();
        $rv = $fdo->verifyUser($dbo, $un, $pw);

        if ($rv['status'] === "ALL OK") {
            // ✅ Set session variables
            $_SESSION["faculty_id"] = $rv["id"];
            $_SESSION["username"] = $un;
        }

        header('Content-Type: application/json'); // Ensure correct response type
        echo json_encode($rv);
    }
}
?>
