<?php
	// chamar o arquivo de conexão com o BD
	require_once "conexao.php";


	$query = "select * FROM visita;";
	
	// executa a query
	$dados = mysqli_query($link, $query) or die(mysql_error());
	
	// transforma os dados em um array
	$linha = $dados -> fetch_assoc();
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Consulta Visitantes</title>
</head>
<body>
<p>Consulta Visitas</p>
	<table border=1px>
		<tr>
			<th>Código</th> 
			<th>Nome</th>
			<th>CPF</th>
			<th>Identidade</th>
			<th>Destino</th>
			<th>Veículo</th>
			<th>Placa</th>
			<th>Empresa</th>
			<th>Tipo</th>
			<th>Observação</th>
			<th>Data Entrada</th>
			<th>Data Saída</th>
		</tr>
		
			<?php
				// se o número de resultados for maior que zero, mostra os dados
				if($dados -> num_rows > 0) {
				// inicia o loop que vai mostrar todos os dados
					do {
						?>
						<tr>
							<td><?=$linha['codigo']?></td> 
							<td><?=$linha['nome']?></td>
							<td><?=$linha['cpf']?></td>
							<td><?=$linha['rg']?></td>
							<td><?=$linha['destino']?></td>
							<td><?=$linha['veiculo']?></td>
							<td><?=$linha['placa']?></td>
							<td><?=$linha['empresa']?></td>
							<td><?=$linha['tipo']?></td>
							<td><?=$linha['observacao']?></td>
							<td><?=$linha['dataentrada']?></td>
							<td><?=$linha['datasaida']?></td>
						</tr>
						<?php
						// finaliza o loop que vai mostrar os dados
						}while($linha = $dados -> fetch_assoc());

				
				}
				else {
						echo "<strong> Não há registro para ser exibido</strong><br><br>";
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