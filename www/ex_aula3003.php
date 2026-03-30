<?php
	// arquivo ex_aula3003.php

	//Escreva um programa que escreva a data atual do computador por extenso. Exemplo: Quinta-feira, 29 de dezembro de 2024

	$dia = date("d");
	$mes = date("n");
	$ano = date("Y");
	$dia_s = date("N");


	$meses = ["", "janeiro", "feveiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"];

	$dia_semana = ["", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sabádo", "Domingo"];

	echo ("$dia_semana[$dia_s], $dia de $meses[$mes] de $ano");

	// Escreva um algoritmo que analisa um array contendo 10 números e em seguida procure qual é o maior valor armazenado dentro dele.

	$numeros = [10, 5, 54, -5, 66, 13, 18, 25, 98, 66];

	$maior = $numeros[0];	// inicializando a variavel com um valor que está no conjunto de dados

	foreach ($numeros AS $n){
		if ($n > $maior)
			$maior = $n;
	}

	echo ("O maior valor do conjunto é $maior <br>");
?>