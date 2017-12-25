<?php
include "../php/bddata.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$comanda ="";

@$cliente = $_POST['cliente'];
@$funcionario = $_POST['funcionario'];
@$produto = $_POST['estoque'];
@$comanda = $_POST['comanda'];
@$quantidade = $_POST['quantidade'];
@$pagamento = $_POST['pagamento'];
@$funcionario_aux = $_POST['func_hidden'];
@$lista_produto_id = $_POST['txtareap'];
@$lista_produto_quantidade = $_POST['txtareaq'];
@$lista_produto_deletado = $_POST['txtaread'];

date_default_timezone_set('America/Sao_Paulo'); 
$data_atual = date("Y-m-d");

@$val_pago = $_POST['val_pago'];

function get_post_action($name){
	$params = func_get_args();
	foreach ($params as $name) {
		if (isset($_POST[$name])) {
		return $name;
		}
	}
}
 switch (get_post_action('finalizar', 'carregar')) {
   case 'carregar':
        $sql = "SELECT * FROM venda_capa WHERE comanda = $comanda and pre_venda='S' and status='A'";
		$result=$conn->query($sql);
		
	if($result != false){
	
			while($row=$result->fetch_assoc()){
				@$id_Capa = $row['idVenda_Capa'];
				@$id_FormaPG = $row['idForma_Pagamento'];
				@$id_Cliente = $row['idCliente'];
				@$Valor_total = $row['valor_total'];
				@$comanda = $row['comanda'];
				@$id_Funcionario = $row['idFuncionario'];
											
			}
	}else {
		echo "<script>alert('Insira o número da comanda.');</script>";
	}
		
		//echo "id_capa:".@$id_Capa."idCliente:".@$id_Cliente;                            
   break;
		
   case 'finalizar':
	if(isset($comanda) and ($comanda !="") and ($pagamento != "")){
	//echo "<script>alert('Comanda setada');</script>";
		if($lista_produto_id != ""){
			//echo "<script>alert('lista setada');</script>";
				   $vlistaproduto = explode(',', $lista_produto_id);
				   $vlistaquantidade = explode(',', $lista_produto_quantidade);
						  
							
							//echo "passei pelo sql<br>";
							$sql3= "SELECT * FROM venda_capa WHERE comanda = $comanda and idFuncionario = $funcionario_aux and status = 'A' and pre_venda = 'S'";
							$result=$conn->query($sql3);
							while($row=$result->fetch_assoc()){
								@$id_capa = $row['idVenda_Capa'];
								@$total = $row['valor_total'];
								//echo "ID CAPA VENDA: ".$id_capa;
							}
							$sql = "UPDATE venda_capa SET status = 'F', pre_venda = 'N', idForma_Pagamento = $pagamento WHERE idVenda_Capa = $id_capa ";
							$conn->query($sql);
					 for($i=0;$i<(sizeof($vlistaproduto)-1);$i++){
						if(is_numeric($vlistaproduto[$i]) && (is_numeric($vlistaquantidade[$i]))){
							$sql5="UPDATE produto SET quantidade=(quantidade - $vlistaquantidade[$i]) where idProduto=$vlistaproduto[$i] or codigo_barras=$vlistaproduto[$i]";
							$conn->query($sql5);   
							}	
					}
							
					}
					$troco = number_format((@$val_pago-$total), 2, ',','.');
					$total = number_format(@$total, 2, ',','.');
				echo "<script>alert('Venda finalizada.');</script>";
				echo "<script>alert('Valor Total na Venda: ".number_format(@$total, 2, ',','.')." Troco: ".@$troco."');</script>";				
		
	} else {
		if($cliente =="" || $funcionario=="" || $pagamento==""){
			//echo("Preencha todos os campos corretamente");
			echo "<script>alert('Preencha todos os campos corretamente, iremos lhe direcionar novamente');</script>";
			header('Refresh:1; url=form_venda.php');
		}else{
			   if($lista_produto_id != ""){
				   $vlistaproduto = explode(',', $lista_produto_id);
				   $vlistaquantidade = explode(',', $lista_produto_quantidade);
						  
							$sql= "INSERT INTO venda_capa(idVenda_Capa, data,idForma_Pagamento, idCliente, valor_total, status, pre_venda, comanda,idFuncionario) VALUES('','$data_atual',$pagamento,$cliente,0,'F','N','$comanda',$funcionario)";
							$conn->query($sql);
							//echo "passei pelo sql<br>";
							$sql3= "SELECT MAX(idVenda_Capa) AS idVenda_Capa FROM venda_capa where idFuncionario='$funcionario'";
							$result=$conn->query($sql3);
							while($row=$result->fetch_assoc()){
								@$id_capa = $row['idVenda_Capa'];
								//echo "ID CAPA VENDA: ".$id_capa;
							}
					 for($i=0;$i<(sizeof($vlistaproduto)-1);$i++){
							if(is_numeric($vlistaproduto[$i]) && (is_numeric($vlistaquantidade[$i]))){
							$sql2= "INSERT INTO venda_itens(idVenda_Itens, idVenda_Capa,idProduto, quantidade) VALUES('',$id_capa,$vlistaproduto[$i],$vlistaquantidade[$i])";
							$conn->query($sql2);   
							$sql5="UPDATE produto SET quantidade=(quantidade - $vlistaquantidade[$i]) where idProduto=$vlistaproduto[$i] or codigo_barras=$vlistaproduto[$i]";
							$conn->query($sql5);   
							}
							
					}
					if($lista_produto_deletado != ""){
						$vlista_produto_deletado = explode(',', $lista_produto_deletado);
						 for($i=0;$i<(sizeof($vlista_produto_deletado)-1);$i++){
								if(is_numeric($vlista_produto_deletado[$i])){
								$sql5="UPDATE produto set quantidade = (quantidade + (SELECT quantidade from venda_itens where idVenda_Capa = $id_capa and idProduto = $vlista_produto_deletado[$i])) where idProduto = $vlista_produto_deletado[$i]";
								$conn->query($sql5);   
								
							$sql7= "DELETE FROM venda_itens where idVenda_Capa = $id_capa and idProduto = $vlista_produto_deletado[$i]";
							$conn->query($sql7);   
								}
						}
					}
					$sql4="SELECT SUM(p.preco_final*v.quantidade) as total from venda_itens as v INNER JOIN produto as p  WHERE v.idProduto=p.idProduto and v.idVenda_Capa=$id_capa";
						$result2=$conn->query($sql4);
						while($row=$result2->fetch_assoc()){
							@$total = $row['total'];
							//echo "Total da Venda: ".number_format(@$total, 2, ',','.');
							}
					$sql6="UPDATE venda_capa SET valor_total=$total where idVenda_Capa=$id_capa";
					$conn->query($sql6);
					//lista de itens deletados	
				}
			$troco = number_format((@$val_pago-$total), 2, ',','.');
			$total = number_format(@$total, 2, ',','.');
			
			//echo "<script>alert('Valor Total da Venda:'".$total."' Troco: '".$troco.");</script>";
			echo "<script>alert('Valor Total na Venda: ".number_format(@$total, 2, ',','.')." Troco: ".@$troco."');</script>";
				
			$conn->close();
			
			header('Refresh:1; url=form_venda.php');
				
		}
	}
	$troco = number_format((@$val_pago-$total), 2, ',','.');
	$total = number_format(@$total, 2, ',','.');
	
		//echo "<script>alert('Valor Total da Venda:'".$total."' Troco: '".$troco.");</script>";
		//echo "<script>alert('Valor Total na Venda: ".number_format(@$total, 2, ',','.')." Troco: ".@$troco."');</script>";
		
	$conn->close();
	
	header('Refresh:1; url=form_venda.php');
    break;


    
                            
		default:
        //no action sent
                        }
                        

