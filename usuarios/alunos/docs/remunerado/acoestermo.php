<?php


//variaveis do termo
$horariodeentrada = $_POST["horariodeentrada"];
$horariodesaida = $_POST["horariodesaida"];
$horariodeiniciodarefeicao = $_POST["horariodeiniciodarefeicao"];
$horariodefimdarefeicao = $_POST["horariodefimdarefeicao"];
$datadeinicio = $_POST["datadeinicio"];
$datadefim = $_POST["datadefim"];
$apolice = $_POST["apolice"];
$seguradora = $_POST["seguradora"];

session_start();

$_SESSION["horariodeentrada"] = $horariodeentrada;
$_SESSION["horariodesaida"] = $horariodesaida;
$_SESSION["horariodeiniciodarefeicao"] = $horariodeiniciodarefeicao;
$_SESSION["horariodefimdarefeicao"] = $horariodefimdarefeicao;
$_SESSION["datadeinicio"] = $datadeinicio;
$_SESSION["datadefim"] = $datadefim;
$_SESSION["apolice"] = $apolice;
$_SESSION["seguradora"] = $seguradora;

header("Location:gerarpdftermo.php");
?>
