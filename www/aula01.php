<?php
	// arquivo aula01.php

	// declarando variaveis

	$nome = "Marcelo";	// string

	$idade = 21;	// int

	$peso = 68.7;	// float

	$doador_de_orgaos = true;	// boolean - true indoca que é doador de órgãos

	// exemplo de concatenação de strings
	$sobrenome = "Lopes";

	// quero deixer nome + sobrenome
	$nome_completo = $nome . " " . $sobrenome;

	// imprimindo na tela essas informações
	echo ("Nome: <b>$nome_completo</b> <br>");
	echo ("Idade: <b> $idade </b> <br>");
	echo ("Peso: <b> $peso </b> <br>");

	// exemplo de estrutura de decisão para exibir se a pessoa
	// é doadora de órgãos ou não
	if ($doador_de_orgaos == true)
		echo ("É doador de orgãos");
	else 
		echo ("Não é doador de orgãos");

	// estrutura de decisão com duas condições
	// quero saber se a pessoa pode tirar a CNH
	// é preciso satisfazer 2 condições: maioridade e passar no teste pscicológico

	$passou_teste = true;	// true passou false não passou

	if ($idade >= 18 && $passou_teste == true)
		echo ("Está apto a tirar a CNH, pois cumpriu os dois requisitos");
	else 
		echo ("Não está apto a tirar a CNH. Os requisitos não foram cumpridos");

	// exemplo de estrutura de decisão aninhada

	$sexo = "M"; // M - masculino F - feminino - I intersexo N - não informado


	if ($sexo == "M")
		echo ("Sexo: Masculino <br>");
	else if ($sexo == "F")
		echo ("Sexo: Feminino <br>");
	else if ($sexo == "I")
		echo ("Sexo: Intersexo <br>");
	else 
		echo ("Sexo: Não informado / prefiro não informar <br>");


?>