<?php
	// arquivo session_create.php
	// finalidade: demonstrar o uso básico de sessões em PHP

	// inicia ou recupera uma sessão existente
	// sem essa função, não é possível utilizar a variável superglobal $_SESSION
	session_start();

	// cria uma variável de sessão chamada "nome"
	// os dados armazenados em $_SESSION ficam disponíveis
	// em outras páginas enquanto a sessão existir
	$_SESSION["nome"] = "Augusto Gabriel de Medeiros";

	// cria uma variável de sessão chamada "nasc"
	$_SESSION["nasc"] = "15/01/2010";

	// cria uma variável de sessão chamada "curso"
	$_SESSION["curso"] = "Técnico em informática";

	// exibe os dados armazenados na sessão
	// para acessar uma variável de sessão, utiliza-se:
	// $_SESSION["nome_da_variavel"]
	echo ("Nome: $_SESSION[nome] está matriculado no curso $_SESSION[curso] ");

	// remove a variável de sessão "curso"
	// apenas essa variável é excluída, as demais continuam existindo
	unset($_SESSION["curso"]);
	
	// tentativa de exibir novamente a variável "curso"
	// como ela foi removida com unset(), não existirá mais
	// isso serve para demonstrar o comportamento da exclusão
	echo ("Nome: $_SESSION[nome] está matriculado no curso $_SESSION[curso] ");
?>