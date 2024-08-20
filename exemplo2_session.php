<?php 
	// exemplo2_session.php

	// sempre que for necessário utilizar variaveis de sessão, a sessão deve ser inicializada
	session_start();

	// recuperando a variavel de sessão que foi criada no arquivo exemplo1_session.php
	
	// validando se foi criada as variaveis de sessão

	if (isset($_SESSION["nome"]))
		echo ($_SESSION["nome"]);
	else 
		echo ("Não foi criada a variavel de sessão <b>nome</b>");

	if (isset($_SESSION["idade"]))
		echo ($_SESSION["idade"]);
	else
		echo ("Não foi criada a variavel de sessão <b>idade</b>");

	// unset é o comando para excluir uma variavel
	unset($_SESSION["idade"]);
?>