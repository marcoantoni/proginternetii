<?php
	// arquivo processa_mensagem.php

	if (isset($_GET["enviar"])) {

		// inicializa as variaveis para que os valores possam ser armazenados e exibidos mais tarde
		$nome = ""; 
		$nascimento = "";
		$cpf = "";
		$email = "";
		$telefone = "";
		$sexo = "";
		$msg = "";

		$tem_erro = false; // variavel de controle para mostrar as informações no final

		// validando as informações vindas do formulário
		// a função empty retorna true se a variavel estiver vazia
		if (isset($_GET["nome"]) && !empty($_GET["nome"])){
			$nome = $_GET["nome"];	// armazena o nome, somente se a variavel existir e não estiver vazia
		} else {
			echo ("Preencha o nome <br>");	// printa na tela a mensagem de erro
			$tem_erro = true;	// altera o status da variavel de controle
		}

		// fazer a validação dos inputs abaixo, conforme o exemplo de cima

		if (isset($_GET["nasc"]) && !empty($_GET["nasc"])){
			$nascimento = $_GET["nasc"];	// armazena o nome, somente se a variavel existir e não estiver vazia
		} else {
			echo ("Preencha o nascimento <br>");	// printa na tela a mensagem de erro
			$tem_erro = true;	// altera o status da variavel de controle
		}

		if (isset($_GET["cpf"]) && !empty($_GET["cpf"])){
			$cpf= $_GET["cpf"];	// armazena o nome, somente se a variavel existir e não estiver vazia
		} else {
			echo ("Preencha o CPF <br>");	// printa na tela a mensagem de erro
			$tem_erro = true;	// altera o status da variavel de controle
		}

		if (isset($_GET["fone"]) && !empty($_GET["fone"])){
			$telefone = $_GET["fone"];	// armazena o nome, somente se a variavel existir e não estiver vazia
		} else {
			echo ("Preencha o telefone <br>");	// printa na tela a mensagem de erro
			$tem_erro = true;	// altera o status da variavel de controle
		}

		if (isset($_GET["email"]) && !empty($_GET["email"])){
			$email = $_GET["email"];	// armazena o nome, somente se a variavel existir e não estiver vazia
		} else {
			echo ("Preencha o email <br>");	// printa na tela a mensagem de erro
			$tem_erro = true;	// altera o status da variavel de controle
		}

		if (isset($_GET["sexo"]) && !empty($_GET["sexo"])){
			$sexo = $_GET["sexo"];	// armazena o nome, somente se a variavel existir e não estiver vazia
		} else {
			echo ("Preencha o sexo <br>");	// printa na tela a mensagem de erro
			$tem_erro = true;	// altera o status da variavel de controle
		}

		$msg = $_GET["mensagem"];

		// se a variavel tem_erro for false, significa que não foi alterada dentro dos testes acima, ou seja, tudo está preenchido corretamente
		if ($tem_erro == false) {
			echo ("Os dados enviados foram: <br>");
			echo ("Nome: $nome <br>");
			echo ("Data de nascimento: $nascimento <br>");
			echo ("CPF: $cpf <br>");
			echo ("Email: $email <br>");
			echo ("Telefone: $telefone <br>");
			echo ("Sexo: $sexo <br>");
			
			// validando os inputs checkbox
			echo ("Dias para entrar em contato: <br>");
			if (isset($_GET["seg"]) )
				echo ("Segunda-feira ");
			if (isset($_GET["ter"]) )
				echo ("Terça-feira ");
			if (isset($_GET["qua"]) )
				echo ("Quarta-feira ");
			if (isset($_GET["qui"]) )
				echo ("Quinta-feira ");
			if (isset($_GET["sex"]) )
				echo ("Sexta-feira ");
			if (isset($_GET["sab"]) )
				echo ("Sábado ");

			echo ("<br>Mensagem enviada: $msg <br>");
		}
	}


?>