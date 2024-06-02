<?php
    session_start();
    $nome = $_SESSION['nome']
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Styles/styles.css">
    <script>

    </script>
</head>
<body>
<?php include "./menu.php";?>
    <div class=titulo-fantasia>
        <h1> Acompanhar Estágio<h1>
        
        <div class="uploadtermo">
            <h3>Termo de compromisso</h3>
            <form action="./upload/gravardocumento.php" method="post" enctype="multipart/form-data">
                <input type="text" name="documentoaluno" placeholder="Digite seu nome" required><br>
                <input type="file" name="pdfarquivo" id="" accept=".pdf" required><br>
                <input type="submit" value="Gravar">
            </form>
        </div>
            
    </div>

</body>
</html>