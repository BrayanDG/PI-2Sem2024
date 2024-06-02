<?php
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios
        WHERE email = '{$email}'
        AND senha = '{$senha}'";

include "../Classes/Conexao.php";

$resultado = $conn->query($sql);
$linha = $resultado->fetch();

$usuario_logado = $linha['email'];
$tipoUsuario = $linha['tipoUsuario'];

if ($tipoUsuario == 'prof'){
	if ($usuario_logado == null) {
		// Usuário ou senha inválida
		header('Location: usuario-erro.php');
	} 
	else {
		session_start();
		$_SESSION['usuario_logado'] = $usuario_logado;
		header('Location: ./professor/professor.php');
	}
} else {
	if ($usuario_logado == null) {
		// Usuário ou senha inválida
		header('Location: usuario-erro.php');
	} 
	else {
		session_start();

		$idUsuario = $linha['idUsuarios'];

		//indentificando o estudante e armazenando na variavel de sessão

		include "../Classes/Conexao.php";

		$sql = "SELECT * FROM estudantes
        WHERE idUsuario = '{$idUsuario}'
        ";

		$resultado = $conn->query($sql);
		$linha = $resultado->fetch();

		$_SESSION['idEstudante'] = $linha['idEstudante'];
		$_SESSION['nome'] = $linha['nome'];

		$_SESSION['usuario_logado'] = $usuario_logado;


		header('Location: ./alunos/aluno.php');
	}
}


?>
