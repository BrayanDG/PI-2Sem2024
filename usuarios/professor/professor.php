<?php
    session_start();
    $nome = $_SESSION['nome'];
    $idProfessor= $_SESSION['idProfessor'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Professor</title>
    <link rel="stylesheet" href="../../Styles/styles.css">
</head>
<body>
    <?php
        include "./menu.php"
    ?>
    <div class=titulo-fantasia>
        <h1> Seja Bem-vindo Professor!(a)!<h1>
    </div>
</body>
</html>