<?php
// Captura e validação dos dados de entrada
$nomeFantasia = isset($_POST['nomeFantasia']) ? $_POST['nomeFantasia'] : null;
$representante = isset($_POST['representante']) ? $_POST['representante'] : null;
$cargoRepresentante = isset($_POST['cargoRepresentante']) ? $_POST['cargoRepresentante'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$cpfRepresentante = isset($_POST['cpfRepresentante']) ? $_POST['cpfRepresentante'] : null;
$endConcedente = isset($_POST['endConcedente']) ? $_POST['endConcedente'] : null;
$cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : null;
$remuneracao = isset($_POST['remuneracao']) ? $_POST['remuneracao'] : null;
$idEstudante = isset($_POST['idEstudante']) ? $_POST['idEstudante'] : null;

// Verifica se todos os campos obrigatórios foram preenchidos
if ($nomeFantasia && $representante && $cargoRepresentante && $telefone && $email && $cpfRepresentante && $endConcedente && $cnpj && $remuneracao && $idEstudante) {
    // Salva os dados da empresa
    require_once "./Classes/Empresa.php";
    $empresa = new Empresa();
    $empresa->cadastrarEmpresa($nomeFantasia, $representante, $cargoRepresentante, $telefone, $email, $cpfRepresentante, $endConcedente, $cnpj);

    // Cria a solicitação de estágio
    require_once "./Classes/Estagio.php";
    $estagio = new Estagio();
    $acompanhamentoEstagio = ""; // Adicione o valor apropriado ou obtenha de $_POST se necessário
    $notaFinal = ""; // Adicione o valor apropriado ou obtenha de $_POST se necessário
    $idProfessorOrientador = ""; // Adicione o valor apropriado ou obtenha de $_POST se necessário
    $iddocumento = ""; // Adicione o valor apropriado ou obtenha de $_POST se necessário
    $idempresa = $cnpj; // Ou obtenha de outra fonte se necessário

    $estagio->cadastrarEstagio($acompanhamentoEstagio, $notaFinal, $idEstudante, $idProfessorOrientador, $iddocumento, $idempresa);

    // Redireciona para a documentação necessária
    if ($remuneracao == 'sim') {
        header('Location: remunerado/remunerado.php');
    } elseif ($remuneracao == 'nao') {
        header('Location: naoremunerado/naoremunerado.php');
    }
} else {
    echo "Erro: Todos os campos são obrigatórios.";
}
?>
