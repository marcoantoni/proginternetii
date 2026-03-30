<?php
	// arquivo ex_array.php

	// Cria um array indexado (misto) contendo informações de um funcionário
	// Cada posição representa um dado específico (nome, idade, altura, profissão)
	$func = ["Thiago", 22, 1.75, "Técnico em informática"];

	// Altera o valor da posição 0 (nome do funcionário)
	$func[0] = "Thiago Augusto";

	// Adiciona um novo valor explicitamente na posição 4
	// Observação: a posição 3 já existia, então esta cria um novo índice "saltando" posições
	$func[4] = "30/03/2008"; // data de nascimento

	// Adiciona um valor ao final do array automaticamente
	// O PHP define o próximo índice disponível
	$func[] = "2309.89"; // salário

	// Atribui um valor diretamente ao índice 10 (criando lacunas no array)
	$func[10] = "Desenvolvedor PHP e Javascript";

	// Recuperando e exibindo valores do array
	echo ("Nome: " . $func[0] . "<br>");

	// Outra forma de acessar: interpolação de variável dentro da string
	echo ("Idade: $func[1] <br>");

	echo ("Data de nascimento: " . $func[4] . "<br>");
	echo ("Salário: " . $func[5] . "<br>");

	// Exibe um índice não sequencial (índice 10)
	echo ("Habilidades: " . $func[10] . "<br>");

	// count(): retorna a quantidade de elementos do array
	$itens = count($func);
	echo ("O array func tem $itens elementos armazenados <br>");

	echo ("<br>Percorrendo um array com foreach <br>");

	// Criando outro array indexado
	$alunos = ["Gabriel", "Ana", "Carolina", "Bernardo"];

	// Adicionando um novo elemento ao final
	$alunos[] = "Carlos";

	// foreach percorre automaticamente todos os elementos do array
	// A cada iteração, $aluno recebe o valor de um elemento
	foreach ($alunos as $aluno) {
		echo ("$aluno <br>");
	}

	// Criando um array associativo (chave => valor)
	// Aqui, os índices são nomes (strings), não números
	$func1 = array(
		"nome"			=> "Jonas",
		"nascimento"	=> "14/04/2007",
		"cargo"			=> "Técnico em informática",
		"salario"		=> 2949.89,
		"endereco"		=> "Taquara"
		// A vírgula no último elemento é opcional
	);

	// isset(): verifica se um índice existe no array
	// Retorna true se existir, false caso contrário
	// OBS: aqui há um detalhe proposital: está sendo testado $func (array indexado)
	if (isset($func["nome"]) )
		echo ("O array func tem o índice <b>nome</b>");
	else 
		echo ("O array func NÃO tem o índice <b>nome</b>");

	// Exibindo os valores do array associativo
	// Acesso feito pelas chaves (strings)
	echo ("Nome: $func1[nome] <br>");
	echo ("Nascimento: $func1[nascimento] <br>");
	echo ("Cargo ocupado: $func1[cargo] <br>");
	echo ("Salário: R$ $func1[salario] <br>");
	echo ("Endereço: $func1[endereco] <br>");

	// print_r(): exibe a estrutura completa do array (útil para debug)
	print_r($func1);

?>