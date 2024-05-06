<?php
include("config.php");

$username = $_POST["username"];
$password = $_POST["password"];

if (!isset($username) || !isset($password)) {
    echo "Data belum lengkap";
} else {
    $query = "SELECT * FROM user_register WHERE username = '$username'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $PassHash = $row["password"];
        if (password_verify($password, $PassHash)) {

            $response["message"] = "anda berhasil login " . $row["id"] . " " .$row["status"];
            $response["success"] = true;
        } else {
            $response["message"] = "anda gagal login";
            $response["success"] = false;
        }
    } elseif (mysqli_num_rows($result) > 1) {
        $response["message"] = "Hasil Lebih dari 1 ";
        $response["success"] = false;
    } else {
        $response["message"] = "username dan password tidak ditemukan";
        $response["success"] = false;
    }

    echo json_encode($response);
    exit;
}
