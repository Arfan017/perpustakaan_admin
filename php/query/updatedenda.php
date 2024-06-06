1. denda per hari = 1000;
2. hitung jumlah hari terlambat mengembalikan buku,
3. hitung jumlah denda berdasarkan jumlah hari terlambat
4. update data

<?php

date_default_timezone_set('Asia/Jayapura');
date("Y-m-d");

// Koneksi ke database
include('config.php');

// Denda per hari
$denda_per_hari = 1000;

// Query untuk mengambil data peminjaman yang terlambat
$query = "SELECT * FROM tb_pinjam WHERE CURDATE() > tgl_kembali AND status = 'belum kembali'";
$result = mysqli_query($connect, $query);

// Looping melalui data peminjaman yang terlambat
while ($row = mysqli_fetch_assoc($result)) {

    // Ambil data dari database
    $id_peminjaman = $row['id'];
    $tgl_kembali = $row['tgl_kembali'];
    $tgl_pengembalian = date('Y-m-d');

    // Hitung jumlah hari terlambat
    $selisih_hari = strtotime($tgl_pengembalian) - strtotime($tgl_kembali);
    $jumlah_hari_terlambat = floor($selisih_hari / (60 * 60 * 24));

    // Hitung jumlah denda
    $jumlah_denda = $jumlah_hari_terlambat * $denda_per_hari;

    // Update data denda
    $sql_update = "UPDATE tb_pinjam SET denda = '$jumlah_denda', status = 'kembali' WHERE id = '$id_peminjaman'";
    mysqli_query($connect, $sql_update);

    if (mysqli_affected_rows($connect) > 0) {
        echo "Data denda berhasil diupdate untuk peminjaman dengan ID: " . $id_peminjaman . "\n";
    } else {
        echo "Gagal mengupdate data denda untuk peminjaman dengan ID: " . $id_peminjaman;
    }
}

// Tutup koneksi
$connect->close();

// Tampilkan pesan
echo "Data denda berhasil diupdate untuk semua peminjaman yang terlambat.";

?>

