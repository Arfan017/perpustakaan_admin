<?php
require_once  '/vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

$html = file_get_contents('kartu_member.html');

// instantiate and use the dompdf class
$dompdf = new Dompdf();

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Load HTML content
$dompdf->loadHtml($html);

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

?>