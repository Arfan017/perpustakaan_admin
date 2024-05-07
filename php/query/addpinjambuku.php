<?php
include('config.php');

$id_member = $_POST['id_member'];
$id_buku = $_POST['id_buku'];
$tgl_ambil = $_POST['tgl_ambil'];
$tgl_kembali = $_POST['tgl_kembali'];

if (empty($id_buku) || empty($id_member) || empty($tgl_ambil) || empty($tgl_kembali)) {
    $response['message'] = "terdapat kolo yang kosong";
} else {
    $query = "INSERT INTO tb_pinjam (id, no_member, tgl_pinjam, tgl_kembali, id_buku, denda, status) VALUES (0, '$id_member', '$tgl_ambil', '$tgl_kembali', '$id_buku', '-----', 'belum kembali')";
    $result = mysqli_query($connect, $query);

    if ($result) {
        $response['success'] = true;
        $response['message'] = "Pinjam buku berhasil";
    }
    echo json_encode($response);
}