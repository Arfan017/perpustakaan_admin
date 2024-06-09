<?php
    function kiriEmail($kepada, $subjek, $pesan) {
        require_once('../../plugins/library-email/function.php');

        $to       = $kepada;
        $subject  = $subjek;
        $message  = $pesan;
        return smtp_mail($to, $subject, $message, '', '', 0, 0, true);

        /*
        jika menggunakan fungsi mail biasa : mail($to, $subject, $message);
        dapat juga menggunakan fungsi smtp secara dasar : smtp_mail($to, $subject, $message);
        jangan lupa melakukan konfigurasi pada file function.php
        */
   }

   $to = "arfankece06@gmail.com";
   $subjek = "Pendaftaran Member Baru Berhasil";
   $pesan = "<html>
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
            </html>";

    kiriEmail($to, $subjek, $pesan);
?>