?>
<html lang="en">
<head>
<title>Soft Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />

<link rel="stylesheet" href="../css/jquery-ui.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/uniform.css" />
<link rel="stylesheet" href="../css/select2.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/bootstrap-colorpicker.js"></script> 
<script src="../js/bootstrap-datepicker.js"></script> 
<script src="../js/masked.js"></script> 
<script src="../js/jquery.uniform.js"></script> 
<script src="../js/select2.min.js"></script> 
<script src="../js/matrix.js"></script> 
<script src="../js/matrix.form_common.js"></script> 
<script src="../js/wysihtml5-0.3.0.js"></script> 
<script src="../js/jquery.peity.min.js"></script> 
<script src="../js/bootstrap-wysihtml5.js"></script> 
<script>
	$('.textarea_editor').wysihtml5();
</script>
<script>
function valor(){
var stringPreco = document.getElementById("estoque").options[document.getElementById("estoque").selectedIndex].text;
var sep1 = stringPreco.split("*").pop();
       var sep2 = sep1.split("|").shift();
//alert(sep2);
var sep = sep2.split(":").pop();


var inteiro = Number(sep)
//alert(inteiro);
var quantidade = document.getElementById('quantidade').value;
var resultado = document.getElementById('valor_total');
var soma = Number(resultado.value)+parseFloat(inteiro*quantidade);
if(Number.isNaN(soma))
	soma=0;
else
	resultado.value = soma;
}

