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
    <script>

    </script>
</head>
<body>
<?php include "./menu.php";?>
    <div class="titulo-fantasia">
        <h1> Solicitar Estágio</h1>
    </div>
    
    
    <header>
        <div class="fantasia">
            <form id="fant"action="./docs/gerartermo.php" method="post">
                <div>
                    <input name="idEstudante" value="<?=$idEstudante ?>" hidden>
                </div>
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
                    <label for="email">Email do representante:</label><br>
                    <input type="text" name="email" id="">
                </div>
                <div>
                    <label for="telefone">Telefone:</label><br>
                    <input type="text" name="telefone" id="">
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