<?php
include("/xampp/htdocs/perpustakaan/php/query/config.php");

$kd_buku = $_GET['kd_buku'];
$gambar_buku = $_GET['gambar_buku'];

if (isset($kd_buku)) {
    if (file_exists("/xampp/htdocs/perpustakaan/images/" . $gambar_buku)) {
        unlink("/xampp/htdocs/perpustakaan/images/" . $gambar_buku);
        $query = "DELETE FROM buku WHERE kd_buku = '$kd_buku'";
        $result = mysqli_query($connect, $query);
        if ($result) {
            header("Location:/perpustakaan/?hal=data_buku");
        }
    }
} else {
    echo "id kosong";
}
