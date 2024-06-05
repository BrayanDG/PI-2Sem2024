<?php
session_start();
if (!isset($_SESSION['nome']) || !isset($_SESSION['idEstudante'])) {
    // Redireciona para a página de erro ou login caso as variáveis de sessão não estejam definidas
    header('Location: usuario-erro.php');
    exit();
}
$nome = $_SESSION['nome'];
$idEstudante = $_SESSION['idEstudante'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar Estágio</title>
    <link rel="stylesheet" href="../../Styles/styles.css">
</head>
<body>
<p><?= htmlspecialchars($idEstudante) ?></p>
<?php include "./menu.php"; ?>
    <div class="titulo-fantasia">
        <h1>Solicitar Estágio</h1>
    </div>
    <header>
        <p></p>
        <div class="fantasia">
            <form id="fant" action="./docs/gerartermo.php" method="post">
                <input type="hidden" name="idEstudante" value="<?= htmlspecialchars($idEstudante) ?>">
                <div>
                    <label for="nomeFantasia">Nome Fantasia:</label><br>
                    <input type="text" name="nomeFantasia" id="nomeFantasia" required>
                </div>
                <div>
                    <label for="cnpj">CNPJ:</label><br>
                    <input type="text" name="cnpj" id="cnpj" required>
                </div>
                <div>
                    <label for="endConcedente">Endereço:</label><br>
                    <input type="text" name="endConcedente" id="endConcedente" required>
                </div>
                <div>
                    <label for="representante">Representante:</label><br>
                    <input type="text" name="representante" id="representante" required>
                </div>
                <div>
                    <label for="cpfRepresentante">CPF do Representante:</label><br>
                    <input type="text" name="cpfRepresentante" id="cpfRepresentante" required>
                </div>
                <div>
                    <label for="email">Email do representante:</label><br>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="telefone">Telefone:</label><br>
                    <input type="text" name="telefone" id="telefone" required>
                </div>
                <div>
                    <label for="cargoRepresentante">Cargo do Representante:</label><br>
                    <input type="text" name="cargoRepresentante" id="cargoRepresentante" required>
                </div>
                <div id="remuneracaob">
                    <label>Remunerado:</label>
                    <input type="radio" name="remuneracao" id="remunerado" value="sim" required> Sim<br>
                    <input type="radio" name="remuneracao" id="naoremunerado" value="nao" required> Não
                </div><br>
                <div id="solicitarb">
                    <input type="submit" value="Solicitar"><br>
                </div>
            </form>
        </div>
    </header>
</body>
</html>
