<?php

include('conexaologin.php');

$usuario = 'root';
$senha = '';
$database = 'cadastro de usuarios';
$host = 'localhost';

$conn = new mysqli($host, $usuario, $senha, $database);

if ($conn->connect_error) {
	die("Falha na conexão: " . $conn->connect_error);
}

if (isset($_POST['Nome'])) {
	$Nome = $_POST['Nome'];
}

if (isset($_POST['sobrenome'])) {
	$sobrenome = $_POST['sobrenome'];
}

if (isset($_POST['cpf'])) {
	$cpf = $_POST['cpf'];
}

if (isset($_POST['cep'])) {
	$cep = $_POST['cep'];
}

if (isset($_POST['endereco'])) {
	$rua = $_POST['endereco'];
}

if (isset($_POST['cidade'])) {
	$cidade = $_POST['cidade'];
}

if (isset($_POST['estado'])) {
	$estado = $_POST['estado'];
}

if (isset($_POST['usuario'])) {
	$usuario = $_POST['usuario'];
}

if (isset($_POST['email'])) {
	$email = $_POST['email'];
}

if (isset($_POST['senha'])) {
	$senha = $_POST['senha'];
}



$sql = "INSERT INTO usuarios (Nome, Sobrenome, CPF, CEP, Rua, Cidade, Estado, Usuario, Email, Senha)
        VALUES ('$Nome', '$sobrenome', '$cpf', '$cep', '$rua', '$cidade', '$estado', '$usuario', '$email', '$senha')";

if ($conn->query($sql) === TRUE) {
	echo "Dados inseridos com sucesso!";
} else {
	echo "Erro ao inserir os dados: " . $conn->error;
}


$conn->close();
?>
<html>
<p>
	<a href="index.php">Voltar ao login</a>
</p>

</html>