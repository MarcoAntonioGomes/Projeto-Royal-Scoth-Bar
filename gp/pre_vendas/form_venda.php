<!DOCTYPE html>
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
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bem Vindo Admin</span><b class="caret"></b></a>
    
    </li>    
    <li class=""><a title="" href="../index.php"><i class="icon icon-share-alt"></i> <span class="text">Sair</span></a></li>
  </ul>
</div>
<!--close-top-serch--> 

<!--sidebar-menu-->
<div id="sidebar"><a href="../admin.html" class="visible-phone"><i class="icon icon-home"></i> Início</a>
  <ul>
    <li ><a href="../admin.html"><i class="icon icon-home"></i> <span>Início</span></a> </li>
	<li class="submenu"> <a href="#"><i class="icon-group"></i> <span>Cadastros</span> <span class="label label-important"></span></a>
      <ul>
        <li><a href="../cadastros/cliente.html">Cliente</a></li>
		<li><a href="../cadastros/funcionario.html">Funcionário</a></li>
        <li><a href="../cadastros/fornecedor.html">Fornecedor</a></li>
        <li><a href="../cadastros/produto.html">Produtos</a></li>
      </ul>
    </li>  
	<li class="submenu"> <a href="#"><i class="icon-search"></i> <span>Consultas</span> <span class="label label-important"></span></a>
      <ul>
            <li><a href="../consultas/cliente.html">Cliente</a></li>
			<li><a href="../consultas/funcionario.html">Funcionário</a></li>
        <li><a href="../consultas/fornecedor.html">Fornecedor</a></li>
        <li><a href="../consultas/produto.html">Produtos</a></li>
      </ul>
    </li> 
    <li> <a href="../estoque/estoque.html"><i class="icon icon-signal"></i> <span>Estoque</span></a> </li>
		<li> <a href="../plano_de_contas/plano_contas.html"><i class="icon-list-alt"></i> <span>Plano de Contas</span></a> </li>
    </li>
	<li class="active"> <a href="pre_venda.html"><i class="icon-reorder"></i> <span>Pré Venda</span></a></li>
	
	<li class=""> <a href="../vendas/venda.html"><i class="icon-money"></i> <span>Venda</span> <span class="label label-important"></span></a></li>
	<li class="submenu"> <a href="#"><i class="icon-list-ul"></i> <span>Relatório</span> <span class="label label-important"></span></a>
      <ul>
	    <li><a href="../relatorios/produto.html">Produto</a></li>
		<li><a href="../relatorios/compra.html">Compra</a></li>
        <li><a href="../relatorios/venda.html">Venda</a></li>
        <li><a href="../relatorios/fornecedor.html">Fornecedor</a></li>
		<li><a href="../relatorios/cliente.html">Cliente</a></li>
      </ul>
    </li>
  </ul>
</div>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../admin.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="pre_venda.html" class="current">Pré-Venda</a><a href="#" class="current">Adicionar Pré-Venda</a> </div>
	</div>
	<div class="container-fluid" >
		<hr>	
		<div class="row-fluid" >
		  <div class="span12">
			  <div class="widget-box">
			  
				<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i></span>
				  <h5>Menu</h5>
				</div>
			
				<div class="widget-content nopadding" >
					<form  name="form" id="form" novalidate="novalidate" action="" method="post">
						<div class="modal-body">
							<div id="div-login-msg">
								<div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>  
							</div>
							<label class="control-label">Cliente</label>
							<div class="controls controls-row">
								<select name="cliente" id="cliente" class="span8">>
									<option selected value="">Selecione o Cliente</option>
								</select>
								<input type="text" id="comanda" name="comanda" placeholder="Comanda" class="span4 m-wrap">
							</div>
							<label class="control-label">Funcionario / Forma de Pagamento</label>
							<div class="controls controls-row">
								<select name="funcionario" id="funcionario" class="span8">>
									<option selected value="">Selecione o funcionario</option>
								</select>
								<select name="pagamento" id="pagamento" class="span4">>
									<option selected value="">Selecione a forma de pagamento</option>
								</select>
							</div>
							<label class="control-label">Produto</label>
							<div class="controls controls-row">
								<select name="estoque" id="estoque" class="span7">
									<option selected value="">Selecione um produto</option>
								</select>
								<input type="text" placeholder="Codigo Barras" name="cod_barras" id="cod_barras" onClick="AdicionaInput2()" class="span3 m-wrap">
								<input type="text" placeholder="Quantidade" name="quantidade" id="quantidade" class="span2 m-wrap">
								<input name="add" type="button" class="btn btn-success btn-block" onClick="AdicionaLista();AdicionaInput();valor();" value="Adicionar Produto">
								<input type="button" class="btn btn-warning btn-block" value="Deletar Item" onClick="Deletaritem();AdicionaListaDeletado();valordeletado();">
							</div> 
							<hr>
								<div style="border:none;" class="widget-content ">
								 <label for="comment">Lista de Produto (Codigo | Quantidade):</label>
							</div>       
						</div>
						<center><textarea disabled="disabled" name="listaitens" cols="50" rows="10" id="listaitens" class="span8 m-wrap" style= "resize: vertical;"></textarea></center>
						<textarea name="txtarea" style="display:none;" cols="50" rows="10" id="txtBox" class="span5 m-wrap" ></textarea>
						<textarea style="display:none;"  name="txtareap" cols="50" rows="10" id="txtBox"></textarea>
						<textarea style="display:none;" name="txtareaq" cols="50" rows="10" id="txtBox"></textarea>
						<textarea style="display:none;" name="txtaread"  cols="50" rows="10" id="txtBox"></textarea>
						<div class="controls" style="float:left; width:300px;">
							<label class="control-label">Valor Total R$:</label><br>
							<input disabled="disabled" type="text" placeholder="R$" name="val_total" id="valor_total"  class="span3 m-wrap" value="<?php  if(isset($Valor_total)) echo $Valor_total;?>"></input>
						</div>
						<div class="controls">          
							<div class="controls">
								<input type="submit" id="cadastrar_p_venda" value="Finalizar Pré-Venda" class="btn btn-primary btn-lg btn-block">
							</div>
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
<script src="../js/produto_prevenda.js"></script>
<script src="../js/cliente_prevenda.js"></script>
<script src="../js/funcionario_prevenda.js"></script>
<script src="../js/busca.fornecedor.prevenda.js"></script>
<!--<script src="../js/cadastro.pre_venda.js"></script>-->
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
	alert("Insira o produto e a quantidade.");
	
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


