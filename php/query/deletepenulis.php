<?php
include("/xampp/htdocs/perpustakaan/php/query/config.php");

$id_penulis = $_GET['id_penulis'];

if (isset($id_penulis)) {
    $query = "DELETE FROM penulis WHERE id_penulis = '$id_penulis'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location:/perpustakaan/?hal=data_penulis");
    }
} else {
    echo "id kosong";
}