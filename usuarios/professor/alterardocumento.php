<?php
session_start();
$nome = $_SESSION['nome'];
$idProfessor= $_SESSION['idProfessor'];
require ('../../Classes/Conexao.php');
require ('../../Classes/Documento.php');

$documento = new Documento();
$idDocumento = isset($_GET['idDocumento']) ? intval($_GET['idDocumento']) : 0;
$idEstagio = isset($_GET['idEstagio']) ? intval($_GET['idEstagio']) : 0;

// Verifica se o idDocumento foi passado corretamente
if ($idDocumento == 0 || $idEstagio == 0) {
    echo "ID do documento ou do estágio não fornecido!";
    exit();
}

// Recupera os dados do documento
$dadosDocumento = $documento->carregarDocumentoPorId($idDocumento);
if (!$dadosDocumento) {
    echo "Documento não encontrado!";
    exit();
}

// Atualiza o status do documento se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $statusDocumento = htmlspecialchars(strip_tags($_POST['statusDocumento']));

    if ($documento->atualizarStatusDocumento($idDocumento, $statusDocumento)) {
        echo "Status do documento atualizado com sucesso!";
        header('Refresh: 2; url=visualizardocumentos.php?idEstagio=' . $idEstagio);
        exit();
    } else {
        echo "Erro ao atualizar status do documento.";
    }

    // Recarregar os dados do documento atualizado
    $dadosDocumento = $documento->carregarDocumentoPorId($idDocumento);
}

function valorOuDefault($campo, $default) {
    return isset($campo) ? htmlspecialchars($campo) : htmlspecialchars($default);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Alterar Status do Documento</title>
    <link rel="stylesheet" href="../../Styles/styles.css">
</head>
<body>
    <?php include "./menu.php"; ?>
    <h1>Alterar Status do Documento</h1>
    <form action="alterardocumento.php?idDocumento=<?php echo $idDocumento; ?>&idEstagio=<?php echo $idEstagio; ?>" method="post">
        <label for="statusDocumento">Status do Documento:</label>
        <select id="statusDocumento" name="statusDocumento" required>
            <option value="Em análise" <?php echo ($dadosDocumento['statusDocumento'] == 'Em análise') ? 'selected' : ''; ?>>Em análise</option>
            <option value="Aprovado" <?php echo ($dadosDocumento['statusDocumento'] == 'Aprovado') ? 'selected' : ''; ?>>Aprovado</option>
            <option value="Rejeitado" <?php echo ($dadosDocumento['statusDocumento'] == 'Rejeitado') ? 'selected' : ''; ?>>Rejeitado</option>
        </select><br>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
