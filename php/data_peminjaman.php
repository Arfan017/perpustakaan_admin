<?php
include("query/config.php");

$query = "SELECT tb_pinjam.*, user_member.nama, tb_buku.nama_buku FROM user_member JOIN tb_pinjam ON tb_pinjam.no_member = user_member.id_register JOIN tb_buku ON tb_pinjam.id_buku = tb_buku.kd_buku;";
$result = mysqli_query($connect, $query);
$data;
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Peminjaman Buku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Peminjaman</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nama Buku</th>
                                        <th>Tanggal Ambil</th>
                                        <th>Tanggal kembali</th>
                                        <th>Status</th>
                                        <th>Denda</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    while ($data = mysqli_fetch_array($result)) {
                                        $i++;
                                        // untuk menghitung selisih hari terlambat
                                        $t = date_create($data['tgl_kembali']);
                                        $n = date_create(date('Y-m-d'));
                                        $terlambat = date_diff($t, $n);
                                        $hari = $terlambat->format("%a");

                                        // menghitung denda
                                        $denda = $hari * 1000;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['nama_buku'] ?></td>
                                            <td><?= $data['tgl_pinjam'] ?></td>
                                            <td><?= $data['tgl_kembali'] ?></td>
                                            <td><?= $data['status'] ?></td>
                                            <td><?= $denda ?></td>
                                            <td class="text-center">
                                                <a href="php/query/pengembalianbuku.php?id_buku=<?= $data['id_buku'] ?>&id_member=<?= $data['no_member'] ?>">
                                                    <button type="button" class="btn <?= ($data['status'] == 'kembali') ? 'btn-success' : 'btn-warning disable' ?>" <?= ($data['status'] == 'kembali') ? 'disabled' : '' ?>>kembali</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nama Buku</th>
                                        <th>Tanggal Ambil</th>
                                        <th>Tanggal kembali</th>
                                        <th>Status</th>
                                        <th>Denda</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>