<?php
include('config.php');

$id_rating = $_GET['id_rating'];

if (isset($id_rating)) {
    $query = "DELETE FROM tb_rating WHERE id_rating = '$id_rating'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location:/perpustakaan/php/?hal=data_rating");
        exit;
    }
} else {
    echo "id kosong";
}