<?php
session_start();

// Obtém os dados das variáveis de sessão
$atividades = $_SESSION["atividades"];
$descricoes = $_SESSION["descricoes"];
$objetivos = $_SESSION["objetivos"];
$inicio = $_SESSION["inicio"];
$termino = $_SESSION["termino"];
?>

<table>
e<tr>
<th>Atividade</th>
<th>Descrição</th>
<th>Objetivo ou Resultado Esperado</th>
<th>Início</th>
<th>Término</th>
</tr>
<?foreach ($atividades as $i => $atividade) {?>
    <tr>
    <td><?htmlspecialchars($atividade);?></td>
    <td><?htmlspecialchars($descricoes[$i]);?></td>
    <td><?htmlspecialchars($objetivos[$i]);?></td>
    <td><?htmlspecialchars($inicio[$i]);?></td>
    <td><?htmlspecialchars($termino[$i]);?></td>
    </tr>
<?}?>
</table>
?>
