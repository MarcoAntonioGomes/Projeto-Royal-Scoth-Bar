<?php
include "../conexoes/conexao.php";
					session_name('painel');
					error_reporting(0);
					session_start();


					if (($_SESSION['id'] == '') || ($_SESSION['password'] == '')){
						header("location: index.html");
						echo "Você não deveria tentar logar desta forma";
						echo "<meta HTTP-EQUIV=\"Refresh\" CONTENT=\"3; URL=index.html\">";
						}else {
							$id = $_SESSION['id'];
							$sql = "SELECT * FROM usuario WHERE id_usuario = $id";
							$resul = mysql_query($sql, $conexao);
								while($linha = mysql_fetch_row($resul)) { 
									$nome = $linha[2];
								}
						}
					


?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Royal Store Conveniencia &amp; Bar</title>
  <script src="js/tinymce/tinymce.min.js" type="text/javascript"></script>
  <script src="js/tinymce/jquery.tinymce.min.js" type="text/javascript"></script>
  <script src="js/tinymce/langs/pt_BR.js" type="text/javascript"></script>
  <script src="js/tinymce/func.js" type="text/javascript"></script>

 <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">


<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Royal Store </span>Admin </a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $nome;?>  <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<!-- <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li> -->
							<li><a href="index.html"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index2.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Inicio</a></li>
			
			<!--<li><a href="widgets.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Widgets - Extras</a></li>-->
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Eventos
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="cadastrar_evento.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Cadastrar Evento
						</a>
					</li>
					<li>
						<a class="" href="editar_evento.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Editar Evento
						</a>
					</li>
				</ul>
			</li>
			
			
			<li role="presentation" class="divider"></li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Cardápio
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li>
						<a class="" href="cadastrar_cardapio.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Cadastrar Cardápio
						</a>
					</li>
					
					<li>
						<a class="" href="editar_cardapio.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Editar Cardápio
						</a>
					</li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li>
			<li><a href="ver_pedido.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Pedido Online </a></li>
			<li><a href="contatos.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Contatos </a></li>
			<li><a href="../albuns/admin"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Painel de Imagens</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Atender Cliente</h1>
			</div>
		</div>	
            <?php
                    
					
                    function get_post_action($name)
                        {
                            $params = func_get_args();

                            foreach ($params as $name) {
                                if (isset($_POST[$name])) {
                                    return $name;
                                }
                            }
                        }
                        
                        switch (get_post_action('add', 'carregar','submit')) {
                            case 'add':
                                        $deletar = '';
                                        $deletar = $_POST['relacao'];
                                        if(($deletar != '')){
                                            $sql2 = "DELETE FROM pedido_online WHERE id_cliente = '$deletar'";
                                            mysql_query($sql2);
                                           // echo "Mostrar value atual: ".$deletar;
                                            echo "Pedido excluido com sucesso, atendimento feito com sucesso ! Estamos lhe direcionando em 3 segundos.";
                                            $deletar = '';
                                             
                                          echo "<meta HTTP-EQUIV=\"Refresh\" CONTENT=\"3; URL=index2.php\">";


                                        }
                                break;

                            case 'carregar':
									
                                    $id_atual = $_POST['relacao'];
                                    $sql3 = "SELECT * FROM cliente_online WHERE id =$id_atual";
                                    $resul = mysql_query($sql3, $conexao);
                                    while($linha = @mysql_fetch_row($resul)) { 
                                        $nome_contato_selecionado = $linha[1];
                                        $cpf_selecionado = $linha[2];
                                        $email_selecionado = $linha[3];
										$endereco_selecionado = $linha[4];
					
                                    
									}
									$sqlc = "SELECT * FROM pedido_online WHERE id_cliente =$id_atual";
                                    $resulr = mysql_query($sqlc, $conexao);
                                    while($linhav = @mysql_fetch_row($resulr)) { 
                                        $mensagem_selecionada = $linhav[2]."<br>";
					
                                    }
									
									if($id_atual == ''){
										echo  "<p>Selecione um contato antes de carregar</p>";
									
										
									}
                                    //echo "Carregar: ".$nome_contato_selecionado." ID: ".$id_atual;
                                break;
                                
                         /*   case 'submit':
                                $id = $_POST['id_selecionado'];
                                $nome = $_POST['nome'];
                                $email = $_POST['email'];
                                $conteudo = $_POST['area'];
								$telefone = $_POST['telefone'];
                             //  echo "Evento x:".$evento." Data: ".$data."ID: ".$id;
                                if(($nome == '')  || ($email == '')|| ($id == '')|| ($telefone == '')|| ($conteudo == '')){
						   echo "<p> Prencha os campos corretamente, verifique se algum deles nao permaneceu em branco ou sem carregar os dados !</p><br>" ;
						   
							
						}else {
                                                    
							$sql4 = "UPDATE contato SET nome_contato='$nome',email_contato='$email',telefone_contato='$telefone',mensagem_contato='$conteudo' WHERE id_evento = $id";
							mysql_query($sql4);	
							mysql_close($conexao);
							echo "Atualiza&ccedil;&atilde;o efetuada com sucesso ! Estamos lhe redirecionando em 3 segundos";
                                                        echo "<meta HTTP-EQUIV=\"Refresh\" CONTENT=\"3; URL=index2.php\">";
							
							
						}
                                break;*/
                      
                            
                            default:
                                //no action sent
                        }
                        
                        
                        
                               
                    
                        
