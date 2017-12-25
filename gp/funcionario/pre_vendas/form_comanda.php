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
<style>

</style>

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
		<div id="breadcrumb"> <a href="../funcionario.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="pre_venda.html" class="current">Pré-Venda</a> <a href="#" class="current">Adicionar Item a Comanda</a></div>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid" >
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
					  <h5>Menu</h5>
					</div>
					<div class="widget-content nopadding">
						<form  name="form" id="form" novalidate="novalidate" action="" method="post">
							<div class="modal-body">
								<div id="div-login-msg">
									<div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
								</div>
								<label class="control-label">Número da Comanda</label>
								<div class="controls controls-row">
									<input type="text" id="comanda" name="comanda" placeholder="Comanda" class="span4 m-wrap">
								</div>
								<label class="control-label">Produto</label>
								<div class="controls controls-row">
									<select name="estoque" id="estoque" class="span7">
										<option selected value="">Selecione um produto</option>
									</select>
									<input type="text" placeholder="Codigo Barras" name="cod_barras" id="cod_barras" class="span3 m-wrap">
									<input type="text" placeholder="Quantidade" name="quantidade" id="quantidade" class="span2 m-wrap">
									<input name="add" type="button" class="btn btn-success btn-block" onClick="AdicionaInput();AdicionaLista();" value="Adicionar Produto">
								</div>
								<hr>
								<div style="border:none;" class="widget-content ">
									<label for="comment">Lista de Produto (Codigo | Quantidade):</label>
								</div>
							</div>
							<center><textarea disabled="disabled" name="listaitens" cols="50" rows="10" id="listaitens" class="span8 m-wrap" style= "resize: vertical;"></textarea></center>
							<textarea name="txtarea" style="display:none;" cols="50" rows="10" id="txtBox" class="span5 m-wrap" ></textarea>
							<textarea  style="display:none;"  name="txtareap" cols="50" rows="10" id="txtBox"></textarea>
							<textarea name="txtareaq"  style="display:none;" cols="50" rows="10" id="txtBox"></textarea>
							<div class="controls">
								<div class="controls">
									<input type="submit" name="cadastrar_p_venda" id="cadastrar_p_venda" value="Finalizar Comanda" class="btn btn-primary btn-lg btn-block">
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


@$produto = $_POST['estoque'];
@$comanda = $_POST['comanda'];
@$quantidade = $_POST['quantidade'];
@$cod_barras = $_POST['cod_barras'];


@$lista_produto_id = $_POST['txtareap'];
@$lista_produto_quantidade = $_POST['txtareaq'];

$data_atual = date("Y-m-d");

if($comanda == "" || $produto == "" || $quantidade == ""){
	echo "<script>alert('Preencha todos os campos!');</script>";
}else{
	$sqlx= "SELECT * FROM venda_capa WHERE comanda = $comanda and status = 'A' and pre_venda = 'S'";
	$result=$conn->query($sqlx);
	while($row=$result->fetch_assoc()){
		@$verificacao = $row['idVenda_Capa'];

	}
	   if(($lista_produto_id != "") and ($verificacao != "")){
           $vlistaproduto = explode(',', $lista_produto_id);
           $vlistaquantidade = explode(',', $lista_produto_quantidade);
                  /*  echo "<pre>";
                    print_r($vlistaproduto );
                    print_r($vlistaquantidade);
                    echo "</pre>";
                    echo "numeros: ".  count($vlistaquantidade)."<br>";*/
					$sql="SELECT idVenda_Capa from venda_capa where comanda = $comanda and pre_venda='S' and status='A'";
					$result=$conn->query($sql);
					while($row=$result->fetch_assoc()){
						@$id_capa = $row['idVenda_Capa'];
						
						
					}
			 for($i=0;$i<(sizeof($vlistaproduto)-1);$i++){
					if(is_numeric($vlistaproduto[$i]) && (is_numeric($vlistaquantidade[$i]))){
					$sql2= "INSERT INTO venda_itens(idVenda_Itens, idVenda_Capa, idProduto, quantidade) VALUES('',$id_capa,$vlistaproduto[$i],$vlistaquantidade[$i])";
					$conn->query($sql2);   
					$sql5="UPDATE produto SET quantidade=(quantidade - $vlistaquantidade[$i]) where idProduto=$vlistaproduto[$i] or codigo_barras=$vlistaproduto[$i]";
					$conn->query($sql5);   
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
					
        } else {
			echo "<script>alert('Comanda Selecionada está fechada ou inexistente');</script>";
			
		}
}
//echo "<script type='javascript'>alert('Valor Total: '".@$total.");";
if(@$total!=0) 
	echo "<script>alert('Valor Total na Comanda: ".number_format(@$total, 2, ',','.')."');</script>";
$conn->close();
?> 