<?php
	// arquivo protege.php
	session_start();

	// se não existe a variavel $_SESSION["usuario"]
	if (!isset($_SESSION["usuario"])){
		// redireciona para a página de login
		header("location: ../login.php");
	}
?>