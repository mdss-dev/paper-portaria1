<?php
	// Conexão com banco de dados
	//$link = mysqli_connect("localhost", "root", "", "portaria"); //Conexão Merikson
	//$link = mysqli_connect("localhost", "root", "", "portaria"); //Conexão Roney
	$link = mysqli_connect("localhost", "root", "", "portaria"); //Conexão Michael
	// Verifica se conectou com o banco de dados
		if($link === false){
			die("ERRO: Não foi possível conectar ao BD. " . mysqli_connect_error());
		}
		// variáveis criadas para obter valores dos parâmetros do formulário
		$nome = mysqli_real_escape_string($link, $_REQUEST['nome']);
		$cpfcnpj = mysqli_real_escape_string($link, $_REQUEST['cpfcnpj']);
		$rg = mysqli_real_escape_string($link, $_REQUEST['rg']);
		$destino = mysqli_real_escape_string($link, $_REQUEST['destino']);
		$veiculo = mysqli_real_escape_string($link, $_REQUEST['veiculo']);
		$placa = mysqli_real_escape_string($link, $_REQUEST['placa']);
		$empresa = mysqli_real_escape_string($link, $_REQUEST['empresa']);
		$tipo = mysqli_real_escape_string($link, $_REQUEST['tipo']);
		$observacao = mysqli_real_escape_string($link, $_REQUEST['observacao']);
		$codigo = 1;
		// pegando o próximo código (sem utilização de sequence do banco)
		$sql = "SELECT MAX(codigo) AS codigo FROM visita";
		if($result = mysqli_query($link, $sql)){
			if(mysqli_num_rows($result) > 0){
				if($row = mysqli_fetch_array($result)){
					if (intval($row['codigo']) > 0){
						$codigo = intval($row['codigo']) + 1;
					}
				}
			}
		}
		// Realiza inserção do novo registro na tabela do banco de dados
		$sql = "INSERT INTO visita (codigo, nome, cpfcnpj, rg, destino, veiculo, placa, empresa, tipo, observacao) 
		VALUES ('$codigo', '$nome', '$cpfcnpj', '$rg', '$destino', '$veiculo', '$placa', '$empresa', '$tipo', '$observacao')";
		if(mysqli_query($link, $sql)){
			echo "Gravação efetuada com sucesso!";
			} else{
			echo "Erro (Não foi possível inserir o registro na tabela) $sql. " . mysqli_error($link);
			}
	// Fecha conexão com o banco de dados
	mysqli_close($link);
?>