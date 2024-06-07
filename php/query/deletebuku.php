<?php
include('config.php');

$kd_buku = $_GET['kd_buku'];
$gambar_buku = $_GET['gambar_buku'];

if (isset($kd_buku)) {
    if (file_exists("../../images/images_buku/" . $gambar_buku)) {
        unlink("../../images/images_buku/" . $gambar_buku);
        $query = "DELETE FROM tb_buku WHERE kd_buku = '$kd_buku'";
        $result = mysqli_query($connect, $query);
        if ($result) {
            header("Location:/perpustakaan/php/?hal=data_buku");
            exit;
        }
    } 
    else {
        echo "gambar tidak ditemukan";
    }
} else {
    echo "id kosong";
}