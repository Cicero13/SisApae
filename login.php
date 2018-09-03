<?php
   //acesso ao banco
   include ('banco.php');
   
   //recebendo as variáveis    
   $email = $_POST['email'];
   $senha = $_POST['senha'];
   
   //criando a consulta
   $sql = "select * from tbusu
				where email='$email' and senha='$senha'";
 
   //executo o comando
   $consulta = $conexao->query($sql);
   
   if($consulta->num_rows > 0){
	  $linha = $consulta->fetch_array(MYSQLI_ASSOC);
	  session_start();	  
	  $_SESSION['usuario'] = $linha['nome']; 	
	  $_SESSION['id'] = $linha['id'];
      header('Location: principal.php?login=ok');	  
	  
	  
   }else{
	  header('Location: index.php?login=erro');  
   }
?>