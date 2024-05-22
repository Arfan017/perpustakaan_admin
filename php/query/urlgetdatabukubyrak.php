<?php
include('config.php');

$id_rak = $_POST['id_rak'];

$result;
if (isset($id_rak)) {
    if ($id_rak === "0") {
        $query = "SELECT * FROM tb_buku";
        $result = mysqli_query($connect, $query);
    } else {
        $query = "SELECT * FROM tb_buku WHERE id_rak = '$id_rak'";
        $result = mysqli_query($connect, $query);
    }

    if ($result) {
        $DataBuku = array();
        while ($row = mysqli_fetch_array($result)) {
            $data['kd_buku'] = $row['kd_buku'];
            $data['nama_buku'] = $row['nama_buku'];
            $data['penulis'] = $row['penulis'];
            $data['penerbit'] = $row['penerbit'];
            $data['nisn_isbn'] = $row['nisn_isbn'];
            $data['tahun_terbit'] = $row['tahun_terbit'];
            $data['halaman_buku'] = $row['halaman_buku'];
            $data['id_rak'] = $row['id_rak'];
            $data['stok'] = $row['stok'];
            $data['tentang'] = $row['tentang'];
            $data['gambar_buku'] = $row['gambar_buku'];
            $data['id_rating'] = null;
            array_push($DataBuku, $data);
        }
    }
    $json_data = json_encode($DataBuku);
    echo $json_data;
}

    // if ($id_rak === '1') {

    // } else {
    //     $query = "SELECT * FROM tb_buku";
    //     $result = mysqli_query($connect, $query);

    //     $DataBuku = array();
    //     while ($row = mysqli_fetch_array($result)) {
    //         $data['message'] = true;
    //         $data['kd_buku'] = $row['kd_buku'];
    //         $data['nama_buku'] = $row['nama_buku'];
    //         $data['penulis'] = $row['penulis'];
    //         $data['penerbit'] = $row['penerbit'];
    //         $data['nisn_isbn'] = $row['nisn_isbn'];
    //         $data['tahun_terbit'] = $row['tahun_terbit'];
    //         $data['halaman_buku'] = $row['halaman_buku'];
    //         $data['id_rak'] = $row['id_rak'];
    //         $data['stok'] = $row['stok'];
    //         $data['tentang'] = $row['tentang'];
    //         $data['gambar_buku'] = $row['gambar_buku'];
    //         $data['id_rating'] = null;
    //         array_push($DataBuku, $data);
    //     }
    // }