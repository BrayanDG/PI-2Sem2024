<?php
    session_start();
    $nome = $_SESSION['nome'];
    $idEstudante = $_SESSION['idEstudante'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Styles/styles.css">
    
</head>
<body>
    
    <?php include "./menu.php";?>
    <div class=titulo-fantasia>
        <h1> Seja Bem-vindo(a)!<h1>
    </div>

</body>


</body>
</html>