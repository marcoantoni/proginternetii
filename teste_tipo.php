<?php
	// teste_tipo.php

	$idade = "30";	// entre aspas é string

	if (is_int($idade) == true)
		echo ("A variavel idade é do tipo int");
	else
		echo ("A variavel idade <b>não</b> é do tipo int");

	$nome = "Gabriel";

	if (is_string($nome) == true)
		echo ("A variavel nome é do tipo string");
	else
		echo ("A variavel nome <b>não</b> é do tipo string");


?>