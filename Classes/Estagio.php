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
        $idEmpresa
    ) {
        $sql = "INSERT INTO estagios (acompanhamentoEstagio, dataInicio, dataFim, notaFinal, idEstudante, idProfessorOrientador, idEmpresa)
                VALUES (:acompanhamentoEstagio, NULL, NULL, :notaFinal, :idEstudante, :idProfessorOrientador, :idEmpresa)";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':acompanhamentoEstagio', $acompanhamentoEstagio);
            $stmt->bindParam(':notaFinal', $notaFinal);
            $stmt->bindParam(':idEstudante', $idEstudante);
            $stmt->bindParam(':idProfessorOrientador', $idProfessorOrientador);
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

    public function carregarEstagioPorIdEstagio($idEstagio) {
        $sql = "SELECT * FROM estagios WHERE idEstagio = :idEstagio";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idEstagio', $idEstagio);
            $stmt->execute();
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            return $linha;
        } catch (PDOException $e) {
            echo "Erro ao carregar dados do estágio: " . $e->getMessage();
        }
    }

    public function atualizarEstagio(
        $idEstagio,
        $acompanhamentoEstagio = null,
        $notaFinal = null,
        $idEstudante = null,
        $idProfessorOrientador = null,
        $idEmpresa = null,
        $dataInicio = null,
        $dataFim = null
    ) {
        // Verificação se o ID do estágio foi fornecido
        if ($idEstagio === null) {
            echo "ID do estágio não fornecido.";
            return;
        }
    
        // Criação da lista de campos a serem atualizados
        $fieldsToUpdate = [];
        if ($acompanhamentoEstagio !== null) {
            $fieldsToUpdate['acompanhamentoEstagio'] = $acompanhamentoEstagio;
        }
        if ($notaFinal !== null) {
            $fieldsToUpdate['notaFinal'] = $notaFinal;
        }
        if ($idEstudante !== null) {
            $fieldsToUpdate['idEstudante'] = $idEstudante;
        }
        if ($idProfessorOrientador !== null) {
            $fieldsToUpdate['idProfessorOrientador'] = $idProfessorOrientador;
        }
        if ($idEmpresa !== null) {
            $fieldsToUpdate['idEmpresa'] = $idEmpresa;
        }
        if ($dataInicio !== null) {
            $fieldsToUpdate['dataInicio'] = $dataInicio;
        }
        if ($dataFim !== null) {
            $fieldsToUpdate['dataFim'] = $dataFim;
        }
    
        // Verificação se há campos para atualizar
        if (empty($fieldsToUpdate)) {
            echo "Nenhum campo para atualizar.";
            return;
        }
    
        // Construção da consulta SQL dinâmica
        $sql = "UPDATE estagios SET ";
        $sqlParts = [];
        foreach ($fieldsToUpdate as $field => $value) {
            $sqlParts[] = "$field = :$field";
        }
        $sql .= implode(", ", $sqlParts);
        $sql .= " WHERE idEstagio = :idEstagio";
    
        try {
            $stmt = $this->conn->prepare($sql);
    
            // Vinculação dos parâmetros dinamicamente
            foreach ($fieldsToUpdate as $field => &$value) {
                $stmt->bindParam(":$field", $value);
            }
            $stmt->bindParam(':idEstagio', $idEstagio, PDO::PARAM_INT);
    
            // Execução da consulta
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

    public function carregarTodosEstagios() {
        $query = "
            SELECT e.idEstagio, es.nome, e.acompanhamentoEstagio
            FROM estagios e
            INNER JOIN estudantes es ON e.idEstudante = es.idEstudante
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>
