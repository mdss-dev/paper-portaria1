<?php
	// Conexão com banco de dados
	$link = mysqli_connect("localhost", "root", "Mrpf!@#6", "portaria");
	// Verifica se conectou com o banco de dados
		if($link === false){
			die("ERRO: Não foi possível conectar ao BD. " . mysqli_connect_error());
		}
	$query = "select codigo,nome FROM visita where datasaida is null;";
	
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
<p>Visitas em andamento</p>
	<table border=1px>
		<tr>
			<td>Código</td> 
			<td>Nome</td>
			<td>Registrar Saida</td>
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
			?>
	</table><br>	
	<?php

// Fecha conexão com o banco de dados
	mysqli_close($link);
?>
		<input type="button" value="Voltar" onClick="history.go(-1)">
		<input type="button" value="Atualizar" onClick="history.go(-0)">
</body>
</html>
