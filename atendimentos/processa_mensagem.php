<?php
	// arquivo processa_mensagem.php

	if (isset($_POST["enviar"])) {

		// inicializa as variaveis para que os valores possam ser armazenados e exibidos mais tarde
		$nome = ""; 
		$nascimento = "";
		$cpf = "";
		$email = "";
		$telefone = "";
		$sexo = "";
		$horario = "";
		$msg = "";

		$tem_erro = false; // variavel de controle para mostrar as informações no final

		// validando as informações vindas do formulário
		// a função empty retorna true se a variavel estiver vazia
		if (isset($_POST["nome"]) && !empty($_POST["nome"])){
			$nome = $_POST["nome"];	// armazena o nome, somente se a variavel existir e não estiver vazia
		} else {
			echo ("Preencha o nome <br>");	// printa na tela a mensagem de erro
			$tem_erro = true;	// altera o status da variavel de controle
		}

		// fazer a validação dos inputs abaixo, conforme o exemplo de cima

		if (isset($_POST["nasc"]) && !empty($_POST["nasc"])){
			$nascimento = $_POST["nasc"];	// armazena o nome, somente se a variavel existir e não estiver vazia
		} else {
			echo ("Preencha o nascimento <br>");	// printa na tela a mensagem de erro
			$tem_erro = true;	// altera o status da variavel de controle
		}

		if (isset($_POST["cpf"]) && !empty($_POST["cpf"])){
			$cpf= $_POST["cpf"];	// armazena o nome, somente se a variavel existir e não estiver vazia
		} else {
			echo ("Preencha o CPF <br>");	// printa na tela a mensagem de erro
			$tem_erro = true;	// altera o status da variavel de controle
		}

		if (isset($_POST["fone"]) && !empty($_POST["fone"])){
			$telefone = $_POST["fone"];	// armazena o nome, somente se a variavel existir e não estiver vazia
		} else {
			echo ("Preencha o telefone <br>");	// printa na tela a mensagem de erro
			$tem_erro = true;	// altera o status da variavel de controle
		}

		if (isset($_POST["email"]) && !empty($_POST["email"])){
			$email = $_POST["email"];	// armazena o nome, somente se a variavel existir e não estiver vazia
		} else {
			echo ("Preencha o email <br>");	// printa na tela a mensagem de erro
			$tem_erro = true;	// altera o status da variavel de controle
		}

		if (isset($_POST["sexo"]) && !empty($_POST["sexo"])){
			$sexo = $_POST["sexo"];	// armazena o nome, somente se a variavel existir e não estiver vazia
		} else {
			echo ("Preencha o sexo <br>");	// printa na tela a mensagem de erro
			$tem_erro = true;	// altera o status da variavel de controle
		}

		if (isset($_POST["horario"]) && !empty($_POST["horario"])){
			$horario = $_POST["horario"];	// armazena o nome, somente se a variavel existir e não estiver vazia
		} else {
			echo ("Preencha o horario <br>");	// printa na tela a mensagem de erro
			$tem_erro = true;	// altera o status da variavel de controle
		}

		$msg = $_POST["mensagem"];

		// se a variavel tem_erro for false, significa que não foi alterada dentro dos testes acima, ou seja, tudo está preenchido corretamente
		
		// a lógica de inserir os dados vai ser após as validações, para garantir que os dados sejam corretamente inseridos, sem valores em branco
		if ($tem_erro == false) {
			// mysql_connect é a função responsável pela conexão com o banco de dados: os 4 paramestros são: IP do servidor do BD, usuario, senha e nome da base de dados
			$conn = mysqli_connect("10.10.3.158", "aluno", "aluno", "biblioteca");

			if ($conn) {
				// conexao com sucesso 

			echo	$sql = "INSERT INTO atendimentos (nome, nascimento, cpf, email, telefone, horario, mensagem, sexo) VALUES ('$nome', '$nascimento', '$cpf', '$email', '$telefone', '$horario', '$msg', $sexo)";

				// executa a consulta
				if (mysqli_query($conn, $sql) )
					echo ("<script>alert('Mensagem enviada com sucesso!'); </script>");
				else 
					echo ("Houve um erro ao enviar a mensagem");
			} else {
				die("Houve um erro ao conectar com o banco de dados");
			}
			
			// validando os inputs checkbox
			echo ("Dias para entrar em contato: <br>");
			if (isset($_POST["seg"]) )
				echo ("Segunda-feira ");
			if (isset($_POST["ter"]) )
				echo ("Terça-feira ");
			if (isset($_POST["qua"]) )
				echo ("Quarta-feira ");
			if (isset($_POST["qui"]) )
				echo ("Quinta-feira ");
			if (isset($_POST["sex"]) )
				echo ("Sexta-feira ");
			if (isset($_POST["sab"]) )
				echo ("Sábado ");

			echo ("<br>Mensagem enviada: $msg <br>");
		}
	}


?>