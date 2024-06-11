<?php
session_start();
$nome = $_SESSION['nome'];
$idEstudante = $_SESSION['idEstudante'];

require ('../../Classes/Estagio.php');
require ('../../Classes/Documento.php');

$estagio = new Estagio();
$linhaEstagio = $estagio->carregarDadosEstagio($idEstudante);

$documento = new Documento();
$documentos = $documento->carregarDocumentos($linhaEstagio['idEstagio']);
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
                <div class="doc-estagio">
                    <div class="titulo-fantasia">
                        <h2>Documentos do Estágio</h2>
                    </div>
                    <br>
                    <table border="1">
                        <tr>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th>Ações</th>
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
                
                
                <div class="doc-estagio2">
                                <h2>Inserir Novo Documento</h2>
                    </div>

                    <div class="descritivo">
                                <center>
                                    <form id="fat" action="upload/gravardocumento.php" method="post" enctype="multipart/form-data">
                                        <label for="descricao">Descrição:</label>
                                        <select name="descricao" id="descricao">
                                            <option value="Termo de Compromisso">Termo de Compromisso</option>
                                            <option value="Plano de Atividade">Plano de Atividade</option>
                                            <option value="Relatório Parcial">Relatório Parcial</option>
                                            <option value="Relatório Final">Relatório Final</option>
                                        </select>
                                        <input type="hidden" name="statusDocumento" value="Em análise">
                                        <label for="pdfarquivo">Selecionar Documento:</label>
                                        <input type="file" name="pdfarquivo" id="pdfarquivo">
                                        <input type="hidden" name="idEstagio" value="<?php echo $linhaEstagio['idEstagio']; ?>">
                                        <button type="submit">Inserir</button>
                                    </form>
                                </center>
                        </div>
        </div>
    <div id="coment-main">
            <h2>Comentários</h2>
            <p><!-- Espaço para comentários vindo do banco de dados --></p>
    </div>
</body>
</html>
