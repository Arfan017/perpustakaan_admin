<?php
include('config.php');

// Foto buku
$foto = uniqid() . '_' . $_FILES['gambar_buku']['name'];
$lokasi = $_FILES['gambar_buku']['tmp_name'];
$tipefile = $_FILES['gambar_buku']['type'];
$ukuranfile = $_FILES['gambar_buku']['size'];

$kd_buku = $_POST["kd_buku"];
$namabuku = $_POST['nama_buku'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$nisn = $_POST['nisn_isbn'];
$tahun = $_POST['tahun_terbit'];
$halaman = $_POST['jumlah_hal'];
$rak = $_POST['rak_buku'];
$stok = $_POST['stok_buku'];
$tentang = $_POST['tentang_buku'];

if (empty($namabuku)){
    echo "Mohon lengkapi kolom namabuku!";
} elseif (empty($penulis)){
    echo "Mohon lengkapi kolom penulis!";
} elseif (empty($penerbit)){
    echo "Mohon lengkapi kolom penerbit!";
} elseif (empty($nisn)){
    echo "Mohon lengkapi kolom nisn!";
} elseif (empty($tahun)){
    echo "Mohon lengkapi kolom tahun!";
} elseif (empty($halaman)){
    echo "Mohon lengkapi kolom halaman!";
} elseif (empty($rak)){
    echo "Mohon lengkapi kolom rak!";
} elseif (empty($stok)){
    echo "Mohon lengkapi kolom stok!";
} elseif (empty($tentang)) {
    echo "Mohon lengkapi kolom tentang!";
} else {
    $query = "SELECT * FROM tb_buku WHERE kd_buku = $kd_buku";
    $result = mysqli_query($connect, $query);
    if ($result) {
        
        $data = mysqli_fetch_array($result);
        if (file_exists("../../images/images_buku/" . $data["gambar_buku"])) {
            unlink("../../images/images_buku/" . $data["gambar_buku"]);
            move_uploaded_file($lokasi, "../../images/images_buku/" . $foto);
            $query = "UPDATE tb_buku SET  
            nama_buku = '$namabuku', 
            penulis = '$penulis', 
            penerbit = '$penerbit', 
            `nisn_isbn` = '$nisn', 
            tahun_terbit = '$tahun', 
            halaman_buku = '$halaman', 
            id_rak = '$rak',
            stok = '$stok', 
            tentang = '$tentang' ,
            gambar_buku = '$foto'
            WHERE kd_buku = '$kd_buku' ";
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
        else {
            move_uploaded_file($lokasi, "../../images/images_buku/" . $foto);
            $query = "UPDATE tb_buku SET  
            nama_buku = '$namabuku', 
            penulis = '$penulis', 
            penerbit = '$penerbit', 
            `nisn_isbn` = '$nisn', 
            tahun_terbit = '$tahun', 
            halaman_buku = '$halaman', 
            id_rak = '$rak',
            stok = '$stok', 
            tentang = '$tentang' ,
            gambar_buku = '$foto'
            WHERE kd_buku = '$kd_buku' ";
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
    }
    echo mysqli_error($connect);
    exit;
}