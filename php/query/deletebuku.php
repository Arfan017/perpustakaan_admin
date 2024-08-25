<?php
include('config.php');

$nisn_isbn = $_GET['nisn_isbn'];
$gambar_buku = $_GET['gambar_buku'];

if (isset($nisn_isbn)) {
    if (file_exists("../../images/images_buku/" . $gambar_buku)) {
        unlink("../../images/images_buku/" . $gambar_buku);
        $query = "DELETE FROM tb_buku WHERE nisn_isbn = '$nisn_isbn'";
        $result = mysqli_query($connect, $query);
        if ($result) {
            header("Location:/perpustakaan/php/?hal=data_buku");
            exit;
        }
    } else {
        echo "gambar tidak ditemukan";
    }
} else {
    echo "id kosong";
}
