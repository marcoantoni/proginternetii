<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exemplo inicial de inclusão</title>
</head>
<body>

	<?php
		// Inclui o arquivo menu.php.
		// Se o arquivo não existir, a execução do programa continua.
		include("menu.php");
	?>

	<h1>Essa é a página principal do website</h1>

	<?php
		// Inclui o arquivo exemplo_var.php.
		// Como foi utilizado require(), a execução será interrompida
		// caso o arquivo não seja encontrado.
		require("exemplo_var.php");

		// A variável $nome foi criada no arquivo exemplo_var.php.
		// Aqui alteramos seu valor para demonstrar que ela pode ser
		// utilizada normalmente após a inclusão.
		$nome = "Ana";

		// Tenta incluir novamente o mesmo arquivo.
		// Como foi utilizado require_once(), o arquivo NÃO será
		// carregado outra vez, pois já foi incluído anteriormente.
		require_once("exemplo_var.php");

		// Exibe o valor atualizado da variável $nome.
		echo ("Nome: $nome <br>");

		// Exibe a variável $curso, criada em exemplo_var.php.
		echo ("Curso: $curso <br>");
	?>

</body>
</html>