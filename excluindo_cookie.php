<?php
	// excluindo_cookie.php

	// para excluir um cookie, é preciso recriar ele com uma data de validade negativa
	setcookie("idade", 20, time()-300);
?>