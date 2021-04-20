<?php
	// chamar o arquivo de conexão com o BD
	require_once "conexao.php";

	$query = "select codigo,nome,dataentrada FROM visita where datasaida is null;";
	
	// executa a query
	$dados = mysqli_query($link, $query) or die(mysql_error());
	
	// transforma os dados em um array
	$linha = $dados -> fetch_assoc();
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Registrar Saida</title>
	<script type="text/javascript" src="saida.js"></script>
</head>
<body>
<p>Registrar saídas</p>
	<table border=1px>
		<tr>
			<th>Código</th> 
			<th>Nome</th>
			<th>Data da Entrada</th>
			<th>Registrar Saida</th>
		</tr>
		<tr>
			<?php
				// se o número de resultados for maior que zero, mostra os dados
				if($dados -> num_rows > 0) {
				// inicia o loop que vai mostrar todos os dados
					do {
						?>
							<td><?=$linha['codigo']?></td> 
							<td><?=$linha['nome']?></td>
							<td><?=$linha['dataentrada']?></td>
							<td>
								<div class="gravarsaida">
									<button class="btn btn-success" type="submit" onclick="saida.js">Registrar Saida</button>
								</div>
							</td>
									
		</tr>
						<?php
						// finaliza o loop que vai mostrar os dados
						}while($linha = $dados -> fetch_assoc());
				// fim do if
				}
				else {
					echo "<strong>Não há registro(s) com saída(s) pendente(s)</strong><br><br>";
				}
			?>
	</table><br>	
	<?php

// Fecha conexão com o banco de dados
	mysqli_close($link);
?>
		<input type="button" value="Atualizar" onClick="history.go(-0)">
</body>
</html>
