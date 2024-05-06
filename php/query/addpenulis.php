<?php
include('config.php');

$namapenulis = $_POST['nama_penulis'];

if (isset($namapenulis)) {
    $query = "INSERT INTO penulis (id_penulis, nama_penulis) VALUES ('','$namapenulis')";
    $result = mysqli_query($connect, $query);

    if ($result) {
        header("Location:/perpustakaan/?hal=data_penulis");
        exit;
    }
    echo json_encode($response);
    exit;
}