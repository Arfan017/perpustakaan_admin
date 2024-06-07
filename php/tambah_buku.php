<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Buku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Buku</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Buku Baru</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="query/addbuku.php" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="nama_buku">Nama Buku</label>
                                        <input name="nama_buku" type="text" class="form-control" id="nama_buku" placeholder="Nama Buku" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="penulis">Penulis</label>
                                        <select id="penulis" name="penulis" class="custom-select">
                                            <option value="-Pilih Penulis-"></option>
                                            <?php
                                            include("query/config.php");
                                            $query = "SELECT * FROM tb_penulis";
                                            $result = mysqli_query($connect, $query);

                                            while ($penulis = mysqli_fetch_array($result)) {
                                                echo " <option value='$penulis[id_penulis]'>$penulis[nama_penulis]</option>";
                                            }
                                            ?>
                                        </select>
                                        <!-- <input name="penulis" type="text" class="form-control" id="penulis" placeholder="Penulis" required> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="penerbit">Penerbit</label>
                                        <select id="penerbit" name="penerbit" class="custom-select">
                                            <option value="-Pilih Penerbit-"></option>
                                            <?php
                                            include("query/config.php");
                                            $query = "SELECT * FROM tb_penerbit";
                                            $result = mysqli_query($connect, $query);

                                            while ($penulis = mysqli_fetch_array($result)) {
                                                echo " <option value='$penulis[id_penerbit]'>$penulis[nama_penerbit]</option>";
                                            }
                                            ?>
                                        </select>
                                        <!-- <input name="penerbit" type="text" class="form-control" id="penerbit" placeholder="Penerbit" required> -->
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="nisn_isbn">NISN/ISBN</label>
                                        <input name="nisn_isbn" type="text" class="form-control" id="nisn_isbn" placeholder="NISN/ISBN" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="tahun_terbit">Tahun Terbit</label>
                                        <input name="tahun_terbit" type="date" class="form-control" id="tahun_terbit" placeholder="Tahun Terbit" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="jumlah_hal">Jumlah halaman</label>
                                        <input name="jumlah_hal" type="text" class="form-control" id="jumlah_hal" placeholder="Jumlah halaman" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="rak_buku">Rak Buku</label>
                                        <select id="rak_buku" name="rak_buku" class="custom-select">
                                            <option value="-Pilih rak_buku-"></option>
                                            <?php
                                            include("query/config.php");
                                            $query = "SELECT * FROM tb_rak";
                                            $result = mysqli_query($connect, $query);

                                            while ($penulis = mysqli_fetch_array($result)) {
                                                echo " <option value='$penulis[id_rak]'>$penulis[nama_rak]</option>";
                                            }
                                            ?>
                                        </select>
                                        <!-- <input name="rak_buku" type="text" class="form-control" id="rak_buku" placeholder="Rak Buku" required> -->
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="stok_buku">Stok Buku</label>
                                        <input name="stok_buku" type="text" class="form-control" id="stok_buku" placeholder="Stok Buku" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tentang Buku</label>
                                            <textarea name="tentang_buku" class="form-control" rows="3" placeholder="Enter ..." style="height: 90px;" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="gambar_buku">Gambar(Cover) Buku</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="gambar_buku" onchange="displayFileName()" name="gambar_buku" required>
                                                <label name="gambar_buku" class="custom-file-label" for="gambar_buku">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tambah Buku</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>