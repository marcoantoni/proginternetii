<?php
	$conn = mysqli_connect("127.0.0.1", "root", "", "programacaoparainternet");

	if (!$conn){
		die("Não foi possível conectar ao banco de dados");
	}
?>