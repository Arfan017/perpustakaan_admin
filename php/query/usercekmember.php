<?php
include("config.php");

$id_register = $_POST["id_user"];

if (isset($id_register)) {

    $query = "SELECT * FROM user_register WHERE id = '$id_register'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['status'] == 1) {
            $data["success"] = true;
            $data["statusmember"] = $row['status'];
        } else {
            $data["success"] = false;
        }
    }
    echo json_encode($data);
    exit;
}

