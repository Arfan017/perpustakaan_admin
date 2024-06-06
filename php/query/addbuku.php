<?php
include('config.php');

// Foto buku
$foto = uniqid() . '_' . $_FILES['gambar_buku']['name'];
$lokasi = $_FILES['gambar_buku']['tmp_name'];
$tipefile = $_FILES['gambar_buku']['type'];
$ukuranfile = $_FILES['gambar_buku']['size'];

// data buku
$namabuku = $_POST['nama_buku'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$nisn = $_POST['nisn_isbn'];
$tahun = $_POST['tahun_terbit'];
$halaman = $_POST['jumlah_hal'];
$rak = $_POST['rak_buku'];
$stok = $_POST['stok_buku'];
$tentang = $_POST['tentang_buku'];

if (empty($namabuku) || empty($penulis) || empty($penerbit) || empty($nisn) || empty($tahun) || empty($halaman) || empty($rak) || empty($stok) || empty($tentang) || empty($foto)) {
    echo "Mohon lengkapi semua kolom!";
} else {
    if ($tipefile != "image/jpeg" and $tipefile != "image/jpg" and $tipefile != "image/png") {
        echo "Tipe file tidak di dukung!";
    } elseif ($ukuranfile > 1000000) {
        echo "Ukuran file terlalu besar (Lebig dari 1MB)!";
    } else {

        move_uploaded_file($lokasi, "../../images/images_buku/" . $foto);
        // Insert ke database

        $query = "INSERT INTO tb_buku (kd_buku, nama_buku, penulis, penerbit, `nisn_isbn`, tahun_terbit, halaman_buku, id_rak, stok, tentang, gambar_buku) 
    VALUES ('' ,'$namabuku' ,'$penulis', '$penerbit', '$nisn', '$tahun', '$halaman', '$rak', '$stok', '$tentang' , '$foto')";
        $result = mysqli_query($connect, $query);

        if ($result) {
            // Jika berhasil, pindahkan pengguna ke halaman lain
            header("Location:/perpustakaan/?hal=data_buku");
            exit;
        } else {
            // Jika gagal, tampilkan pesan error atau lakukan penanganan kesalahan lainnya
            echo "Gagal menyimpan data ke database.";
        }
    }

    echo json_encode($response);
    exit;
}
