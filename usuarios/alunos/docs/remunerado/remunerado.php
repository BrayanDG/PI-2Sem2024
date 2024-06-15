<?php 
    session_start();
    $nome = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitação Estágio</title>
    <link rel="stylesheet" href="../../../../Styles/remunerado.css">
    <script src="../../../../js/custom.js"></script>
   
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
                <Span><?=$nome?></Span>
            </div>
            <img src="../../../../Imagens/design-bar.png" alt="barra-de-design" id="barra-design">
        </div>
        <nav>
            <ul class="menu">
            <li><a href="aluno.php">Início</a></li>
                    <li><a href="./../../alterardados.php">Alterar Dados Cadastrais</a></li>
                    <li ><a href="./../../solicitarestagio.php">Solicitar Estágio</a></li>
                    <li><a href="./../../acompanharestagio.php">Acompanhar Estágio</a></li>
                    <li><a href="./../../alunosair.php">Sair</a></li>
                </ul>
        </nav>
              
    </header>
    <div>

    </div>

    <div class="titulo-fantasia">
        <h2> Remunerado </h2>
    </div>

    <div class="data-remunerado">
        <form id="fant" action="acoestermo.php" method="post">
            <div>
                <label for="horariodeentrada">Hora de Entrada</label>
                <input type="time" name="horariodeentrada" id="horariodeentrada">
            </div>
            <br>
            <div>
                <label for="horariodesaida">Hora de Saída: </label>
                <input type="time" name="horariodesaida" id="horariodesaida">
            </div>
            <br>
            <div>
                <label for="horariodeinicidarefeicao">Hora de Início da Refeição: </label>
                <input type="time" name="horariodeiniciodarefeicao" id="horariodeiniciodarefeicao">
            </div>
            <br>
            <div>
                <label for="horariodefimrefeicao">Hora de Fim da Refeição: </label>
                <input type="time" name="horariodefimdarefeicao" id="horariodefimdarefeicao">
            </div>
            <br>
            <div>
                <label for="datadeinicio">Data de Inicio da Vigência: </label>
                <input type="date" name="datadeinicio" id="datadeinicio">
            </div>
            <br>
            <div>
                <label for="datadefim">Data de Fim da Vigência: </label>
                <input type="date" name="datadefim" id="datadefim">
            </div>
            <br>
            <div>
                <label for="apolice">Número da apólice: </label>
                <input type="text" name="apolice" id="apolice">
            </div>
            <br>
            <div>
                <label for="seguradora">Seguradora: </label>
                <input type="text" name="seguradora" id="seguradora">
            </div>
            <br>
            <div id="botao-termo">
                <input type="submit" value="Gerar Termo">
            </div>
        </form>
    </div>    

    <div class="titulo-fantasia2">
        <h2> Atividade </h2>
    </div>

    <div id="formnulario">  
        <div class="data-remunerado2">
            <form id="fant2" action="planodeatividade.php" method="post">

            <!-- Primeira atividade -->
            <div id="atividade">
                    <label for="atividade[]">Atividade: </label>
                    <input type="text" name="atividade[]" id="atividade" placeholder="atividade">
                    <label for="descricao1">Descrição: </label>
                    <input type="text" name="descricao[]" id="descricao" placeholder="descricao">
                    <label for="objetivo">Objetivo ou Resultado Esperado: </label>
                    <input type="text" name="objetivo[]" id="objetivo" placeholder="objetivo">
                    <label for="inicio">Início: </label>
                    <input type="date" name="inicio[]" id="inicio" placeholder="inicio">
                    <label for="termino">Término: </label>
                    <input type="date" name="termino[]" id="termino" placeholder="termino">
                    <button type="button" onclick="adicionarCampos()"> + </button>
                <br>
                <br>
                
                <div class="valor-mensal">
                    <!-- Preencimento de cabeçalho -->
                    <label class=""for="remuneracao">Valor Mensal da Bolsa: </label><br>
                    <input type="text" name="remuneracao"><br><br>
                
                    <div id=solicitarb>
                        <input type="submit" value="Enviar"><br>
                    </div>
            </div>
            </form>
        </div>
    </div>
<a href="../../aluno.php">Retornar para o menu principal</a>

</body>
</html>