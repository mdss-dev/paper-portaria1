<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Cadastro de Visitantes</title>
	</head>
	<body>		
			<form action="insert.php" method="post">
				<table>
					<tr></br><td colspan="2"><strong>Cadastro de Visitantes</strong></td>
					</tr>
					<tr>
					<td><strong>Nome*:</strong></td>
						<td><input type="text" name="nome" required size = 50 maxlength=45></td>
					</tr>
					<tr>
						<td><strong>CPF*:</strog></td>
						<td><input type="text" name="cpf" required size = 50 maxlength=14 placeholder="000.000.000-00"></td>
					</tr>
					<tr>
						<td><strong>Identidade*:</strong></td>
						<td><input type="text" name="rg" required size = 50 maxlength=15></td>
					</tr>
					<tr>
						<td><strong>Destino*:</strong></td>
						<td><input type="text" name="destino" required size = 50 maxlength="5" placeholder="Digite o número do apto."></td>
					</tr>
					<tr>
						<td><strong>Veículo:</strong></td>
						<td><input type="text" name="veiculo" size = 50 placeholder="Informe o modelo do veiculo"></td>
					</tr>
					<tr>
						<td><strong>Placa:</strong></td>
						<td><input type="text" name="placa" size = 50 maxlength="8"></td>
					</tr>
					<tr>
						<td><strong>Empresa:</strong></td>
						<td><input type="text" name="empresa" size = 50 ></td>
					</tr>
					<tr>
						<td><strong>Tipo*:</strong></td>
						<td>
							<select name="tipo" id="tipo" required> 
								<option value="" selected></option>   
								<option value="Prestador de Servico">Prestador de Servico</option>
								<option value="Visitante">Visitante</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><strong>Observação:</strong></td>
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