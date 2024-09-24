<?php
	// criando_cookie.php

	// cria um cookie chamado idade contendo o valor 20
	setcookie("idade", 20);

	//$_GET, $_POST, $_SESSION

	echo ("Idade: " . $_COOKIE["idade"] );

	// a função setcookie tem o 3º parametro que indica a validade

	// criando um cookie de 30 dias
	setcookie("nome", "Augusto", time() + 60 * 60 * 24 * 30);

	echo (time() );

?>