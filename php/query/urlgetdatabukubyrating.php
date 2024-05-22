<?php
include('config.php');

$rating = $_POST['rating'];

if (isset($rating)) {
    if ($rating === '1') {
        $query = "SELECT tb_buku.*, tb_penerbit.nama_penerbit, ROUND(AVG(tb_rating.rating)) AS rata_rata_rating FROM tb_rating JOIN tb_buku ON tb_rating.id_buku = tb_buku.kd_buku JOIN tb_penerbit ON tb_penerbit.id_penerbit = tb_buku.penerbit GROUP BY tb_buku.kd_buku HAVING ROUND(AVG(tb_rating.rating)) >= 3;";
        $result = mysqli_query($connect, $query);
        // SELECT * FROM tb_buku WHERE id_rating >= 6

        $DataBuku = array();
        while ($row = mysqli_fetch_array($result)) {
            $data['kd_buku'] = $row['kd_buku'];
            $data['nama_buku'] = $row['nama_buku'];
            $data['penulis'] = $row['penulis'];
            $data['penerbit'] = $row['nama_penerbit'];
            $data['nisn_isbn'] = $row['nisn_isbn'];
            $data['tahun_terbit'] = $row['tahun_terbit'];
            $data['halaman_buku'] = $row['halaman_buku'];
            $data['id_rak'] = $row['id_rak'];
            $data['stok'] = $row['stok'];
            $data['tentang'] = $row['tentang'];
            $data['gambar_buku'] = $row['gambar_buku'];
            $data['rating'] = $row['rata_rata_rating'];
            array_push($DataBuku, $data);
        }
    } else {
        $query = "SELECT * FROM tb_buku";
        $result = mysqli_query($connect, $query);

        $DataBuku = array();
        while ($row = mysqli_fetch_array($result)) {
            $data['message'] = true;
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

// $query = "SELECT * FROM tb_buku WHERE id_rating >= 6";
// $result = mysqli_query($connect, $query);

// // if ($result) {
// //     $row = mysqli_fetch_array($result);
// // }
// $DataBuku = array();
// while ($row = mysqli_fetch_array($result)) {
//     $data['kd_buku'] = $row['kd_buku'];
//     $data['nama_buku'] = $row['nama_buku'];
//     $data['penulis'] = $row['penulis'];
//     $data['penerbit'] = $row['penerbit'];
//     $data['nisn_isbn'] = $row['nisn_isbn'];
//     $data['tahun_terbit'] = $row['tahun_terbit'];
//     $data['halaman_buku'] = $row['halaman_buku'];
//     $data['id_rak'] = $row['id_rak'];
//     $data['stok'] = $row['stok'];
//     $data['tentang'] = $row['tentang'];
//     $data['gambar_buku'] = $row['gambar_buku'];
//     $data['id_rating'] = $row['id_rating'];
//     array_push($DataBuku, $data);
// }

// $json_data = json_encode($DataBuku);
// echo $json_data;
