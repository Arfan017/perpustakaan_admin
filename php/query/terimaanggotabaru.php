<?php
include('config.php');
include('sendemail.php');

$id_member = $_GET['id_member'];
$emailuser = $_GET['emailuser'];
$nama = $_GET['nama'];

$html = "";

if (empty($id_member)) {
} else {
    $query = "UPDATE tb_member SET status_member = '1' WHERE id_member = '$id_member'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        header("Location:/perpustakaan/php/?hal=data_anggota_baru");
        kiriEmail(
            $emailuser,
            "Pendaftaran Member Baru Berhasil",
            "<html>
                <body style='margin: 0;'>
    <header style='background-color: aquamarine; padding: 10px;'>
        <center>
            <h1>Pendaftaran Member Baru Berhasil 🌟</h1>
            <b>PENDAFTARAN SEBAGAI MEMBER BARU DI PERPUSTAKAAN DAERAH KOTA SORONG TELAH BERHASIL.</b>
        </center>
    </header>
    <div style=' margin: auto; background-color: aquamarine; padding: 10px;'>
        <p>Hello👋 ----, Selamat🥳 bergabung di PERPUSTAKAAN DAERAH KOTA SORONG🏫📚🤩.</p>
        <p>Sekarang kaka ---- sudah bisa melakukan peminjaman buku secara online melalui Aplikasi PERDIKS (PERpustakaan DIgital
        Kota Sorong)</p>
    </div>

    <div style=' margin: auto; background-color: aquamarine; padding: 10px;'>
        <h4>YUK MENGENALI PROSEDUR DAN KETENTUAN PEMINJAMAN BUKU 📚:</h4>
        <b>🧾PROSEDUR PEMINJAMAN BUKU:</b>
        <p>- Ajukan peminjaman buku melalui Aplikasi PERDIKS📱<br>
            - Datang ke PERPUSTAKAAN DAERAH KOTA SORONG🏫📚🤩 untuk mengambil buku yang dipinjam </p>
        <br>
        <b>🧾KETENTUAN PEMINJAMAN BUKU:</b>
        <p> - Ajukan peminjaman buku melalui Aplikasi PERDIKS📱<br>
            - Datang ke PERPUSTAKAAN DAERAH KOTA SORONG🏫📚🤩 untuk mengambil buku yang dipinjam <br>
            - Peminjaman maksimal 2 buku selama 3 hari<br>
            - Mengembalikan buku tepat waktu<br>
            - Jika setelah 3 hari buku belum selesai dibaca, HARUS dibawa kembali untuk di perpanjang<br>
            - Terlambat mengembalikan buku dikenakan DENDA rp.1.000/hari<br>
            - Menghilangkan buku dikenakan DENDA senilai harga buku
            </p>

            <center> <b>😁Ayo temukan keajaiban dan pengetahuan yang tersembunyi di antara halaman-halaman buku📚! 🌟🤩<br>
            Ayo Mulailah petualangan membaca dan biarkan imajinasi Anda melayang bebas!🌟</b></center>
    </div>
</body>
            </html>"
        );
        exit;
    }
}
