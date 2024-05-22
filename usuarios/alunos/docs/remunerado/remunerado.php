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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remunerado</title>
</head>
<body>
<a href="gerarpdftermo.php">Salvar Termo de Estágio</a><br>
<a href="gerarpdfplanodeatividade.php">Salvar Plano de Atividade</a>
<a href="../../aluno.php">Retornar para o menu principal</a>

</body>
</html>