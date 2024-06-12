<?php
// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variáveis do termo
    $horariodeentrada = $_POST["horariodeentrada"] ?? null;
    $horariodesaida = $_POST["horariodesaida"] ?? null;
    $horariodeiniciodarefeicao = $_POST["horariodeiniciodarefeicao"] ?? null;
    $horariodefimdarefeicao = $_POST["horariodefimdarefeicao"] ?? null;
    $datadeinicio = $_POST["datadeinicio"] ?? null;
    $datadefim = $_POST["datadefim"] ?? null;
    $apolice = $_POST["apolice"] ?? null;
    $seguradora = $_POST["seguradora"] ?? null;

    // Inicia a sessão
    session_start();
    require '../../../../Classes/Estagio.php';
    $estagio = new Estagio;
    $linhaEstagio = $estagio->carregarDadosEstagio($_SESSION['idEstudante']);
    $_SESSION["idEstagio"] = $linhaEstagio['idEstagio'];

    // Armazena as variáveis na sessão
    $_SESSION["horariodeentrada"] = $horariodeentrada;
    $_SESSION["horariodesaida"] = $horariodesaida;
    $_SESSION["horariodeiniciodarefeicao"] = $horariodeiniciodarefeicao;
    $_SESSION["horariodefimdarefeicao"] = $horariodefimdarefeicao;
    $_SESSION["datadeinicio"] = $datadeinicio;
    $_SESSION["datadefim"] = $datadefim;
    $_SESSION["apolice"] = $apolice;
    $_SESSION["seguradora"] = $seguradora;

    // Verifica se idEstagio está definido na sessão
    if (isset($_SESSION["idEstagio"])) {
        $idEstagio = $_SESSION["idEstagio"];


        // Atualiza o estagio com as novas datas
        $estagio->atualizarEstagio(
            $idEstagio,
            null, // Assumindo que acompanhamentoEstagio não é atualizado aqui
            null, // Assumindo que notaFinal não é atualizado aqui
            null, // Assumindo que idEstudante não é atualizado aqui
            null, // Assumindo que idProfessorOrientador não é atualizado aqui
            null, // Assumindo que idEmpresa não é atualizado aqui
            $datadeinicio,
            $datadefim
        );

        // Redireciona para a página gerarpdftermo.php
        header("Location: gerarpdftermo.php");
        exit();
    } else {
        echo "ID do estágio não definido na sessão.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
