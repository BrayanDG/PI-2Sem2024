<?php
    $cnpj = $_POST['cnpj'];
    $nomeFantasia = $_POST['nomeFantasia'];
    $representante = $_POST['representante'];
    $endConcedente = $_POST['endConcedente'];
    $cargoRepresentante = $_POST['cargoRepresentante'];
    $cpfRepresentante = $_POST['cpfRepresentante'];
    $remuneracao = $_POST['remuneracao'];

    //Salva os dados da empresa
    require_once "./Classes/Empresa.php";
    $empresa = new Empresa;
    $empresa->cadastrarEmpresa($cnpj,$nomeFantasia,$representante,$endConcedente,$cargoRepresentante,$cpfRepresentante);

    //Cria a solicitação de estágio
    require_once "./Classes/Estagio.php";
    $estagio = new Estagio;
    $estagio->cadastrarEstagio($idestudante);
    

    //Redireciona para a documentação necessária
    if($remuneracao == 'sim'){
        header('Location: remunerado/remunerado.php');
    }elseif($remuneracao == 'nao'){
        header('Location: naoremunerado/naoremunerado.php');
    }
?>
