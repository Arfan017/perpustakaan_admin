<?php
include("/xampp/htdocs/perpustakaan/php/query/config.php");

$id_penerbit = $_GET['id_penerbit'];

if (isset($id_penerbit)) {
    $query = "DELETE FROM penerbit WHERE id_penerbit = '$id_penerbit'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location:/perpustakaan/?hal=data_penerbit");
        exit;
    }
} else {
    echo "id kosong";
}