<?php
session_start();
$nome = $_SESSION['nome'];
$idEstudante = $_SESSION['idEstudante'];

require ('../../Classes/Estagio.php');
require ('../../Classes/Documento.php');
require ('../../Classes/Comentario.php');

$estagio = new Estagio();
$linhaEstagio = $estagio->carregarDadosEstagio($idEstudante);

$idEstagio = $linhaEstagio['idEstagio'];

$documento = new Documento();
$documentos = $documento->carregarDocumentos($linhaEstagio['idEstagio']);

if ($idEstagio) {
    $comentarioObj = new Comentario();
    $comentarios = $comentarioObj->carregarComentariosPorEstagio($idEstagio);
} else {
    echo "idEstagio não fornecido.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acompanhar Estágio</title>
    <link rel="stylesheet" href="../../Styles/acompanharestagio.css">
</head>

<body>
                <?php include "./menu.php";?>
                <h4>Dados do Estágio</h4>
                <p>ID Estágio: <?php echo $linhaEstagio['idEstagio']; ?></p>
                <p>ID Estudante: <?php echo $linhaEstagio['idEstudante']; ?></p>
        <div class="top-mainb">
                <!-- Outros dados do estágio -->
                <div class="doc-estagio" id="fant">
                    <div class="titulo-fantasia">
                        <h2>Documentos do Estágio</h2>
                    </div>
                    <br>
                    <table border="3">
                            <tr>
                                <th scope="d2color">Descrição</th>
                                <th scope="d2color">Status</th>
                                <th scope="d2color">Ações</th>
                            </tr>
                                <?php if ($documentos && $documentos->rowCount() > 0): ?>
                                    <?php while ($row = $documentos->fetch(PDO::FETCH_ASSOC)): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($row['descricao']); ?></td>
                                            <td><?php echo htmlspecialchars($row['statusDocumento']); ?></td>
                                            <td>
                                                <?php if (!empty($row['pdfarquivo'])): ?>
                                                    <a href="<?php echo $row['pdfarquivo']; ?>">Baixar</a>
                                                <?php else: ?>
                                                    Não possui arquivo
                                                <?php endif; ?>
                                                <a href="excluir_documento.php?idDocumento=<?php echo $row['idDocumento']; ?>" onclick="return confirm('Tem certeza que deseja excluir este documento?');">Excluir</a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                            <tr>
                                <td colspan="3">Não possui documentos cadastrados</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
                
                
                

                    <div class="descritivo" id="fant">
                        <div class="doc-estagio2">
                            <h2>Inserir Novo Documento</h2>
                        </div>
                        <br>
                                <left>
                                    <form id="" action="upload/gravardocumento.php" method="post" enctype="multipart/form-data">
                                        <label for="descricao">Descrição:</label>
                                        <select name="descricao" id="descricao">
                                            <option value="Termo de Compromisso">Termo de Compromisso</option>
                                            <option value="Plano de Atividade">Plano de Atividade</option>
                                            <option value="Relatório Parcial">Relatório Parcial</option>
                                            <option value="Relatório Final">Relatório Final</option>
                                        </select>
                                        <input type="hidden" name="statusDocumento" value="Em análise"><br>
                                        <label for="pdfarquivo">Selecionar Documento:</label>
                                        <input type="file" name="pdfarquivo" id="pdfarquivo">
                                        <input type="hidden" name="idEstagio" value="<?php echo $linhaEstagio['idEstagio']; ?>">
                                        <br>
                                        <br>
                                        <div id="solicitarc">
                                            <input type="submit" value="Inserir"><br>
                                        </div>
                                    </form>
                                </left>
                        </div>
                </div>
        </div>
        <div id="coment-main">
            <h2>Comentários</h2>
            <br>            
            <?php if ($comentarios && $comentarios->rowCount() > 0): ?>
                <?php while ($row = $comentarios->fetch(PDO::FETCH_ASSOC)): ?>
                    <p><?php echo htmlspecialchars($row['comentario']); ?></p>
                    <p><small><?php echo htmlspecialchars($row['dataHora']); ?></small></p>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Nenhum comentário encontrado</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
