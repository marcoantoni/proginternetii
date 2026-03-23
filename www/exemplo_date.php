<?php 
	
	// Define o fuso horário do sistema para o padrão de São Paulo (Brasil)
	// Isso garante que as funções de data e hora retornem valores corretos
	date_default_timezone_set("America/Sao_Paulo");

	// Cria uma variável chamada $agora
	// A função date() formata a data atual conforme o padrão informado
	// "d m Y" significa:
	// d = dia (2 dígitos)
	// m = mês (2 dígitos)
	// Y = ano completo (4 dígitos)
	$agora = date("d m Y");

	// Exibe na tela a data armazenada na variável $agora
	echo ($agora);

	// Exibe a hora atual no formato:
	// H = hora (formato 24h)
	// i = minutos
	// s = segundos
	// O operador "." é usado para concatenar (juntar) textos
	echo ("Agora é: " . date("H:i:s") );
?>