<?php

require_once("../webfejlesztes/users.php");

$response = [];

if (isset($_POST["email"]) and isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (user_exists($email)) {
        if (authenticate($email, $password)) {
            $response["gallery"] = get_preffered_color($email);
        } else {
            $response["error"] = "wrong_password";
        }
    } else {
        $response["error"] = "wrong_email";
    }
} else {
    http_response_code(400); // Bad Request
    die;
}

header('Content-Type: application/json');
echo json_encode($response);