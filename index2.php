<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Cadastro de Visitantes - Página Inicial</title>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
		<link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">
		<script src="lib/bootstrap/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>
	<body>
				<nav id="menu">
					<ul>
						<li><a href="index2.php?p=cadastroentrada">Registrar Entrada</a></li>
						<li><a href="index2.php?p=cadastrosaida">Registrar Saida</a></li>
						<li><a href="index2.php?p=consulta">Consulta</a></li>
						<li><a href="index.php">Sair</a></li>	
					</ul>
				</nav>
				<?php
					$valor = @$_GET['p'];
					if ($valor == 'cadastroentrada') {require_once 'cadastroentrada.php';}
					if ($valor == 'cadastrosaida') {require_once 'cadastrosaida.php';}
					if ($valor == 'consulta') {require_once 'filtroconsulta.php';}							
				?>

	</body>
</html>

