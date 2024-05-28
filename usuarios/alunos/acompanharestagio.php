<?php
    
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
    <header>
        <div>
            <div class="logos">
                <a href="#"> 
                    <img src="../../Imagens/Fatec.png" alt="Fatec Logo">
                </a>
            </div>
            <div class="logos">
                <a href="#"> 
                    <img src="../../Imagens/CPS.png" alt="CPS Logo"id="cps-logo">
                </a>
            </div>

        </div>
        <div class="centro-menu">
            <div id="user-active">
                <img src="../../Imagens/user-photo.png" alt="">
                <Span>Jeremias</Span>
            </div>
            <img src="../../Imagens/design-bar.png" alt="barra-de-design" id="barra-design">
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