<?php
	// aula5.php
	echo ("for é um laço de repetição simples<br>");
	// tem três  condições:
	// 1º inicialização da variavel
	// 2º condição de saída
	// 3º incremento da variavel de controle - pulando de 3 em 3: $i=$i+3
	for ($i=0; $i<10; $i++){
		echo ("$i ");
	}

	echo ("<br>laço while tem pré-validação<br>");
	$status = true;

	$j = 0;
	while ($status == true){
		echo ("$j ");

		// criando a cond. de saida do laço
		if ($j == 10){
			$status = false;
			// poderia usar um break
		}
		$j++;
	}

	echo ("<br>laço do while tem pós-validação<br>");
	$encontrado = false;
	$k=0;	// variavel para ter a condição de saída

	do {
		echo ("$k ");

		// criando a cond. de saida do laço
		if ($k == 10){
			$encontrado = true;
		}
		$k++;
	} while ($encontrado == false);
	// vai executar o laço enquanto a variavel encontrado for false

?>