</script>

<script src="../js/produto_prevenda.js"></script>
<script src="../js/cliente_prevenda.js"></script>
<script src="../js/funcionario_prevenda.js"></script>
<script src="../js/busca.fornecedor.prevenda.js"></script>
<script> 
function AdicionaInput(){ 
	var a = document.getElementById('estoque').value;
	var b = document.getElementById('quantidade').value;
	var c = document.getElementById('cod_barras').value;
	if((a != "") && (b != "")){
            var j = document.form.txtarea.value;
                j += a+" | "+b; 
            document.form.txtarea.value = j + "\n";
            
            var j2 = document.form.txtareap.value;
            j2 += a+",";
            document.form.txtareap.value = j2 + "\n";
            var j3 = document.form.txtareaq.value;
            j3 += b+",";
            document.form.txtareaq.value = j3 + "\n";
} else if((b != "") && (c != "")) {
	var j = document.form.txtarea.value;
                j += c+" | "+b; 
            document.form.txtarea.value = j + "\n";
            
            var j2 = document.form.txtareap.value;
            j2 += b+",";
            document.form.txtareap.value = j2 + "\n";
            var j3 = document.form.txtareaq.value;
            j3 += c+",";
            document.form.txtareaq.value = j3 + "\n";
}else{
	alert("Insira o Produto/Codigo de Barras e a quantidade.");
	
} 
}

function Deletaritem(){ 
	var a = document.getElementById('estoque').value;

	if(a != "") {
            var j2 = document.form.txtaread.value;
            j2 += a+",";
            document.form.txtaread.value = j2 + "\n";
      
} else{
	alert("Insira o Produto/Codigo de Barras e a quantidade.");
	
} 
}

function AdicionaLista(){ 
	
	var a = document.getElementById("estoque").options[document.getElementById("estoque").selectedIndex].text;
	var b = document.getElementById('quantidade').value;
	var c = document.getElementById('cod_barras').value;
	
	
	//alert(a);
	
	if((a != "") && (b != "")){
            var j = document.form.listaitens.value;
                j += a+" | Quantidade: "+b; 
            document.form.listaitens.value = j + "\n";
			var j2 = document.form.listaitens.value;
            j2 += b+",";
            
} else if((b != "") && (c != "")) {
	var j = document.form.listaitens.value;
                j += "Codigo Barras: "+c+" | "+b; 
            document.form.listaitens.value = j + "\n";
    var j2 = document.form.listaitens.value;
            j2 += b+",";
            
}else{
	//alert("Problema ao gerar a Lista de Itens");
	
} 
}

function AdicionaListaDeletado(){ 

var a = document.getElementById("estoque").options[document.getElementById("estoque").selectedIndex].text;
//alert(a);
	if(a != ""){
            var j = document.form.listaitens.value;
                j += a+" | REMOVIDO X "; 
            document.form.listaitens.value = j + "\n";
		     
}else{
	//alert("Problema ao gerar a Lista de Itens");
	
} 
}

function valordeletado(){
var stringPreco = document.getElementById("estoque").options[document.getElementById("estoque").selectedIndex].text;
var sep1 = stringPreco.split("*").pop();
var sep2 = sep1.split("|").shift();
//alert(sep2);
var sep = sep2.split(":").pop();


var inteiro = Number(sep)
//alert(inteiro);
var quantidade = document.getElementById('quantidade').value;
var resultado = document.getElementById('valor_total');
var soma = Number(resultado.value) - parseFloat(inteiro*quantidade);
resultado.value = soma.toFixed(2);
}


</script>

