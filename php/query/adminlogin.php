<?php
include("config.php");

$username = $_POST["username"];
$password = $_POST["password"];

if (!isset($username) || !isset($password)) {
    echo "Data belum lengkap";
} else {
    $query = "SELECT * FROM tb_admin WHERE username = '$username'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $PassHash = $row["password"];
        if (password_verify($password, $PassHash)) {
            header("Location:/perpustakaan/?hal=dashboard");
            exit;
        } 
    }
}