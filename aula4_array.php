<?php
	// aula4_array.php

	// forma 1 de se criar um array
	$estudante1 = ["João", 17, 68.9, "17/06/2006", "Estudante"];

	echo ("Nome: " . $estudante1[0] . "<br>");
	echo ("Idade: " . $estudante1[1] . "<br>");
	echo ("Peso: " . $estudante1[2] . "<br>");
	echo ("Nascimento: " . $estudante1[3] . "<br>");
	echo ("Ocuparação: " . $estudante1[4] . "<br>");

	// forma 2 de se criar um array
	$estudante2 = array("Mateus", 18, 71.8, "28/01/2004", "Técnico em informática");

	// acessando e mostrando os valores aramazenados
	echo ("Nome:  $estudante2[0] <br>");
	echo ("Idade: $estudante2[1] <br>");
	echo ("Peso:  $estudante2[2] <br>");
	echo ("Nascimento:  $estudante2[3] <br>");
	echo ("Ocuparação:  $estudante2[4] <br>");

	// adicionando outra informação a um array (última posição)
	$estudante2[] = 2807.58;	// valor que representa a salário

	echo ("Salário: $estudante2[5] <br>");

	// criando outro array
	$turma_info = ["Monique", "Isabela", "Laura", "Maria", "Mateus", "Victor"];

	// adicionando a Ana na posição 7 (vai deixar a posição 6 vazia)
	$turma_info[7] = "Ana";

	// escreve um array na tela
	print_r($turma_info);

	// quantos elementos tem o array?
	$qtd = count($turma_info);

	echo ("<br>percorrendo o array");
	// percorrer o array sem ter algo na posição 6 dará erro
	$turma_info[6] = "Pablo";

	for ($i=0; $i < $qtd; $i++){
		echo ("<br> $turma_info[$i] ");
	}

	// usando o foreach para percorrer o array
	foreach ($turma_info as $aluno){
		echo ("<br>Estudante: $aluno");
	}

	// criando um array associativo
	$func1 = [
		"nome" => "Tiago", 
		"nascimento" => "25/06/2009", 
		"cidade" => "Parobé", 
		"profissao" => "Técnico em informática"
	];

	// acessando um array associativo
	echo ("<br>Mostrando os dados do funcionário<br>");
	echo ("<br>Nome: <b>$func1[nome]</b>");
	echo ("<br>Nascimento: <b>$func1[nascimento]</b>");
	echo ("<br>Cidade: <b>$func1[cidade]</b>");
	echo ("<br>Profissão: <b>$func1[profissao]</b>");

	// a funcao sort coloca um array em ordem ascendente (alfabética)
	sort($turma_info);

	// a funcao rsort coloca um array em ordem decrescente (inversa)
	rsort($turma_info);

	echo ("<br>Reexibindo o array ordenado");
	foreach ($turma_info as $aluno){
		echo ("<br>Estudante: $aluno");
	}


?>