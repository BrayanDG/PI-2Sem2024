<?php
// Dados de conexão do banco
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "estagioteste";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    // Definir o modo de erro do PDO para exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Conexão falhou: ' . $e->getMessage();
    exit;
}
?>
