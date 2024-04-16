<?php
	// arquivo processa_mensagem.php
	$nome = $_GET["nome"];
	$nascimento = $_GET["nasc"];
	$cpf = $_GET["cpf"];
	$email = $_GET["email"];
	$telefone = $_GET["fone"];
	$sexo = $_GET["sexo"];

	// dias da semana - próxima aula terminar
	/*$seg = $_GET["seg"];
	$ter = $_GET["ter"];
	$qua = $_GET["qua"];
	$qui = $_GET["qui"];
	$sex = $_GET["sex"];
	$sab = $_GET["sab"];

	$msg = $_GET["mensagem"];
*/

	$tem_erro = false; // variavel de controle para mostrar as informações no final

	// validando as informações vindas do formulário
	// a função empty retorna true se a variavel estiver vazia
	if (empty($nome) == true){
		echo ("Preencha o nome <br>");	// printa na tela a mensagem de erro
		$tem_erro = true;	// altera o status da variavel de controle
	}

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

	// se a variavel tem_erro for false, significa que não foi alterada dentro dos testes acima, ou seja, tudo está preenchido corretamente
	if ($tem_erro == false) {
		echo ("Os dados enviados foram: <br>");
		echo ("Nome: $nome <br>");
		echo ("Data de nascimento: $nascimento <br>");
		echo ("CPF: $cpf <br>");
		echo ("Email: $email <br>");
		echo ("Telefone: $telefone <br>");
		echo ("Sexo: $sexo <br>");
		echo ("Mensagem enviada: $msg <br>");
	}


?>