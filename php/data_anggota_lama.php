<?php
include("query/config.php");

$query = "SELECT * FROM tb_member 
            JOIN tb_login ON tb_login.id_member = tb_member.id_member
            WHERE tb_member.status_member = '1';";

$result = mysqli_query($connect, $query);
$data;
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Anggota Member</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Anggota Member</li>
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
                        <!-- <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                            <a href="?hal=tambah_buku">
                                <button type="button" class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Tambah Buku</button>
                            </a>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No Member</th>
                                        <th>Nama</th>
                                        <th>Jenis kelamin</th>
                                        <th>Tempat Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>NoHp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($data = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td><?= $data['id_member'] ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['jenkel'] ?></td>
                                            <td><?= $data['tgl_lahir'] ?></td>
                                            <td><?= $data['alamat1'] ?></td>
                                            <td><?= $data['no_hp'] ?></td>
                                            <td class="text-center">
                                                <a href="?hal=detail_anggota_member&id_member=<?= $data['id_member'] ?>">
                                                    <button type="button" class="btn btn-success">Detail</button>
                                                </a>
                                                <a class="btn_delete" href="query/deleteanggota.php?id_member=<?= $data['id_member'] ?>">
                                                    <button type="button" class="btn btn-danger">Hapus</button>
                                                </a>
                                                <a href="cetak.php?id_member=<?= $data['id_member'] ?>">
                                                    <button type="button" class="btn btn-warning">Cetak</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No Member</th>
                                        <th>Nama</th>
                                        <th>Jenis kelamin</th>
                                        <th>Tempat Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>NoHp</th>
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