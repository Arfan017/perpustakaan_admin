<?php
include('config.php');

$id_member = $_POST['id_member'];
$Nama = $_POST['Nama'];
$Jenkel = $_POST['Jenkel'];
$TempatLahir = $_POST['TempatLahir'];
$TanggalLahir = $_POST['TanggalLahir'];
$Email = $_POST['Email'];
$AlamatIdentitas = $_POST['AlamatIdentitas'];
$AlamatSekarang = $_POST['AlamatSekarang'];
$Nohp = $_POST['Nohp'];
$Pekerjaan = $_POST['Pekerjaan'];
$NamaInstitusi = $_POST['NamaInstitusi'];
$AlamatInstitusi = $_POST['AlamatInstitusi'];

if (
    empty($id_member) || empty($Nama) || empty($Jenkel) || empty($TempatLahir) || empty($TanggalLahir) ||
    empty($Email) || empty($AlamatIdentitas) || empty($AlamatSekarang) || empty($Nohp) || empty($Pekerjaan) ||
    empty($NamaInstitusi) || empty($AlamatInstitusi)
) {

    $response["success"] = 'false';
    $response["message"] = 'terdapat data yang kosong';

    echo json_encode($response);
    exit;
} else {
    $query1 = "UPDATE tb_member SET 
    nama = '$Nama',
    jenkel = '$Jenkel',
    tempat_lahir = '$TempatLahir',
    tgl_lahir = '$TanggalLahir',
    email = '$Email',
    alamat1 = '$AlamatIdentitas',
    alamat2 = '$AlamatSekarang',
    no_hp = '$Nohp',
    pekerjaan = '$Pekerjaan',
    nama_institusi = '$NamaInstitusi',
    alamat_institusi = '$AlamatInstitusi'
    WHERE id_member = '$id_member' ";
    $result1 = mysqli_query($connect, $query1);

    if ($result1) {
        $response["success"] = 'true';
        $response["message"] = 'Berhasil perbaharui data diri';

    } else {
        $response["success"] = 'false';
        $response["message"] = 'Gagal perbaharui data diri';
    }

    echo json_encode($response);
    exit;
}
