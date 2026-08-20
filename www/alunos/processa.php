<?php

	session_start();

	// arquivo processa.php
	// Este arquivo é responsável por receber e processar os dados enviados pelo formulário

	// Verifica se o formulário foi enviado (se o botão "enviar" existe no $_POST)
	// Caso não exista, significa que o usuário acessou a página diretamente,
	// então ele é redirecionado para o formulário (cad_aluno.php)
	if (!isset($_POST["enviar"]))
		header("location: cad_aluno.php");

	// Recebendo os dados enviados pelo formulário
	$nome = $_POST["nome"];
	$nascimento = $_POST["nascimento"];
	$email = $_POST["email"];
	$curso = $_POST["curso"];
	$turno = $_POST["turno"];


	// cria um array para recuperar todos os checkbox que foram marcados pelo aluno
	// se o aluno marcou "Banco de dados", será criada uma entrada chamada "banco_de_dados" dentro do array, pois isso foi definido dentro do value do form
	$areas_interesse = $_POST["interesses"];


	// Array que armazenará possíveis mensagens de erro
	$erros = [];

	// Validação dos campos obrigatórios
	// empty() verifica se o campo está vazio ("", null, etc.)
	if (empty($nome))
		$erros[] = "Preencha o nome";

	if (empty($nascimento))
		$erros[] = "Preencha a data de nascimento";

	if (empty($email))
		$erros[] = "Preencha o email";

	// Validação da senha
	if (empty($curso)){
		$erros[] = "Preencha o curso";
	} 

	if (empty($turno)){
		$erros[] = "Preencha o turno";
	}

	// Trata os valores recebidos dos checkboxes de áreas de interesse.
	// A função in_array() verifica se determinado valor está presente
	// no array $areas_interesse (enviado pelo formulário).
	//
	// O operador ternário funciona como um if simplificado:
	// condição ? valor_se_verdadeiro : valor_se_falso
	//
	// Assim, se a área estiver selecionada, a variável recebe 1.
	// Caso contrário, recebe 0.

	$programacao = in_array("programacao", $areas_interesse) ? 1 : 0;
	$banco_dados = in_array("banco_de_dados", $areas_interesse) ? 1 : 0;
	$redes = in_array("redes", $areas_interesse) ? 1 : 0;
	$eng_software = in_array("engenharia_de_software", $areas_interesse) ? 1 : 0;


	// Se houver erros, exibe todos na tela
	if (count($erros) > 0){
		// Percorre o array de erros e imprime cada mensagem
		foreach ($erros AS $erro){
			echo ("$erro<br>");
		}
	} else {
		// Se não houver erros de validação, podemos cadastrar o aluno
		// no banco de dados.

		// incluindo o arquivo de conexão com o banco de dados
		require_once("../conecta.php");
	

		// Monta o comando SQL responsável por inserir os dados
		// do aluno na tabela alunos.
		// Além dos dados básicos (nome, nascimento, e-mail, turno e curso),
		// também são armazenadas as áreas de interesse do aluno.
		// As variáveis $programacao, $banco_dados, $redes e $eng_software
		// recebem 1 quando a área foi selecionada no formulário e 0 quando não foi.
		$sql = "INSERT INTO alunos (nome, nascimento, email, turno, curso, programacao, banco_dados, redes, eng_software)
				VALUES ('$nome', '$nascimento', '$email', '$turno', $curso, $programacao, $banco_dados, $redes, $eng_software)";

		// Executa o comando SQL utilizando a conexão aberta anteriormente.
		//
		// mysqli_query() envia uma consulta SQL para o banco de dados.
		// Se a operação for realizada com sucesso, retorna true.
		// Caso ocorra algum problema, retorna false.
		if (mysqli_query($conn, $sql)) {
			// Define a mensagem que será exibida ao usuário
			$_SESSION["msg"] = "Aluno cadastrado com sucesso";

			// Define as classes do Bootstrap para exibir um alerta de sucesso
			$_SESSION["class"] = "alert alert-success";

			// Faz o redirecionamento para o arquivo mostrar.php - lá será exibido a mensagem
			header("location: mostrar.php");

		} else {

			echo("Houve um erro ao tentar cadastrar o aluno");

		}
		// encerra a conexão com o banco de dados
		mysqli_close($conn);
	}
?>