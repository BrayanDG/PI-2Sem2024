<?php
class Estagio {
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        include "./Conexao.php";
        $this->conn = $conn;
    }

    public function cadastrarEstagio(
        $acompanhamentoEstagio,
        $notaFinal,
        $idEstudante,
        $idProfessorOrientador,
        $iddocumento,
        $idempresa
    ) {
        $sql = "INSERT INTO estagios (acompanhamentoEstagio, notaFinal, idEstudante, idProfessorOrientador, iddocumento, idempresa)
                VALUES (:acompanhamentoEstagio, :notaFinal, :idEstudante, :idProfessorOrientador, :iddocumento, :idempresa)";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':acompanhamentoEstagio', $acompanhamentoEstagio);
            $stmt->bindParam(':notaFinal', $notaFinal);
            $stmt->bindParam(':idEstudante', $idEstudante);
            $stmt->bindParam(':idProfessorOrientador', $idProfessorOrientador);
            $stmt->bindParam(':iddocumento', $iddocumento);
            $stmt->bindParam(':idempresa', $idempresa);
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
        $idestagio,
        $acompanhamentoEstagio,
        $notaFinal,
        $idEstudante,
        $idProfessorOrientador,
        $iddocumento,
        $idempresa
    ) {
        $sql = "UPDATE estagios 
                SET acompanhamentoEstagio = :acompanhamentoEstagio, 
                    notaFinal = :notaFinal, 
                    idEstudante = :idEstudante, 
                    idProfessorOrientador = :idProfessorOrientador, 
                    iddocumento = :iddocumento, 
                    idempresa = :idempresa 
                WHERE idestagio = :idestagio";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':acompanhamentoEstagio', $acompanhamentoEstagio);
            $stmt->bindParam(':notaFinal', $notaFinal);
            $stmt->bindParam(':idEstudante', $idEstudante);
            $stmt->bindParam(':idProfessorOrientador', $idProfessorOrientador);
            $stmt->bindParam(':iddocumento', $iddocumento);
            $stmt->bindParam(':idempresa', $idempresa);
            $stmt->bindParam(':idestagio', $idestagio);
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
