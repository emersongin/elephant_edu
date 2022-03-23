<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<script src="https://kit.fontawesome.com/070f1d5364.js" crossorigin="anonymous"></script>
		<!-- para uso dos icones pelo bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<!-- para lincar o arquivo CSS junto a pagina de login -->
		<link rel="stylesheet" href="assets/css/login.css">

		<title>Login</title>

	</head>

	<body>
		<main class="container">
				<div class="d-flex justify-content-center align-items-center h-full">
					<div class="card">
						<h1>Login</h1>
						<form action="./app/controllers/verificar_login.php" method="POST">	
							<div class="label-float">
								<input name="cpf" type="text" id="userCPF" placeholder="" required>
								<label id="userLabel" for="userCPF">CPF</label>
							</div>
					
							<div class="label-float">
								<input name="senha" type="password" id="senha" placeholder="" required>
								<label id="senhaLabel" for="senha">Senha</label>
								<i class="fa fa-eye" aria-hidden="true"></i>
							</div>
							
							<a href="#" id="forgot-pass">Esqueceu a senha?</a>

							<div class="button-login">
								<button onclick="entrar()">Login</button>
							</div>
						</form>

					</div> 
				</div>
		</main>



	<!-- importanto script js -->
	<script src="assets/js/viewPassword.js"></script>

	</body>

</html>