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
?>