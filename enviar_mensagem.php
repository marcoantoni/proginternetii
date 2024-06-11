<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulário de envio de mensagem</title>
</head>
<body>
	<form method="POST" action="processa_mensagem.php">
		<fieldset>
			<legend>Enviando uma mensagem</legend>
			Nome <input type="text" name="nome" required> <br>
			Nascimento: <input type="date" name="nasc"> <br>
			CPF <input type="text" name="cpf"> <br>
			Telefone <input type="tel" name="fone"> <br>
			Email <input type="email" name="email"> <br>
			Sexo <br> 
			<input type="radio" name="sexo" value="1"> Feminino <input type="radio" name="sexo" value="2">Masculino <input type="radio" name="sexo" value="3"> Intersexo <br>
			Qual o melhor dia e horário para entrar em contato? <br>
			Horário <input type="time" name="horario"> <br>
			Dia da semana <br>
			<input type="checkbox" name="seg"> Segunda-feira 
			<input type="checkbox" name="ter"> Terça-feira 
			<input type="checkbox" name="qua"> Quarta-feira 
			<input type="checkbox" name="qui"> Quinta-feira 
			<input type="checkbox" name="sex"> Sexta-feira 
			<input type="checkbox" name="sab"> Sabádo 
			<br>
			Qual o seu problema?<br>
			<textarea cols="80" rows="5" name="mensagem"></textarea> <br>
			<!--<button>Enviar</button>-->
			<input type="submit" name="enviar" value="Enviar">
		</fieldset>
	</form>
</body>
</html>