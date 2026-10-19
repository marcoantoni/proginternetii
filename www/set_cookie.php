<?php
	
	// Cria um cookie chamado "nome" com o valor "Augusto"
	// O cookie terá validade de 60 segundos a partir do momento da execução
	// O terceiro parametro é opcional e não seja definido, o cookie terá validade até que o navegador seja encerrado
	setcookie("nome", "Augusto", time() + 60);
