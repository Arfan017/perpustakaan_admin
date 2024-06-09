<?php
include("query/config.php");
date_default_timezone_set('Asia/Jayapura');

$id_registrasi = $_GET['id_register'];
$data;

if (isset($id_registrasi)) {
  $query = "SELECT * FROM user_member WHERE id_register = '$id_registrasi'";
  $result = mysqli_query($connect, $query);
  if ($result) {
    $data = mysqli_fetch_array($result);
  }
} else {
  echo "Data id_registrasi Kosong";
}

function generateNoMember($i): string
{
  $IdMember = sprintf("%05d", $i + 1);
  return $IdMember;
}

require_once '../vendor/autoload.php';

$html = "
<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>

  <style>
    @font-face {
    font-family: 'MyFont';
    src: url('/dist/font/archivo-black/ArchivoBlack-Regular.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
  }

  h1,
  h2,
  h3,
  p {
      font-family: 'MyFont', sans-serif;
  }

  body,
  h2,
  h3,
  p {
      margin: 0px;
      padding: 0px;
  }

  .bg-sertif {
      background-color: #FFF;
      width: 1004px;
      height: 580px;
      background-image: url('http://localhost/perpustakaan/images/logo.png');
      background-size: cover;
      background-position: center;
      margin: auto;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
  }

  .overlay {
      position: static;
      width: 1004px;
      height: 580px;
      top: 0;
      left: 0;
      background-color: rgba(187, 213, 254, 0.4);
  }

  .body-sertif {
      /* box-sizing: border-box; */
      padding: 20px;
  }

  h1 {
      display: inline-block;
  }

  table{
      width: 100%;
      border-collapse: collapse;
  }

  .head {
      width: 100%;
      height: fit-content;
  }

  .txt-pekerjaan {
      width: fit-content;
      height: fit-content;
      margin: 0px;
      background-color: #392117;
      padding: 10px;
      color: #FFF;
      position: relative;
  }

  .kartu-anggota {
      color: #2B5430;
      word-wrap: break-word;
      text-align: end;
  }

  .bingkai-foto-1 {
      width: 202px;
      height: 256px;
      outline-style: solid;
      outline-color: #4284CC;
      position: relative;
  }

  .bingkai-foto-2 {
      box-sizing: border-box;
      width: 190px;
      height: 240px;
      outline-style: solid;
      outline-color: #4284CC;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      overflow: hidden;
  }

  .bingkai-foto-2 img {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      max-width: 100%; /* Agar gambar tidak melebihi bingkai */
      max-height: 100%; /* Agar gambar tidak melebihi bingkai */
  }

  .biodata {
      width: 500px;
  }

  .date {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 20px;
      margin-bottom: 20px;
  }

  .no-member-2 {
      background-color: #4284CC;
      padding: 10px;
      color: #FFF;
      font-size: 24px;
      box-align: center;
  }

  .sience-2 {
      background-color: #4284CC;
      padding: 10px;
      color: #FFF;
      font-size: 24px;
  }

  .nama {
      font-weight: bolder;
      font-size: larger;
      font-size: 30px;
  }

  .alamat {
      font-size: larger;
      font-weight: bolder;
  }

  .table-2{
    position: absolute;
    bottom: 0px;
  }

  .content-biodata{
    position: relative;
    width: 100%;
    height: 100px;
  }

        .txt-catatan {
            margin: 0px;
            background-color: #468ae2;
            padding: 10px;
            color: #FFF;
            position: relative;
            margin-top: 20px;
        }

        .body-ketentuan{
            width: 80%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .txt-ketentuan {
            width: 100%;
            margin: 0px;
            background-color: #468ae2;
            padding: 10px;
            color: #FFF;
            position: relative;
        }

        .sertif-gambar {
            position: absolute;
            bottom: 20px; /* Sesuaikan dengan jarak dari bawah yang diinginkan */
        }
  </style>
</head>

<body>
  <div class='bg-sertif'>
    <div class='overlay'>
      <div class='body-sertif'>
          <table class='table-1'>
            <tbody>
              <tr>
                <td>
                  <h1 class='txt-pekerjaan'>" . mb_strtoupper($data['pekerjaan']) . "</h1>
                </td>
                <td align='right'>
                  <h1 class='kartu-anggota'>PERPUSTAKAAN DAERAH <br> KOTA SORONG</h1>
                </td>
              </tr>
            </tbody>
          </table>

        <h2 align='right'>KARTU TANDA ANGGOTA</h2>

        <div class='content-biodata'>
          <table class='table-2'>
            <tbody>
              <tr>
                <td>
                  <div class='biodata'>
                    <p class='nama'> " . $data['nama'] . " </p>
                    <p class='alamat'> " . $data['alamat1'] . "  </p>

                    <table style='margin-top: 70px;'>
                      <tbody>
                        <tr>
                          <td>
                            <h2 style='color: #2B5430;'>No. Member</h2>
                          </td>
                          <td>
                            <h2 style='color: #2B5430;'>Sience</h2>
                          </td>
                        </tr>
                        <tr>
                          <td align='center'>
                            <p class='no-member-2'> " . generateNoMember($data['no_member']) . "  </p>
                          </td>
                          <td align='center'>
                            <p class='sience-2'> ". date("d-M-Y") . " </p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  
                    <img style='margin-top: 20px;' src='http://localhost/perpustakaan/images/pin.png' alt=' width='20' height='20'>
                    <p style='display: inline-block; color: #2B5430;'> " . $data['alamat_institusi'] . " </p>
                  </div>
                </td>
                <td align='right'>
                  <div class='bingkai-foto-1'>
                    <div class='bingkai-foto-2'>
                      <img src='http://localhost/perpustakaan/images/images_profile/" . $data['gambar'] . "' width='186' height='236'>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div style='page-break-before: always;'>
        <h3 style='position: absolute; top: 20px; left: 20px; ' class='txt-catatan'>CATATAN</h3>
                <div class='body-ketentuan'>
                    <center>
                        <h1>KETENTUAN PERPUSTAKAAN INI:</h1><br>
                    </center>

                    <h3 class='txt-ketentuan'>1. DIBAWA SETIAP BERKUNJUNG KE PERTPUSTAKAAN DAERAH KOTA SORONG</h3><br>
                    <h3 class='txt-ketentuan'>2. TIDAK DAPAT DIPERPANJANG KEPADA ORANG LAIN KOTA SORONG</h3><br>
                    <h3 class='txt-ketentuan'>3. PENGGANTIAN KARTU HILANG DAN INGIN MENCETAK KEMBBALI DIKENANAKN BIAYA ADMINITRASI
                    </h3><br>
                    <h3 class='txt-ketentuan'>4. APA BILA HILANG DAN ADA YANG MENEMUKAN KARTU INI, BISA MENGANTARKANNYA KE GEDUNG
                        LAYANAN PERPUSTAKAAN</h3>

                </div>
                <div class='sertif-gambar'>
                    <img style='margin-top: 20px;' src='http://localhost/perpustakaan/images/pin.png' alt=' width=' 20' height='20'>
                    <h3 style='display: inline-block; color: #2B5430;'> " . $data['alamat_institusi'] . " </h3>
                </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
";

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);

// instantiate and use the dompdf class
$dompdf = new Dompdf($options);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Load HTML content
$dompdf->loadHtml($html);

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

header("Location:/perpustakaan/?hal=data_anggota_lama");
exit;