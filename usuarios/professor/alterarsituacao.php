<?php
session_start();
$nome = $_SESSION['nome'];

include '../../Classes/Estagio.php';

$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['idDocumento']) && isset($_POST['situacaoEstagio'])) {
        $idEstagio = $_GET['idDocumento'];
        $situacaoEstagio = $_POST['situacaoEstagio'];

        $estagio = new Estagio();
        $estagio->atualizarEstagio($idEstagio, $situacaoEstagio, null, null, null);
        $successMessage = "Situação do estágio atualizada com sucesso!";
        echo "<p>$successMessage</p>";
        header('Refresh: 2; url=visualizardocumentos.php?idEstagio=' . $idEstagio);
        exit(); // Ensure the script stops after redirection
    } else {
        $successMessage = "Parâmetros inválidos.";
    }
} else {
    if (isset($_GET['idDocumento'])) {
        $idEstagio = $_GET['idDocumento'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Styles/styles.css">
    <title>Alterar Situação do Estágio</title>
</head>
<body>
    <?php include './menu.php' ?>
    <h1>Alterar Situação do Estágio</h1>
    <?php if ($successMessage) { echo "<p>$successMessage</p>"; } ?>
    <form method="POST" action="alterarsituacao.php?idDocumento=<?php echo $idEstagio; ?>">
        <label for="situacaoEstagio">Situação do Estágio:</label>
        <select name="situacaoEstagio" id="situacaoEstagio" required>
            <option value="Iniciado">Iniciado</option>
            <option value="Em execução">Em execução</option>
            <option value="Cancelado">Cancelado</option>
            <option value="Concluído">Concluído</option>
        </select>
        <br><br>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>

<?php
    } else {
        echo "ID do Estágio não fornecido.";
    }
}
?>
