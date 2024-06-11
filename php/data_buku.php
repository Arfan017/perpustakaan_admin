<?php
include("query/config.php");

$query = "SELECT * FROM tb_buku";
$result = mysqli_query($connect, $query);
$data;
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Koleksi Buku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Koleksi Buku</li>
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
                                        <th>Nama Buku</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>NISN/ISBN</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($data = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td><?= $data['nama_buku'] ?></td>
                                            <td><?= $data['penulis'] ?></td>
                                            <td><?= $data['penerbit'] ?></td>
                                            <td><?= $data['nisn_isbn'] ?></td>
                                            <td><?= $data['stok'] ?></td>
                                            <td class="text-center">
                                                <a href="?hal=detail_buku&kd_buku=<?= $data['kd_buku'] ?>">
                                                    <button type="button" class="btn btn-success">Detail</button>
                                                </a>
                                                <a class="btn_delete" href="query/deletebuku.php?kd_buku=<?= $data['kd_buku'] ?>&gambar_buku=<?= $data['gambar_buku'] ?>">
                                                    <button type="button" class="btn btn-danger">Hapus</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama Buku</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>NISN/ISBN</th>
                                        <th>Stok</th>
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