<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Cadastro de Visitantes</title>
	</head>
	<body>
		<form action="insert.php" method="post">
			<table>
				<tr><td colspan="2">Cadastro de Visitantes</td>
				</tr>
				<tr>
					<td>Nome:</td>
					<td><input type="text" name="nome" required ></td>
				</tr>
				<tr>
					<td>CPF / CNPJ:</td>
					<td><input type="text" maxlength=20 name="cpfcnpj" required ></td>
				</tr>
				<tr>
					<td>Identidade:</td>
					<td><input type="text" name="rg" required ></td>
				</tr>
				<tr>
					<td>Destino:</td>
					<td><input type="text" name="destino" required ></td>
				</tr>
				<tr>
					<td>Veículo:</td>
					<td><input type="text" name="veiculo"></td>
				</tr>
				<tr>
					<td>Placa:</td>
					<td><input type="text" name="placa"></td>
				</tr>
				<tr>
					<td>Empresa:</td>
					<td><input type="text" name="empresa" required ></td>
				</tr>
				<tr>
					<td>Tipo:</td>
					<td>
						<select name="tipo" id="tipo">    
							<option value="" selected></option>
							<option value="Visitante">Visitante</option>
							<option value="Prest.Servico">Prest.Servico</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Observação:</td>
					<td><textarea name="observacao" cols="30" rows="5"></textarea></td>
				</tr>
			</table>
			<br><br>
			<input type="submit" name="Enviar">
			<input type="button" value="Voltar" onClick="history.go(-1)">
			<input type="button" value="Atualizar" onClick="history.go(-0)">
		</form>
	</body>
</html>