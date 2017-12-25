<?php
  include "bddata.php";	
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

   $login_limpo = $_POST["id"];
   $pass_limpo = $_POST["password"];
   
   
   @$login = addslashes($login_limpo);
   @$pass = addslashes($pass_limpo);
   
   $passenc = sha1($pass);
   
	if(empty($login) or empty($pass)){
		echo " Preencha *todos* os campos ! <br><br>";
	
	}else{
			$sql = "SELECT * FROM funcionario WHERE usuario = '$login' and senha ='$passenc'  ";
	
				
			$result=$conn->query($sql);
			while($row=$result->fetch_assoc()){
				if ($result <1){
						echo "Deu errado, tente novamente !";
						header("location:../index.php");
							
							
						}
					if ($result >=1){
							if($row['usuario']=="admin"){
								header("location:../admin.html");
							} else {
							header("location: ../funcionario/funcionario.html");	
							}
						}
						
			}
			

			$conn->close();
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
Senha ou Usuario Inválido, tente novamente.<br>
<a href="../index.php"> <input type="submit" value="Voltar" ></input></a>

</div>
    </body>
</html>
    
 
