<?php
	// arquivo aula02.php
	// Este exemplo demonstra três tipos de laços de repetição em PHP:
	// for, while e do...while

	// -----------------------------
	// Exemplo 1: Laço FOR
	// -----------------------------
	// O laço "for" é muito usado quando sabemos quantas vezes
	// o código deve se repetir.

	// Estrutura do for:
	// for (inicialização; condição; incremento)

	// $i = 0      -> variável começa em 0
	// $i < 5      -> o laço executa enquanto $i for menor que 5
	// $i++        -> a cada repetição, soma 1 em $i

	// Dica: se quisermos pular de 2 em 2, poderíamos usar $i = $i + 2

	for ($i=0; $i<5; $i++){
		// Este comando será executado 5 vezes
		// Mostra o valor atual da variável $i
		echo ("Executando o laço for ($i) <br>");
	}


	// -----------------------------
	// Variável para os próximos exemplos
	// -----------------------------
	$x = 10;	
	// Essa variável será usada para testar os laços while e do...while


	// -----------------------------
	// Exemplo 2: Laço WHILE
	// -----------------------------
	// O laço "while" executa enquanto a condição for verdadeira.

	// Estrutura:
	// while (condição) {
	//     código que será repetido
	// }

	// Neste caso, a condição é:
	// $x < 5

	// Como $x vale 10, a condição já começa sendo FALSA.
	// Por isso, o código dentro do while NÃO será executado.

	while ($x < 5){
		echo ("Executando o laço while <br>");
	}


	// -----------------------------
	// Exemplo 3: Laço DO...WHILE
	// -----------------------------
	// O laço "do...while" é parecido com o while,
	// mas possui uma diferença importante:

	// Ele executa o bloco de código pelo menos UMA VEZ,
	// pois a verificação da condição acontece somente no final.

	do {
		// Mesmo que a condição seja falsa,
		// este comando será executado uma vez.
		echo ("Executando o laço do while <br>");
	} while ($x < 5);

?>