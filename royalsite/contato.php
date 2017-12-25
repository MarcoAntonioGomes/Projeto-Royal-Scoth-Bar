<?php
					@$nome = $_POST['nome'];
					@$email = $_POST['email'];
					@$telefone = $_POST['telefone'];
					@$area = $_POST['mensagem'];
					
					
					if(empty($nome) || empty($email) || empty($telefone)|| empty($area)){
						//echo "<br>Preencha todos os campos antes de tentar um contato";
						
						echo  "<script>alert('Preencha todos os campos antes de tentar um contato !');</script>";
						echo "<meta HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=contact.html\">";
						
					}else {
						include "conexoes/conexao.php";

						$sql = "INSERT INTO contato(id_contato, nome_contato, email_contato, telefone_contato, mensagem_contato) VALUES ('','$nome','$email','$telefone','$area')";
						mysql_query($sql, $conexao);
						echo  "<script>alert('Seu mensagem foi Enviado com sucesso ! !');</script>";
						echo "<meta HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=contact.html\">";
						
						  mysql_close($conexao);
					}

?>