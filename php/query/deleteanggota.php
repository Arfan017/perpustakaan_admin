<?php
include('config.php');

$id_registrasi = $_GET['id_register'];

if (isset($id_registrasi)) {
    $query = "DELETE FROM user_member WHERE id_register = '$id_registrasi'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location:/perpustakaan/php/?hal=data_anggota_lama");
        exit;
    }
} else {
    echo "id kosong";
}