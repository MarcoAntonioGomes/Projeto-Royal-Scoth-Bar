<html>
<head>
	<meta charset="utf-8" />
	<title>Royal Store Conveniencia &amp; Bar</title>
	</head>
<body class="blurBg-true" style="background-color:#59c5c2"><div class="title"><h2>Royal Store</h2></div>
  
 <?php
		   include "conexoes/conexao.php";
		   $nome = addslashes($_POST["nome"]);
		   $email = addslashes($_POST["email"]);
		   $cpf = addslashes($_POST["cpf"]);
		   $endereco = addslashes($_POST["endereco"]);
		   
		   if (empty($nome) || empty($email) || empty($endereco) || empty($cpf) ){
			   echo"Preencha todos os dados corretamente <br>";
		   }else {
			  $sql2 = "SELECT * FROM cliente_online where cpf = '$cpf' ";
			  $result = mysql_query($sql2, $conexao);
				
						while($linha = mysql_fetch_row($result)) { 
							$verificacao = $linha[2];
					}
			   
		   } if($cpf == @$verificacao){
							echo "CPF {$cpf} já está cadastrado e habilitado para fazer pedido <br>";
							
							
						}
			if(@$verificacao == ""){
							$sql = "INSERT INTO cliente_online (id, nome, cpf, email, endereco) VALUES( '', '$nome', '$cpf', '$email', '$endereco')";
								mysql_query($sql);	
								mysql_close($conexao);
								echo "Cadastro efetuado com sucesso. ! Faça já seus pedidos online.<br>";
								
								
			}
			else {
		
		echo "Preencha os campo corretamente.<br>";
	}
		   
	mysql_close($conexao);	   
   
   
   ?>

</body>
</html>
