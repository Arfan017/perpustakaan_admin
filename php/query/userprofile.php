<?php
include("config.php");

$id_member = $_POST["id_member"];

if (isset($id_member)) {
    $query = "SELECT * FROM tb_member WHERE id_member = '$id_member'";

    $result = mysqli_query($connect, $query);

    $DataUser = array();

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        $nomember = str_pad($row["id_member"], 5, '0', STR_PAD_LEFT);
        $DataUser["success"] = true;
        $DataUser["no_member"] = $nomember;
        $DataUser["nama"] = $row["nama"];
        $DataUser["jenkel"] = $row["jenkel"];
        $DataUser["no_hp"] = $row["no_hp"];
        $DataUser["pekerjaan"] = $row["pekerjaan"];
        $DataUser["email"] = $row["email"];
        $DataUser["alamat"] = $row["alamat1"];
        $DataUser["tgl_lahir"] = $row["tgl_lahir"];
        $DataUser["gambar"] = $row["gambar"];
    } else {
        $DataUser["success"] = false;
    }
    echo json_encode($DataUser);
    exit;
}
