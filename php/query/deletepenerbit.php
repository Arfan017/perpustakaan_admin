<?php
include('config.php');

$id_penerbit = $_GET['id_penerbit'];

if (isset($id_penerbit)) {
    $query = "DELETE FROM tb_penerbit WHERE id_penerbit = '$id_penerbit'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location:/perpustakaan/?hal=data_penerbit");
        exit;
    }
} else {
    echo "id kosong";
}