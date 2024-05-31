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

    // if (mysqli_num_rows($result) === 1) {
    //     $row = mysqli_fetch_assoc($result);
    //     $PassHash = $row["password"];
    //     if (password_verify($password, $PassHash)) {

    //         $response["message"] = "anda berhasil login " . $row["id"] . " " .$row["status"];
    //         $response["success"] = true;
    //     } else {
    //         $response["message"] = "anda gagal login";
    //         $response["success"] = false;
    //     }
    // } elseif (mysqli_num_rows($result) > 1) {
    //     $response["message"] = "Hasil Lebih dari 1 ";
    //     $response["success"] = false;
    // } else {
    //     $response["message"] = "username dan password tidak ditemukan";
    //     $response["success"] = false;
    // }

    echo json_encode($response);
    exit;
}
