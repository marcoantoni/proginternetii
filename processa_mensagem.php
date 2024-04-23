<?php
	// arquivo processa_mensagem.php

	if (isset($_GET["enviar"])) {

		// inicializa as variaveis para que os valores possam ser armazenados e exibidos mais tarde
		$nome = ""; 
		$nascimento = "";
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

		if (empty($nascimento)) {
			echo ("Prrencha a data de nascimento <br>");
			$tem_erro = true;
		}

		if (empty($cpf)){
			echo ("Preencha o CPF <br>");
			$tem_erro = true;
		}

		if (empty($telefone)) {
			echo ("Preencha o telefone<br>");
			$tem_erro = true;
		}

		if (empty($email)){
			echo ("Preencha o email <br>");
			$tem_erro = true;
		}

		if (empty($sexo)) {
			echo ("Prrencha o sexo");
			$tem_erro = true;
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