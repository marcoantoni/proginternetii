<?php
	

	$numero1 = 10;
	$numero2 = 20;
	$operador = '*';

	if ($operador == '+')
		echo ("A soma de $numero1 e do $numero2 é " . $numero1 + $numero2);
	else if ($operador == '-')
		echo ("A subtracao de $numero1 e do $numero2 é " . $numero1 - $numero2);
	else if ($operador == '*')
		echo ("A multiplicação de $numero1 e do $numero2 é " . $numero1 * $numero2);
	else if ($operador == '/')
		echo ("A divicao de $numero1 e do $numero2 é " . $numero1 / $numero2);
	else
		echo ("A operação escolhida não é valida");

	// exemplo do comando switch

	// testa a variavel que contem a condição a ser avaliada
	switch($operador){
		// condicao 1 (operação de soma)
		case '+':
			echo ("A soma de $numero1 e do $numero2 é " . $numero1 + $numero2);
			break;	// o break é obrigatório para parar a execução 
		case '-':
			echo ("A subtracao de $numero1 e do $numero2 é " . $numero1 - $numero2);
			break;
		case '*':
			echo ("A multiplicação de $numero1 e do $numero2 é " . $numero1 * $numero2);
			break;
		case '/':
			echo ("A divicao de $numero1 e do $numero2 é " . $numero1 / $numero2);
			break;
		default:
			// a instrução default será executada se nenhuma condição acima for satisfeita
			echo ("A operação escolhida não é valida");
	}
?>