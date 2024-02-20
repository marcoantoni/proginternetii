<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
	Exemplo de arquivo HTML
<body>
<?php
	// função echo é para escrever na tela
	echo("Olá mundo");

	// declaração de variaveis
	$nome = "Marco";	// string

	$idade = 30; 	// int

	$peso = 70.7;	// float

	/* Status possíveis para a variavel status_aula
	   true - significa que a aula não acabou
	   false - signica que a aula acabou
	*/
	$status_aula = true;	// boolean

	$sexo = 'M';

	$nome = "Mateus";
	// exibindo as informações na tela
	echo ("<br>Nome: $nome <br>Idade: $idade <br>Peso: $peso kg");

	/* exemplo de if
	   o if tem três elemento:
	   1º variavel a ser testada
	   2º operador de comparação (== != > >= < <=)
	   3º valor a ser comparado
	*/
	if ($status_aula == true){
		echo ("<br>A aula <b>não</b> acabou");
	} else {
		echo ("<br>Podem sair para o intervalo!");
	}

	// exemplo maioridade
	// codição: ter idade igual ou maior a 18
	if ($idade >= 18)
		echo ("É maior de idade");
	else 
		echo ("É menor de idade");
?>
</body>
</html>