<?php
	// aula4.php

	// alterando o timezone padrão para o horário utilizado no Brasil
	date_default_timezone_set("America/Sao_Paulo");

	// d - dia no formato de 2 digitos
	// m - mês no formato de 2 digitos
	// Y - mês no formato de 2 digitos
	
	// armazenado o dia em uma variavel
	$dia = date("d");

	echo ("Hoje é dia <b>$dia</b><br>");

	// exibindo o mês dentro de um echo
	echo ("Mês " . date("m") . "<br>");
	// aqui é opcional a tag de fechamento do php

	echo ("Ano: " . date ("y") );

	// armazenando a data completa e formatada
	$hoje = date("d/m/Y");

	echo ("<br>Hoje é <b>$hoje</b>");

	// pegar a representação numérica do dia da semana, onde o nº 1 é segunda-feira e o nº 7 e domingo
	$dia_semana = date("N");

	echo ($dia_semana);
	
	if ($dia_semana == 2)
		echo ("Terça-feira, hoje tem aula de programação para internet<br>");
	else 
		echo ("Hoje não tem aula de programação para internet");

	// usando date para trabalhar com horários
	// H: hora
	// i: minutos
	// s: segundos

	echo ("Agora são: " . date ("H:i:s") );