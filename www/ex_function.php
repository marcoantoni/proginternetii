<?php
	// arquivo ex_function.php
	
	// Exemplo de ARRAY ASSOCIATIVO
	// Diferente do array comum (com índices numéricos),
	// aqui usamos "chaves" (nome, nascimento, etc.)
	$func1 = array(
		"nome"			=> "Jonas",
		"nascimento"	=> "14/04/2007",
		"cargo"			=> "Técnico em informática",
		"salario"		=> 2949.89,
		"endereco"		=> "Taquara"
		// A vírgula no último elemento é opcional em PHP
	);

	$func2 = array(
		"nome"			=> "Giovana",
		"nascimento"	=> "15/05/2007",
		"cargo"			=> "Técnico em informática",
		"salario"		=> 3919.89,
		"endereco"		=> "Taquara"
	);

	// Variável criada fora da função (escopo global)
	$empresa = "Inovare desenvolvimento de sistemas";

	// FUNÇÃO para exibir os dados de um funcionário
	// O parâmetro $funcionario recebe um ARRAY
	function mostrarFuncionario($funcionario){
		
		// Acessando os dados do array associativo
		// usamos a chave entre colchetes
		echo ("Nome: $funcionario[nome] <br>");
		echo ("Nascimento: $funcionario[nascimento] <br>");
		echo ("Cargo ocupado: $funcionario[cargo] <br>");
		echo ("Salário: R$ $funcionario[salario] <br>");
		echo ("Endereço: $funcionario[endereco] <br>");

		// IMPORTANTE: ESCOPO DE VARIÁVEIS
		// A variável $empresa foi criada fora da função,
		// então NÃO pode ser acessada diretamente aqui dentro

		// Isso geraria erro (warning):
		// echo ("Empresa: $empresa <br>");

		// Para acessar variáveis globais dentro de funções,
		// usamos o array especial $GLOBALS
		echo ("Empresa: $GLOBALS[empresa] <br>");
	}

	// Chamando a função e passando cada funcionário como parâmetro
	mostrarFuncionario($func1);
	mostrarFuncionario($func2);
	
	// Exemplo de FUNÇÃO COM RETORNO
	function somar($n1, $n2) {
		// A função recebe dois números e devolve o resultado da soma
		return $n1 + $n2;
	}

	// Chamando a função e armazenando o resultado em uma variável
	$resultado = somar(45, 71);

	// Exibindo o resultado
	echo ("O resultado é $resultado");