<?php
    $cnpj = $_POST['cnpj'];
    $nomeFantasia = $_POST['nomeFantasia'];
    $representante = $_POST['representante'];
    $endConcedente = $_POST['endConcedente'];
    $cargoRepresentante = $_POST['cargoRepresentante'];
    $cpfRepresentante = $_POST['cpfRepresentante'];
    $remuneracao = $_POST['remuneracao'];

    session_start();
    $_SESSION['cnpj'] = $cnpj;
    $_SESSION['nomeFantasia'] = $nomeFantasia;
    $_SESSION['representante'] = $representante;
    $_SESSION['endConcedente'] = $endConcedente;
    $_SESSION['cargoRepresentante'] = $cargoRepresentante;
    $_SESSION['cpfRepresentante'] = $cpfRepresentante;

    if($remuneracao){
        header('Location: remunerado/remunerado.php');
    }else{
        header('Location: naoremunerado/naoremunerado.php');
    }
?>
