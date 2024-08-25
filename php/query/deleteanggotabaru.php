<?php
include('config.php');

$id_member = $_GET['id_member'];

if (isset($id_member)) {
    $query1 = "DELETE FROM tb_member WHERE id_member = '$id_member'";
    $result1 = mysqli_query($connect, $query1);

    $query2 = "DELETE FROM tb_login WHERE id_member = '$id_member'";
    $result2 = mysqli_query($connect, $query2);

    if ($result1 && $result2) {
        header("Location:/perpustakaan/php/?hal=data_anggota_baru");
        exit;
    }
} else {
    echo "id kosong";
}
