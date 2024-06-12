<?php
class Estudante {
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        include "Conexao.php";
        $this->conn = $conn;
    }

    public function cadastrarEstudante(
        $nome,
        $RG,
        $RA,
        $logradouro,
        $numeroResidencia,
        $cidade,
        $bairro,
        $idUsuario
    ) {
        $sql = "INSERT INTO estudantes (nome, RG, RA, logradouro, numeroResidencia, cidade, bairro, idUsuario)
                VALUES (:nome, :RG, :RA, :logradouro, :numeroResidencia, :cidade, :bairro, :idUsuario)";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':RG', $RG);
            $stmt->bindParam(':RA', $RA);
            $stmt->bindParam(':logradouro', $logradouro);
            $stmt->bindParam(':numeroResidencia', $numeroResidencia);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':idUsuario', $idUsuario);
            $stmt->execute();
            echo "Estudante cadastrado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao cadastrar estudante: " . $e->getMessage();
        }
    }

    public function carregarDadosEstudante($idEstudante) {
        $sql = "SELECT * FROM estudantes WHERE idEstudante = :idEstudante";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idEstudante', $idEstudante);
            $stmt->execute();
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            return $linha;
        } catch (PDOException $e) {
            echo "Erro ao carregar dados do estudante: " . $e->getMessage();
        }
    }

    public function carregarDadosEstudanteIdUsuario($idUsuario) {
        $sql = "SELECT * FROM estudantes WHERE idUsuario = :idUsuario";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idUsuario', $idUsuario);
            $stmt->execute();
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            return $linha;
        } catch (PDOException $e) {
            echo "Erro ao carregar dados do estudante: " . $e->getMessage();
        }
    }

    public function atualizarEstudante(
        $idEstudante,
        $nome,
        $RG,
        $RA,
        $logradouro,
        $numeroResidencia,
        $cidade,
        $bairro,
        $idUsuario
    ) {
        $sql = "UPDATE estudantes 
                SET nome = :nome, 
                    RG = :RG, 
                    RA = :RA,
                    logradouro = :logradouro, 
                    numeroResidencia = :numeroResidencia, 
                    cidade = :cidade, 
                    bairro = :bairro, 
                    idUsuario = :idUsuario 
                WHERE idEstudante = :idEstudante";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idEstudante', $idEstudante);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':RG', $RG);
            $stmt->bindParam(':RA', $RA);
            $stmt->bindParam(':logradouro', $logradouro);
            $stmt->bindParam(':numeroResidencia', $numeroResidencia);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':idUsuario', $idUsuario);
            $stmt->execute();
            echo "Estudante atualizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao atualizar estudante: " . $e->getMessage();
        }
    }

    public function deletarEstudante($idEstudante) {
        $sql = "DELETE FROM estudantes WHERE idEstudante = :idEstudante";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idEstudante', $idEstudante);
            $stmt->execute();
            echo "Estudante deletado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao deletar estudante: " . $e->getMessage();
        }
    }
}
?>
