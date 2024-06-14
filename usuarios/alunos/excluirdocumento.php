<?php
// excluirdocumento.php

// Include the Documento class
require_once '../../Classes/Documento.php';

// Check if the idDocumento parameter is set
if (isset($_GET['idDocumento'])) {
    $idDocumento = $_GET['idDocumento'];

    // Create an instance of the Documento class
    $documento = new Documento();

    // Call the excluirDocumento method
    if ($documento->excluirDocumento($idDocumento)) {
        echo "Documento excluído com sucesso!";
        header("refresh:3; URL=./aluno.php");
    } else {
        echo "Erro ao excluir o documento.";
    }
} else {
    echo "ID do documento não fornecido.";
}
?>
