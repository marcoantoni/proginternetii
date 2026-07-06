<?php
	// excluir.php

	// recupera o id do registro que vai ser excluido
	$id = $_GET["id"];

	try {
        $conn = mysqli_connect("mysql", "root", "1234", "prog_internet");
    } catch (mysqli_sql_exception $e) {
        die ("Houve um erro ao conectar");
    }

    // monta a consulta sql - id é a pk da tabela e $id é o valor que está vindo como parametro pela URL
    $sql = "DELETE FROM alunos WHERE id = $id";

    if ( mysqli_query($conn, $sql) ) {
    	// consulta executada com sucesso
    	// é necessário validar se houve sucesso na exclusão

    	if (mysqli_affected_rows($conn) == 1){
    		echo ("Aluno foi excluído com sucesso.");
    	} else {
    		echo ("Houve um erro ao excluir o aluno. Verifique se o id existe.");
    	}

    } else {
    	echo ("Houve um erro ao excluir o aluno.");
    }
?>