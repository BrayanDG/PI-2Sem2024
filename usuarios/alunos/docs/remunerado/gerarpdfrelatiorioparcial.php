<?php
require '../../../../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

ob_start();

require "relatorioparcial.php";

$dompdf->loadHtml(ob_get_clean());

$dompdf->setPaper('A4');

$dompdf->render();
$dompdf->stream();
?>