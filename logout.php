<?php

	//iniciando e acabando a sessão, pra poder voltar pra página inicial
	session_start();
	session_destroy();

	header('location: index.php');
?>