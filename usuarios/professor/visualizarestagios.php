<?php
session_start();
    $nome = $_SESSION['nome'];
    $idProfessor= $_SESSION['idProfessor'];
require ('../../Classes/Estagio.php');
require ('../../Classes/Professor.php');


$estagio = new Estagio();
$professor = new ProfessorOrientador();

$estagios = $estagio->carregarTodosEstagios();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Estágios</title>
    <link rel="stylesheet" href="../../Styles/visualizarestagio.css">
</head>
<body>
    <?php
        include "./menu.php"
    ?>
    <br><br>
    <h1>Visualizar Estágios</h1>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Estágio</th>
            <th>Documentos</th>
            <th>Ações</th>
        </tr>
        <?php if ($estagios && $estagios->rowCount() > 0): ?>
            <?php while ($row = $estagios->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nome']); ?></td>
                    <td><?php echo htmlspecialchars($row['situacaoEstagio']); ?></td>
                    <td>
                        <a href="visualizardocumentos.php?idEstagio=<?php echo $row['idEstagio']; ?>">Visualizar</a>
                    </td>
                    <td>
                        <a href="excluir_estagio.php?idEstagio=<?php echo $row['idEstagio']; ?>" onclick="return confirm('Tem certeza que deseja excluir este estágio?');">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Nenhum estágio encontrado</td>
            </tr>
        <?php endif; ?>
    </table>

    <center><a class="btn" href="javascript:history.back()">Voltar</a></center>

</body>
    <script>
        document.write('<a href="' + document.referrer + '"');
    </script>
</html>