</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="#">Soft Engenharia</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
	<ul class="nav">
		<li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bem Vindo</span></a></li>    
		<li class=""><a title="" href="../../index.php"><i class="icon icon-share-alt"></i> <span class="text">Sair</span></a></li>
	</ul>
</div>

<!--sidebar-menu-->
<div id="sidebar"><a href="../funcionario.html" class="visible-phone"><i class="icon icon-home"></i> Início</a>
	<ul>
		<li><a href="../funcionario.html"><i class="icon icon-home"></i> <span>Início</span></a> </li>
		<li class="active submenu"> <a href="#"><i class="icon-group"></i> <span>Cadastros</span> <span class="label label-important"></span></a>
			<ul>
				<li><a href="cliente.html">Cliente</a></li>
				<li><a href="fornecedor.html">Fornecedor</a></li>
				<li><a href="produto.html">Produto</a></li>
			</ul>
		</li>  
		<li class="submenu"> <a href="#"><i class="icon-search"></i> <span>Consultas</span> <span class="label label-important"></span></a>
			<ul>
				<li><a href="../consultas/cliente.html">Cliente</a></li>	
				<li><a href="../consultas/fornecedor.html">Fornecedor</a></li>
				<li><a href="../consultas/produto.html">Produto</a></li>
			</ul>
		</li> 
		<li> <a href="../pre_vendas/pre_venda.html"><i class="icon-reorder"></i> <span>Pré Venda</span></a></li>
		<li class=""> <a href="../vendas/venda.html"><i class="icon-money"></i> <span>Venda</span><span class="label label-important"></span></a></li>
	</ul>
</div>
<!--close-sidebar-menu-->

<!--main-container-part-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../funcionario.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="venda.html" class="current">Venda</a> <a href="#" class="current">Finalizar Venda</a></div>
  </div>
	<div class="container-fluid" >
		<div class="row-fluid" >
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
					  <h5>Finalizar Venda</h5>
					</div>
			
					<div class="widget-content nopadding">
						<form  name="form" id="form" novalidate="novalidate" action="" method="post">
							<div class="modal-body">
								<div id="div-login-msg">
									<div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
								</div>
								<label class="control-label">Cliente</label>
								<div class="controls controls-row">
									<select name="cliente" id="cliente" class="span8">
										<option selected value="">Selecione o Cliente</option>
									</select>
									<input type="text" id="comanda" name="comanda" placeholder="Comanda" value="<?php if(isset($comanda))  echo $comanda; ?>" class="span4 m-wrap">
								</div>
								<label class="control-label">Funcionario / Forma de Pagamento</label>
								<div class="controls controls-row">
									<select name="funcionario" id="funcionario" class="span8">>
										<option selected value="">Selecione o Funcionario</option>
									</select>
									<input type="text" placeholder="Funcionario" style="display:none;" name="func_hidden" class="span4 m-wrap" value="<?php if(isset($id_Funcionario))  echo $id_Funcionario; ?>">
									<select name="pagamento" id="pagamento" class="span4">>
										<option selected value="">Selecione a forma de pagamento</option>
									</select>
								</div>
								<label class="control-label">Produto</label>
								<div class="controls controls-row">
									<select name="estoque" id="estoque" class="span7">
										<option selected value="">Selecione um produto</option>
									</select>
									<input type="text" placeholder="Codigo Barras" name="cod_barras" id="cod_barras" class="span3 m-wrap">
									<input type="text" placeholder="Quantidade" name="quantidade" id="quantidade" class="span2 m-wrap">
									<input type="button" name="calcula_total" class="btn btn-success btn-block" onClick="AdicionaLista();AdicionaInput();valor();" value="Adicionar Produto">
									<input name="carregar" type="submit" class="btn btn-danger btn-block" value="Importar Comanda">
									<input type="button" class="btn btn-warning btn-block" value="Deletar Item" onClick="Deletaritem();AdicionaListaDeletado();valordeletado();">
								</div>
								<hr>
								<div style="border:none;" class="widget-content ">
									<label for="comment">Lista (Produto | Quantidade):</label>
								</div>
							</div>
							<div class="controls">
								<center><textarea disabled="disabled" name="listaitens" cols="50" rows="10" id="listaitens" class="span8 m-wrap" style= "resize: vertical;">
									<?php if(isset($comanda)) echo "Comanda selecionada: ".$comanda;?>					
									<?php if(isset($id_Cliente)) {
										$sqlx = "SELECT nome from cliente where idCliente = $id_Cliente";
										$result=$conn->query($sqlx);
											while($row=@$result->fetch_assoc()){
											echo "Cliente: ".$row["nome"];
											}
									}?>

									<?php  if(isset($id_Funcionario))  {
										$sqlx = "SELECT nome from funcionario where idFuncionario = $id_Funcionario";
										$result=$conn->query($sqlx);
											while($row=@$result->fetch_assoc()){
											echo "Funcionario: ".$row["nome"];
											}
									}?>

									<?php  if(isset($Valor_total)) echo "Valor Total: ".$Valor_total."\n";?>

