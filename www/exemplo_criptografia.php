<?php
	// exemplo criptografia
	
	// A senha original que será utilizada nos exemplos.
	// Neste momento, ela está armazenada em texto puro (texto aberto).
	$senha = "iloveyou";

	// md5() gera um hash MD5 a partir da senha.
	// Hash não é uma criptografia que possa ser simplesmente "descriptografada".
	// O MD5 é considerado inseguro para armazenamento de senhas atualmente.
	$hashMD5 = md5($senha);

	// sha1() gera um hash utilizando o algoritmo SHA-1.
	// Assim como o MD5, o SHA-1 não é recomendado atualmente para senhas.
	$hashSHA1 = sha1($senha);



	// Exibe a senha original e o hash gerado pelo MD5.
	echo ("Senha: $senha - Criptografada com MD5: $hashMD5 <br>");

	// Exibe a senha original e o hash gerado pelo SHA-1.
	echo ("Senha: $senha - Criptografada com SHA-1: $hashSHA1 <br>");



	// hash_algos() retorna uma lista dos algoritmos de hash
	// disponíveis na instalação do PHP.
	echo ("Algoritmos diposníveis <br>");
	print_r(hash_algos());



	// Gerando um hash utilizando o algoritmo SHA-512.
	// A função hash() permite informar qual algoritmo queremos utilizar.
	$hashSHA512 = hash("sha512", $senha);

	// Exibe a senha original e o hash SHA-512.
	echo ("Senha: $senha - Criptografada com SHA512: $hashSHA512 <br>");



	// O salt é um valor adicional que será combinado com a senha
	// antes de gerar o hash.
	//
	// A ideia do salt é fazer com que duas senhas iguais possam
	// produzir hashes diferentes quando forem utilizados salts diferentes.
	//
	// Em uma aplicação real, o salt deve ser diferente para cada senha.
	$salt = "a&gf16";

	// Aqui estamos concatenando a senha com o salt.
	// O operador "." é utilizado para concatenar strings em PHP.
	$senhaComsalt = $senha.$salt;

	// Gera um hash MD5 utilizando a senha juntamente com o salt.
	$senhaM5salt = md5($senhaComsalt);

	// Exibe a senha + salt e o hash resultante.
	echo ("Senha com salt: $senhaComsalt - Criptografada com MD5: $senhaM5salt <br>");



	// password_hash() é a forma recomendada pelo PHP para gerar
	// hashes destinados ao armazenamento de senhas.
	echo ("Usando password_hash <br>");

	// PASSWORD_DEFAULT indica que o PHP deve utilizar o algoritmo
	// padrão recomendado para senhas.
	//
	// O parâmetro "cost" controla o custo computacional utilizado
	// para calcular o hash.
	//
	// Diferentemente de MD5 e SHA-1, password_hash() foi projetada
	// especificamente para o armazenamento seguro de senhas.
	//
	// Além disso, o salt é gerado automaticamente pelo PHP.
	$senhaPasswordHash = password_hash($senha, PASSWORD_DEFAULT, ["cost" => 10]);

	// Exibe a senha original e o hash produzido pelo password_hash().
	echo ("Senha entrada: $senha - Criptografada com password_hash: $senhaPasswordHash <br>");



	// Este é um hash que foi gerado anteriormente utilizando
	// password_hash().
	//
	// Observe que o hash contém informações necessárias para que
	// o PHP consiga verificar a senha posteriormente, incluindo
	// o algoritmo e o custo utilizado.
	$hash = '$2y$10$hiVhQSxogqitGFL/8/4QmulhyWHcZ/qTYy/yevMxnZsXweVrhriiq';



	// password_verify() verifica se a senha informada corresponde
	// ao hash armazenado.
	//
	// A função recebe:
	// 1. A senha em texto puro informada pelo usuário;
	// 2. O hash que foi armazenado no banco de dados.
	//
	// O PHP utiliza as informações presentes no próprio hash
	// para realizar a verificação.
	if(password_verify($senha, $hash)) {

		// Se a senha corresponder ao hash, esta mensagem será exibida.
		echo "Senha correta";

	} else {

		// Caso a senha não corresponda ao hash, esta mensagem será exibida.
		echo "Senha incorreta";
	}



?>