<?php

	// arquivo responsável pela exclusão

	$id_atendimento = $_GET['id'];

	require("conecta.php");	// incluindo o arquivo que faz a conexão com o banco de dados

	$sql = "DELETE FROM atendimentos WHERE id = $id_atendimento";

	// $conn está definida no arquivo conecta.php
	$resultado = mysqli_query($conn, $sql);

	if ($resultado == true){
		// se a consulta foi executada com sucesso, o arquivo foi excluido
		echo ("<script>alert('Mensagem excluída com sucesso!'); </script>");
		header("location: mostrar.php");
	} else {
		echo ("<script>alert('Houve um erro ao fazer a exclusão!'); </script>");
	}

	mysqli_close($conn); // fecha a conexão com o banco de dados
?>