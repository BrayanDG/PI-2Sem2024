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

<form action="gerarpdfplanodeatividade.php">
    <!-- Preencimento de cabeçalho -->
    <label for="remuneracao">Valor Mensal da Bolsa: </label>
    <input type="text" name="remuneracao"><br>

   <!-- Primeira atividade -->
   <div id="atividades">
        <div>
            <label for="atividade">Atividade: </label>
            <input type="text" name="atividade[]" id="atividade">
            <label for="descricao">Descrição: </label>
            <input type="text" name="descricao[]" id="descricao">
            <label for="objetivo">Objetivo ou Resultado Esperado: </label>
            <input type="text" name="objetivo[]" id="objetivo">
            <label for="inicio">Início: </label>
            <input type="date" name="inicio[]" id="inicio">
            <label for="termino">Término: </label>
            <input type="date" name="termino[]" id="termino">
        </div>
    </div>
    <button type="button" id="adicionar">Incluir Atividade</button>
    <br><br>
    <input type="submit" value="Enviar">

</form>


<a href="../../aluno.php">Retornar para o menu principal</a>
<script>
const adicionar = document.getElementById("adicionar");
const atividades = document.getElementById("atividades");

adicionar.addEventListener("click", function (event) {
  let divAtividade = document.createElement("div");

  let labelAtividade = document.createElement("label");
  labelAtividade.textContent = "Atividade: ";
  divAtividade.appendChild(labelAtividade);

  let campoAtividade = document.createElement("input");
  campoAtividade.type = "text";
  campoAtividade.name = "atividade[]";
  divAtividade.appendChild(campoAtividade);

  let labelDescricao = document.createElement("label");
  labelDescricao.textContent = "Descrição: ";
  divAtividade.appendChild(labelDescricao);

  let campoDescricao = document.createElement("input");
  campoDescricao.type = "text";
  campoDescricao.name = "descricao[]";
  divAtividade.appendChild(campoDescricao);

  let labelObjetivo = document.createElement("label");
  labelObjetivo.textContent = "Objetivo ou Resultado Esperado: ";
  divAtividade.appendChild(labelObjetivo);

  let campoObjetivo = document.createElement("input");
  campoObjetivo.type = "text";
  campoObjetivo.name = "objetivo[]";
  divAtividade.appendChild(campoObjetivo);

  let labelInicio = document.createElement("label");
  labelInicio.textContent = "Início: ";
  divAtividade.appendChild(labelInicio);

  let campoInicio = document.createElement("input");
  campoInicio.type = "date";
  campoInicio.name = "inicio[]";
  divAtividade.appendChild(campoInicio);

  let labelTermino = document.createElement("label");
  labelTermino.textContent = "Término: ";
  divAtividade.appendChild(labelTermino);

  let campoTermino = document.createElement("input");
  campoTermino.type = "date";
  campoTermino.name = "termino[]";
  divAtividade.appendChild(campoTermino);

  atividades.appendChild(divAtividade);
});
</script>
</body>
</html>