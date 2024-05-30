<?php
    $cnpj = $_POST['cnpj'];
    $nomeFantasia = $_POST['nomeFantasia'];
    $representante = $_POST['representante'];
    $endConcedente = $_POST['endConcedente'];
    $cargoRepresentante = $_POST['cargoRepresentante'];
    $cpfRepresentante = $_POST['cpfRepresentante'];
    $remuneracao = $_POST['remuneracao'];

    require_once "./Classes/Estagio.php";

    $estagio = new Estagio;

    $estagio->cadastrarEmpresa($cnpj,$nomeFantasia,$representante,$endConcedente,$cargoRepresentante,$cpfRepresentante);


    if($remuneracao == 'sim'){
        header('Location: remunerado/remunerado.php');
    }elseif($remuneracao == 'nao'){
        header('Location: naoremunerado/naoremunerado.php');
    }
?>
