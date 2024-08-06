<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulário de envio de mensagem</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<form method="POST" action="processa_mensagem.php">
		<fieldset>
			<legend>Enviando uma mensagem</legend>
			<div class="input-group">
				<label for="nome">Nome</label>
				<input type="text" name="nome" placeholder="Seu nome completo"> 
			</div>
			<div class="input-group">
				<label for="nome">Nascimento</label>
				<input type="date" name="nasc">
			</div>
			<div class="input-group">
				<label for="cpf">CPF</label>
				<input type="text" name="cpf">
			</div>
			<div class="input-group">
				<label for="cpf">Telefone</label>
				<input type="tel" name="fone">
			</div>
			<div class="input-group">
				<label for="cpf">Email</label>
				<input type="email" name="email">
			</div>
			<div class="radio-group">
				<label for="sexo">Sexo</label> <br>
				<input type="radio" name="sexo" value="1"> Feminino 
				<input type="radio" name="sexo" value="2">Masculino 
				<input type="radio" name="sexo" value="3"> Intersexo
			</div>
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
			<div class="input-group">
				<input type="submit" class="btn" name="enviar" value="Salvar"> 
			</div>
		</fieldset>
	</form>
</body>
</html>