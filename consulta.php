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
		<meta charset="utf-8">
		<link rel="shortcut icon"  href="img/icone.png">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>
<body class="img">
	<header>
			<div><p align="center"><strong>Consulta Visitas</strong></p></div>
			<p align="right">
				
				<button type="button" class = "btn btn-success" value="Voltar" onClick="history.go(-1)">Voltar</button>
				<a href="index2.php?p=consulta"><button type="button" class = "btn btn-success" value="Novo" >Nova Consulta</button></a>	
				<a href="index2.php"><button type="button" class = "btn btn-success" value="Novo" >Tela Inicial</button></a>		
			</p>
	</header>
	<br><br>
	<main class="container">
		
		<?php
			// se o número de resultados for maior que zero, mostra os dados
			if($dados -> num_rows > 0) {
		?>
			<table class="table table-sm table-responsive-sm table-hover">
				<thead>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col">CPF</th>
					<th scope="col">Data Entrada</th>
					<th scope="col">Data Saída</th>
					<th scope="col">Ação</th>
				</tr>			
				</thead>
		<tbody>
		<?php	
				do {
		?>
					<tr>
						<td><?=$linha['nome']?></td>
						<td><?=$linha['cpf']?></td>
						<?php 
							$dataent = new DateTime($linha['dataentrada']);
							$dataent = $dataent->format('d/m/Y H:i:s');
						?>
						<td><?=$dataent?></td>
						<?php 
							$datasai = $linha['datasaida'];
							if ($datasai != "") {
							$datasai = new DateTime($linha['datasaida']);
							$datasai = $datasai->format('d/m/Y H:i:s');
							}
						?>
						<td><?=$datasai?></td>
						<td>
							<div class="vermais">
								<form action="vermais.php" method="post">
									<input type="hidden" name="codigo" value=<?php echo $linha['codigo']?>>
										<button type="submit" class = "btn btn-success" id="<?php echo $linha['codigo']?>" >Ver mais...</button>										
								</form>
							</div>
						</td>
					</tr>
					<?php
					// finaliza o loop que vai mostrar os dados
					}while($linha = $dados -> fetch_assoc());
				}
				else {
						echo "<div class='container'><br><br><strong><p>Não há registro(s) para ser(em) exibido(s) com o(s) critério(s) informado(s)</p></strong><br><br></div>";
					}
					?>
			</tbody>
		</table><br>		
	
	<?php
// Fecha conexão com o banco de dados
	mysqli_close($link);
	?>
	</main>
</body>
</html>