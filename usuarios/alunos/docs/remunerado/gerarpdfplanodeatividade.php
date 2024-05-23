<?php
session_start();

// Obtém os dados enviados do formulário
$atividades = $_POST["atividade"];
$descricoes = $_POST["descricao"];
$objetivos = $_POST["objetivo"];
$inicio = $_POST["inicio"];
$termino = $_POST["termino"];

// Salva os dados em variáveis de sessão
$_SESSION["atividades"] = $atividades;
$_SESSION["descricoes"] = $descricoes;
$_SESSION["objetivos"] = $objetivos;
$_SESSION["inicio"] = $inicio;
$_SESSION["termino"] = $termino;

require '../../../../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

ob_start();

require "planodeatividade.php";

$dompdf->loadHtml(ob_get_clean());

$dompdf->setPaper('A4');

$dompdf->render();
$dompdf->stream();
?>