<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Cadastro de Visitantes</title>
	</head>
	<body>
		<div class="container" >
			<div class="content">  
				<form action="insert.php" method="post">
					<table>
						<tr></br><td colspan="2">Cadastro de Visitantes</td>
						</tr>
						<tr>
						<td>Nome:</td>
							<td><input type="text" name="nome" required size = 50></td>
						</tr>
						<tr>
							<td>CPF / CNPJ:</td>
							<td><input type="text" maxlength=20 name="cpfcnpj" required size = 50></td>
						</tr>
						<tr>
							<td>Identidade:</td>
							<td><input type="text" name="rg" required size = 50></td>
						</tr>
						<tr>
							<td>Destino:</td>
							<td><input type="text" name="destino" required size = 50></td>
						</tr>
						<tr>
							<td>Veículo:</td>
							<td><input type="text" name="veiculo" size = 50></td>
						</tr>
						<tr>
							<td>Placa:</td>
							<td><input type="text" name="placa" size = 50></td>
						</tr>
						<tr>
							<td>Empresa:</td>
							<td><input type="text" name="empresa" required size = 50 ></td>
						</tr>
						<tr>
							<td>Tipo:</td>
							<td>
								<select name="tipo" id="tipo">    
									<option value="" selected></option>
									<option value="Prestador de Servico">Prestador de Servico</option>
									<option value="Visitante">Visitante</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Observação:</td>
							<td><textarea name="observacao" cols="50" rows="5"></textarea></td>
						</tr>
					</table>
					<br>
					<input type="submit" name="Enviar">
					<input type="button" value="Voltar" onClick="history.go(-1)">
					<input type="button" value="Atualizar" onClick="history.go(-0)">
				</form>
			</div>
		</div>
	</body>
</html>