<?php
require '../../../../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

ob_start();

require "termoremunerado.php";

$dompdf->loadHtml(ob_get_clean());


$dompdf->setPaper(size:"A4");


$dompdf->render();
$dompdf->stream();
?>
