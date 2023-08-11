<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="yon2.css">
	<style>
		body {
			font-family: Arial, sans-serif;
		}

		.container {
			background-color: #ffffff;
			padding: 20px;
			margin-bottom: 20px;
		}

		h2 {
			margin-top: 0;
		}

		label {
			font-weight: bold;
		}

		input[type="text"],
		input[type="email"],
		input[type="password"] {
			width: 100%;
			padding: 8px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type="submit"] {
			background-color: #4caf50;
			color: #ffffff;
			padding: 10px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
		}

		.back-link {
			display: block;
			margin-top: 10px;
			text-align: center;
			color: #0000ff;
			text-decoration: none;
		}

		.back-link:hover {
			text-decoration: underline;
		}
	</style>
	<script src="yon2.js"></script>
</head>

<body>
	<div id="register-screen"
		style="display: flex; padding-top: 20px; flex-direction: column; justify-content: center; align-items: center;">
		<form>
			<div style="display: flex; justify-content: center; align-items: center;">
				<div class="container">
					<h2>Cadastre-se</h2>

					<label for="nome">Nome:</label><br>
					<input type="text" id="Nome" name="Nome" required maxlength="50"><br>

					<label for="sobrenome">Sobrenome:</label><br>
					<input type="text" id="sobrenome" name="sobrenome" required maxlength="100"><br>

					<label for="cpf">CPF:</label><br>
					<input type="text" id="cpf" name="cpf" maxlength="14" oninput="formatCPF()"><br>

				</div>

				<div class="container">
					<h2>Endereço</h2>

					<label for="cep">CEP:</label><br>
					<input type="text" id="cep" name="cep" maxlength="9" oninput="formatCEP()"><br>

					<label for="endereco">Rua:</label><br>
					<input type="text" id="endereco" name="endereco" maxlength="50"><br>

					<label for="numero">Nº:</label><br>
					<input type="text" id="numero" maxlength="5"><br>

					<label for="cidade">Cidade:</label><br>
					<input type="text" id="cidade" name="cidade" maxlength="50"><br>

					<label for="estado">Estado:</label><br>
					<input type="text" id="estado" name="estado" maxlength="2"><br>
				</div>

				<div class="container">
					<h2>Dados Cadastrais</h2>

					<label for="usuario">Usuário:</label><br>
					<input type="text" id="usuario" name="usuario" required maxlength="20"><br>

					<label for="email">E-mail:</label><br>
					<input type="email" id="email" name="email" required maxlength="50"><br>

					<label for="senha">Senha:</label><br>
					<input type="password" id="senha" name="senha" required maxlength="20"><br>

				</div>
			</div>

			<button type="submit" formmethod="post" formaction="insertcadastro.php">Cadastrar</button>
			<center>
				<img src="Yo.png" width="200" height="200" />
			</center>
			<a href="index.php" class="back-link">Voltar ao login</a>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
	<script>
		$("#cep").blur(function () {
			var cep = this.value.replace(/[^0-9]/g, "");

			if (cep.length != 8) {
				return false;
			}

			var url = "https://viacep.com.br/ws/" + cep + "/json/";

			$.getJSON(url, function (dadosRetorno) {
				try {
					$("#endereco").val(dadosRetorno.logradouro);
					$("#numero").val(dadosRetorno.numero);
					$("#cidade").val(dadosRetorno.localidade);
					$("#estado").val(dadosRetorno.uf);
				} catch (ex) { }
			});
		});

		function formatCPF() {
			var cpf = document.getElementById("cpf");
			cpf.value = cpf.value.replace(/\D/g, "");
			cpf.value = cpf.value.replace(/(\d{3})(\d)/, "$1.$2");
			cpf.value = cpf.value.replace(/(\d{3})(\d)/, "$1.$2");
			cpf.value = cpf.value.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
		}

		function formatDate() {
			var date = document.getElementById("data-nascimento");
			date.value = date.value.replace(/\D/g, "");
			date.value = date.value.replace(/(\d{2})(\d)/, "$1/$2");
			date.value = date.value.replace(/(\d{2})(\d)/, "$1/$2");
		}

		function formatCEP() {
			var cep = document.getElementById("cep");
			cep.value = cep.value.replace(/\D/g, "");
			cep.value = cep.value.replace(/(\d{5})(\d)/, "$1-$2");
		}

		function validateForm() {
			var email = document.getElementById("email").value;
			var fields = document.querySelectorAll('input[required]');
			for (var i = 0; i < fields.length; i++) {
				if (!fields[i].value) {
					alert("Por favor, preencha todos os campos obrigatórios.");
					return false;
				}
			}

			var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
			if (!emailPattern.test(email)) {
				alert("Por favor, insira um e-mail válido.");
				return false;
			}


		}
	</script>
</body>

</html>