<?php
									if(isset($comanda) and ($comanda!="")){
										$sqlx = "SELECT vi.idVenda_capa, vi.idProduto, vi.quantidade, vc.status, vc.pre_venda FROM venda_itens as vi INNER JOIN venda_capa as vc WHERE vi.idVenda_Capa = vc.idVenda_Capa and vc.status = 'A' and vc.pre_venda='S' and vc.comanda = $comanda";
										$result=$conn->query($sqlx);
											while($row=@$result->fetch_assoc()){
												$id_produto = $row['idProduto'];
												$quantidade = $row['quantidade'];
												$sqly="SELECT * FROM produto where idProduto = $id_produto";	
												$resulty=$conn->query($sqly);	
													while($rowr=$resulty->fetch_assoc()){								
													echo "";
													
													echo "Produto: ".@$rowr['nome'];

													echo " | Quantidade: ".$quantidade;
													
													echo " | Preço unitário: R$ ".@$rowr['preco_final'];
													
													echo " | Total: R$ ".$quantidade*@$rowr['preco_final']."\n";

													}
											}
}?></textarea></center>
							</div>	
							<textarea style="display:none;"  name="txtarea" cols="50" rows="10" id="txtBox" class="span5 m-wrap" >
							
							</textarea>
							<textarea name="txtareap"   cols="50" rows="10" id="txtBox"  style="display:none;">
							<?php if(isset($comanda)){
									
								$sqlx = "SELECT vi.idProduto FROM venda_itens as vi INNER JOIN venda_capa as vc WHERE vi.idVenda_Capa = vc.idVenda_Capa and vc.status = 'A' and vc.pre_venda='S' and vc.comanda = $comanda";
								$result=$conn->query($sqlx);
									while($row=@$result->fetch_assoc()){
										$id_produto = $row['idProduto'];
										echo $id_produto.",";
									}
								}
							?>	
							</textarea>
							<textarea  name="txtareaq"  cols="50" rows="10" id="txtBox"  style="display:none;">
							<?php if(isset($comanda)){
									
								$sqlx = "SELECT vi.quantidade FROM venda_itens as vi INNER JOIN venda_capa as vc WHERE vi.idVenda_Capa = vc.idVenda_Capa and vc.status = 'A' and vc.pre_venda='S' and vc.comanda = $comanda";
								$result=$conn->query($sqlx);
									while($row=@$result->fetch_assoc()){
										$quantidade = $row['quantidade'];
										echo $quantidade.",";
									}
								}
							?>	
							</textarea>
							<textarea  name="txtaread"  cols="50" rows="10" id="txtBox"  style="display:none;">
							
							</textarea>
							
							<div class="controls" style="float:left; width:300px;">
								<label class="control-label">Valor Total R$:</label><br>
								<input disabled="disabled" type="text" placeholder="R$" name="val_total" id="valor_total"  class="span3 m-wrap" value="<?php  if(isset($Valor_total)) echo $Valor_total;?>"></input>
							</div>
								<div class="controls" style="float:right; width:300px;">
									<label class="control-label" style="float:left;">Valor Pago R$</label><br>
									<input style="float:left;" type="text" placeholder="R$" name="val_pago" id="valor_total"  class="span3 m-wrap" value=""></input>
								</div>
								<div class="controls">
									<input type="submit" name="finalizar" id="cadastrar_p_venda" value="Finalizar Venda" class="btn btn-primary btn-lg btn-block">
								</div>
						</form>   
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; Soft Engenharia. <a href="http://www.softengenharia.com.br">Soft Engenharia</a> </div>
</div>
<!--end-Footer-part-->
</body>
</html>