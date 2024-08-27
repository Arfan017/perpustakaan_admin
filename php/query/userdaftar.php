<?php
include("config.php");

function generateNoMember($i): string
{
    $IdMember = sprintf("%05d", $i + 1);
    return $IdMember;
}

$kartuidentitas = $_POST["kartuidentitas"];
$noidentitas = $_POST["noidentitas"];
$nama = $_POST["nama"];
$jeniskelamin = $_POST["jeniskelamin"];
$tempatlahir = $_POST["tempatlahir"];
$tgllahir = $_POST["tgllahir"];
$alamat1 = $_POST["alamat1"];
$alamat2 = $_POST["alamat2"];
$notelp = $_POST["notelp"];
$pekerjaan = $_POST["pekerjaan"];
$namatinstitusi = $_POST["namatinstitusi"];
$alamatinstitusi = $_POST["alamatinstitusi"];
$image = $_POST["gambar"];
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];

$passwordhash = password_hash($password, PASSWORD_DEFAULT);

$path_image = "../../images/images_profile/";
$imageStore = rand() . "-" . time() . ".jpeg";
$target_path = $path_image . "/" . $imageStore;
file_put_contents($target_path, base64_decode($image));

if (
    empty($kartuidentitas) || empty($noidentitas) || empty($nama) || empty($jeniskelamin) || empty($tempatlahir) ||
    empty($tgllahir) || empty($alamat1) || empty($alamat2) || empty($notelp) || empty($namatinstitusi) || empty($alamatinstitusi) ||
    empty($image) || empty($username) || empty($password) || empty($email)
) {
    $response["message"] = "Tidak ada data yang dikirim";
    $response["success"] = false;
    echo json_encode($response);
    exit;
} else {

    $querycekemail = "SELECT COUNT(*) FROM tb_member WHERE email = '$email'";
    if ($querycekemail > 0) {
        $response["success"] = false;
        $response["message"] = "email yang anda gunakan sudah pernah terdaftar";
    } else {
        $query1 = "INSERT INTO tb_member (kartu_identitas, no_identitas, nama, jenkel, tempat_lahir, tgl_lahir, alamat1, alamat2, no_hp, pekerjaan, nama_institusi ,alamat_institusi, email, gambar, status_member) VALUES 
                                    ('$kartuidentitas', '$noidentitas', '$nama', '$jeniskelamin', '$tempatlahir', '$tgllahir', '$alamat1', '$alamat2', '$notelp', '$pekerjaan', '$namatinstitusi', '$alamatinstitusi', '$email', '$imageStore', '2')";
        $result1 = mysqli_query($connect, $query1);

        $query2 = "INSERT INTO tb_login (id_member, username, password) VALUES (' ', '$username', '$passwordhash')";
        $result2 = mysqli_query($connect, $query2);

        if ($result1 && $result2) {
            $response["message"] = "anda berhasil daftar";
            $response["success"] = true;
        } else {
            $response["message"] = "anda gagal daftar(upload ke database)";
            $response["success"] = false;
        }
    }

    echo json_encode($response);
    exit;
}
