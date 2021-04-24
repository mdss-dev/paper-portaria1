<!DOCTYPE html>
<html>
	<head>
		<title>Consulta Visitantes</title>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>
<body>	
	<hr>
	<form action="consulta.php" method="post">
		<table>
			<tr><td colspan="2"><strong>Filtro de Pesquisa</strong></td>
			</tr>
			<tr>
				<td><strong>Nome:</strong></td>
				<td><input type="text" name="nome"></td>
				<td><strong>CPF:</strong></td>
				<td><input type="text" name="cpf"></td>
				<td><strong>Identidade:</strong></td>
				<td><input type="text" name="rg"></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td><strong>Destino:</strong></td>
				<td><input type="text" name="destino"></td>
				<td><strong>Veículo:</strong></td>
				<td><input type="text" name="veiculo"></td>
				<td><strong>Placa:</strong></td>
				<td><input type="text" name="placa"></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td><strong>Empresa:</strong></td>
				<td><input type="text" name="empresa"></td>
				<td><strong>Tipo:</strong></td>
				<td>
					<select name="tipo" id="tipo"> 
						<option value="" selected></option>   
						<option value="Prestador de Servico">Prestador de Servico</option>
						<option value="Visitante">Visitante</option>
					</select>
				</td>	
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<table>
					
					<tr><td><strong>Data Entrada:</strong></td></tr>
						<td><input type="text" id="calendario1" name="dataentradaini" size=10 maxlength="10" placeholder="Início"></td>
						<td><input type="text" id="calendario2" name="dataentradafim" size=10 maxlength="10" placeholder="Fim"></td>
						
					</tr><td><strong>Data Saida:</strong></td></tr>
						<td><input type="text" id="calendario3" name="datasaidaini" size=10 maxlength="10" placeholder="Início"></td>
						<td><input type="text" id="calendario4" name="datasaidafim" size=10 maxlength="10" placeholder="Fim"></td>
				</table>			
			</tr>
		</table><hr>
		<button type="submit" value= "Pesquisar" class = "btn btn-success" name="Pesquisa">Pesquisar</button>
		<button type="button" value="Limpar" class = "btn btn-success" onClick="history.go(-0)">Limpar</button>
	</form>
<script type="text/javascript">
$(function() {
    $( "#calendario1" ).datepicker({
		dateFormat: 'dd/mm/yy',
		changeMonth: true,
        changeYear: true
		});
	$( "#calendario2" ).datepicker({
		dateFormat: 'dd/mm/yy',		
		changeMonth: true,
        changeYear: true
		});
	$( "#calendario3" ).datepicker({
		dateFormat: 'dd/mm/yy',
		changeMonth: true,
        changeYear: true
		});
	$( "#calendario4" ).datepicker({
		dateFormat: 'dd/mm/yy',
		changeMonth: true,
        changeYear: true
	});
});
</script>
</body>
</html>