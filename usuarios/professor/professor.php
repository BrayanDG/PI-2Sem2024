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
    <title>HOME</title>
    <link rel="stylesheet" href="../../Styles/styles.css">
</head>
<body>
    <?php
        include "./menu.php"
    ?>
</body>
</html>