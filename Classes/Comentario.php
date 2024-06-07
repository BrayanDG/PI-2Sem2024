<?php
class Comentario {
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        include "Conexao.php";
        $this->conn = $conn;
    }
    // Cadastrar novo comentário
    public function cadastrarComentario($idEstagio, $idProfessorOrientador, $comentario) {
        $query = "INSERT INTO comentarios SET idEstagio=:idEstagio, idProfessorOrientador=:idProfessorOrientador, comentario=:comentario, dataHora=NOW()";
        $stmt = $this->conn->prepare($query);

        // Sanitizar
        $idEstagio = htmlspecialchars(strip_tags($idEstagio));
        $idProfessorOrientador = htmlspecialchars(strip_tags($idProfessorOrientador));
        $comentario = htmlspecialchars(strip_tags($comentario));

        // Bind dos parâmetros
        $stmt->bindParam(":idEstagio", $idEstagio);
        $stmt->bindParam(":idProfessorOrientador", $idProfessorOrientador);
        $stmt->bindParam(":comentario", $comentario);

        // Executar query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Carregar comentários por estágio
    public function carregarComentariosPorEstagio($idEstagio) {
        $query = "SELECT * FROM comentarios WHERE idEstagio = :idEstagio";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idEstagio', $idEstagio);
        $stmt->execute();
        return $stmt;
    }

    // Atualizar comentário
    public function atualizarComentario($idComentario, $comentario) {
        $query = "UPDATE comentarios SET comentario = :comentario WHERE idComentario = :idComentario";
        $stmt = $this->conn->prepare($query);

        // Sanitizar
        $idComentario = htmlspecialchars(strip_tags($idComentario));
        $comentario = htmlspecialchars(strip_tags($comentario));

        // Bind dos parâmetros
        $stmt->bindParam(":idComentario", $idComentario);
        $stmt->bindParam(":comentario", $comentario);

        // Executar query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Excluir comentário
    public function excluirComentario($idComentario) {
        $query = "DELETE FROM comentarios WHERE idComentario = :idComentario";
        $stmt = $this->conn->prepare($query);

        // Sanitizar
        $idComentario = htmlspecialchars(strip_tags($idComentario));

        // Bind do parâmetro
        $stmt->bindParam(":idComentario", $idComentario);

        // Executar query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
