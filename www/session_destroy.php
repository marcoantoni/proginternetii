<?php
	// arquivo session_destroy.php
	// finalidade: encerrar uma sessão em PHP

	// inicia ou recupera a sessão atual
	// isso é necessário para que o PHP saiba qual sessão será encerrada
	session_start();

	// destrói a sessão atual
	// todas as variáveis armazenadas em $_SESSION serão removidas
	// normalmente utilizado em logout de sistemas
	session_destroy();

?>