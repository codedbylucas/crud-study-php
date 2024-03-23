<?php 

$hostname = "localhost";
$database = "login";
$usuario = "root";
$senha = "";  // Substitua pela senha correta do seu banco de dados

try {
// Construa o DSN (Data Source Name) corretamente
$dsn = "mysql:host=$hostname;dbname=$database";

// Crie a conexão PDO com o DSN, usuário e senha
$pdo = new PDO($dsn, $usuario, $senha);

// Configure o modo de erro para exceção
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Mensagem de sucesso (opcional)
//echo "Conexão estabelecida com sucesso!";
} catch (PDOException $e) {
// Capture a exceção e exiba a mensagem de erro
echo "Falha ao conectar: (" . $e->getCode() . ") " . $e->getMessage();
}


