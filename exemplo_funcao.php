<?php
	// arquivo exemplo_funcao.php

	function somar($n1, $n2) {
		$resultado = $n1 + $n2;	// armazena o resultado da operacao na variavel

		echo ("$n1 + $n2 = $resultado");
	}

	$GLOBALS["n3"] = 12; // cria uma variavel global
	// declarar uma function com o mesmo nome, irá dar um erro fatal, pois os nomes devem ser únicos
	function somar2($n1, $n2){

		// exemplo de como acessar a variavel global
		// atencao que o resultado vai sair "errado", pois está sendo somado o valor de uma 3º variavel
		$resultado = $n1 + $n2 + $GLOBALS["n3"];

		return $resultado;
	}

	// essa chamada a função não irá mostrar nada ao usuario, pois ela não está sendo mostrada
	somar(17, 13);

	// ao chamar uma função com retorno, é possível armazenar o valor retornado em uma variavel
	$result = somar2(10, 15);
	echo ("10 + 15 = $result");


	// ao chamar uma função com retorno, é possível printar o valor retornado diretamente dentro de um echo
	echo ("<br>A soma de 77 + 64 é " . somar2(77, 64) );

	function subtrair($n1, $n2){
		return $n1 - $n2;
	}

	echo ("<br>100 - 88 = " . subtrair(100, 88) );

	// qual será a saída?
	echo ($resultado);	// isso 
?>