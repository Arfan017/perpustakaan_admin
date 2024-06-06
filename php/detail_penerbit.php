<?php
include("query/config.php");

$id_penerbit = $_GET["id_penerbit"];
$data;

if (isset($id_penerbit)) {
    $query = "SELECT * FROM tb_penerbit WHERE id_penerbit = $id_penerbit";
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
                    <h1><?= $data['nama_penerbit'] ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Penerbit</li>
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
                                <li class="nav-item"><a class="nav-link active" href="#Detail" data-toggle="tab">Tentang Penerbit</a></li>
                                <li class="nav-item"><a class="nav-link" href="#Edit" data-toggle="tab">Edit</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="Detail">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="id_penerbit">Kode Penerbit</label>
                                            <input name="id_penerbit" type="text" class="form-control" id="id_penerbit" placeholder="Penerbit" value="<?= $data['id_penerbit'] ?>" disabled>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="nama_penerbit">Nama Penerbit</label>
                                            <input name="nama_penerbit" type="text" class="form-control" id="nama_penerbit" placeholder="Penerbit" value="<?= $data['nama_penerbit'] ?>" disabled>
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
                                    <form action="php/query/editpenerbit.php" method="POST">
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="id_penerbit">Kode Penerbit</label>
                                                <input name="id_penerbit" type="text" class="form-control" id="id_penerbit" placeholder="Penerbit" value="<?= $data['id_penerbit'] ?>" required>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="nama_penerbit">Nama Penerbit</label>
                                                <input name="nama_penerbit" type="text" class="form-control" id="nama_penerbit" placeholder="Penerbit" value="<?= $data['nama_penerbit'] ?>" required>
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