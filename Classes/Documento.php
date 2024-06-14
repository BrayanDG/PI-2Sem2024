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
        // Buscar dados existentes
        $sql = "SELECT idEstagio, descricao, pdfarquivo FROM documentos WHERE idDocumento = :idDocumento";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idDocumento', $idDocumento);
        $stmt->execute();
        $documentoExistente = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se não encontrar o documento, retornar falso
        if (!$documentoExistente) {
            return false;
        }

        // Manter os dados antigos se não forem alterados
        if ($idEstagio === null) {
            $idEstagio = $documentoExistente['idEstagio'];
        }
        if ($descricao === null) {
            $descricao = $documentoExistente['descricao'];
        }
        if ($caminho_arquivo_db === null) {
            $caminho_arquivo_db = $documentoExistente['pdfarquivo'];
        }

        // Preparar a declaração SQL com os dados atualizados
        $sql = "UPDATE documentos SET idEstagio = :idEstagio, descricao = :descricao, pdfarquivo = :pdfarquivo WHERE idDocumento = :idDocumento";
        $stmt = $this->conn->prepare($sql);

        // Bind dos parâmetros
        $stmt->bindParam(':idDocumento', $idDocumento);
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
        

            // Prossegue para excluir o registro do documento no banco de dados
            $sqlDelete = "DELETE FROM documentos WHERE idDocumento = :idDocumento";
            
            try {
                $stmtDelete = $this->conn->prepare($sqlDelete);
                $stmtDelete->bindParam(':idDocumento', $idDocumento);

                if ($stmtDelete->execute()) {
                    return true;
                }
                return false;
            } catch (PDOException $exception) {
                echo "Erro: " . $exception->getMessage();
                return false;
            }
        } 
    
    public function carregarDocumentoPorId($idDocumento) {
        $sql = "SELECT idEstagio, descricao, pdfarquivo, statusDocumento FROM documentos WHERE idDocumento = :idDocumento";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idDocumento', $idDocumento);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            return false;
        }
    }

    public function atualizarStatusDocumento($idDocumento, $statusDocumento) {
        $sql = "UPDATE documentos SET statusDocumento = :statusDocumento WHERE idDocumento = :idDocumento";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idDocumento', $idDocumento);
        $stmt->bindParam(':statusDocumento', $statusDocumento);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
