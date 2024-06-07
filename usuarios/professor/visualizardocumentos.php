<?php
session_start();
require ('../../Classes/Conexao.php');
require ('../../Classes/Documento.php');
require ('../../Classes/Comentario.php');  // Supondo que exista uma classe para comentários
require ('../../Classes/Estagio.php');
require ('../../Classes/Estudante.php');


$documento = new Documento();
$comentario = new Comentario();  // Supondo que exista uma classe para comentários
$estagio = new Estagio();

$idEstagio = isset($_GET['idEstagio']) ? intval($_GET['idEstagio']) : 0;

// Recuperar documentos do estágio
$documentos = $documento->carregarDocumentos($idEstagio);

// Inserir comentário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comentarioTexto = htmlspecialchars(strip_tags($_POST['comentario']));
    $idProfessorOrientador = $_SESSION['idProfessorOrientador'];  // Supondo que a sessão tenha essa informação
    
    $comentario->cadastrarComentario($idEstagio, $idProfessorOrientador, $comentarioTexto);
    header("Location: visualizar_documentos.php?idEstagio=$idEstagio");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Documentos</title>
    <link rel="stylesheet" href="../../Styles/styles.css">
</head>
<body>
    <?php include "./menu.php"; ?>
    <h1>Documentos do Estágio</h1>
    <table border="1">
        <tr>
            <th>Descrição</th>
            <th>Status</th>
            <th>Arquivo</th>
        </tr>
        <?php if ($documentos && $documentos->rowCount() > 0): ?>
            <?php while ($row = $documentos->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['descricao']); ?></td>
                    <td><?php echo htmlspecialchars($row['statusDocumento']); ?></td>
                    <td>
                        <?php if (!empty($row['pdfarquivo'])): ?>
                            <a href="<?php echo $row['pdfarquivo']; ?>" target="_blank">Visualizar</a>
                        <?php else: ?>
                            Não possui arquivo
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Nenhum documento encontrado</td>
            </tr>
        <?php endif; ?>
    </table>

    <h2>Adicionar Comentário</h2>
    <form action="visualizar_documentos.php?idEstagio=<?php echo $idEstagio; ?>" method="post">
        <label for="comentario">Comentário:</label>
        <textarea name="comentario" id="comentario" rows="4" cols="50" required></textarea>
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
