<?php
include("config.php");

function generateNoMember($i): string
{
    $IdMember = sprintf("%05d", $i + 1);
    return $IdMember;
}

$id = $_POST["id"];
$noidentitas = $_POST["noidentitas"];
$nama = $_POST["nama"];
$jeniskelamin = $_POST["jeniskelamin"];
$ttgllahir = $_POST["ttgllahir"];
$alamat1 = $_POST["alamat1"];
$alamat2 = $_POST["alamat2"];
$notelp = $_POST["notelp"];
$pekerjaan = $_POST["pekerjaan"];
$namatinstitusi = $_POST["namatinstitusi"];
$alamatinstitusi = $_POST["alamatinstitusi"];

if (empty($id) || empty($noidentitas) || empty($nama) || empty($jeniskelamin) || empty($ttgllahir) || empty($alamat1) || empty($alamat2) || empty($notelp) || empty($namatinstitusi) || empty($alamatinstitusi)) {
    $response["message"] = "Tidak ada data yang dikirim";
    $response["success"] = false;
} else {
    $query = "SELECT * FROM user_register WHERE id = $id";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) === 1) {
        $query = "SELECT COUNT(*) AS total_member FROM user_member";
        $result = mysqli_query($connect, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $nomember = generateNoMember($row['total_member']);
            $query = "INSERT INTO user_member 
(id_register, no_member, no_identitas, nama, jenkel, ttgl_lahir, alamat1, alamat2, no_hp, pekerjaan, nama_institusi ,alamat_institusi) VALUES ('$id', $nomember, '$noidentitas', '$nama', '$jeniskelamin', '$ttgllahir', '$alamat1', '$alamat2', '$notelp', '$pekerjaan', '$namatinstitusi', '$alamatinstitusi')";
            $result = mysqli_query($connect, $query);
            if ($result) {
                // $query = "UPDATE user_register SET status = '1' WHERE id = $id";
                // $result = mysqli_query($connect, $query);
                // if ($result) {
                $response["message"] = "anda berhasil daftar";
                $response["success"] = true;
                // } else {
                //     $response["message"] = "anda gagal daftar";
                //     $response["success"] = false;
                // }
            } else {
                $response["message"] = "anda gagal daftar(upload ke database)";
                $response["success"] = false;
            }
        } else {
            $response["message"] = "anda gagal daftar(gagal generate NoMember)";
            $response["success"] = false;
        }
    }
    echo json_encode($response);
    exit;
}
