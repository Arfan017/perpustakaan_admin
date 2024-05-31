<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new
\Mpdf\Mpdf([
  'orientation' => 'L'
]);

$stylesheet = file_get_contents('kartu_member.css');
$html = file_get_contents('kartu_member.html');

$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($html, 2);

$mpdf->Output('kartu_member.pdf', 'D');

?>
