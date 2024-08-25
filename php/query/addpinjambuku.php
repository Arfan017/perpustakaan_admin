<?php
include('config.php');

$id_member = $_POST['id_member'];
$nisn_isbn = $_POST['nisn_isbn'];
$tgl_ambil = $_POST['tgl_ambil'];
$tgl_kembali = $_POST['tgl_kembali'];

if (empty($nisn_isbn) || empty($id_member) || empty($tgl_ambil) || empty($tgl_kembali)) {
    $response['message'] = "terdapat kolo yang kosong";
} else {
    $query = "INSERT INTO tb_pinjam (id, id_member, tgl_pinjam, tgl_kembali, nisn_isbn, denda, status) VALUES (0, '$id_member', '$tgl_ambil', '$tgl_kembali', '$nisn_isbn', '-----', 'belum kembali')";
    $result = mysqli_query($connect, $query);

    if ($result) {
        // Kurangi stok buku
        $update_query = "UPDATE tb_buku SET stok = stok - 1 WHERE nisn_isbn = '$nisn_isbn'";
        $update_result = mysqli_query($connect, $update_query);
        if ($update_result) {
            $response['success'] = true;
            $response['message'] = "Pinjam buku berhasil";
        }
        echo json_encode($response);
    }
}
