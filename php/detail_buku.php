<?php
include("query/config.php");

$kd_buku = $_GET["kd_buku"];
$data;

if (isset($kd_buku)) {
    $query = "SELECT * FROM tb_buku WHERE kd_buku = $kd_buku";
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
                    <h1><?= $data['nama_buku'] ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Buku</li>
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
                                <img style="height: 400px;" class=" img-fluid" src="http://localhost/perpustakaan/images/images_buku/<?= $data['gambar_buku'] ?>" alt="User profile picture">
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
                                <li class="nav-item"><a class="nav-link active" href="#Detail" data-toggle="tab">Tentang Buku</a></li>
                                <li class="nav-item"><a class="nav-link" href="#Edit" data-toggle="tab">Edit</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="Detail">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="kd_buku">Kode Buku</label>
                                            <input type="text" class="form-control" id="kd_buku" placeholder="Penulis" value="<?= $data['kd_buku'] ?>" disabled>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="nama_buku">Nama Buku</label>
                                            <input type="text" class="form-control" id="nama_buku" placeholder="Penerbit" value="<?= $data['nama_buku'] ?>" disabled>
                                        </div>
                                    </div> `
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="penulis">Penulis</label>
                                            <select id="penulis" class="custom-select" disabled>
                                                <option value="-Pilih Penulis-"></option>
                                                <?php
                                                include("/xampp/htdocs/perpustakaan/php/query/config.php");
                                                $query = "SELECT * FROM tb_penulis";
                                                $result = mysqli_query($connect, $query);
                                                while ($penulis = mysqli_fetch_array($result)) {
                                                    echo "<option value='$penulis[id_penulis]'";
                                                    if ($penulis['id_penulis'] == $data['penulis'])
                                                        echo "selected";
                                                    echo ">$penulis[nama_penulis] </option>";
                                                    // >$penulis[nama_penerbit]</option>"
                                                }
                                                ?>
                                            </select>
                                            <!-- <input name="penulis" type="text" class="form-control" id="penulis" placeholder="Penulis" value="<?= $data['penulis'] ?>" disabled> -->
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="penerbit">Penerbit</label>
                                            <select id="penerbit" class="custom-select" disabled>
                                                <option value="-Pilih Penerbit-"></option>
                                                <?php
                                                include("/xampp/htdocs/perpustakaan/php/query/config.php");
                                                $query = "SELECT * FROM tb_penerbit";
                                                $result = mysqli_query($connect, $query);
                                                while ($penerbit = mysqli_fetch_array($result)) {
                                                    echo "<option value='$penerbit[id_penerbit]'";
                                                    if ($penerbit['id_penerbit'] == $data['penerbit'])
                                                        echo "selected";
                                                    echo ">$penerbit[nama_penerbit] </option>";
                                                    // >$penulis[nama_penerbit]</option>"
                                                }
                                                ?>
                                            </select>
                                            <!-- <input name="penerbit" type="text" class="form-control" id="penerbit" placeholder="Penerbit" value="<?= $data['penerbit'] ?>" disabled> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nisn_isbn">NISN/ISBN</label>
                                            <input type="text" class="form-control" id="nisn_isbn" placeholder="NISN/ISBN" value="<?= $data['nisn_isbn'] ?>" disabled>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="tahun_terbit">Tahun Terbit</label>
                                            <input type="date" class="form-control" id="tahun_terbit" placeholder="Tahun Terbit" value="<?= $data['tahun_terbit'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="jumlah_hal">Jumlah halaman</label>
                                            <input type="text" class="form-control" id="jumlah_hal" placeholder="Jumlah halaman" value="<?= $data['halaman_buku'] ?>" disabled>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="rak_buku">Rak Buku</label>
                                            <select id="rak_buku" class="custom-select" disabled>
                                                <option value="-Pilih Rak_Buku-"></option>
                                                <?php
                                                include("/xampp/htdocs/perpustakaan/php/query/config.php");
                                                $query = "SELECT * FROM tb_rak";
                                                $result = mysqli_query($connect, $query);
                                                while ($rak_buku = mysqli_fetch_array($result)) {
                                                    echo "<option value='$rak_buku[id_rak]'";
                                                    if ($rak_buku['id_rak'] == $data['id_rak'])
                                                        echo "selected";
                                                    echo ">$rak_buku[nama_rak] </option>";
                                                    // >$penulis[nama_penerbit]</option>"
                                                }
                                                ?>
                                            </select>
                                            <!-- <input name="rak_buku" type="text" class="form-control" id="rak_buku" placeholder="Rak Buku" value="<?= $data['id_rak'] ?>" disabled> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="stok_buku">Stok Buku</label>
                                            <input type="text" class="form-control" id="stok_buku" placeholder="Stok Buku" value="<?= $data['stok'] ?>" disabled>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Tentang Buku</label>
                                                <textarea class="form-control" rows="3" placeholder="Enter ..." style="height: 90px;" value="" disabled><?= $data['tentang'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="Edit">
                                    <form action="php/query/editbuku.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="kd_buku">Kode Buku</label>
                                                <input name="kd_buku" type="text" class="form-control" id="kd_buku" placeholder="Penulis" value="<?= $data['kd_buku'] ?>" required>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="nama_buku">Nama Buku</label>
                                                <input name="nama_buku" type="text" class="form-control" id="nama_buku" placeholder="Penerbit" value="<?= $data['nama_buku'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="penulis">Penulis</label>
                                                <select id="penulis" name="penulis" class="custom-select">
                                                    <option value="-Pilih penulis-"></option>
                                                    <?php
                                                    include("/xampp/htdocs/perpustakaan/php/query/config.php");
                                                    $query = "SELECT * FROM tb_penulis";
                                                    $result = mysqli_query($connect, $query);
                                                    while ($penulis = mysqli_fetch_array($result)) {
                                                        echo "<option value='$penulis[id_penulis]'";
                                                        if ($penulis['id_penulis'] == $data['penulis'])
                                                            echo "selected";
                                                        echo ">$penulis[nama_penulis] </option>";
                                                        // >$penulis[nama_penerbit]</option>"
                                                    }
                                                    ?>
                                                </select>
                                                <!-- <input name="penulis" type="text" class="form-control" id="penulis" placeholder="Penulis" value="<?= $data['penulis'] ?>" required> -->
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="penerbit">Penerbit</label>
                                                <select id="penerbit" name="penerbit" class="custom-select">
                                                    <option value="-Pilih penerbit-"></option>
                                                    <?php
                                                    include("/xampp/htdocs/perpustakaan/php/query/config.php");
                                                    $query = "SELECT * FROM tb_penerbit";
                                                    $result = mysqli_query($connect, $query);
                                                    while ($penerbit = mysqli_fetch_array($result)) {
                                                        echo "<option value='$penerbit[id_penerbit]'";
                                                        if ($penerbit['id_penerbit'] == $data['penerbit'])
                                                            echo "selected";
                                                        echo ">$penerbit[nama_penerbit] </option>";
                                                        // >$penulis[nama_penerbit]</option>"
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="nisn_isbn">NISN/ISBN</label>
                                                <input name="nisn_isbn" type="text" class="form-control" id="nisn_isbn" placeholder="NISN/ISBN" value="<?= $data['nisn_isbn'] ?>" required>
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
                                                <select id="rak_buku" name="rak_buku" class="custom-select">
                                                    <option value="-Pilih Rak_Buku-"></option>
                                                    <?php
                                                    include("/xampp/htdocs/perpustakaan/php/query/config.php");
                                                    $query = "SELECT * FROM tb_rak";
                                                    $result = mysqli_query($connect, $query);
                                                    while ($rak_buku = mysqli_fetch_array($result)) {
                                                        echo "<option value='$rak_buku[id_rak]'";
                                                        if ($rak_buku['id_rak'] == $data['id_rak'])
                                                            echo "selected";
                                                        echo ">$rak_buku[nama_rak] </option>";
                                                        // >$penulis[nama_penerbit]</option>"
                                                    }
                                                    ?>
                                                </select>
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
                                                        <input type="file" class="custom-file-input" name="gambar_buku" onchange="displayFileName()" id="gambar_buku" required>
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
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>