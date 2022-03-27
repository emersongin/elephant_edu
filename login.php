<!DOCTYPE html>
<html lang="pt-br">

	<?php 
		session_start(); 

		$erro_login = isset($_SESSION['erro_login']) ? $_SESSION['erro_login'] : false;

		unset($_SESSION['erro_login']);

		// var_dump($_SESSION);
	
	?>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="icon" type="image/png" sizes="16x16" href="assets/img/logoFavicon.png">

		<script src="https://kit.fontawesome.com/070f1d5364.js" crossorigin="anonymous"></script>
		<!-- para uso dos icones pelo bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<!-- para lincar o arquivo CSS junto a pagina de login -->
		<link rel="stylesheet" href="assets/css/login.css">

		<title>Login</title>

	</head>

	<body>
		<main class="container" style="height: 100vh;">
				<div class="d-flex justify-content-center align-items-center h-100">
					<div class="card" style="height: 500px; border: 3px solid #7F9ECD; border-radius: 30px">
						<div id="container-logo" class="d-flex justify-content-center">
							<div class="text-center">
								<img id="logo-img" src="assets/img/elephantLogo.png" alt="logo">
								<h1 class="font-weight-bold">Elephant EDU</h1>
							</div>
                        </div>
						<h2>Login</h2>
						
						<form action="./app/controllers/autenticacoes.php" method="POST">	
							<div class="label-float">
								<input name="nome" type="text" id="nomeUsuario" placeholder="" required>
								<label id="userLabel" for="nomeUsuario">usuário</label>
							</div>
					
							<div class="label-float">
								<input name="senha" type="password" id="senha" placeholder="" required>
								<label id="senhaLabel" for="senha">Senha</label>
								<i class="fa fa-eye" aria-hidden="true"></i>
							</div>

							<?= $erro_login ? '<div class="text-danger">usuário ou senha incorreto!</div>' : '' ?>

							<div class="button-login">
								<button onclick="">Login</button>
							</div>
						</form>

					</div> 
				</div>
		</main>

	<!-- importanto script js -->
	<script src="assets/js/viewPassword.js"></script>

	</body>

</html>