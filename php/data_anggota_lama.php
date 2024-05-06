<?php


include("/xampp/htdocs/perpustakaan/php/query/config.php");
$query = "SELECT user_member.*, user_register.status FROM user_register JOIN user_member ON user_register.id = user_member.id_register WHERE user_register.status = '1';";
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
                        <div class="card-header">
                            <!-- <h3 class="card-title">DataTable with default features</h3> -->
                            <a href="?hal=tambah_buku">
                                <button type="button" class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Tambah Buku</button>
                            </a>
                        </div>
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
                                            <td><?= $data['no_member'] ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['jenkel'] ?></td>
                                            <td><?= $data['ttgl_lahir'] ?></td>
                                            <td><?= $data['alamat1'] ?></td>
                                            <td><?= $data['no_hp'] ?></td>
                                            <td class="text-center">
                                                <a href="?hal=detail_anggota_member&id_register=<?= $data['id_register'] ?>">
                                                    <button type="button" class="btn btn-success">Detail</button>
                                                </a>
                                                <a class="btn_delete" href="php/query/deleteanggota_lama.php?no_member=<?= $data['no_member'] ?>">
                                                    <button type="button" class="btn btn-warning">Hapus</button>
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