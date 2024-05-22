<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plano de Atividade</title>
</head>
<body>
    <button>Salvar</button>
    <a href="../aluno.php">Voltar para o sistema</a>
    <div class="container">
       <p><?= $_SESSION['cnpj']?></p>

    </div>
</body>
</html>