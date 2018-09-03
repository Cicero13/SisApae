<?php
	$hostname_conexao = "localhost";
	$username_conexao = "root";
	$password_conexao = "";
	$database_conexao = "dbapae";
    $database_porta = "3306";	
	$conexao = new mysqli($hostname_conexao,$username_conexao, $password_conexao, $database_conexao,$database_porta);
	
	if(mysqli_connect_errno()) trigger_error(mysqli_connect_error());
		echo mysqli_connect_error();
?>