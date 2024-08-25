<?php
include('config.php');

$nisn_isbn = $_POST['nisn_isbn'];
$id_member = $_POST['id_member'];
$rating = $_POST['rating'];
$ulasan = $_POST['ulasan'];

if (empty($nisn_isbn) || empty($id_member) || empty($rating) || empty($ulasan)) {
    $response['message'] = "terdapat kolo yang kosong";
} else {
    $query = "INSERT INTO tb_rating (id_rating, nisn_isbn, id_member, rating, ulasan) VALUES (0, '$nisn_isbn', '$id_member', '$rating', '$ulasan')";
    $result = mysqli_query($connect, $query);

    if ($result) {
        $response['success'] = true;
        $response['message'] = "Terima Kasih Banyak atas ulasan yang anda berikan";
    }
    echo json_encode($response);
}
