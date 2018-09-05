<?php
    if($_SERVER['HTTP_HOST'] == 'app-1536113856.000webhostapp.com'){
        $hostname_conexao = "localhost";
	$username_conexao = "id7022416_root";
	$password_conexao = "123456";
	$database_conexao = "id7022416_dbapae";
        $database_porta = "3306";
    } else {
        $hostname_conexao = "localhost";
	$username_conexao = "root";
	$password_conexao = "";
	$database_conexao = "dbapae";
        $database_porta = "3306";
    }	
	$conexao = new mysqli($hostname_conexao,$username_conexao, $password_conexao, $database_conexao,$database_porta);
	
	if(mysqli_connect_errno()) trigger_error(mysqli_connect_error());
		echo mysqli_connect_error();
?>