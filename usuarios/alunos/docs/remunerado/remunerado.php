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
    <script>

    </script>
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

<form action="gerarpdftermo.php" method="post" style="border: 1px solid red;">
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
        <label for="datadeifim">Data de Fim da Vigência: </label>
        <input type="date" name="datadeifim" id="datadeifim">
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


<a href="gerarpdfplanodeatividade.php">Salvar Plano de Atividade</a>
<a href="../../aluno.php">Retornar para o menu principal</a>

</body>
</html>