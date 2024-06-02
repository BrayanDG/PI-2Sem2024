<?php
class Empresa {
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        include "./Conexao.php";
        $this->conn = $conn;
    }

    public function cadastrarEmpresa(
        $nomeFantasia,
        $representante,
        $cargoRepresentante,
        $telefone,
        $email,
        $cpfRepresentante,
        $endConcedente,
        $cnpj
    ) {
        $sql = "INSERT INTO empresas (nomeEmpresa, representanteEstagio, cargoRepresentante, telefone, email, cpfRepresentante, endereco, cnpj)
                VALUES (:nomeEmpresa, :representanteEstagio, :cargoRepresentante, :telefone, :email, :cpfRepresentante, :endereco, :cnpj)";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nomeEmpresa', $nomeFantasia);
            $stmt->bindParam(':representanteEstagio', $representante);
            $stmt->bindParam(':cargoRepresentante', $cargoRepresentante);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cpfRepresentante', $cpfRepresentante);
            $stmt->bindParam(':endereco', $endConcedente);
            $stmt->bindParam(':cnpj', $cnpj);
            $stmt->execute();
            echo "Empresa cadastrada com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao cadastrar empresa: " . $e->getMessage();
        }
    }

    public function carregarDadosEmpresa($cnpj) {
        $sql = "SELECT * FROM empresas WHERE cnpj = :cnpj";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cnpj', $cnpj);
            $stmt->execute();
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            return $linha;
        } catch (PDOException $e) {
            echo "Erro ao carregar dados da empresa: " . $e->getMessage();
        }
    }

    public function atualizarEmpresa(
        $nomeFantasia,
        $representante,
        $cargoRepresentante,
        $telefone,
        $email,
        $cpfRepresentante,
        $endConcedente,
        $cnpj
    ) {
        $sql = "UPDATE empresas 
                SET nomeEmpresa = :nomeEmpresa, 
                    representanteEstagio = :representanteEstagio, 
                    cargoRepresentante = :cargoRepresentante, 
                    telefone = :telefone, 
                    email = :email, 
                    cpfRepresentante = :cpfRepresentante, 
                    endereco = :endereco 
                WHERE cnpj = :cnpj";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nomeEmpresa', $nomeFantasia);
            $stmt->bindParam(':representanteEstagio', $representante);
            $stmt->bindParam(':cargoRepresentante', $cargoRepresentante);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cpfRepresentante', $cpfRepresentante);
            $stmt->bindParam(':endereco', $endConcedente);
            $stmt->bindParam(':cnpj', $cnpj);
            $stmt->execute();
            echo "Empresa atualizada com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao atualizar empresa: " . $e->getMessage();
        }
    }

    public function deletarEmpresa($cnpj) {
        $sql = "DELETE FROM empresas WHERE cnpj = :cnpj";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cnpj', $cnpj);
            $stmt->execute();
            echo "Empresa deletada com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao deletar empresa: " . $e->getMessage();
        }
    }
}
?>
