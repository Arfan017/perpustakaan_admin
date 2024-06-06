<?php
include("query/config.php");

$queryDataBuku = "SELECT COUNT(*) AS databuku FROM tb_buku;";
$resultQueryDataBuku = mysqli_query($connect, $queryDataBuku);
$rowDataBuku = mysqli_fetch_array($resultQueryDataBuku);

$queryDataPeminjaman = "SELECT COUNT(*) AS datapeminjam FROM tb_pinjam WHERE tb_pinjam.status = 'belum kembali';";
$resultDataPeminjaman = mysqli_query($connect, $queryDataPeminjaman);
$rowDataPeminjaman = mysqli_fetch_array($resultDataPeminjaman);

$queryDataMemberBaru = "SELECT COUNT(*) AS datamemberbaru FROM user_register JOIN user_member ON user_register.id = user_member.id_register WHERE user_register.status = '0';";
$resultDataMemberBaru = mysqli_query($connect, $queryDataMemberBaru);
$rowDataMemberBaru = mysqli_fetch_array($resultDataMemberBaru);

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $rowDataPeminjaman['datapeminjam'] ?></h3>

                            <p>Peminjaman Buku</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $rowDataBuku['databuku'] ?></h3>

                            <p>Koleksi Buku</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <a href="?hal=data_buku" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $rowDataMemberBaru['datamemberbaru'] ?></h3>


                            <p>Member baru</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="?hal=data_anggota_baru" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div>
    </section>
</div>