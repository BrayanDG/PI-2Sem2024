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

    <h2>Avaliação do Supervisor</h2>
    <p>Nos últimos 6 meses, as atividades descritas no plano de atividades foram efetivamente realizadas pelo estagiário? ________</p>
    <p>a. Assiduidade e pontualidade</p>
    <p>b.Capacidade de trabalho em equipe</p>
    <p>c.Conhecimentos teóricos e capacidade técnica</p>
    <p>d.Criatividade e capacidade de inovação</p>
    <p>e.Expressão oral e escrita</p>
    <p>f.Iniciativa e capacidade de liderança</p>
    <p>g.Interesse pela empresa e pela área de atuação</p>
    <p>h.Motivação e proatividade</p>
    <p>i.Profissionalismo e comportamento</p>
    <p>j.Relacionamento interpessoal</p>
    <p>k.Comprometimento</p>

 

Comentários e observações 

    <p>Data: ____/_____/ ___________</p>

    <p>Estagiário Supervisor do Estagiário  Professor Orientador</p>
</body>
</html>