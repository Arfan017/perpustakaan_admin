<?php
session_start();

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
            $_SESSION['username'] = $row["username"];
            $_SESSION['password'] = $row["password"];
            header("Location:/perpustakaan/php/?hal=dashboard");
            exit;
        } else {
            echo "<meta http-equiv = 'refresh' content='2; url = ../index.php'>";
        }
    }
}