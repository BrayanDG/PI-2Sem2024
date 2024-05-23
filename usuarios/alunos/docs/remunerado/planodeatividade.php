<?php
    session_start();

    $cnpj = $_SESSION['cnpj'] ;
    $nomeFantasia = $_SESSION['nomeFantasia'] ;
    $representante = $_SESSION['representante'] ;
    $ruaConcedente = $_SESSION['ruaConcedente'] ;
    $cargoRepresentante = $_SESSION['cargoRepresentante'] ;
    $cpfRepresentante = $_SESSION['cpfRepresentante'] ;

    $atividade_1 = $_SESSION['atividade_1'];
    $descricao_1 = $_SESSION['descricao_1'];
    $objetivo_1 = $_SESSION['objetivo_1'];
    $inicio_1 = $_SESSION['inicio_1'];
    $termino_1 = $_SESSION['termino_1'];

    $atividade_2 = $_SESSION['atividade_2'];
    $descricao_2 = $_SESSION['descricao_2'];
    $objetivo_2 = $_SESSION['objetivo_2'];
    $inicio_2 = $_SESSION['inicio_2'];
    $termino_2 = $_SESSION['termino_2'];

    $atividade_3 = $_SESSION['atividade_3'];
    $descricao_3 = $_SESSION['descricao_3'];
    $objetivo_3 = $_SESSION['objetivo_3'];
    $inicio_3 = $_SESSION['inicio_3'];
    $termino_3 = $_SESSION['termino_3'];

    $atividade_4 = $_SESSION['atividade_4'];
    $descricao_4 = $_SESSION['descricao_4'];
    $objetivo_4 = $_SESSION['objetivo_4'];
    $inicio_4 = $_SESSION['inicio_4'];
    $termino_4 = $_SESSION['termino_4'];

    $atividade_5 = $_SESSION['atividade_5'];
    $descricao_5 = $_SESSION['descricao_5'];
    $objetivo_5 = $_SESSION['objetivo_5'];
    $inicio_5 = $_SESSION['inicio_5'];
    $termino_5 = $_SESSION['termino_5'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h3>
        Plano de Atividade
    </h3>
    <div id="dados">
        
    </div>

    <div id="tabela">
        <div class="cabecalhotabela">
            <div><span>Atividade</span></div>
            <div><span>Descrição</span></div>
            <div><span>Objetivo</span></div>
            <div><span>Inicio</span></div>
            <div><span>Fim</span></div>
        </div>
        <div>
            <div><span><?=$atividade_1;?></span></div>
            <div><span><?=$descricao_1;?></span></div>
            <div><span><?=$objetivo_1?></span></div>
            <div><span><?=$inicio_1;?></span></div>
            <div><span><?=$termino_1?></span></div>
        </div>
        <div>
            <div><span><?=$atividade_2;?></span></div>
            <div><span><?=$descricao_2;?></span></div>
            <div><span><?=$objetivo_2?></span></div>
            <div><span><?=$inicio_2;?></span></div>
            <div><span><?=$termino_2;?></span></div>
        </div>
        <div>
            <div><span><?=$atividade_3;?></span></div>
            <div><span><?=$descricao_3;?></span></div>
            <div><span><?=$objetivo_3?></span></div>
            <div><span><?=$inicio_3;?></span></div>
            <div><span><?=$termino_3?></span></div>
        </div>
        <div>
            <div><span><?=$atividade_4;?></span></div>
            <div><span><?=$descricao_4;?></span></div>
            <div><span><?=$objetivo_4?></span></div>
            <div><span><?=$inicio_4;?></span></div>
            <div><span><?=$termino_4?></span></div>
        </div>
        <div>
            <div><span><?=$atividade_5;?></span></div>
            <div><span><?=$descricao_5;?></span></div>
            <div><span><?=$objetivo_5?></span></div>
            <div><span><?=$inicio_5;?></span></div>
            <div><span><?=$termino_5?></span></div>
        </div>
    </div>

</body>
</html>
