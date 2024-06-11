<?php
include("query/config.php");

$query = "SELECT tb_rating.*, tb_buku.kd_buku, tb_buku.nama_buku FROM tb_buku JOIN tb_rating ON tb_buku.kd_buku = tb_rating.id_buku;";
$result = mysqli_query($connect, $query);
$data;
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rating&Ulasan Buku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Rating&Ulasan Buku</li>
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
                            <a href="?hal=tambah_penerbit">
                                <button type="button" class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Tambah Penerbit</button>
                            </a>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Buku</th>
                                        <th>Ulasan</th>
                                        <th>Rating</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    while ($data = mysqli_fetch_array($result)) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data['nama_buku'] ?></td>
                                            <td><?= $data['ulasan'] ?></td>
                                            <td><?= $data['rating'] ?></td>
                                            <td class="text-center">
                                                <a class="btn_delete" href="query/deleterating.php?id_rating=<?= $data['id_rating'] ?>">
                                                    <button type="button" class="btn btn-danger">Hapus</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Buku</th>
                                        <th>Ulasan</th>
                                        <th>Rating</th>
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