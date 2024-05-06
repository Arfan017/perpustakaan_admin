<?php

include("config.php");

$nama = $_POST["nama"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

if (empty($nama) || empty($email) || empty($username) || empty($password)) {
    $response["success"] = false;
    $response["message"] = "anda gagal register";
} else {
    $PassHash = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO user_register (id, nama, email, username, password, status) VALUES (' ', '$nama', '$email', '$username', '$PassHash', '0')";
    $result = mysqli_query($connect, $query);
    if ($result) {
        $response["success"] = true;
        $response["message"] = "anda berhasil register";
    } else {
        $response["success"] = false;
        $response["message"] = "anda gagal register";
    }
    echo json_encode($response);
    exit;
}