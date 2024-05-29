<?php
// Incluir o arquivo de conexão
include_once "../../../Classes/Conexao.php";

// Receber dados do formulário
$documentoaluno = filter_input(INPUT_POST, 'documentoaluno', FILTER_SANITIZE_SPECIAL_CHARS);
$conteudo_pdf = $_FILES['pdfarquivo'];

// Diretório onde o arquivo será salvo
$diretorio_destino = __DIR__ . '/uploads/';

// Verificar se o diretório existe, se não, criar
if (!is_dir($diretorio_destino)) {
    mkdir($diretorio_destino, 0777, true);
}

// Verificar se o arquivo foi carregado com sucesso
if ($conteudo_pdf['error'] === UPLOAD_ERR_OK) {
    // Gerar um nome aleatório para o arquivo
    $extensao = pathinfo($conteudo_pdf['name'], PATHINFO_EXTENSION);
    $nome_arquivo = uniqid() . '.' . $extensao;

    // Caminho completo para salvar o arquivo
    $caminho_arquivo = $diretorio_destino . $nome_arquivo;

    if (move_uploaded_file($conteudo_pdf['tmp_name'], $caminho_arquivo)) {
        // Armazenar apenas o caminho relativo no banco de dados
        $caminho_arquivo_db = 'uploads/' . $nome_arquivo;

        // Preparar a declaração SQL
        $sql = "INSERT INTO documento (documentoaluno, pdfarquivo) VALUES (:documentoaluno, :pdfarquivo)";
        $stmt = $conn->prepare($sql);

        // Bind dos parâmetros
        $stmt->bindParam(':documentoaluno', $documentoaluno);
        $stmt->bindParam(':pdfarquivo', $caminho_arquivo_db);

        // Executar a declaração SQL
        if ($stmt->execute()) {
            echo "Registro gravado com sucesso";
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
