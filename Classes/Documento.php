<?php
class Documento {
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        include "Conexao.php";
        $this->conn = $conn;
    }

    public function cadastrarDocumento($idEstagio, $descricao, $caminho_arquivo_db) {
        // Preparar a declaração SQL
        $sql = "INSERT INTO documentos (idEstagio, descricao, statusDocumento, pdfarquivo) VALUES (:idEstagio, :descricao, 'Em análise', :pdfarquivo)";
        $stmt = $this->conn->prepare($sql);

        // Bind dos parâmetros
        $stmt->bindParam(':idEstagio', $idEstagio);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':pdfarquivo', $caminho_arquivo_db);

        // Executar a declaração SQL
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function atualizarDocumento($idDocumento, $idEstagio, $descricao, $caminho_arquivo_db = null) {
        // Atualizar documento com ou sem novo arquivo
        if ($caminho_arquivo_db) {
            // Preparar a declaração SQL com novo arquivo
            $sql = "UPDATE documentos SET idEstagio = :idEstagio, descricao = :descricao, pdfarquivo = :pdfarquivo WHERE idDocumento = :idDocumento";
            $stmt = $this->conn->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindParam(':idDocumento', $idDocumento);
            $stmt->bindParam(':idEstagio', $idEstagio);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':pdfarquivo', $caminho_arquivo_db);
        } else {
            // Preparar a declaração SQL sem novo arquivo
            $sql = "UPDATE documentos SET idEstagio = :idEstagio, descricao = :descricao WHERE idDocumento = :idDocumento";
            $stmt = $this->conn->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindParam(':idDocumento', $idDocumento);
            $stmt->bindParam(':idEstagio', $idEstagio);
            $stmt->bindParam(':descricao', $descricao);
        }

        // Executar a declaração SQL
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function carregarDocumentos($idEstagio) {
        $sql = "SELECT idDocumento, idEstagio, descricao, statusDocumento, pdfarquivo FROM documentos WHERE idEstagio = :idEstagio";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idEstagio', $idEstagio);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            return false;
        }
    }

    public function excluirDocumento($idDocumento) {
        $sql = "DELETE FROM documentos WHERE idDocumento = :idDocumento";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idDocumento', $idDocumento);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            return false;
        }
    }
}
?>
