<?php

$halaman = array(
    "dashboard", 
    "data_buku", "tambah_buku", "detail_buku", 
    "data_penulis", "tambah_penulis", "detail_penulis",
    "data_penerbit", "tambah_penerbit", "detail_penerbit",
    "data_anggota_lama", "data_anggota_baru", "detail_anggota_member", 
    "data_peminjaman"
);

if (isset($_GET['hal'])) {
    $hal = $_GET['hal'];
} else {
    $hal = "dashboard";
}

foreach ($halaman as $h) {
    if ($hal == $h) {
        include "php/$h.php";
        break;
    }
}
