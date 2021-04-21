<!-- Alterado para exibir tela inicial
<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Cadastro de Visitantes - Página Inicial</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
		<nav id="menu">
			<ul>
				<li><a href="index2.php">Cadastro de Visitantes</a></li>
			</ul>
		</nav>
		<br><br>
	</body>
</html>
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>CONTROLE DE ACESSO - Página Inicial</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css"> 
		<script src="lib/bootstrap/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container" >
			<div class="content">      
				<!--FORMULÁRIO DE LOGIN-->
				<div id="login">
					<form method="post" action="index2.php"> 
						<h1><strong>Controle de Acesso</strong></h1> 
						<!--em desenvolvimento
						<p> 
							<label for="usuario">Usuário:</label>
							<input id="usuario" name="usuario" required="required" type="text" placeholder="Digite seu usuário"/>
						</p>
						<p> 
							<label for="senha">Senha:</label>
							<input id="senha" name="senha" required="required" type="password" placeholder="Digite sua senha" /> 
						</p>
						-->
						</br></br></br></br>
						<p> 
							<input type="submit" value="Conectar" /> 
						</p>
						<!--<p class="link">
							<a href="cadastrousuario.php">Cadastrar novo usuário</a>-->
						</p>
					</form>
				</div>
			</div>
		</div>  
	</body>
</html>