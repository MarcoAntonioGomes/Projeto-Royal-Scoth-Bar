<html>
<head>
	<meta charset="utf-8" />
	<title>Royal Store Conveniencia &amp; Bar</title>
	</head>
<body class="blurBg-true" style="background-color:#59c5c2"><div class="title"><h2>Royal Store</h2></div>
  
 <?php
		   include "conexoes/conexao.php";
		   $cpf = addslashes($_POST["cpf"]);
		   $txtarea= addslashes($_POST["txtarea"]);
		   
		   if (empty($txtarea) || empty($cpf) ){
			   echo"Preencha todos os dados corretamente <br>";
		   }else {
			  $sql2 = "SELECT * FROM cliente_online where cpf = '$cpf' ";
			  $result = mysql_query($sql2, $conexao);
				
						while($linha = mysql_fetch_row($result)) { 
							$verificacao = $linha[2];
							$id_cliente = $linha[0];
					}
			   
		   } if($cpf == @$verificacao){
							echo "CPF {$cpf} já está cadastrado e habilitado para fazer pedido. <br>";
							$sql = "INSERT INTO pedido_online (id_pedido, id_cliente, mensagem) VALUES( '', '$id_cliente', '$txtarea')";
							mysql_query($sql);	
							mysql_close($conexao);
							echo "Pedido feito com sucesso <br>";
							
							
						}
			if(@$verificacao == ""){
				echo "Cadastre-se antes de efetuar pedidos.<br>";
								
								
			}
			else {
		
		echo "Preencha os campo corretamente.<br>";
	}
		   
	   
   
   
   ?>

</body>
</html>
