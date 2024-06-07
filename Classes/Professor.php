<?php
class ProfessorOrientador {
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        include "Conexao.php";
        $this->conn = $conn;
    }

    // Cadastrar novo professor orientador
    public function cadastrarProfessorOrientador($idUsuario, $nome, $curso) {
        $query = "INSERT INTO professoresorientador (idUsuario, nome, curso) VALUES (:idUsuario, :nome, :curso)";
        $stmt = $this->conn->prepare($query);

        // Sanitizar
        $idUsuario = htmlspecialchars(strip_tags($idUsuario));
        $nome = htmlspecialchars(strip_tags($nome));
        $curso = htmlspecialchars(strip_tags($curso));

        // Bind dos parâmetros
        $stmt->bindParam(":idUsuario", $idUsuario);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":curso", $curso);

        // Executar query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Carregar todos os professores orientadores
    public function carregarProfessoresOrientadores() {
        $query = "SELECT idProfessorOrientador, idUsuario, nome, curso FROM professoresorientador";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Atualizar professor orientador
    public function atualizarProfessorOrientador($idProfessorOrientador, $idUsuario, $nome, $curso) {
        $query = "UPDATE professoresorientador SET idUsuario = :idUsuario, nome = :nome, curso = :curso WHERE idProfessorOrientador = :idProfessorOrientador";
        $stmt = $this->conn->prepare($query);

        // Sanitizar
        $idProfessorOrientador = htmlspecialchars(strip_tags($idProfessorOrientador));
        $idUsuario = htmlspecialchars(strip_tags($idUsuario));
        $nome = htmlspecialchars(strip_tags($nome));
        $curso = htmlspecialchars(strip_tags($curso));

        // Bind dos parâmetros
        $stmt->bindParam(":idProfessorOrientador", $idProfessorOrientador);
        $stmt->bindParam(":idUsuario", $idUsuario);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":curso", $curso);

        // Executar query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Excluir professor orientador
    public function excluirProfessorOrientador($idProfessorOrientador) {
        $query = "DELETE FROM professoresorientador WHERE idProfessorOrientador = :idProfessorOrientador";
        $stmt = $this->conn->prepare($query);

        // Sanitizar
        $idProfessorOrientador = htmlspecialchars(strip_tags($idProfessorOrientador));

        // Bind do parâmetro
        $stmt->bindParam(":idProfessorOrientador", $idProfessorOrientador);

        // Executar query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

// Exemplo de uso:
// require_once 'database.php';
// $database = new Database();
// $db = $database->getConnection();

// $professorOrientador = new ProfessorOrientador($db);

// Cadastrar professor orientador
// if ($professorOrientador->cadastrarProfessorOrientador(1, "Nome do Professor", "Curso do Professor")) {
//     echo "Professor orientador cadastrado com sucesso.";
// } else {
//     echo "Não foi possível cadastrar o professor orientador.";
// }

// Carregar todos os professores orientadores
// $stmt = $professorOrientador->carregarProfessoresOrientadores();
// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     extract($row);
//     echo "ID: {$idProfessorOrientador} - Nome: {$nome} - Curso: {$curso}<br>";
// }

// Atualizar professor orientador
// if ($professorOrientador->atualizarProfessorOrientador(1, 1, "Nome atualizado", "Curso atualizado")) {
//     echo "Professor orientador atualizado com sucesso.";
// } else {
//     echo "Não foi possível atualizar o professor orientador.";
// }

// Excluir professor orientador
// if ($professorOrientador->excluirProfessorOrientador(1)) {
//     echo "Professor orientador excluído com sucesso.";
// } else {
//     echo "Não foi possível excluir o professor orientador.";
// }
?>