var inteiro = Number(sep);
//alert(inteiro);
var quantidade = document.getElementById('quantidade').value;
var resultado = document.getElementById('valor_total');
var soma = Number(resultado.value) - parseFloat(inteiro*quantidade);
resultado.value = soma.toFixed(2);
}


</script>
<script>
function valor(){
var stringPreco = document.getElementById("estoque").options[document.getElementById("estoque").selectedIndex].text;
var sep1 = stringPreco.split("*").pop();
       var sep2 = sep1.split("|").shift();
//alert(sep2);
var sep = sep2.split(":").pop();


var inteiro = Number(sep);
//alert('suaushahus');
var quantidade = document.getElementById('quantidade').value;
var resultado = document.getElementById('valor_total');
var soma = Number(resultado.value)+parseFloat(inteiro*quantidade);

if(Number.isNaN(soma))
	soma=0;
else
	resultado.value = soma;
}

</script>
</body>
</html>
<?php
include "../php/bddata.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

@$cliente = $_POST['cliente'];
@$funcionario = $_POST['funcionario'];
@$produto = $_POST['estoque'];
@$comanda = $_POST['comanda'];
@$quantidade = $_POST['quantidade'];
@$pagamento = $_POST['pagamento'];

@$lista_produto_id = $_POST['txtareap'];
@$lista_produto_quantidade = $_POST['txtareaq'];

@$lista_produto_deletado = $_POST['txtaread'];
date_default_timezone_set('America/Sao_Paulo'); 
$data_atual = date("Y-m-d");

	if($cliente =="" || $funcionario=="" || $comanda=="" || $pagamento=="" || $produto == "" || $quantidade == ""){
		echo "<script>alert('Preencha todos os campos!');</script>";
	}else{
		$sqlx= "SELECT * FROM venda_capa WHERE comanda = $comanda and status = 'A' and pre_venda = 'S'";
		$result=$conn->query($sqlx);
		while($row=$result->fetch_assoc()){
			@$verificacao = $row['idVenda_Capa'];
		}
		echo "<script>alert('Pré-Venda Efetuada com Sucesso');</script>";
		//var_dump($verificacao);
		if(@$verificacao == ""){
			//echo "<script>alert('Comanda entrou');</script>";
			if($lista_produto_id != ""){
			   $vlistaproduto = explode(',', $lista_produto_id);
			   $vlistaquantidade = explode(',', $lista_produto_quantidade);
				/*  echo "<pre>";
				print_r($vlistaproduto );
				print_r($vlistaquantidade);
				echo "</pre>";
				echo "numeros: ".  count($vlistaquantidade)."<br>";*/
				$sql= "INSERT INTO venda_capa(idVenda_Capa, data,idForma_Pagamento, idCliente, valor_total, status, pre_venda, comanda,idFuncionario) VALUES('','$data_atual',$pagamento,$cliente,0,'A','S',$comanda,$funcionario)";
				$conn->query($sql);
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
					//$sql5="UPDATE produto SET quantidade=(quantidade - $vlistaquantidade[$i]) where idProduto=$vlistaproduto[$i] or codigo_barras=$vlistaproduto[$i]";
					//$conn->query($sql5);   
					}		
				}
				
				if($lista_produto_deletado != ""){
					//echo "<script>alert('Comanda entrou');</script>";
					$vlista_produto_deletado = explode(',', $lista_produto_deletado);
					for($i=0;$i<(sizeof($vlista_produto_deletado)-1);$i++){
						if(is_numeric($vlista_produto_deletado[$i])){								
							$sql7= "DELETE FROM venda_itens where idVenda_Capa = $id_capa and idProduto = $vlista_produto_deletado[$i]";
							$conn->query($sql7);   
						}
					}
				}
				$sql4="SELECT SUM(p.preco_final*v.quantidade) as total from venda_itens as v INNER JOIN produto as p  WHERE v.idProduto=p.idProduto and v.idVenda_Capa=$id_capa";
				$result2=$conn->query($sql4);
				
				while($row=$result2->fetch_assoc()){
					@$total = $row['total'];
					//echo "Total da Venda: ".$total;
				}
				
				$sql6="UPDATE venda_capa SET valor_total=$total where idVenda_Capa=$id_capa";
				$conn->query($sql6);
						
			}
		}else{
			echo "<script>alert('Comanda ja está em uso');</script>";
			@header('Refresh:1; url=form_venda.php');
		}
	}

	//if(@$total!=0) 
	//echo "<script>alert('Valor Total na Comanda: ".number_format(@$total, 2, ',','.')."');</script>";
$conn->close();
?> 