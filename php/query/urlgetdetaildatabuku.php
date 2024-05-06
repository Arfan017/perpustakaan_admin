<?php
include('config.php');


$id_buku = $_POST['id_buku'];

if (isset($id_buku)) {
    $query = "SELECT * FROM tb_rating WHERE id_buku = '$id_buku' ";
    $result = mysqli_query($connect, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if (empty($row)) {
            $query = "SELECT tb_buku.*, tb_penerbit.nama_penerbit, tb_penulis.nama_penulis, tb_rak.nama_rak FROM tb_buku JOIN tb_penerbit ON tb_buku.penerbit = tb_penerbit.id_penerbit JOIN tb_penulis ON tb_buku.penulis = tb_penulis.id_penulis JOIN tb_rak ON tb_buku.id_rak = tb_rak.id_rak WHERE tb_buku.kd_buku = '$id_buku'";
            $result = mysqli_query($connect, $query);

            if ($result) {
                $row = mysqli_fetch_array($result);
                $data['success'] = true;
                $data['kd_buku'] = $row['kd_buku'];
                $data['nama_buku'] = $row['nama_buku'];
                $data['penulis'] = $row['nama_penulis'];
                $data['penerbit'] = $row['nama_penerbit'];
                $data['nisn_isbn'] = $row['nisn_isbn'];
                $data['tahun_terbit'] = $row['tahun_terbit'];
                $data['halaman_buku'] = $row['halaman_buku'];
                $data['nama_rak'] = $row['nama_rak'];
                $data['stok'] = $row['stok'];
                $data['tentang'] = $row['tentang'];
                $data['gambar_buku'] = $row['gambar_buku'];
                $data['rating'] = '-';
            }
        } else {
            $query = "SELECT tb_buku.*, tb_penerbit.nama_penerbit, tb_penulis.nama_penulis, ROUND(AVG(tb_rating.rating)) AS rating, tb_rak.nama_rak FROM tb_buku JOIN tb_penerbit ON tb_buku.penerbit = tb_penerbit.id_penerbit JOIN tb_penulis ON tb_buku.penulis = tb_penulis.id_penulis JOIN tb_rating ON tb_rating.id_buku = tb_buku.kd_buku JOIN tb_rak ON tb_buku.id_rak = tb_rak.id_rak WHERE tb_buku.kd_buku = '$id_buku'";
            $result = mysqli_query($connect, $query);

            if ($result) {
                $row = mysqli_fetch_array($result);
                $data['success'] = true;
                $data['kd_buku'] = $row['kd_buku'];
                $data['nama_buku'] = $row['nama_buku'];
                $data['penulis'] = $row['nama_penulis'];
                $data['penerbit'] = $row['nama_penerbit'];
                $data['nisn_isbn'] = $row['nisn_isbn'];
                $data['tahun_terbit'] = $row['tahun_terbit'];
                $data['halaman_buku'] = $row['halaman_buku'];
                $data['nama_rak'] = $row['nama_rak'];
                $data['stok'] = $row['stok'];
                $data['tentang'] = $row['tentang'];
                $data['gambar_buku'] = $row['gambar_buku'];
                $data['rating'] = $row['rating'];
            }
        }
    }

    echo json_encode($data);
    exit;
}