<?php
	// chamar o arquivo de conexão com o BD
	require_once "conexao.php";

		// variáveis criadas para obter valores dos parâmetros do formulário
		$nome = mysqli_real_escape_string($link, $_REQUEST['nome']);
		$cpf = mysqli_real_escape_string($link, $_REQUEST['cpf']);
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
		$sql = "INSERT INTO visita (codigo, nome, cpf, rg, destino, veiculo, placa, empresa, tipo, observacao) 
		VALUES ('$codigo', '$nome', '$cpf', '$rg', '$destino', '$veiculo', '$placa', '$empresa', '$tipo', '$observacao')";
		if(mysqli_query($link, $sql)){	
		
		echo "<script>alert('Gravação efetuada com sucesso!'); window.location='index2.php'</script>";			

			} else{
			
			echo "<script>alert('Não foi possivel realizar a gravação');</script>";			
			}
			
	// Fecha conexão com o banco de dados
	mysqli_close($link);

?>
		<script>
			function goBack() {
			    window.history.back()
			}
		</script>

		<button onclick="goBack()">Voltar</button>

		