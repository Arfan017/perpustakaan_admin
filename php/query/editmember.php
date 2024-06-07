<?php
include('config.php');

$id_user = $_POST['id_user'];
$Nama = $_POST['nama'];
$Jenkel = $_POST['jenkel'];
$Ttl = $_POST['ttgl_lahir'];
$Email = $_POST['email'];
$AlamatIdentitas = $_POST['alamat1'];
$AlamatSekarang = $_POST['alamat2'];
$Nohp = $_POST['no_hp'];
$Pekerjaan = $_POST['pekerjaan'];
$NamaInstitusi = $_POST['nama_institusi'];
$AlamatInstitusi = $_POST['alamat_institusi'];

if (empty($Nama) || empty($Jenkel) || empty($Ttl) || empty($Email) || empty($Email) || empty($AlamatIdentitas) || empty($AlamatSekarang) || empty($Nohp) || empty($Pekerjaan) || empty($NamaInstitusi) || empty($AlamatInstitusi)) {
    echo "Mohon lengkapi semua kolom!";
} else {
    $query1 = "UPDATE user_member SET 
    nama = '$Nama',
    jenkel = '$Jenkel',
    ttgl_lahir = '$Ttl',
    alamat1 = '$AlamatIdentitas',
    alamat2 = '$AlamatSekarang',
    no_hp = '$Nohp',
    pekerjaan = '$Pekerjaan',
    nama_institusi = '$NamaInstitusi',
    alamat_institusi = '$AlamatInstitusi'
    WHERE id_register = '$id_user' ";
    $result1 = mysqli_query($connect, $query1);

    $query2 = "UPDATE user_register SET  
    email = '$Email'
    WHERE id = '$id_user' ";
    $result2 = mysqli_query($connect, $query2);
    if ($result1 && $result2) {
        header("Location:/perpustakaan/php/?hal=detail_anggota_member&id_register=$id_user");
        exit;
    } else {
        $response["success"] = 'false';
    }
    echo json_encode($response);
    exit;
}
