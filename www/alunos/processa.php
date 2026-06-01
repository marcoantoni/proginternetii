<?php
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

	// Se houver erros, exibe todos na tela
	if (count($erros) > 0){
		// Percorre o array de erros e imprime cada mensagem
		foreach ($erros AS $erro){
			echo ("$erro<br>");
		}
	} else {
		// Se não houver erros de validação, podemos cadastrar o aluno
		// no banco de dados.

		// Tenta executar o código de conexão com o banco.
		// Caso ocorra algum erro durante a conexão, o bloco catch será executado.
		try {

			// Abre uma conexão com o banco de dados MySQL.
			//
			// Parâmetros do mysqli_connect:
			// 1º - endereço do servidor do banco de dados
			// 2º - usuário
			// 3º - senha
			// 4º - nome do banco de dados
			//
			// A função retorna um objeto de conexão que será utilizado
			// para executar consultas SQL.
			$conn = mysqli_connect("mysql", "root", "1234", "prog_internet");

		} catch (mysqli_sql_exception $e){

			// die() encerra imediatamente a execução do programa
			// e exibe a mensagem informada.
			die("Erro ao conectar com o banco de dados");
		}

		// Monta o comando SQL responsável por inserir os dados
		// do aluno na tabela alunos.
		$sql = "INSERT INTO alunos (nome, nascimento, email, turno, curso, programacao, banco_dados, redes, eng_software)
				VALUES ('$nome', '$nascimento', '$email', '$turno', $curso, 0, 0, 0, 0)";

		// Executa o comando SQL utilizando a conexão aberta anteriormente.
		//
		// mysqli_query() envia uma consulta SQL para o banco de dados.
		// Se a operação for realizada com sucesso, retorna true.
		// Caso ocorra algum problema, retorna false.
		if (mysqli_query($conn, $sql)) {

			echo("Aluno cadastrado com sucesso");

		} else {

			echo("Houve um erro ao tentar cadastrar o aluno");

		}

		// As áreas de interesse serão implementadas na próxima aula.
	}
?>