<?php
include('config.php');

$id_buku = $_POST['id_buku'];
$id_member = $_POST['id_member'];
$rating = $_POST['rating'];
$ulasan = $_POST['ulasan'];

if (empty($id_buku)|| empty($id_member) || empty($rating) || empty($ulasan)) {
    $response['message'] = "terdapat kolo yang kosong";
} else {
    $query = "INSERT INTO tb_rating (id_rating, id_buku, id_member, rating, ulasan) VALUES (0, '$id_buku', '$id_member', '$rating', '$ulasan')";
    $result = mysqli_query($connect, $query);

    if ($result) {
        $response['success'] = true;
        $response['message'] = "Terima Kasih Banyak atas ulasan yang anda berikan";
    }
    echo json_encode($response);
}