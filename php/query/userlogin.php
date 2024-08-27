<?php
include("config.php");

$username = $_POST["username"];
$password = $_POST["password"];

if (!isset($username) || !isset($password)) {
    echo "Data belum lengkap";
} else {
    $query = "SELECT tb_login.*, tb_member.status_member FROM tb_login 
    JOIN tb_member ON tb_login.id_member = tb_member.id_member 
    WHERE username = '$username'";

    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $PassHash = $row["password"];
        if (password_verify($password, $PassHash)) {
            $status_member = $row["status_member"];
            if ($status_member == 2) {
                $response["success"] = false;
            } elseif ($status_member == 1) {
                $response["success"] = true;
                $response["message"] = "anda berhasil login";
                $response["id_member"] = $row["id_member"];
                $response["status_member"] = $row["status_member"];
            }            
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
