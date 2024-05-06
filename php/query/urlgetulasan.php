<?php
include('config.php');

$id_buku = $_POST['id_buku'];
// $no_member = $_POST['no_member'];

if (empty($id_buku)) {
    $response['message'] = 'id_buku kosong';
} else {
    $query = "SELECT tb_rating.*, user_member.nama, tb_buku.gambar_buku FROM tb_rating JOIN user_member ON tb_rating.id_member = user_member.id_register JOIN tb_buku ON tb_rating.id_buku = tb_buku.kd_buku WHERE tb_rating.id_buku = $id_buku";
    $result = mysqli_query($connect, $query);

    $DataLasan = array();

    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            $data['id_rating'] = $row['id_rating'];
            $data['id_buku'] = $row['id_buku'];
            $data['rating'] = $row['rating'];
            $data['nama'] = $row['nama'];
            $data['ulasan'] = $row['ulasan'];
            $data['gambar_buku'] = $row['gambar_buku'];
            array_push($DataLasan, $data);
        }
    }
    echo json_encode($DataLasan);
}
