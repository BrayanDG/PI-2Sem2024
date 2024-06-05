<?php
class Estagio {
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        include "Conexao.php";
        $this->conn = $conn;
    }

    public function cadastrarEstagio(
        $acompanhamentoEstagio,
        $notaFinal,
        $idEstudante,
        $idProfessorOrientador,
        $idDocumento,
        $idEmpresa
    ) {
        $sql = "INSERT INTO estagios (acompanhamentoEstagio, notaFinal, idEstudante, idProfessorOrientador, idDocumento, idEmpresa)
                VALUES (:acompanhamentoEstagio, :notaFinal, :idEstudante, :idProfessorOrientador, :idDocumento, :idEmpresa)";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':acompanhamentoEstagio', $acompanhamentoEstagio);
            $stmt->bindParam(':notaFinal', $notaFinal);
            $stmt->bindParam(':idEstudante', $idEstudante);
            $stmt->bindParam(':idProfessorOrientador', $idProfessorOrientador);
            $stmt->bindParam(':idDocumento', $idDocumento);
            $stmt->bindParam(':idEmpresa', $idEmpresa);
            $stmt->execute();
            echo "Estágio cadastrado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao cadastrar estágio: " . $e->getMessage();
        }
    }

    public function carregarDadosEstagio($idEstudante) {
        $sql = "SELECT * FROM estagios WHERE idEstudante = :idEstudante";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idEstudante', $idEstudante);
            $stmt->execute();
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            return $linha;
        } catch (PDOException $e) {
            echo "Erro ao carregar dados do estágio: " . $e->getMessage();
        }
    }

    public function atualizarEstagio(
        $idEstagio,
        $acompanhamentoEstagio,
        $notaFinal,
        $idEstudante,
        $idProfessorOrientador,
        $idDocumento,
        $idEmpresa
    ) {
        $sql = "UPDATE estagios 
                SET acompanhamentoEstagio = :acompanhamentoEstagio, 
                    notaFinal = :notaFinal, 
                    idEstudante = :idEstudante, 
                    idProfessorOrientador = :idProfessorOrientador, 
                    idDocumento = :idDocumento, 
                    idEmpresa = :idEmpresa 
                WHERE idEstagio = :idEstagio";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':acompanhamentoEstagio', $acompanhamentoEstagio);
            $stmt->bindParam(':notaFinal', $notaFinal);
            $stmt->bindParam(':idEstudante', $idEstudante);
            $stmt->bindParam(':idProfessorOrientador', $idProfessorOrientador);
            $stmt->bindParam(':idDocumento', $idDocumento);
            $stmt->bindParam(':idEmpresa', $idEmpresa);
            $stmt->bindParam(':idEstagio', $idEstagio);
            $stmt->execute();
            echo "Estágio atualizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao atualizar estágio: " . $e->getMessage();
        }
    }

    public function deletarEstagio($idEstudante) {
        $sql = "DELETE FROM estagios WHERE idEstudante = :idEstudante";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idEstudante', $$idEstudante);
            $stmt->execute();
            echo "Estágio deletado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao deletar estágio: " . $e->getMessage();
        }
    }
}
?>
