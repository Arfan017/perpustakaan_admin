<?php
include("query/config.php");

$id_penulis = $_GET["id_penulis"];
$data;

if (isset($id_penulis)) {
    $query = "SELECT * FROM tb_penulis WHERE id_penulis = $id_penulis";
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
                    <h1><?= $data['nama_penulis'] ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Penulis</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">

                                <img style="height: 400px;" class=" img-fluid" src="/perpustakaan/dist/img/boxed-bg.jpg" alt="User profile picture">
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
                                <li class="nav-item"><a class="nav-link active" href="#Detail" data-toggle="tab">Tentang Penulis</a></li>
                                <li class="nav-item"><a class="nav-link" href="#Edit" data-toggle="tab">Edit</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="Detail">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="kd_penulis">Kode Penulis</label>
                                            <input name="kd_penulis" type="text" class="form-control" id="kd_penulis" placeholder="Penulis" value="<?= $data['id_penulis'] ?>" disabled>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="nama_penulis">Nama Penulis</label>
                                            <input name="nama_penulis" type="text" class="form-control" id="nama_penulis" placeholder="Penerbit" value="<?= $data['nama_penulis'] ?>" disabled>
                                        </div>
                                        <!-- </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="penulis">Penulis</label>
                                            <input name="penulis" type="text" class="form-control" id="penulis" placeholder="Penulis" value="<?= $data['penulis'] ?>" disabled>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="penerbit">Penerbit</label>
                                            <input name="penerbit" type="text" class="form-control" id="penerbit" placeholder="Penerbit" value="<?= $data['penerbit'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nisn_isbn">NISN/ISBN</label>
                                            <input name="nisn_isbn" type="text" class="form-control" id="nisn_isbn" placeholder="NISN/ISBN" value="<?= $data['nisn/isbn'] ?>" disabled>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="tahun_terbit">Tahun Terbit</label>
                                            <input name="tahun_terbit" type="date" class="form-control" id="tahun_terbit" placeholder="Tahun Terbit" value="<?= $data['tahun_terbit'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="jumlah_hal">Jumlah halaman</label>
                                            <input name="jumlah_hal" type="text" class="form-control" id="jumlah_hal" placeholder="Jumlah halaman" value="<?= $data['halaman_buku'] ?>" disabled>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="rak_buku">Rak Buku</label>
                                            <input name="rak_buku" type="text" class="form-control" id="rak_buku" placeholder="Rak Buku" value="<?= $data['rak_buku'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="stok_buku">Stok Buku</label>
                                            <input name="stok_buku" type="text" class="form-control" id="stok_buku" placeholder="Stok Buku" value="<?= $data['stok'] ?>" disabled>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Tentang Buku</label>
                                                <textarea name="tentang_buku" class="form-control" rows="3" placeholder="Enter ..." style="height: 90px;" value="" disabled><?= $data['tentang'] ?></textarea>
                                            </div>
                                        </div>
                                    </div> -->
                                    </div>


                                    <!-- /.tab-pane -->
                                </div>
                                <div class="tab-pane" id="Edit">
                                    <form action="php/query/editpenulis.php" method="POST">
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="id_penulis">Kode Penulis</label>
                                                <input name="id_penulis" type="text" class="form-control" id="id_penulis" placeholder="Penulis" value="<?= $data['id_penulis'] ?>" required>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="nama_penulis">Nama Penulis</label>
                                                <input name="nama_penulis" type="text" class="form-control" id="nama_penulis" placeholder="Penerbit" value="<?= $data['nama_penulis'] ?>" required>
                                            </div>
                                            <!-- </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="penulis">Penulis</label>
                                                    <input name="penulis" type="text" class="form-control" id="penulis" placeholder="Penulis" value="<?= $data['penulis'] ?>" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="penerbit">Penerbit</label>
                                                    <input name="penerbit" type="text" class="form-control" id="penerbit" placeholder="Penerbit" value="<?= $data['penerbit'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="nisn_isbn">NISN/ISBN</label>
                                                    <input name="nisn_isbn" type="text" class="form-control" id="nisn_isbn" placeholder="NISN/ISBN" value="<?= $data['nisn/isbn'] ?>" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="tahun_terbit">Tahun Terbit</label>
                                                    <input name="tahun_terbit" type="date" class="form-control" id="tahun_terbit" placeholder="Tahun Terbit" value="<?= $data['tahun_terbit'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="jumlah_hal">Jumlah halaman</label>
                                                    <input name="jumlah_hal" type="text" class="form-control" id="jumlah_hal" placeholder="Jumlah halaman" value="<?= $data['halaman_buku'] ?>" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="rak_buku">Rak Buku</label>
                                                    <input name="rak_buku" type="text" class="form-control" id="rak_buku" placeholder="Rak Buku" value="<?= $data['rak_buku'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="stok_buku">Stok Buku</label>
                                                    <input name="stok_buku" type="text" class="form-control" id="stok_buku" placeholder="Stok Buku" value="<?= $data['stok'] ?>" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="gambar_buku">Gambar(Cover) Buku</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="gambar_buku" required>
                                                            <label name="gambar_buku" class="custom-file-label" for="gambar_buku">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Tentang Buku</label>
                                                        <textarea name="tentang_buku" class="form-control" rows="3" placeholder="Enter ..." style="height: 90px;" required><?= $data['tentang'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <a>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </a>

                                    </form>
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