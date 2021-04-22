<?php
	//chama o arquivo de conexão com o BD
	require_once "conexao.php";
	
	// Atualiza a data de saída do visitante
	$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
	$datasaida = isset($_POST['datasaida']) ? $_POST['datasaida'] : '';
	
	$sql = "UPDATE visita SET datasaida=now() WHERE codigo='$codigo'";
	
	if(mysqli_query($link, $sql)){	
		
		echo "Gravação efetuada com sucesso!";			
		
			} else{
			
			echo "Não foi possivel realizar a gravação";			
			}
	
	// Fecha conexão com o banco de dados
	mysqli_close($link);
?>

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
		<button type="button" class = "btn btn-success" value="Voltar" onClick="history.go(-1)">Voltar</button>
	</body>
</html>