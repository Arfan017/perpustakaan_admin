<?php
include("config.php");

$id_register = $_POST["id_user"];

if (isset($id_register)) {
    $query = "SELECT user_member.*, user_register.email FROM user_register JOIN user_member ON user_register.id = user_member.id_register WHERE user_member.id_register = '$id_register';";
    $result = mysqli_query($connect, $query);

    $DataUser = array();

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        $nomember = str_pad($row["no_member"], 5, '0', STR_PAD_LEFT);
        $DataUser["success"] = true;
        $DataUser["no_member"] = $nomember;
        $DataUser["nama"] = $row["nama"];
        $DataUser["jenkel"] = $row["jenkel"];
        $DataUser["no_hp"] = $row["no_hp"];
        $DataUser["pekerjaan"] = $row["pekerjaan"];
        $DataUser["email"] = $row["email"];
        $DataUser["alamat"] = $row["alamat1"];
        $DataUser["ttgl_lahir"] = $row["ttgl_lahir"];
    }
    echo json_encode($DataUser);
    exit;
}