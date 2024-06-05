<?php
$email = $_POST['email'];
$senha = $_POST['senha'];

require ('../Classes/Conexao.php');
// Use prepared statements to avoid SQL injection
$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senha);
$stmt->execute();

$linha = $stmt->fetch(PDO::FETCH_ASSOC);

if ($linha) {
    $usuario_logado = $linha['email'];
    $tipoUsuario = $linha['tipoUsuario'];

    if ($tipoUsuario == 'prof') {
        session_start();
        $_SESSION['usuario_logado'] = $usuario_logado;
        header('Location: ./professor/professor.php');
    } else {
        session_start();
        $idUsuario = $linha['idUsuario'];

        require "../Classes/Estudante.php";
        $localizarEstudante = new Estudante();
        $linhaEstudante = $localizarEstudante->carregarDadosEstudanteporidusuario($idUsuario);
     

        if ($linhaEstudante) {
            $_SESSION['idEstudante'] = $linhaEstudante['idEstudante'];
            $_SESSION['nome'] = $linhaEstudante['nome'];
            $_SESSION['usuario_logado'] = $usuario_logado;
            header('Location: ./alunos/aluno.php');
        } else {
            // Estudante não encontrado
            header('Location: estudante-erro.php');
        }
    }
} else {
    // Usuário ou senha inválida
    header('Location: estudante-erro.php');
}
?>
