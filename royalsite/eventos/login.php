<?php
  include "../conexoes/conexao.php";	
   $login_limpo = $_POST["id"];
   $pass_limpo = $_POST["password"];
   
   
   @$login = addslashes($login_limpo);
   @$pass = addslashes($pass_limpo);
   
   $passenc = sha1($pass);
   
	if(empty($login) or empty($pass)){
		echo " Preencha *todos* os campos ! <br><br>";
	
	}else{
			$sql = "SELECT * FROM usuario WHERE id_usuario like '$login' and senha_usuario ='$passenc'  ";
	
				$result = mysql_query($sql, $conexao);
					while($linha = mysql_fetch_row($result)) { 
		
	
						if ($result <1){
							echo "Deu errado, tente novamente !";
						unset ($_SESSION['id']);
						unset ($_SESSION['password']);
						session_destroy();
						header("location:index.html");
							
							
						}
					if (($result >=1)) {
						session_name('painel');
						session_start();
						$_SESSION['id']=$login;
						$_SESSION['password']=$passenc;
						header("location: index2.php");
				
		}
	}

	mysql_close($conexao);
   
   } 
   
?>


<html>
    <head>
	<!--[if lte IE 8]>
 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->	

    </head>
    <body>
<div id="conteudo">
<a href="index.html"> <input type="submit" value="Voltar" ></input></a>

</div>
    </body>
</html>
    
 
