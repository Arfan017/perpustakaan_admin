<?php
include("query/config.php");

$query = "SELECT * FROM tb_penerbit";
$result = mysqli_query($connect, $query);
$data;
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Penerbit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Penerbit</li>
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
                            <a href="?hal=tambah_penerbit">
                                <button type="button" class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Tambah Penerbit</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penerbit</th>
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
                                            <td><?= $data['nama_penerbit'] ?></td>
                                            <td class="text-center">
                                                <a href="?hal=detail_penerbit&id_penerbit=<?= $data['id_penerbit'] ?>">
                                                    <button type="button" class="btn btn-success">Detail</button>
                                                </a>
                                                <a class="btn_delete" href="php/query/deletepenerbit.php?id_penerbit=<?= $data['id_penerbit'] ?>">
                                                    <button type="button" class="btn btn-warning">Hapus</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penulis</th>
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