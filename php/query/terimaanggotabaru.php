<?php
include('config.php');

$id_regis = $_GET['id_regis'];

if (empty($id_regis)) {
    
} else {
    $query = "UPDATE user_register SET status = '1' WHERE id = '$id_regis'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        header("Location:/perpustakaan/?hal=data_anggota_baru");
        exit;
    }
}

?>