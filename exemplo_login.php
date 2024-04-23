<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="POST">
		Login <input type="text" name="usuario"> <br>
		Senha: <input type="password" name="senha"> <br>
		<input type="submit" name="enviar" value="Login">
	</form>

	<?php
		if (isset($_POST["enviar"]) ) {
			echo ("Clicou no botão de enviar");
			echo ("Usuario" . $_POST["usuario"]);
			echo ("Senha" . $_POST["senha"]);
		}
		else {
			echo ("Usuário não clicou em enviar");
		}
	?>

</body>
</html>