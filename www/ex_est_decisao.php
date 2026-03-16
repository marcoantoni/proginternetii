<?php
	// ex_est_decisao.php
	
	// correção exercícios aula 1

	$presencas = 90;	// armazenando a quantidade de aulas que o aluno veio

	$freq = ($presencas / 120) * 100;

	echo ("O estudante que assistiu $presencas aulas tem frequencia de $freq % <br>");

	// Escreva um programa que verifica se um número é par ou ímpar.
	$numero = 0;

	if ($numero % 2 == 0)
		echo ("O $numero é par <br>");
	else
		echo ("O $numero é impar <br>");

	// Crie um programa que verifica se um número inteiro é positivo, negativo ou zero.

	if ($numero > 0)
		echo ("O $numero é positivo <br>");
	else if ($numero < 0)
		echo ("O $numero é negativo <br>");
	else 
		echo ("Zero <br>");

	// Faça um programa que escreve uma data por extenso, lendo os dados de três variáveis (representando uma data). Exemplo: 15/03/2023 → 15 de março de 2023.

	// fazendo esse exemplo usando concatenção de string e estrutura de decisão switch

	$dia = 15;
	$mes = 4;
	$ano = 2025;

	$saida = $dia . " de ";

	switch($mes){
		case 1:
			// a concatenação permite economizar código, pois não é necessário fazer: 
			// echo ("$dia de janeiro de $ano);
			$saida .= "janeiro";
			break;
		case 2:
			$saida .= "fevereiro";
			break;
		case 3:
			$saida .= "março";
			break;
		case 4:
			$saida .= "abril";
			break;
		case 5:
			$saida .= "maio";
			break;
		case 6:
			$saida .= "junho";
			break;
		case 7:
			$saida .= "julho";
			break;
		case 8:
			$saida .= "agosto";
			break;
		case 9:
			$saida .= "setembro";
			break;
		case 10:
			$saida .= "outubro";
			break;
		case 11:
			$saida .= "novembro";
			break;
		default:
			$saida .= "dezembro";
	}

	$saida .= " de " . $ano;

	echo ($saida);




?>