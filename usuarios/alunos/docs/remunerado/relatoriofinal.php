<?php
require "../../../../Classes/Estagio.php";
require "../../../../Classes/Empresa.php";
require "../../../../Classes/Estudante.php";


session_start();


$estagio = new Estagio;
$dadosEstagio  = $estagio->carregarDadosEstagio($_SESSION['idEstudante']);

$empresa = new Empresa();
$dadosEmpresa  = $empresa->carregarDadosEmpresaPorId($dadosEstagio['idEmpresa']);

$estudante = new Estudante();
$dadosEstudante = $estudante->carregarDadosEstudante($_SESSION['idEstudante']);


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Final de Estágio</title>
</head>
<body>
    <h1>Relatório Final de Estágio</h1>
    
    <h2>1. Dados do Estagiário</h2>
    <p>Nome: <?= htmlspecialchars($dadosEstudante['nome']); ?></p>
    <p>RA: <?= htmlspecialchars($dadosEstudante['RA']); ?></p>
    <p>Curso: DSM - Desenvolvimento de Software Multiplataforma</p>

    <h2>2. Dados da Empresa Concedente</h2>
    <p>Nome da empresa: <?= htmlspecialchars($dadosEmpresa['nomeEmpresa']); ?></p>
    <p>Nome do supervisor do estagiário: <?= htmlspecialchars($dadosEmpresa['representanteEstagio']); ?></p>
    <p>Cargo do supervisor do estagiário: <?= htmlspecialchars($dadosEmpresa['cargoRepresentante']); ?></p>

    <h2>3. Período</h2>
    <p>Data de início do estágio: <?= htmlspecialchars($dadosEstagio['dataInicio']); ?></p>
    <p>Data de término do estágio: <?= htmlspecialchars($dadosEstagio['dataFim']); ?></p>

    <h2>4. Atividades realizadas no Estágio (preenchido pelo estagiário)</h2>
    <p>Descreva as principais atividades desenvolvidas durante o estágio.</p>
    <p>As atividades realizadas atenderam às suas expectativas? Explique.</p>
    <p>Por meio das atividades desenvolvidas no estágio você teve condições de aplicar os conhecimentos teóricos e práticos obtidos durantes o curso? Explique</p>
    <p>Descreva os principais desafios encontrados no seu estágio e como foram resolvidos.</p>

    <h2>5. Avaliação do Supervisor</h2>
    <p>Planejamento: O estagiário planeja as atividades procurando estabelecer prioridades e metas.</p>
    <p>Qualidade do Trabalho: O estagiário executa as atividades com qualidade, tendo em vista as condições de trabalho oferecidas.</p>
    <p>Pontualidade e Assiduidade: O estagiário cumpre com os horários, sem atrasos ou faltas.</p>
    <p>Disciplina: O estagiário cumpre as normas vigentes na empresa, bem como as normas de segurança e o uso de EPI quando necessário.</p>
    <p>Iniciativa e Participação: O estagiário é participativo, procura apresentar ideias para a melhoria dos processos, das atividades e do ambiente de trabalho.</p>
    <p>Relacionamento em Grupo: O estagiário procura manter bom relacionamento com todos, sendo prestativo e participativo.</p>
    <p>Responsabilidade e Comprometimento: O estagiário entende as tarefas atribuídas e entende como realiza-las; realiza as tarefas com autonomia, respeitando os prazos estabelecidos para cada tarefa realizada.</p>
    <p>Organização: O estagiário mantém o local de trabalho organizado, consegue administrar o tempo com facilidade, e localiza facilmente as atividades realizadas ou as entregas feitas.</p>
    <p>Comunicação: O estagiário se expressa bem, com clareza, desenvoltura e segurança tanto na comunicação oral quanto na escrita.</p>

    <p>Comentários adicionais:</p>

    <p>Data: ____/_____/ ___________</p>

    <p>Estagiário Supervisor do Estagiário  Professor Orientador</p>
</body>
</html>
