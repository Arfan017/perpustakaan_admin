<?php
include('config.php');

$namapenerbit = $_POST['nama_penerbit'];

if (isset($namapenerbit)) {
    $query = "INSERT INTO tb_penerbit (id_penerbit, nama_penerbit) VALUES ('','$namapenerbit')";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location:/perpustakaan/?hal=data_penerbit");
        exit;
    }
    echo json_encode($response);
    exit;
}
