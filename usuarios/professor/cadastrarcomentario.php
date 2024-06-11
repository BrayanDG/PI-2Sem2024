<?php
session_start();
$idProfessor= $_SESSION['idProfessor'];


include_once '../../Classes/Comentario.php';

$message = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idEstagio = isset($_GET['idEstagio']) ? $_GET['idEstagio'] : null;
    $idProfessorOrientador = 1; // Substitua pelo id real do professor orientador
    $comentario = isset($_POST['comentario']) ? $_POST['comentario'] : '';

    if ($idEstagio && $comentario) {
        $comentarioObj = new Comentario();
        if ($comentarioObj->cadastrarComentario($idEstagio, $idProfessorOrientador, $comentario)) {
            $message = "Comentário cadastrado com sucesso!";
            $success = true;
        } else {
            $message = "Erro ao cadastrar comentário.";
        }
    } else {
        $message = "Dados incompletos.";
    }
} else {
    $message = "Método de requisição inválido.";
}

if ($success) {
    echo $message;
    header("refresh:2;url=visualizardocumentos.php?idEstagio=$idEstagio");
    exit();
} else {
    echo $message;
}
?>
