<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon"  href="img/icone.png">
		<title>Consulta Visitantes</title>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<script type="text/javascript" src="js/jquery.mask.min.js"></script>
	</head>
<body>	
	<hr>
	<form action="consulta.php" method="post">
		<table>
			<tr><td colspan="2"><p><strong>Filtro de Pesquisa</strong></p></td>
			</tr>
			<tr>
				<td><p><strong>Nome:</strong></p></td>
				<td><p><input type="text" name="nome"></p></td>
				<td><p><strong>CPF:</strong></p></td>
				<td><p><input type="text" name="cpf" id="cpf"></p></td>
				<td><p><strong>Identidade:</strong></p></td>
				<td><p><input type="text" name="rg"></p></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td><p><strong>Destino:</strong></td>
				<td><p><input type="text" name="destino"></p></td>
				<td><p><strong>Veículo:</strong></p></td>
				<td><p><input type="text" name="veiculo"></p></td>
				<td><p><strong>Placa:</strong></p></td>
				<td><p><input type="text" name="placa" id="placa"></p></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td><p><strong>Empresa:</strong></p></td>
				<td><p><input type="text" name="empresa"></p></td>
				<td><p><strong>Tipo:</strong></p></td>
				<td>
					<p>
						<select name="tipo" id="tipo"> 
							<option value="" selected></option>   
							<option value="Prestador de Servico">Prestador de Servico</option>
							<option value="Visitante">Visitante</option>
						</select>
					</p>
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

<!--mascara de campos--> 
<script type="text/javascript">
	$("#cpf").mask("000.000.000-00")
	$("#placa").mask("AAA-0000")
</script>	

</body>
</html>