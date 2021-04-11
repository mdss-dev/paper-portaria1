<?php
	// Conexão com banco de dados
	$link = mysqli_connect("localhost", "root", "Mrpf!@#6", "portaria");
	// Verifica se conectou com o banco de dados
		if($link === false){
			die("ERRO: Não foi possível conectar ao BD. " . mysqli_connect_error());
		}
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
			<td>Código</td> 
			<td>Nome</td>
			<td>CPF / CNPJ</td>
			<td>Identidade</td>
			<td>Destino</td>
			<td>Veículo</td>
			<td>Placa</td>
			<td>Empresa</td>
			<td>Tipo</td>
			<td>Observação</td>
			<td>Data Entrada</td>
			<td>Data Saída</td>
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
							<td><?=$linha['cpfcnpj']?></td>
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