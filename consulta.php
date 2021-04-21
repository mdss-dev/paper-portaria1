<?php
	//chama o arquivo de conexão com o BD
	require_once "conexao.php";
	
	// recebe dados do filtro
	$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
	$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
	$rg = isset($_POST['rg']) ? $_POST['rg'] : '';
	$destino = isset($_POST['destino']) ? $_POST['destino'] : '';
	$veiculo = isset($_POST['veiculo']) ? $_POST['veiculo'] : '';
	$placa = isset($_POST['placa']) ? $_POST['placa'] : '';
	$empresa = isset($_POST['empresa']) ? $_POST['empresa'] : '';
	$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
	$dataentradaini = isset($_POST['dataentradaini']) ? $_POST['dataentradaini'] : '';
	$dataentradafim = isset($_POST['dataentradafim']) ? $_POST['dataentradafim'] : '';
	$datasaidaini = isset($_POST['datasaidaini']) ? $_POST['datasaidaini'] : '';
	$datasaidafim = isset($_POST['datasaidafim']) ? $_POST['datasaidafim'] : '';
	
	//inicializa consulta
	$select="select";
	$campos="*";
	$from="from";
	$tabela="visita";
	$where="WHERE codigo <> 0 ";
	$fim="order by codigo;";
	
	//monta clausula where com valores preenchidos no filtro e deixa vazio se os campos estiverem em branco
    if (strcmp(trim($nome), "") != 0) { 
        $where .= "AND nome like '%$nome%' ";
    }
    if (strcmp(trim($cpf), "") != 0) { 
        $where .= "AND cpf like '%$cpf%' ";
    }
    if (strcmp(trim($rg), "") != 0) { 
        $where .= "AND rg like '%$rg%' ";
    }
    if (strcmp(trim($destino), "") != 0) { 
        $where .= "AND destino like '%$destino%' ";
    }	
    if (strcmp(trim($veiculo), "") != 0) { 
        $where .= "AND veiculo like '%$veiculo%' ";
    }
    if (strcmp(trim($placa), "") != 0) { 
        $where .= "AND placa like '%$placa%' ";
    }
    if (strcmp(trim($empresa), "") != 0) { 
        $where .= "AND empresa like '%$empresa%' ";
    }
	if (strcmp(trim($tipo), "") != 0) { 
        $where .= "AND tipo = '$tipo' ";
    }
	//Data Entrada Entre
    if ((strcmp(trim($dataentradaini), "") != 0) && (strcmp(trim($dataentradafim), "") != 0)) { 
        $data = explode("/", $dataentradaini);
		list($dia, $mes, $ano) = $data;
		$dataini = "$ano-$mes-$dia 00:00:00";
		$data = explode("/", $dataentradafim);
		list($dia, $mes, $ano) = $data;
		$datafim = "$ano-$mes-$dia 23:59:59";
		$where .= "AND dataentrada between '$dataini' and '$datafim' ";
    }
    else if (strcmp(trim($dataentradaini), "") != 0) {
        $data = explode("/", $dataentradaini);
		list($dia, $mes, $ano) = $data;
		$dataini = "$ano-$mes-$dia 00:00:00";
        $where .= "AND dataentrada >= '$dataini' ";
    }
    else if (strcmp(trim($dataentradafim), "") != 0) { 
		$data = explode("/", $dataentradafim);
		list($dia, $mes, $ano) = $data;
		$datafim = "$ano-$mes-$dia 23:59:59";
		$where .= "AND dataentrada <= '$datafim' ";
    }
    //Data Saida Entre
    if ((strcmp(trim($datasaidaini), "") != 0) && (strcmp(trim($datasaidafim), "") != 0)) { 
        $data = explode("/", $datasaidaini);
		list($dia, $mes, $ano) = $data;
		$dataini = "$ano-$mes-$dia 00:00:00";
		$data = explode("/", $datasaidafim);
		list($dia, $mes, $ano) = $data;
		$datafim = "$ano-$mes-$dia 23:59:59";
		$where .= "AND datasaida between '$dataini' and '$datafim' ";
    }
    else if (strcmp(trim($datasaidaini), "") != 0) { 
        $data = explode("/", $datasaidaini);
		list($dia, $mes, $ano) = $data;
		$dataini = "$ano-$mes-$dia 00:00:00";
		$where .= "AND datasaida >= '$dataini' ";
    }
    else if (strcmp(trim($datasaidafim), "") != 0) {
        $data = explode("/", $datasaidafim);
		list($dia, $mes, $ano) = $data;
		$datafim = "$ano-$mes-$dia 23:59:59";
		$where .= "AND datasaida <= '$datafim' ";
    }
	//monta consulta
	$query = "$select $campos $from $tabela $where $fim";
	//echo $query;
	
	// executa a consulta
	$dados = mysqli_query($link, $query);
	
	// transforma os dados em um array
	$linha = $dados -> fetch_assoc();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Consulta Visitantes</title>
		<link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css"> 
		<script src="lib/bootstrap/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>
<body>
<p><strong>Consulta Visitas</strong></p>
		<?php
			// se o número de resultados for maior que zero, mostra os dados
			if($dados -> num_rows > 0) {
		?>	
		<table class="table">
			<thead>
					<tr>
						<th scope="col">Código</th>
						<th scope="col">Nome</th>
						<th scope="col">CPF</th>
						<th scope="col">RG</th>
						<th scope="col">Destino</th>
						<th scope="col">Veículo</th>
						<th scope="col">Placa</th>
						<th scope="col">Empresa</th>
						<th scope="col">Tipo</th>
						<th scope="col">Observação</th>
						<th scope="col">Data Entrada</th>
						<th scope="col">Data Saída</th>
					</tr>
			</thead>
			<tbody>
		<?php	
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
						<?php 
							$dataent = new DateTime($linha['dataentrada']);
							$dataent = $dataent->format('d/m/Y H:i:s');
						?>
						<td><?=$dataent?></td>
						<?php 
							$dataaux = $linha['datasaida'];
							if ($dataaux != "") {
							$dataaux = $dataaux->format('d/m/Y H:i:s');
							}
						?>
						<td><?=$dataaux?></td>
					</tr>
					<?php
					// finaliza o loop que vai mostrar os dados
					}while($linha = $dados -> fetch_assoc());
				}
				else {
						echo "<strong> Não há registro para ser exibido</strong><br><br>";
					}
					?>
			</tbody>
		</table><br>		
	
	<?php
// Fecha conexão com o banco de dados
	mysqli_close($link);
	?>
	<input type="button" value="Atualizar" onClick="history.go(-0)">
	<input type="button" value="Voltar" onClick="history.go(-1)">
</body>
</html>