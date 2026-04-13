<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Adicionando novo aluno</title>
</head>
<body>
	<form method="POST" action="processa.php">
		<fieldset>
			<legend>Adicionando novo estudante</legend>
			Nome: <input type="text" name="nome"> <br>
			Nascimento: <input type="date" name="nascimento"> <br>
			E-mail: <input type="email" name="email"> <br>
			Curso: <select name="curso"> 
					<option>Técnico em administração</option>
					<option>Técnico em agropecuária</option>
					<option>Técnico em informática</option>
				</select> 
			<br>
			Turno: <input type="radio" name="turno" value="m"> Manhã <input type="radio" name="turno" value="t"> Tarde <input type="radio" name="turno" value="n"> Noite <br>
			Áreas de interesse: <br>
			<input type="checkbox" name="interesses[]" value="programacao"> Programação <br> 
			<input type="checkbox" name="interesses[]" value="banco_de_dados"> Banco de dados <br>
			<input type="checkbox" name="interesses[]" value="redes"> Redes de computadores <br>
			<input type="checkbox" name="interesses[]" value="engenharia_de_software"> Engenharia de software <br>
			<input type="submit" name="enviar" value="Cadastrar aluno"><br>
		</fieldset>
	</form>
</body>
</html>