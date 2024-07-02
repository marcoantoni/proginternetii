<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mostrando os atendimentos</title>
	<!-- insere um arquivo css externo -->
	<link rel="stylesheet" type="text/css" href="..\css\main.css">
</head>
<body>
	<?php
		// conecta ao banco de dados
		$conn = mysqli_connect("127.0.0.1", "root", "", "programacaoparainternet");

		if ($conn){
			// conexão com sucesso

			// instrução sql a ser executada
			// o date_format(nascimento, '%d/%m/%Y') AS nascimento formata o valor da data (campo nascimento) para o formato no Brasil. AS é usado para renomear o nome do campo
			$sql = "SELECT nome, email, telefone, mensagem, date_format(nascimento, '%d/%m/%Y') AS nascimento FROM `atendimentos`;";

			// consultas do tipo select retornam um resultset (uma matriz de registros)

			$resultado = mysqli_query($conn, $sql);

			// testa quantas linhas a consulta retornou
			if (mysqli_num_rows($resultado) > 0) {
				echo ("<h1>Listando todos os atendimentos pendentes</h1>");

				// inicia a abertura da tabela e adiciona os cabeçalhos
				echo ("<table><tr><th>Nome</th><th>Email</th><th>Telefone</th><th>Nascimento</th><th>Mensagem</th><th>Ações</th></tr>");

				// laço de repetição para percorrer o resultset
				// a função mysqli_fetch_array transforma cada linha da tabela em um array associativo, que é armazenado na variavel $row. Ao mostrar o último registro, o laço irá parar pois irá retornar false uma vez que não tem mais registros. Cada iteração do laço de repetição corresponde a uma linha da tabela.

				while ($row = mysqli_fetch_array($resultado) ){
					echo ("<tr>");	// abre uma nova linha da tabela
					echo ("<td>$row[nome]</td>");	// abre uma nova coluna e adiciona o campo nome (refere-se a coluna do banco de dados)
					echo ("<td>$row[email]</td>");
					echo ("<td>$row[telefone]</td>");
					echo ("<td>$row[nascimento]</td>");
					echo ("<td>$row[mensagem]</td>");
					// botões para as ações do sistema
					echo ("<td>
							<a href='#' class='edit_btn'>Editar</a>
							<a href='#' class='del_btn'>Exclir</a>
						</td>");
					echo ("</tr>");	// fecha a linha 
				}
				echo ("</table>");	// fecha a tabelea


				mysqli_close($conn);	// fecha a conexão com o banco de dados

			} else {
				echo ("<h1>Não há nada para mostrar</h1>");
			}

		} else {
			die("Houve um erro ao conectar com o banco de dados");
		}
	?>
</body>
</html>