?>
            
		<div class="row" >
		
			
			
					<script> 
					
						function olhacampo(){
								if($("#evento").val() == '') { alert("Preencha o campo Nome");
								document.getElementById("evento").style.backgroundColor = "#FF4040";}
							}
						function olhacampo2(){
								if($("#data").val() == '') { alert("Preencha o campo E-mail");
								document.getElementById("data").style.backgroundColor = "#FF4040";}
						}
						function olhacampo3(){
								if($("#imagem").val() == '') { alert("Preencha o campo Telefone");
								document.getElementById("imagem").style.backgroundColor = "#FF4040";}
						}

					</script>
                                        
                                        
                                        
				
                                        <form style="background-color:#F8F8FF; padding-top:10px;padding-right:5px;" class="navbar-form navbar-left" method="post" action="">
                                             <label>Selecione o Cliente a ser atendido:</label>
                                     <?php 
                                            
                                            echo  "<select name = \"relacao\" style=\"border-radius:5px; border-color:#8ad919\" >" ;
                                            echo  "<option value=\"\"></option>";
                                                    $sql = "SELECT c.nome, p.id_cliente from cliente_online as c JOIN pedido_online as p where c.id = p.id_cliente";
                                                    $resu = mysql_query($sql, $conexao);
                                                        while($linhac = mysql_fetch_row($resu)) { 
														  
                                                            
                                                         echo  "<option value=".$linhac[1].">".$linhac[0]."</option>";	  
														}
														
                                                    echo  "</select>";
													



                                      ?><br>
                                <input name="add" type="submit" style="width: 20%" class="btn btn-success btn-block"  value="Cliente Atendido">
                                <input name="carregar" type="submit" style="width: 20%" class="btn btn-success btn-block"  value="Carregar dados">
                                       <br>     
					  <div class="form-group">
					  
                                           <input id="id_selecionado" name="id_selecionado" onBlur="olhacampo()" class="form-control" value="<?php echo $id_atual; ?>">
					  </div>
					  <br><hr>
                                            <div class="form-group">
					   <label>Nome do Cliente:</label>
                                           <input type="text" id="evento" name="nome" onBlur="olhacampo()" class="form-control" value="<?php echo @$nome_contato_selecionado; ?>">
					  </div>
					  <br><hr>
					  <div class="form-group">
					   <label>CPF Cliente:</label>
                                           <input type="text"id="data" name="cpf" onBlur="olhacampo2()" class="form-control" value="<?php echo @$cpf_selecionado;?>">
					  </div>
					  <br><hr>
					   <div class="form-group">
					   <label>Endereço:</label>
                         <input type="text" id="imagem" name="endereco" onBlur="olhacampo3()" class="form-control" value="<?php echo @$endereco_selecionado;?>">
					  </div>
					  <br><hr>

					  <div class="form-group">
                                              <textarea id="textarea" name="area"><?php echo $mensagem_selecionada; ?></textarea>
					  </div><br><hr>

					  
                                      <!--    <button type="submit" name="submit" class="btn btn-success btn-block">Salvar Edi&ccedil;&atilde;o</button>-->
					</form>
					
				
	
             					

			
			
			
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
