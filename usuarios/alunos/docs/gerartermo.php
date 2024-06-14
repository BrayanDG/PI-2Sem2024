<?php
session_start();
if (!isset($_SESSION['nome']) || !isset($_SESSION['idEstudante'])) {
    // Redireciona para a página de erro ou login caso as variáveis de sessão não estejam definidas
    header('Location: usuario-erro.php');
    exit();
}
$nome = $_SESSION['nome'];
$idEstudante = $_SESSION['idEstudante'];

require ('../../../Classes/Estagio.php');
$estagio = new Estagio();

$linhaEstagio = $estagio->carregarDadosEstagio($idEstudante);

if ($linhaEstagio && isset($linhaEstagio['situacaoEstagio'])) {
    header('Location: ./remunerado/remunerado.php');
    exit();
}

$nomeFantasia = isset($_POST['nomeFantasia']) ? $_POST['nomeFantasia'] : null;
$representante = isset($_POST['representante']) ? $_POST['representante'] : null;
$cargoRepresentante = isset($_POST['cargoRepresentante']) ? $_POST['cargoRepresentante'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$cpfRepresentante = isset($_POST['cpfRepresentante']) ? $_POST['cpfRepresentante'] : null;
$endConcedente = isset($_POST['endConcedente']) ? $_POST['endConcedente'] : null;
$cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : null;
$remuneracao = isset($_POST['remuneracao']) ? $_POST['remuneracao'] : null;

// Verifica se todos os campos obrigatórios foram preenchidos
if ($nomeFantasia && $representante && $cargoRepresentante && $telefone && $email && $cpfRepresentante && $endConcedente && $cnpj && $remuneracao && $idEstudante) {
    // Salva os dados da empresa
    require_once "../../../Classes/Empresa.php";
    $empresa = new Empresa();
    $empresa->cadastrarEmpresa($nomeFantasia, $representante, $cargoRepresentante, $telefone, $email, $cpfRepresentante, $endConcedente, $cnpj);

    // Obter dados da empresa pelo CNPJ
    $dadosEmpresa = $empresa->carregarDadosEmpresa($cnpj);

    if ($dadosEmpresa && isset($dadosEmpresa['idEmpresa'])) {
        $idEmpresa = $dadosEmpresa['idEmpresa'];

        // Cria a solicitação de estágio
        require_once "../../../Classes/Estagio.php";
        $estagio = new Estagio();
        $situacaoEstagio = ""; // Adicione o valor apropriado ou obtenha de $_POST se necessário
        $notaFinal = ""; // Adicione o valor apropriado ou obtenha de $_POST se necessário
        $idProfessorOrientador = ""; // Adicione o valor apropriado ou obtenha de $_POST se necessário

        $estagio->cadastrarEstagio($situacaoEstagio, $notaFinal, $idEstudante, $idProfessorOrientador, $idEmpresa);

        // Redireciona para a documentação necessária
        if ($remuneracao == 'sim') {
            header('Location: remunerado/remunerado.php');
            exit();
        } elseif ($remuneracao == 'nao') {
            header('Location: naoremunerado/naoremunerado.php');
            exit();
        }
    } else {
        echo "Erro: Não foi possível obter os dados da empresa.";
    }
} else {
    echo "Erro: Todos os campos são obrigatórios.";
}
?>
