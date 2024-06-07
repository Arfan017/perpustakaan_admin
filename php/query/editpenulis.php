<?php
include('config.php');

$id_penulis = $_POST["id_penulis"];
$namapenulis = $_POST['nama_penulis'];

if (empty($namapenulis)) {
    echo "Mohon lengkapi semua kolom!";
} else {
    $query = "UPDATE tb_penulis SET  
    nama_penulis = '$namapenulis' 
    WHERE id_penulis = '$id_penulis' ";
    $result = mysqli_query($connect, $query);

    if ($result) {
        // Jika berhasil, pindahkan pengguna ke halaman lain
        header("Location:/perpustakaan/php/?hal=data_penulis");
        exit;
    } else {
        // Jika gagal, tampilkan pesan error atau lakukan penanganan kesalahan lainnya
        echo "Gagal menyimpan data ke database.";
    }
    echo json_encode($response);
    exit;
}
