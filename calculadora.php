<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="POST">
		Número 1: <input type="text" name="n1"> <br>
		Número 2: <input type="text" name="n2"> <br>
		<select name="op">
			<option value="+">Somar</option>
			<option value="-">Subtrair</option>
			<option value="/">Dividir</option>
			<option value="*">Multiplicar</option>
		</select>
		<br>
		<input type="submit" name="calcular">
	</form>
	<?php

		if (isset($_POST["calcular"])){
			// inicializa as variaveis que serão necessárias
			$numero1 = 0;
			$numero2 = 0;
			$resultado = 0;
			$tem_erro = false;

			// validação do numero 1
			// o n1 não pode estar vazio e precisa ser do tipo numérico
			if (!empty($_POST["n1"]) && is_numeric($_POST["n1"])){
				$numero1 = $_POST["n1"];	// armazena o input "n1" na variavel
			}
			else{
				echo ("Preencha o numero 1 ");
				$tem_erro = true;	// variavel de controle
			}


			// validação do numero 2
			if (!empty($_POST["n2"]) && is_numeric($_POST["n2"])){
				$numero2 = $_POST["n2"];
			}
			else{
				// tratando a divisão por zero
				if ($_POST["n2"] == 0 && $_POST["op"] == "/")
					echo ("Não é possível dividir por zero");
				else
					echo ("Preencha o numero 2 ");
				
				$tem_erro = true;
			}

			if ($tem_erro == false){

				switch($_POST["op"]){
					case "+":
						$resultado = $numero1 + $numero2;
						break;
					case "-":
						$resultado = $numero1 - $numero2;
						break;
					case "*":
						$resultado = $numero1 * $numero2;
						break;
					case "/":
						$resultado = $numero1 / $numero2;
						break;
				}

				echo ("O resultado é $resultado");
			}
		}
	?>
</body>
</html>