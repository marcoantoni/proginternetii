<?php
	
	$idade = 18;

	$passou_no_teste = false; // true -> aprovado falase -> reprovado

	// exemplo de if com duas condições
	if ($idade >= 18 && $passou_no_teste == true)
		echo ("Apto a tirar a CNH");
	else if ($idade < 18)
		echo ("Para estar apto, é preciso ser maior de idade");
	else
		echo ("Para estar apto, é preciso passar no teste psicológico");
	

	/* Correção do exercício:
	 Faça um programa que escreve uma data por extenso, lendo os dados de três variáveis (representando uma data). Exemplo: 15/03/2023 → 15 de março de 2023.
	*/
	 $dia = 05;
	 $mes = 1;
	 $ano = 2024;
	 $mes_extenso = "";

	 if($mes == 1){
	 	$mes_extenso = "JANEIRO";
	 } else if($mes == 2){
	 	$mes_extenso = "FEVEREIRO";
	 } else if($mes == 3){
	 	$mes_extenso = "MARÇO";
	 } else if($mes == 4){
	 	$mes_extenso = "ABRIL";
	 } else if($mes == 5){
	 	$mes_extenso = "MAIO";
	 } else if($mes == 6){
	 	$mes_extenso = "JUNHO";
	 } else if($mes == 7){
	 	$mes_extenso = "JULHO";
	 } else if($mes == 8){
	 	$mes_extenso = "AGOSTO";
	 } else if($mes == 9){
	 	$mes_extenso = "SETEMBRO";
	 } else if($mes == 10){
	 	$mes_extenso = "OUTUBRO";
	 } else if($mes == 11){
	 	$mes_extenso = "NOVEMBRO";
	 } else {
	 	echo("$dia de DEZEMBRO");
	 }

	 echo("$dia de $mes_extenso de $ano");
?>