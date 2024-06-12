<?php
require '../../../../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

ob_start();

require "relatoriofinal.php";

$dompdf->loadHtml(ob_get_clean());

$dompdf->setPaper('A4');

$dompdf->render();
$dompdf->stream();
?>