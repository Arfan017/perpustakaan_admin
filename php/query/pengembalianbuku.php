<?php
include('config.php');

$nisn_isbn = $_GET['nisn_isbn'];
$id_member = $_GET['id_member'];

if (empty($nisn_isbn) && empty($id_member)) {
} else {
    $query_update_stok = "UPDATE tb_buku SET stok = stok + 1 WHERE nisn_isbn = '$nisn_isbn';";
    $result_update_stok = mysqli_query($connect, $query_update_stok);
    if ($result_update_stok) {

        $query_update_status = "UPDATE tb_pinjam SET status = 'kembali' WHERE nisn_isbn = '$nisn_isbn' AND id_member = '$id_member';";
        $result_update_status = mysqli_query($connect, $query_update_status);

        if ($result_update_status) {
            $response['success'] = true;
            $response['message'] = "Pinjam buku berhasil";
            header("Location:/perpustakaan/php/?hal=data_peminjaman");
            exit;
        }
    }
    echo json_encode($response);
}
