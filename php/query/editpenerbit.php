<?php
include('config.php');

$id_penerbit = $_POST["id_penerbit"];
$namapenerbit = $_POST['nama_penerbit'];

if (empty($namapenerbit)) {
    echo "Mohon lengkapi semua kolom!";
} else {
    $query = "UPDATE tb_penerbit SET  
    nama_penerbit = '$namapenerbit' 
    WHERE id_penerbit = '$id_penerbit' ";
    $result = mysqli_query($connect, $query);

    if ($result) {
        // Jika berhasil, pindahkan pengguna ke halaman lain
        header("Location:/perpustakaan/?hal=data_penerbit");
        exit;
    } else {
        // Jika gagal, tampilkan pesan error atau lakukan penanganan kesalahan lainnya
        echo "Gagal menyimpan data ke database.";
    }
    echo json_encode($response);
    exit;
}
