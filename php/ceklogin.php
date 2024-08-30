<?php
session_start();
include("query/config.php");

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM tb_login WHERE username = '$username' AND password = '$password'";
$data = mysqli_query($connect, $query);
$jml = mysqli_num_rows($data);

if ($jml > 0) {
    $_SESSION['username'] = $data["username"];
    $_SESSION['password'] = $data["password"];

    header('location: index.php');
} else {
    echo "<meta http-equiv = 'refresh' content='2' url = '../index.php'>";
}
