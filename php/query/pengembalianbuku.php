<?php
include('config.php');

$id_buku = $_GET['id_buku'];
$id_member = $_GET['id_member'];

if (empty($id_buku) && empty($id_buku)) {
    
} else {
    $query_update_stok = "UPDATE tb_buku SET stok = stok + 1 WHERE kd_buku = '$id_buku';";
    $result_update_stok = mysqli_query($connect, $query_update_stok);
    if ($result_update_stok) {

        $query_update_status = "UPDATE tb_pinjam SET status = 'kembali' WHERE id_buku = '$id_buku' AND no_member = '$id_member';";
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
?>