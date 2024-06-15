<?php
session_start();
$nome = $_SESSION['nome'];
$idProfessor = $_SESSION['idProfessor'];
require ('../../Classes/Conexao.php');
require ('../../Classes/Documento.php');
require ('../../Classes/Comentario.php');
require ('../../Classes/Estagio.php');
require ('../../Classes/Estudante.php');

$documento = new Documento();
$comentario = new Comentario();
$estagio = new Estagio();
$estudante = new Estudante();

$idEstagio = isset($_GET['idEstagio']) ? intval($_GET['idEstagio']) : 0;

$nomeEstudante = "Estudante não encontrado";
$dadosEstagio = [];
$dadosEstudante = [];

// Recuperar detalhes do estágio
$dadosEstagio = $estagio->carregarEstagioPorIdEstagio($idEstagio);
if ($dadosEstagio && isset($dadosEstagio['idEstudante'])) {
    // Recuperar detalhes do estudante
    $dadosEstudante = $estudante->carregarDadosEstudante($dadosEstagio['idEstudante']);

    if ($dadosEstudante && isset($dadosEstudante['nome'])) {
        $nomeEstudante = $dadosEstudante['nome'];
    } else {
        // Depuração: Verificar se o idEstudante é válido
        error_log("Estudante não encontrado para idEstudante: " . $dadosEstagio['idEstudante']);
    }
} else {
    // Depuração: Verificar se o idEstagio é válido
    error_log("Estágio não encontrado para idEstagio: " . $idEstagio);
}

// Recuperar documentos do estágio
$documentos = $documento->carregarDocumentos($idEstagio);

// Inserir comentário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comentarioTexto = htmlspecialchars(strip_tags($_POST['comentario']));
    $idProfessorOrientador = $_SESSION['idProfessorOrientador'];  // Supondo que a sessão tenha essa informação

    $comentario->cadastrarComentario($idEstagio, $idProfessorOrientador, $comentarioTexto);
    header("Refresh: 2; url=visualizardocumentos.php?idEstagio=$idEstagio");
    exit();
}


if ($idEstagio) {
    $comentarioObj = new Comentario();
    $comentarios = $comentarioObj->carregarComentariosPorEstagio($idEstagio);
} else {
    echo "idEstagio não fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <title>Visualizar Documentos</title>
        <link rel="stylesheet" href="../../Styles/visualizardocumentos.css">
        <script type="text/javascript">
            function abrirEmNovaJanela(url) {
                var novaJanela = window.open('', '_blank', 'width=800,height=600');
                novaJanela.document.write('<html><head><title>Visualizar PDF</title></head><body>');
                novaJanela.document.write('<iframe src="' + url + '" width="100%" height="100%" style="border:none;"></iframe>');
                novaJanela.document.write('</body></html>');
            }
        </script>
    </head>
    <div>
        <?php include "./menu.php"; ?>
        <div class="info-aluno" 
            <h1>Aluno: <?php echo htmlspecialchars($nomeEstudante); ?></h1>
            <h1>Estágio:
                <?php echo isset($dadosEstagio['situacaoEstagio']) ? htmlspecialchars($dadosEstagio['situacaoEstagio']) : 'N/A'; ?>
            </h1>
            <a href="alterarsituacao.php?idDocumento=<?php echo $idEstagio; ?>">Alterar Situação do Estágio</a>
            <h1>idEstágio: <?php echo htmlspecialchars($idEstagio); ?></h1>
            <a href="visualizarestagios.php">Voltar</a>
        </div>
        <br><br><br><br>
        <h1>Documentos do Estágio</h1>
        <table border="1">
            <tr>
                <th>Descrição</th>
                <th>Status</th>
                <th>Arquivo</th>
                <th>Ações</th>
            </tr>
            <?php if ($documentos && $documentos->rowCount() > 0): ?>
                <?php while ($row = $documentos->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['descricao']); ?></td>
                        <td><?php echo htmlspecialchars($row['statusDocumento']); ?></td>
                        <td>
                            <?php if (!empty($row['pdfarquivo'])): ?>
                                <a href="#"
                                    onclick="abrirEmNovaJanela('/HTML2/usuarios/alunos/upload/uploads/<?php echo basename($row['pdfarquivo']); ?>')">Visualizar</a>
                            <?php else: ?>
                                Não possui arquivo
                            <?php endif; ?>
                        </td>
                        <td>
                            <a
                                href="alterardocumento.php?idDocumento=<?php echo $row['idDocumento']; ?>&idEstagio=<?php echo $idEstagio; ?>">Alterar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Nenhum documento encontrado</td>
                </tr>
            <?php endif; ?>
        </table>

        <h2>Adicionar Comentário</h2>
        <form action="cadastrarcomentario.php?idEstagio=<?php echo $idEstagio; ?>" method="post">
            <label for="comentario">Comentário:</label>
            <textarea name="comentario" id="comentario" rows="4" cols="50" required></textarea>
            <br>
            <button type="submit">Enviar</button>
        </form>
        <div id="coment-main">
            <h2>Comentários</h2>
            <table border="1">
                <tr>
                    <th>Comentário</th>
                    <th>Data e Hora</th>
                </tr>
                <?php if ($comentarios && $comentarios->rowCount() > 0): ?>
                    <?php while ($row = $comentarios->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['comentario']); ?></td>
                            <td><?php echo htmlspecialchars($row['dataHora']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2">Nenhum comentário encontrado</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
        </body>

</html>