<?php
include('config.php');

$id_member = $_POST['id_member'];
$status = $_POST['status'];

$query = "SELECT tb_buku.nama_buku, tb_buku.gambar_buku, tb_pinjam.* FROM tb_buku 
JOIN tb_pinjam ON tb_pinjam.nisn_isbn = tb_buku.nisn_isbn 
JOIN tb_member ON tb_pinjam.id_member = tb_member.id_member 
WHERE tb_pinjam.id_member = '$id_member' AND tb_pinjam.status = '$status'";
$result = mysqli_query($connect, $query);

$DataBuku = array();
while ($row = mysqli_fetch_array($result)) {
    $data['id'] = $row['id'];
    $data['nama_buku'] = $row['nama_buku'];
    $data['gambar_buku'] = $row['gambar_buku'];
    $data['tgl_pinjam'] = $row['tgl_pinjam'];
    $data['tgl_kembali'] = $row['tgl_kembali'];
    $data['nisn_isbn'] = $row['nisn_isbn'];
    $data['denda'] = $row['denda'];
    array_push($DataBuku, $data);
}

$json_data = json_encode($DataBuku);
echo $json_data;
