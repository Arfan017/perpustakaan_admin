<?php
include('config.php');

$nisn_isbn = $_POST['nisn_isbn'];

if (empty($nisn_isbn)) {
    $response['message'] = 'nisn_isbn kosong';
} else {
    $query = "SELECT tb_rating.*, tb_member.nama, tb_buku.gambar_buku FROM tb_rating 
    JOIN tb_member ON tb_rating.id_member = tb_member.id_member 
    JOIN tb_buku ON tb_rating.nisn_isbn = tb_buku.nisn_isbn WHERE tb_rating.nisn_isbn = $nisn_isbn";
    $result = mysqli_query($connect, $query);

    $DataLasan = array();

    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            $data['id_rating'] = $row['id_rating'];
            $data['nisn_isbn'] = $row['nisn_isbn'];
            $data['rating'] = $row['rating'];
            $data['nama'] = $row['nama'];
            $data['ulasan'] = $row['ulasan'];
            $data['gambar_buku'] = $row['gambar_buku'];
            array_push($DataLasan, $data);
        }
    }
    echo json_encode($DataLasan);
}
