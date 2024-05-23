<?php 
    session_start();
    $cnpj = $_SESSION['cnpj'] ;
    $nomeFantasia = $_SESSION['nomeFantasia'] ;
    $representante = $_SESSION['representante'] ;
    $ruaConcedente = $_SESSION['ruaConcedente'] ;
    $cargoRepresentante = $_SESSION['cargoRepresentante'] ;
    $cpfRepresentante = $_SESSION['cpfRepresentante'] ;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../../Styles/styles.css">
   
</head>
<body>
    <header>
        <div>
            <div class="logos">
                <a href="#"> 
                    <img src="../../../../Imagens/Fatec.png" alt="Fatec Logo">
                </a>
            </div>
            <div class="logos">
                <a href="#"> 
                    <img src="../../../../Imagens/CPS.png" alt="CPS Logo"id="cps-logo">
                </a>
            </div>

        </div>
        <div class="centro-menu">
            <div id="user-active">
                <img src="../../../../Imagens/user-photo.png" alt="">
                <Span>Jeremias</Span>
            </div>
            <img src="../../../../Imagens/design-bar.png" alt="barra-de-design" id="barra-design">
        </div>
        <nav>
            <ul class="menu">
            <li><a href="aluno.php">Início</a></li>
                    <li><a href="alterardados.php">Alterar Dados Cadastrais</a></li>
                    <li ><a href="solicitarestagio.php">Solicitar Estágio</a></li>
                    <li><a href="acompanharestagio.php">Acompanhar Estágio</a></li>
                    <li><a href="Login.html">Sair</a></li>
                </ul>
        </nav>
              
    </header>
    <div>

    </div>

<form action="acoestermo.php" method="post" style="border: 1px solid red;">
    <div>
        <input type="text" hidden value="termo" id="termo">
    </div>
    <div>
        <label for="horariodeentrada">Hora de Entrada</label>
        <input type="time" name="horariodeentrada" id="horariodeentrada">
    </div>
    <div>
        <label for="horariodesaida">Hora de Saída: </label>
        <input type="time" name="horariodesaida" id="horariodesaida">
    </div>
    <div>
        <label for="horariodeinicidarefeicao">Hora de Início da Refeição: </label>
        <input type="time" name="horariodeiniciodarefeicao" id="horariodeiniciodarefeicao">
    </div>
    <div>
        <label for="horariodefimrefeicao">Hora de Fim da Refeição: </label>
        <input type="time" name="horariodefimdarefeicao" id="horariodefimdarefeicao">
    </div>
    <div>
        <label for="datadeinicio">Data de Inicio da Vigência: </label>
        <input type="date" name="datadeinicio" id="datadeinicio">
    </div>
    <div>
        <label for="datadefim">Data de Fim da Vigência: </label>
        <input type="date" name="datadefim" id="datadefim">
    </div>
    <div>
        <label for="apolice">Número da apólice: </label>
        <input type="text" name="apolice" id="apolice">
    </div>
    <div>
        <label for="seguradora">Seguradora: </label>
        <input type="text" name="seguradora" id="seguradora">
    </div>
    <div>
        <input type="submit" value="Gerar Termo">
    </div>
</form>

<form action="acoesplanodeatividade.php">
    <div>
        <input type="text" hidden value="pa" id="pa">
    </div>
    <!-- Preencimento de cabeçalho -->
    <label for="remuneracao">Valor Mensal da Bolsa: </label>
    <input type="text" name="remuneracao"><br>

   <!-- Primeira atividade -->
   <div class="atividade">
        <label for="atividade1">Atividade: </label>
        <input type="text" name="atividade_1" id="atividade1">
        <label for="descricao1">Descrição: </label>
        <input type="text" name="descricao_1" id="descricao1">
        <label for="objetivo1">Objetivo ou Resultado Esperado: </label>
        <input type="text" name="objetivo_1" id="objetivo1">
        <label for="inicio1">Início: </label>
        <input type="date" name="inicio_1" id="inicio1">
        <label for="termino1">Término: </label>
        <input type="date" name="termino_1" id="termino1">
    </div>

    <div class="atividade">
        <label for="atividade2">Atividade: </label>
        <input type="text" name="atividade_2" id="atividade2">
        <label for="descricao2">Descrição: </label>
        <input type="text" name="descricao_2" id="descricao2">
        <label for="objetivo2">Objetivo ou Resultado Esperado: </label>
        <input type="text" name="objetivo_2" id="objetivo2">
        <label for="inicio2">Início: </label>
        <input type="date" name="inicio_2" id="inicio2">
        <label for="termino2">Término: </label>
        <input type="date" name="termino_2" id="termino2">
    </div>

    <div class="atividade">
        <label for="atividade3">Atividade: </label>
        <input type="text" name="atividade_3" id="atividade3">
        <label for="descricao3">Descrição: </label>
        <input type="text" name="descricao_3" id="descricao3">
        <label for="objetivo3">Objetivo ou Resultado Esperado: </label>
        <input type="text" name="objetivo_3" id="objetivo3">
        <label for="inicio3">Início: </label>
        <input type="date" name="inicio_3" id="inicio3">
        <label for="termino3">Término: </label>
        <input type="date" name="termino_3" id="termino3">
    </div>

    <div class="atividade">
        <label for="atividade4">Atividade: </label>
        <input type="text" name="atividade_4" id="atividade4">
        <label for="descricao4">Descrição: </label>
        <input type="text" name="descricao_4" id="descricao4">
        <label for="objetivo4">Objetivo ou Resultado Esperado: </label>
        <input type="text" name="objetivo_4" id="objetivo4">
        <label for="inicio4">Início: </label>
        <input type="date" name="inicio_4" id="inicio4">
        <label for="termino4">Término: </label>
        <input type="date" name="termino_4" id="termino4">
    </div>

    <div class="atividade">
        <label for="atividade5">Atividade: </label>
        <input type="text" name="atividade_5" id="atividade5">
        <label for="descricao5">Descrição: </label>
        <input type="text" name="descricao_5" id="descricao5">
        <label for="objetivo5">Objetivo ou Resultado Esperado: </label>
        <input type="text" name="objetivo_5" id="objetivo5">
        <label for="inicio5">Início: </label>
        <input type="date" name="inicio_5" id="inicio5">
        <label for="termino5">Término: </label>
        <input type="date" name="termino_5" id="termino5">
    </div>

    
    <input type="submit" value="Enviar">

</form>


<a href="../../aluno.php">Retornar para o menu principal</a>

</body>
</html>