<?php
	// arquivo: excluir.php
	// Este arquivo é responsável por excluir um aluno do banco de dados.

	// Recupera o valor do parâmetro "id" enviado pela URL.
	// Exemplo:
	// excluir.php?id=5
	// Nesse caso, a variável $id receberá o valor 5.
	$id = $_GET["id"];

	// esse bloco foi copiado de mostrar.php
	try {
        $conn = mysqli_connect("mysql", "root", "1234", "prog_internet");
    } catch (mysqli_sql_exception $e) {
        die ("Houve um erro ao conectar");
    }

    // Monta o comando SQL responsável por excluir o registro.
    // O DELETE remove registros de uma tabela.
    // Neste caso, será removido o aluno cujo id seja igual ao valor
    // recebido pela URL.
    $sql = "DELETE FROM alunos WHERE id = $id";

    // Inicia a sessão.
    // Ela será utilizada para armazenar mensagens que serão exibidas
    // na próxima página (mostrar.php).
    session_start();

    // Executa o comando SQL.
    // O mysqli_query() retorna true caso a consulta tenha sido executada
    // sem erros de sintaxe ou conexão.
    if ( mysqli_query($conn, $sql) ) {

    	// Mesmo que o comando tenha sido executado corretamente,
    	// ainda precisamos verificar se algum registro realmente
    	// foi excluído.

    	// mysqli_affected_rows() informa quantas linhas foram
    	// alteradas pelo último comando SQL.
    	if (mysqli_affected_rows($conn) == 1){

    		// Um registro foi removido com sucesso.

    		// Armazena uma mensagem de sucesso na sessão.
    		$_SESSION["msg"] = "Aluno foi excluído com sucesso.";

    		// Define a classe CSS do Bootstrap para exibir
    		// uma caixa verde de sucesso.
    		$_SESSION["class"] = "alert-success";

    	} else {

    		// Nenhum registro foi excluído.
    		// Isso normalmente acontece quando o id informado
    		// não existe na tabela.
    		$_SESSION["msg"] = "Houve um erro ao excluir o aluno. Verifique se o id existe.";

    		// Caixa vermelha do Bootstrap.
    		$_SESSION["class"] = "alert-danger";
    	}

    } else {

    	// O comando SQL não conseguiu ser executado.
    	// Pode ter ocorrido algum erro na consulta ou no banco.
    	$_SESSION["msg"] = "Houve um erro ao excluir o aluno.";

    	// Caixa vermelha do Bootstrap.
    	$_SESSION["class"] = "alert-danger";
    }

    // Redireciona o navegador para a página mostrar.php.
    // As mensagens armazenadas na sessão serão exibidas lá.
    header("location: mostrar.php");
?>