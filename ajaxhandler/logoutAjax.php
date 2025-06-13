<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["action"] === "logout") {
    // Destroy the session
    session_unset();
    session_destroy();

    echo json_encode(["status" => "LOGGED OUT"]);
} else {
    echo json_encode(["status" => "INVALID REQUEST"]);
}
?>
