<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Cadastro de Visitantes</title>
	</head>
	<body>		
			<form action="insert.php" method="post">
				<table>
					<tr></br><td colspan="2">Cadastro de Visitantes</td>
					</tr>
					<tr>
					<td>Nome*:</td>
						<td><input type="text" name="nome" required size = 50 maxlength=45></td>
					</tr>
					<tr>
						<td>CPF*:</td>
						<td><input type="text" name="cpf" required size = 50 maxlength=14 placeholder="000.000.000-00"></td>
					</tr>
					<tr>
						<td>Identidade*:</td>
						<td><input type="text" name="rg" required size = 50 maxlength=15></td>
					</tr>
					<tr>
						<td>Destino*:</td>
						<td><input type="text" name="destino" required size = 50 maxlength="5" placeholder="Digite o número do apto."></td>
					</tr>
					<tr>
						<td>Veículo:</td>
						<td><input type="text" name="veiculo" size = 50 placeholder="Informe o modelo do veiculo"></td>
					</tr>
					<tr>
						<td>Placa:</td>
						<td><input type="text" name="placa" size = 50 maxlength="8"></td>
					</tr>
					<tr>
						<td>Empresa:</td>
						<td><input type="text" name="empresa" size = 50 ></td>
					</tr>
					<tr>
						<td>Tipo*:</td>
						<td>
							<select name="tipo" id="tipo" required> 
								<option value="" selected></option>   
								<option value="Prestador de Servico">Prestador de Servico</option>
								<option value="Visitante">Visitante</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Observação:</td>
						<td><textarea name="observacao" cols="52" rows="5" placeholder="Limite de 100 caracteres" maxlength="100"></textarea></td>
					</tr>
				</table>
				<br>
				<strong>* - Campos obrigatórios</strong> <br><br>
				<input type="submit" name="Enviar"><br>
				<input type="button" value="Limpar" onClick="history.go(-0)">
			</form>
	</body>
</html>