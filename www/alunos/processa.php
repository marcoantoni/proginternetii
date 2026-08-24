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


	// Cria um array para recuperar todos os checkbox que foram marcados pelo aluno.
	//
	// Os checkbox possuem o mesmo nome "interesses[]" no formulário.
	// Dessa forma, os valores selecionados são enviados para o PHP
	// dentro do array $_POST["interesses"].
	//
	// Se nenhum checkbox for selecionado, o campo "interesses" não será enviado.
	// Nesse caso, criamos um array vazio para evitar problemas ao utilizar
	// a função in_array().
	$areas_interesse = isset($_POST["interesses"]) ? $_POST["interesses"] : array();


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


	// Validação do curso
	if (empty($curso)){
		$erros[] = "Preencha o curso";
	} 


	// Validação do turno
	if (empty($turno)){
		$erros[] = "Preencha o turno";
	}


	// Trata os valores recebidos dos checkboxes de áreas de interesse.
	//
	// A função in_array() verifica se determinado valor está presente
	// no array $areas_interesse.
	//
	// O operador ternário funciona como um if simplificado:
	//
	// condição ? valor_se_verdadeiro : valor_se_falso
	//
	// Assim, se a área estiver selecionada, a variável recebe 1.
	// Caso contrário, recebe 0.

	$programacao = in_array("programacao", $areas_interesse) ? 1 : 0;

	$banco_dados = in_array("banco_de_dados", $areas_interesse) ? 1 : 0;

	$redes = in_array("redes", $areas_interesse) ? 1 : 0;

	$eng_software = in_array("engenharia_de_software", $areas_interesse) ? 1 : 0;


	// Se houver erros, percorre o array de erros
	// para armazenar todas as mensagens na sessão.
	if (count($erros) > 0){

		// Inicializa a mensagem da sessão como uma string vazia.
		$_SESSION["msg"] = "";

		// Percorre o array de erros.
		// A cada repetição, a mensagem de erro é adicionada
		// ao conteúdo que já existe em $_SESSION["msg"].
		foreach ($erros AS $erro){

			// O operador .= concatena o novo erro
			// com o conteúdo que já está armazenado na variável.
			$_SESSION["msg"] .= $erro;
		}

	} else {

		// Se não houver erros de validação, podemos cadastrar
		// ou alterar o aluno no banco de dados.

		// Incluindo o arquivo de conexão com o banco de dados
		require_once("../conecta.php");


		// Recupera o ID do aluno enviado pelo formulário.
		//
		// No cadastro de um novo aluno, o campo "id_aluno"
		// não existe no formulário.
		//
		// Na edição de um aluno, o campo "id_aluno" existe
		// e contém o ID do aluno que será alterado.
		//
		// Caso "id_aluno" não exista no $_POST, será atribuído
		// uma string vazia à variável $id.
		$id = isset($_POST["id_aluno"]) ? $_POST["id_aluno"] : '';


		// Verifica se existe um ID de aluno.
		//
		// Se $id não estiver vazio, significa que estamos
		// editando um aluno que já existe no banco de dados.
		//
		// Nesse caso, devemos utilizar o comando UPDATE.
		if (isset($id) && !empty($id)){

			// Comando SQL utilizado para alterar os dados
			// de um aluno que já existe no banco de dados.
			$sql = "UPDATE alunos SET 
				nome = '$nome', 
				nascimento = '$nascimento',
				email = '$email',
				turno = '$turno', 
				curso = $curso,
				programacao = $programacao,
				banco_dados = $banco_dados,
				redes = $redes,
				eng_software = $eng_software
				WHERE id = $id
			";

		} else {

			// Se não existe um ID, significa que estamos
			// cadastrando um novo aluno.
			//
			// Nesse caso, utilizamos o comando INSERT.

			// Monta o comando SQL responsável por inserir os dados
			// do aluno na tabela alunos.
			//
			// Além dos dados básicos (nome, nascimento, e-mail,
			// turno e curso), também são armazenadas as áreas
			// de interesse do aluno.
			//
			// As variáveis $programacao, $banco_dados, $redes
			// e $eng_software recebem 1 quando a área foi
			// selecionada no formulário e 0 quando não foi.

			$sql = "INSERT INTO alunos (nome, nascimento, email, turno, curso, programacao, banco_dados, redes, eng_software)
					VALUES ('$nome', '$nascimento', '$email', '$turno', $curso, $programacao, $banco_dados, $redes, $eng_software)";
		}


		// Executa o comando SQL utilizando a conexão aberta anteriormente.
		//
		// mysqli_query() envia uma consulta SQL para o banco de dados.
		//
		// Se a operação for realizada com sucesso, retorna true.
		// Caso ocorra algum problema, retorna false.
		if (mysqli_query($conn, $sql)) {
			
			// Verifica se existe um ID.
			//
			// Se existe, significa que a operação realizada
			// foi uma alteração de um aluno existente.
			if (isset($id) && !empty($id) ){

				$_SESSION["msg"] = "Aluno alterado com sucesso";

				// Define as classes do Bootstrap para exibir
				// um alerta de sucesso.
				$_SESSION["class"] = "alert alert-success";

			} else {

				// Se não existe um ID, significa que foi realizado
				// o cadastro de um novo aluno.
				$_SESSION["msg"] = "Aluno cadastrado com sucesso";

				// Define as classes do Bootstrap para exibir
				// um alerta de sucesso.
				$_SESSION["class"] = "alert alert-success";
			}


		} else {

			// Caso a execução do comando SQL apresente algum erro,
			// define uma mensagem de erro na sessão.
			$_SESSION["msg"] = "Houve um erro ao tentar cadastrar o aluno";

			// Define as classes do Bootstrap para exibir
			// um alerta de erro.
			$_SESSION["class"] = "alert alert-danger";

		}


		// Faz o redirecionamento para o arquivo mostrar.php.
		// Lá será exibida a mensagem armazenada na sessão.
		header("location: mostrar.php");
		
		// Encerra a conexão com o banco de dados.
		mysqli_close($conn);
		
	}
?>