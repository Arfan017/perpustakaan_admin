<?php
include("query/config.php");

$id_member = $_GET["id_member"];
$data;

if (isset($id_member)) {
    $query = "SELECT * FROM tb_member WHERE id_member = '$id_member' AND status_member = '0'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        $data = mysqli_fetch_array($result);
    }
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Profil Pendaftar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <!-- <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#biodata" data-toggle="tab">Biodata</a></li>
                                <li class="nav-item"><a class="nav-link" href="#peminjaman" data-toggle="tab">Peminjaman</a></li>
                                <li class="nav-item"><a class="nav-link" href="#riwayatpeminjaman" data-toggle="tab">Riwayat Peminjaman</a></li>
                            </ul>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="biodata">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="card card-primary card-outline">
                                                <div class="card-body box-profile">
                                                    <div class="text-center">
                                                        <img style="height: 400px;" class=" img-fluid" src="../images/images_profile/<?= $data['gambar'] ?>" alt="User profile picture">
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-header p-2">
                                                    <ul class="nav nav-pills">
                                                        <li class="nav-item"><a class="nav-link active" href="#Detail" data-toggle="tab">Tentang user</a></li>
                                                        <!-- <li class="nav-item"><a class="nav-link" href="#Edit" data-toggle="tab">Edit</a></li> -->
                                                    </ul>
                                                </div><!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="tab-content">
                                                        <div class="active tab-pane" id="Detail">
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="kd_buku">Nama Lengkap</label>
                                                                    <input type="text" class="form-control" id="kd_buku" placeholder="Penulis" value="<?= $data['nama'] ?>" disabled>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="nama_buku">Jenis Kelamin</label>
                                                                    <input type="text" class="form-control" id="nama_buku" placeholder="Penerbit" value="<?= $data['jenkel'] ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="penulis">Tempat tanggal Lahir</label>
                                                                    <input type="text" class="form-control" id="nama_buku" placeholder="Penerbit" value="<?= $data['tgl_lahir'] ?>" disabled>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="penerbit">Email</label>
                                                                    <input type="text" class="form-control" id="nama_buku" placeholder="Penerbit" value="<?= $data['email'] ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="nisn_isbn">Alamat(sesuai Kartu Identitas)</label>
                                                                    <input type="text" class="form-control" id="nisn_isbn" placeholder="NISN/ISBN" value="<?= $data['alamat1'] ?>" disabled>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="tahun_terbit">Alamat(saat ini)</label>
                                                                    <input type="text" class="form-control" id="tahun_terbit" placeholder="Tahun Terbit" value="<?= $data['alamat2'] ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="jumlah_hal">No HP</label>
                                                                    <input type="text" class="form-control" id="jumlah_hal" placeholder="Jumlah halaman" value="<?= $data['no_hp'] ?>" disabled>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="rak_buku">pekerjaan</label>
                                                                    <input type="text" class="form-control" id="jumlah_hal" placeholder="Jumlah halaman" value="<?= $data['pekerjaan'] ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="stok_buku">Nama Institusi</label>
                                                                    <input type="text" class="form-control" id="stok_buku" placeholder="Stok Buku" value="<?= $data['nama_institusi'] ?>" disabled>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label>Alamat Institusi</label>
                                                                        <input type="text" class="form-control" id="stok_buku" placeholder="Stok Buku" value="<?= $data['alamat_institusi'] ?>" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane" id="Edit">
                                                            <form action="query/editmember.php" method="POST">
                                                                <input name="id_user" type="hidden" class="form-control" id="id_user" placeholder="nama" value="<?= $data['id_member'] ?>">
                                                                <div class="row">
                                                                    <div class="form-group col-6">
                                                                        <label for="nama">Nama Lengkap</label>
                                                                        <input name="nama" type="text" class="form-control" id="nama" placeholder="nama" value="<?= $data['nama'] ?>">
                                                                    </div>
                                                                    <div class="form-group col-6">
                                                                        <label for="jenkel">Jenis Kelamin</label>
                                                                        <input name="jenkel" type="text" class="form-control" id="jenkel" placeholder="jenis Kelamin" value="<?= $data['jenkel'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-6">
                                                                        <label for="tgl_lahir">Tempat tanggal Lahir</label>
                                                                        <input name="tgl_lahir" type="text" class="form-control" id="tgl_lahir" placeholder="Tempat tanggal lahir" value="<?= $data['tgl_lahir'] ?>">
                                                                    </div>
                                                                    <div class="form-group col-6">
                                                                        <label for="email">Email</label>
                                                                        <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="<?= $data['email'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-6">
                                                                        <label for="alamat1">Alamat(sesuai Kartu Identitas)</label>
                                                                        <input name="alamat1" type="text" class="form-control" id="alamat1" placeholder="Alamat (sesuai Kartu Identitas)" value="<?= $data['alamat1'] ?>">
                                                                    </div>
                                                                    <div class="form-group col-6">
                                                                        <label for="alamat2">Alamat(saat ini)</label>
                                                                        <input name="alamat2" type="text" class="form-control" id="alamat2" placeholder="Alamat(saat ini)" value="<?= $data['alamat2'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-6">
                                                                        <label for="no_hp">No HP</label>
                                                                        <input name="no_hp" type="text" class="form-control" id="no_hp" placeholder="No Hp" value="<?= $data['no_hp'] ?>">
                                                                    </div>
                                                                    <div class="form-group col-6">
                                                                        <label for="pekerjaan">pekerjaan</label>
                                                                        <input name="pekerjaan" type="text" class="form-control" id="pekerjaan" placeholder="pekerjaan" value="<?= $data['pekerjaan'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-6">
                                                                        <label for="nama_institusi">Nama Institusi</label>
                                                                        <input name="nama_institusi" type="text" class="form-control" id="nama_institusi" placeholder="Nama Institusi" value="<?= $data['nama_institusi'] ?>">
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="alamat_institusi">Alamat Institusi</label>
                                                                            <input name="alamat_institusi" type="text" class="form-control" id="alamat_institusi" placeholder="Alamat Institusi" value="<?= $data['alamat_institusi'] ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a>
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </a>
                                                            </form>
                                                        </div>
                                                        <!-- /.tab-pane -->
                                                    </div>
                                                    <!-- /.tab-content -->
                                                </div><!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>

                                <div class="tab-pane" id="peminjaman">
                                    <?php
                                    $id_member = $data['id_member'];
                                    $datapinjam;

                                    $querypinjam = "SELECT tb_pinjam.*, tb_buku.nama_buku FROM tb_pinjam JOIN tb_buku ON tb_pinjam.nisn_isbn = tb_buku.nisn_isbn WHERE tb_pinjam.id_member = '$id_member' AND tb_pinjam.status = 'belum kembali';";
                                    $resultpinjam = mysqli_query($connect, $querypinjam);
                                    ?>

                                    <div class="card">
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">No</th>
                                                        <th>Nama Buku</th>
                                                        <th>Tanggal Ambil</th>
                                                        <th>Tanggal Kembali</th>
                                                        <th style="width: 40px">Label</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 0;
                                                    while ($datapinjam = mysqli_fetch_array($resultpinjam)) {
                                                        $i++;
                                                    ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $datapinjam['nama_buku'] ?></td>
                                                            <td><?= $datapinjam['tgl_pinjam'] ?></td>
                                                            <td><?= $datapinjam['tgl_kembali'] ?></td>
                                                            <td> <span class="badge bg-danger"><?= $datapinjam['status'] ?></span></td>
                                                            <!-- <td class="text-center">
                                                                <a href="?hal=detail_buku&kd_buku=<?= $data['kd_buku'] ?>">
                                                                    <button type="button" class="btn btn-success">Detail</button>
                                                                </a>
                                                                <a class="btn_delete" href="php/query/deletebuku.php?kd_buku=<?= $data['kd_buku'] ?>&gambar_buku=<?= $data['gambar_buku'] ?>">
                                                                    <button type="button" class="btn btn-warning">Hapus</button>
                                                                </a> -->
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="riwayatpeminjaman">
                                    <?php
                                    $id_member = $data['id_member'];
                                    $datariwayatpinjam;

                                    $queryriwayatpinjam = "SELECT tb_pinjam.*, tb_buku.nama_buku FROM tb_pinjam JOIN tb_buku ON tb_pinjam.nisn_isbn = tb_buku.nisn_isbn WHERE tb_pinjam.id_member = '$id_member' AND tb_pinjam.status = 'kembali'";
                                    $resultriwayatpinjam = mysqli_query($connect, $queryriwayatpinjam);
                                    // if ($resultpinjam) {
                                    //     $datapinjam = mysqli_fetch_array($resultpinjam);
                                    // }
                                    ?>

                                    <div class="card">
                                        <div class="card-body">
                                            <table id="example2" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">No</th>
                                                        <th>Nama Buku</th>
                                                        <th>Tanggal Ambil</th>
                                                        <th>Tanggal Kembali</th>
                                                        <th style="width: 40px">Label</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 0;
                                                    while ($datariwayatpinjam = mysqli_fetch_array($resultriwayatpinjam)) {
                                                        $i++;
                                                    ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $datariwayatpinjam['nama_buku'] ?></td>
                                                            <td><?= $datariwayatpinjam['tgl_pinjam'] ?></td>
                                                            <td><?= $datariwayatpinjam['tgl_kembali'] ?></td>
                                                            <td><span class="badge bg-success"><?= $datariwayatpinjam['status'] ?></span></td>
                                                            <!-- <td class="text-center">
                                                                <a href="?hal=detail_buku&kd_buku=<?= $data['kd_buku'] ?>">
                                                                    <button type="button" class="btn btn-success">Detail</button>
                                                                </a>
                                                                <a class="btn_delete" href="php/query/deletebuku.php?kd_buku=<?= $data['kd_buku'] ?>&gambar_buku=<?= $data['gambar_buku'] ?>">
                                                                    <button type="button" class="btn btn-warning">Hapus</button>
                                                                </a> -->
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>