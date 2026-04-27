<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>exemplo2.php</h1>
	<p>Exemplo de como ter o formulário e receber os dados no mesmo arquivo</p>

	<!-- 
		O formulário envia os dados para a mesma página (action vazio por padrão).
		O método POST envia os dados "escondidos" na requisição HTTP.
	-->
	<form method="POST">
		Nome: <input type="text" name="nome"> <br>
		Idade: <input type="text" name="idade"> <br>
		Ano de nascimento: <input type="text" name="ano_nasc"> <br>

		<!-- 
			O botão possui name="enviar".
			Quando clicado, esse nome será enviado no $_POST.
		-->
		<input type="submit" name="enviar">
	</form>

	<?php

		/*
		1) POR QUE TESTAR SE O BOTÃO FOI CLICADO?

		Mesmo estando na mesma página, esse código PHP é executado SEMPRE
		que a página carrega.

		Ou seja:
		- Na primeira vez que abre a página, NÃO existem dados em $_POST
		- Se tentarmos acessar $_POST["nome"], dará aviso (warning)

		O isset($_POST["enviar"]) garante que:
		-> O código só será executado após o envio do formulário
		*/
		if (isset($_POST["enviar"])) {

			echo ("Clicou no enviar<br>");

			// Exibe o nome informado
			echo ("Nome: " . $_POST["nome"] . "<br>");

			/*
			2) POR QUE FAZER CASTING (int)?

			Aqui há um ponto importante:
			(int) converte QUALQUER valor para inteiro.

			Exemplos:
			(int)"25"  -> 25
			(int)"abc" -> 0

			Ou seja:
			is_int((int)$_POST["idade"]) SEMPRE será true,
			pois após o casting o valor sempre vira inteiro.

			Então isso NÃO é uma validação real,
			apenas uma conversão.

			Esse tipo de código pode enganar o aluno!
			*/
			if (is_int((int)$_POST["idade"]) ){
				echo ("Idade é um inteiro<br>");
				echo ("Idade: " . $_POST["idade"] . "<br>");
			} else {
				echo ("A idade não é um inteiro<br>");
			}
		
			/*
			3) POR QUE USAR is_numeric?

			Dados vindos de formulário SEMPRE chegam como STRING.

			Exemplo:
			$_POST["idade"] = "25"

			Então:
			is_int($_POST["idade"])   -> false
			is_float($_POST["idade"]) -> false

			Porque NÃO são números de fato, são textos.

			O is_numeric resolve isso:
			-> verifica se o valor PODE ser interpretado como número

			Exemplos:
			is_numeric("25")   -> true
			is_numeric("10.5") -> true
			is_numeric("abc")  -> false
			*/
			if (is_numeric($_POST["ano_nasc"]))
				echo ("O ano de nascimento é um numero<br>");
			else 
				echo ("O ano de nascimento não é um numero<br>");
		}
	?>
</body>
</html>