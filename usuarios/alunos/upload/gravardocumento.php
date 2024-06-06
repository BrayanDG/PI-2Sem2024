<?php
// Incluir o arquivo de conexão
include_once "../../../Classes/Conexao.php";
include_once "../../../Classes/Documento.php";

// Receber dados do formulário
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
$idEstagio = filter_input(INPUT_POST, 'idEstagio', FILTER_SANITIZE_NUMBER_INT);
$conteudo_pdf = isset($_FILES['pdfarquivo']) ? $_FILES['pdfarquivo'] : null;

if ($conteudo_pdf && $conteudo_pdf['error'] === UPLOAD_ERR_OK) {
    // Diretório onde o arquivo será salvo
    $diretorio_destino = __DIR__ . '/uploads/';

    // Verificar se o diretório existe, se não, criar
    if (!is_dir($diretorio_destino)) {
        mkdir($diretorio_destino, 0777, true);
    }

    // Gerar um nome aleatório para o arquivo
    $extensao = pathinfo($conteudo_pdf['name'], PATHINFO_EXTENSION);
    $nome_arquivo = uniqid() . '.' . $extensao;

    // Caminho completo para salvar o arquivo
    $caminho_arquivo = $diretorio_destino . $nome_arquivo;

    if (move_uploaded_file($conteudo_pdf['tmp_name'], $caminho_arquivo)) {
        // Armazenar apenas o caminho relativo no banco de dados
        $caminho_arquivo_db = 'uploads/' . $nome_arquivo;

        // Criar instância do documento e cadastrar
        $documento = new Documento();
        if ($documento->cadastrarDocumento($idEstagio, $descricao, $caminho_arquivo_db)) {
            echo "Documento cadastrado com sucesso";
            // Redirecionar após 3 segundos
            header("refresh:3; URL=../aluno.php");
        } else {
            echo "Erro ao gravar o registro";
        }
    } else {
        echo "Erro ao mover o arquivo";
    }
} else {
    echo "Erro ao carregar o arquivo";
}
?>
