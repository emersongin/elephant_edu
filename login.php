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

		<div id="login-container"> <!-- inicio div login-container -->
			<div class='card'> <!-- inicio div card -->
    		<h1>Login</h1>
				<form action="./app/controllers/verificar_login.php" method="POST">	
					<div class='label-float'>
						<input name='cpf' type='text' id='userCPF' placeholder='' required>
						<label id='userLabel' for='userCPF'>CPF</label>
					</div>
			
					<div class='label-float'>
						<input name='senha' type='password' id='senha' placeholder='' required>
						<label id='senhaLabel' for='senha'>Senha</label>
						<i class="fa fa-eye" aria-hidden="true"></i>
					</div>
					
					<a href="#" id="forgot-pass">Esqueceu a senha?</a>

					<div class='button-login'>
						<button onclick='entrar()'>Login</button>
					</div>
				</form>

				<div class='divider'></div> <!-- linha que substitui o HR -->

				<!-- div relacionado ao login pelas redes sociais -->
				<div id="social-container">
					<p>Ou entre pelas suas redes sociais</p>
					<i class="fa fa-facebook-f"></i>
					<i class="fa fa-linkedin"></i>
					
				</div>

				<div class='divider'></div> <!-- linha que substitui o HR -->
    
				<p> Não tem uma conta?
					<a href='#' id="register"> Cadastre-se</a>
				</p>
    
  		</div> <!-- final div card -->
		</div> <!-- final div login-container -->


	<!-- importanto script js -->
	<script src="assets/js/viewPassword.js"></script>

	</body>

</html>