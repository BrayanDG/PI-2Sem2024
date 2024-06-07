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

    session_start();

    if ($tipoUsuario == 'prof') {
        $idUsuario = $linha['idUsuario'];

        require "../Classes/Professor.php";
        $localizarProfessor = new ProfessorOrientador();
        $linhaProfessor = $localizarProfessor->carregarDadosProfessorIdUsuario($idUsuario);

        if ($linhaProfessor) {
            $_SESSION['idProfessor'] = $linhaProfessor['idProfessorOrientador'];
            $_SESSION['nome'] = $linhaProfessor['nome'];
            $_SESSION['usuario_logado'] = $usuario_logado;
            header('Location: ./professor/professor.php');
        } else {
            // Professor não encontrado
            header('Location: usuario-erro.php');
        }
    } elseif ($tipoUsuario == 'aluno') {
        $idUsuario = $linha['idUsuario'];

        require "../Classes/Estudante.php";
        $localizarEstudante = new Estudante();
        $linhaEstudante = $localizarEstudante->carregarDadosEstudanteIdUsuario($idUsuario);

        if ($linhaEstudante) {
            $_SESSION['idEstudante'] = $linhaEstudante['idEstudante'];
            $_SESSION['nome'] = $linhaEstudante['nome'];
            $_SESSION['usuario_logado'] = $usuario_logado;
            header('Location: ./alunos/aluno.php');
        } else {
            // Estudante não encontrado
            header('Location: usuario-erro.php');
        }
    } else {
        // Tipo de usuário não encontrado
        header('Location: usuario-erro.php');
    }
} else {
    // Usuário ou senha inválida
    header('Location: usuario-erro.php');
}
?>
