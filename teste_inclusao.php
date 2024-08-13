<?php

	// insere o arquivo variaveis.php
	// include - dá warning se não encontrar o arquivo (não interrompe a execução do código)
	// require - dá error se não encontrar o arquivo (interrompe a execução do código)

	require("variaveis.php");	
	
	echo "<br>";

	// once vai fazer a inclusão uma única vez. Isso evita que as variaveis sejam resetadas	include_once("variaveis.php");

	echo "<br>";
	
	echo ("A $fruta é $cor");	// vai mostrar a mensagem "A maçã é vermelha", pois as variaveis $fruta e $cor estão deifinidas no arquivo variaveis.php
?>