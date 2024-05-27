<?php
  $atividades = $_POST["atividade"];
  $descricao = $_POST["descricao"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h3>
        Plano de Atividade
    </h3>
    <div id="dados">
        
    </div>

    <div id="tabela">
        <div class="cabecalhotabela">
            <div><span>Atividade</span></div>
            <div><span>Descrição</span></div>
            <div><span>Objetivo</span></div>
            <div><span>Inicio</span></div>
            <div><span>Fim</span></div>
        </div>
        <?=$atividades?>

        <?php
            foreach($atividades as $index => $atividade){
                echo ($atividade. "<br>");
                echo ($descricao[$index]. "<br>");
            }
        ?>
    
    </div>

</body>
</html>
