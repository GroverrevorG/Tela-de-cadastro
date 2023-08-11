<?php

include('conexaologin.php');

if (isset($_POST['Email']) || isset($_POST['Senha'])) {

	if (strlen($_POST['Email']) == 0) {
		echo "Preencha seu e-mail";
	} else if (strlen($_POST['Senha']) == 0) {
		echo "Preencha sua senha";
	} else {

		$email = $mysqli->real_escape_string($_POST['Email']);
		$senha = $mysqli->real_escape_string($_POST['Senha']);

		$sql_code = "SELECT * FROM usuarios WHERE Email = '$email' AND Senha = '$senha'";
		$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

		$quantidade = $sql_query->num_rows;

		if ($quantidade == 1) {

			$usuario = $sql_query->fetch_assoc();

			if (!isset($_SESSION)) {
				session_start();
			}

			$_SESSION['ID'] = $usuario['ID'];
			$_SESSION['Nome'] = $usuario['Nome'];

			header("Location: painel.php");

		} else {
			print "<script>alert('Falha ao logar! E-mail ou senha incorretos')</script>";
		}

	}

}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="yon.css">
	<link rel="stylesheet" type="text/css" href="yon2.css">

</head>

<body>
	<form action="" method="post">

		<div id="login-screen" class="margin-center-50">
			<div class="container-login">
				<div class="wrap-login">
					<form class="login-form">
						<span class="login-form-title">
							Faça o login
						</span>

						<div class="wrap-input margin-top-35 margin-bottom-35">
							<input class="input-form" type="email" name="Email" autocomplete="off">
							<span class="focus-input-form" data-placeholder="E-mail"></span>
						</div>

						<div class="wrap-input margin-bottom-35">
							<input class="input-form" type="password" name="Senha">
							<span class="focus-input-form" data-placeholder="Senha"></span>
						</div>

						<div class="container-login-form-btn">
							<button class="login-form-btn">
								Login
							</button>
						</div>

						<ul class="login-utils">
							<li class="margin-bottom-8 margin-top-8">
								<span class="text1">
									Esqueceu sua
								</span>

								<a href="#" class="text2">
									senha?
								</a>
							</li>

							<li>
								<span class="text1">
									Não tem conta?
								</span>

								<a href="cadastro.php">
									Criar
								</a>
							</li>
						</ul>
					</form>
				</div>
	</form>
	<img src="Yo.png" width="300" height="300" />
	</div>
	</div>


</body>

</html>