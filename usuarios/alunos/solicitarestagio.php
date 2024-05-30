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

    <div class="titulo-fantasia">
        <h1> Solicitar Estágio</h1>
    </div>
    
    
    <header>
        <div class="fantasia">
            <form id="fant"action="./docs/gerartermo.php" method="post">
                <div>
                    <label for="nomeFantasia">Nome Fantasia:</label><br>
                    <input type="text" name="nomeFantasia" id="">
                </div>
                <div>
                    <label for="cnpj">CNPJ:</label><br>
                    <input type="text" name="cnpj" id="">
                </div>
                <div>
                    <label for="endConcedente">Endereço:</label><br>
                    <input type="text" name="endConcedente" id="">
                </div>
                <div>
                    <label for="representante">Representante:</label><br>
                    <input type="text" name="representante" id="">
                </div>
                <div>
                    <label for="cpfRepresentante">CPF do Representante:</label><br>
                    <input type="text" name="cpfRepresentante" id="">
                </div>
                <div>
                    <label for="cargoRepresentante">Cargo do Representante:</label><br>
                    <input type="text" name="cargoRepresentante" id="">
                </div>
                <div id="remuneracaob">
                    <label for="remuneracao">Remunerado</label>
                    <input type="radio" name="remuneracao" id="remunerado" value="sim"><br>
                    <label for="naoremunerado">Não Remunerado</label>
                    <input type="radio" name="remuneracao" id="naoremunerado" value="nao">
                </div><br>
                <div id=solicitarb>
                    <input type="submit" value="Solicitar"><br>
                </div>
            </form>
        </div>
    </header>
</body>
</html>