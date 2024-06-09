<?php
include("config.php");

$email = $_POST["email"];
$password = $_POST["password"];

if (!isset($email) || !isset($password)) {
    echo "Data belum lengkap";
} else {

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $query = " UPDATE user_register SET password = '$passwordHash' WHERE email = '$email'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        $response["message"] = "password berhasil diubah";
        $response["success"] = true;
    } else {
        $response["message"] = "password gagal diubah";
        $response["success"] = false;
    }

    echo json_encode($response);
    exit;
}
