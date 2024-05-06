<?php
include('config.php');

$id_user = $_POST['id_user'];
$NoIdentitas = $_POST['NoIdentitas'];
$Nama = $_POST['Nama'];
$Jenkel = $_POST['Jenkel'];
$Ttl = $_POST['Ttl'];
$Email = $_POST['Email'];
$AlamatIdentitas = $_POST['AlamatIdentitas'];
$AlamatSekarang = $_POST['AlamatSekarang'];
$Nohp = $_POST['Nohp'];
$Pekerjaan = $_POST['Pekerjaan'];
$NamaInstitusi = $_POST['NamaInstitusi'];
$AlamatInstitusi = $_POST['AlamatInstitusi'];

if (empty($id_user) || empty($NoIdentitas) || empty($Nama) || empty($Jenkel) || empty($Ttl) || empty($Email) || empty($Email) || empty($AlamatIdentitas) || empty($AlamatSekarang) || empty($Nohp) || empty($Pekerjaan) || empty($NamaInstitusi) || empty($AlamatInstitusi)) {
    echo "Mohon lengkapi semua kolom!";
} else {
    $query1 = "UPDATE user_member SET  
    no_identitas = '$NoIdentitas',
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
        $response["success"] = 'true';
    } else {
        $response["success"] = 'false';
    }
    echo json_encode($response);
    exit;
}