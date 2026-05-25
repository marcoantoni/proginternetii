<?php
	// arquivo session_retrieve.php
	// finalidade: demonstrar a persistência de dados entre páginas usando sessões

	// inicia ou recupera a sessão atual
	// mesmo que a sessão já tenha sido criada anteriormente,
	// toda página que utilizar $_SESSION precisa chamar session_start()
	session_start();

	// exibe os valores armazenados nas variáveis de sessão
	// os dados foram criados anteriormente em outro arquivo
	echo ("O aluno $_SESSION[nome] nasceu em $_SESSION[nasc] ");

	// caso uma variável de sessão não exista,
	// o PHP poderá gerar um warning informando
	// que o índice não foi encontrado
	// dessa forma, é importante usar o isset para testar a existência da variavel antes de tentar manipular ela

?>