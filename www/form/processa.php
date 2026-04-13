<?php
	// arquivo processa.
	// recuperando o valor de cada input
	$nome = ""; // criando a variavel como "" para não ter o warning
	$nasc = "";
	$email = "";
	$curso = "";
	$turno = "";
	$areas_interesse = $_POST["interesses"];


	// adicionando validações para garantir que todos os campos obrigatório sejam preenchidos

	// criando um array para armazenar os erros de preenchimento do formulário
	$erros = [];

	// validar o nome
	// se a variavel nãoe stá preenchida
	if (empty($nome))
		$erros[] = "Preencha o campo nome";
	else 
		$nome = $_POST["nome"];

	if (empty($nasc))
		$erros[] = "Preencha a <b>data de nascimento";
	else
		$nasc = $_POST["nascimento"];

	if (empty($email))
		$erros[] = "Preencha o email";
	else
		$email = $_POST["email"];

	if (empty($curso))
		$erros[] = "Preencha o curso";
	else
		$curso = $_POST["curso"];
		
	
	// como o usuário pode não marcar o turno, é necessário fazer alguns testes adicionais
	// testando cada opção marcada de maneira individual
	if ($_POST["turno"] == "m")
		$turno = "Manhã";
	else if ($_POST["turno"] == "t")
		$turno = "Tarde";
	else if ($_POST["turno"] == "n")
		$turno = "Noite";
	else
		$erros[] = "Preencha o turno"; 


	// exibindo os dados enviados do aluno

	// só tenta exibir os dados se tudo estiver preenchido corretamente
	if (count($erros) == 0){
		echo("Dados enviados<br>");
		echo("Nome: <b>$nome</b><br>"); 
		echo("Data nascimento: <b>$nasc</b><br>"); 
		echo("E-mail: <b>$email</b><br>"); 
		echo("Curso: <b>$curso</b><br>"); 
		echo("Turno das aulas: <b>$turno</b><br>");
		echo("Áreas de interesse<br>"); 
		
		// testando se o usuario marcou algum interesse
		if (count($areas_interesse) > 0) {
			// mostra as areas de interesse
			foreach ($areas_interesse AS $area){
				echo ("<b>$area</b><br>");
			}
		} else {
			echo ("Não tem interesse em nenhuma área");
		}
	}
?>