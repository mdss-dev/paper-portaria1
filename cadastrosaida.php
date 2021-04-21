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
		<link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css"> 
		<script src="lib/bootstrap/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>
	<body>
		<p><strong>Registrar saídas</strong></p>
			<?php
				// se o número de resultados for maior que zero, mostra os dados
				if($dados -> num_rows > 0) {
			?>	
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Código</th>
						<th scope="col">Nome</th>
						<th scope="col">Data da Entrada</th>
						<th scope="col">Registrar Saida</th>
					</tr>
				</thead>
				<tbody>
			<?php	// inicia o loop que vai mostrar todos os dados
					do {
						?>
							<tr>
								<td><?=$linha['codigo']?></td> 
								<td><?=$linha['nome']?></td>
								<?php 
									$data = new DateTime($linha['dataentrada']);
									$data = $data->format('d/m/Y H:i:s');
								?>
								<td><?=$data?></td>
								<td>
									<div class="gravarsaida">
										<button class="btn btn-success" type="submit" onclick="saida.php">Registrar Saida</button>
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
				</tbody>
			</table><br>		
		<?php

// Fecha conexão com o banco de dados
		mysqli_close($link);
		?>
		<input type="button" value="Atualizar" onClick="history.go(-0)">
	</body>
</html>
