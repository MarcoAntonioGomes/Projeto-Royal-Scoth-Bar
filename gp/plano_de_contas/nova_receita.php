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
<link rel="stylesheet" href="../css/colorpicker.css" />
<link rel="stylesheet" href="../css/datepicker.css" />
<link rel="stylesheet" href="../css/bootstrap-wysihtml5.css" />
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
<script src="../js/busca.fornecedor.planocontas.js"></script> 
<script>
	$('.textarea_editor').wysihtml5();
</script>
<script>
$.getJSON("../php/busca.fornecedor.php", function(result) {
	var tag = $("#fornecedor");
	$.each(result.data, function(item,value) {
		$("<option />").val(value.idFornecedor).text(value.nome).appendTo(tag);
	});
});

$.getJSON("../php/busca.forma.pagamento.php", function(result) {
	var tag = $("#pagamento");
	$.each(result.data, function(item,value) {
		$("<option />").val(value.idForma_Pagamento).text(value.nome).appendTo(tag);
	});
});

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
resultado.value = soma;
}

</script>

<script src="../js/produto_prevenda.js"></script>
<script>
function AdicionaInput(){ 
	var a = document.getElementById('estoque').value;
	var b = document.getElementById('quantidade').value;
	
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
} else{
	alert("Insira o Produto/Codigo de Barras e a quantidade");
	
} 
}

function AdicionaLista(){ 
	
	var a = document.getElementById("estoque").options[document.getElementById("estoque").selectedIndex].text;
	var b = document.getElementById('quantidade').value;

	
	
	//alert(a);
	
	if((a != "") && (b != "")){
            var j = document.form.listaitens.value;
                j += a+" | Quantidade da Venda: "+b; 
            document.form.listaitens.value = j + "\n";
			var j2 = document.form.listaitens.value;
            j2 += b+",";
            
}else{
	alert("Problema ao gerar a Lista de Itens");
	
} 
}



</script>

</head>
<?php date_default_timezone_set('America/Sao_Paulo'); ?>
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

<!--start-top-serch-->

<!--close-top-serch--> 

<!--sidebar-menu-->


<div id="sidebar"><a href="../admin.html" class="visible-phone"><i class="icon icon-home"></i> Início</a>
  <ul>
    <li class="active"><a href="../admin.html"><i class="icon icon-home"></i> <span>Início</span></a> </li>
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
	
	
	<li> <a href="../pre_vendas/pre_venda.html"><i class="icon-reorder"></i> <span>Pré Venda</span></a>
    </li>
	
	<li class=""> <a href="../vendas/venda.html"><i class="icon-money"></i> <span>Venda</span> <span class="label label-important"></span></a>
    </li>
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
		<div id="breadcrumb"> <a href="../admin.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="plano_contas.html" class="current">Plano de Contas</a> <a href="#" class="current">Nova Receita</a> </div>
	</div>
	<div class="container-fluid" >	
		<div class="row-fluid" >
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
					  <h5>Nova Receita</h5>
					</div>
					<div class="widget-content nopadding">
						<form  name="form" id="form" novalidate="novalidate" action="" method="post">
							<div class="modal-body">
								<label class="control-label">Titulo da Receita</label>
								<div class="controls controls-row">
									<input type="text" placeholder="Titulo da Receita"  name="titulo" class="span8 m-wrap" >
									<input type="text" data-date-format="dd-mm-yyyy" id="mask-data" name="dataLimite" class="datepicker span4" value="<?php echo date('d-m-Y');?>" />
								</div>							
								<label class="control-label">Situação / Forma de Pagamento</label>
								<div class="controls controls-row">
									<select name="situacao" class="span8">
										<option selected value="0">Selecione a situação</option>
										<option value="A">Atrasado</option>
										<option value="R">Realizado</option>
										<option value="P">Previsto</option>
									</select>
									<select name="pagamento" id="pagamento" class="span4">>
										<option selected value="0">Selecione a forma de pagamento</option>
									</select>
								</div>
								<label class="control-label">Produto / Quantidade</label>
								<div class="controls controls-row">
									<select name="estoque" id="estoque" class="span8">
										<option selected value="0">Selecione um produto</option>
									</select>
									<input type="text" placeholder="Quantidade" name="quantidade" id="quantidade" class="span4 m-wrap">
								</div>
									<label class="control-label">Fornecedor</label>
								<div class="controls controls-row">
									<select name="fornecedor" id="fornecedor" >
									  <option selected value="0">Selecione um fornecedor</option>
									</select>
								</div><br>
								<input type="button" name="calcula_total" class="btn btn-success btn-block" onClick="AdicionaLista();AdicionaInput();valor();" value="Adicionar Produto">	
								<hr>
							</div>
							
							<div class="controls">
								<center><label for="comment">Lista (Produto | Quantidade) / Observações</label>
									<textarea disabled="disabled" name="listaitens" cols="50" rows="10" id="listaitens" class="span5 m-wrap" style= "resize: vertical;"></textarea>							 
									<textarea name="listaobservacao" placeholder = "Observações" cols="50" rows="10" class="span5 m-wrap" style= "resize: vertical;"></textarea>
								</center>
							</div>	
							
							<textarea   name="txtarea" style="display:none;" cols="50" rows="10" id="txtBox" class="span5 m-wrap" ></textarea>
							<textarea name="txtareap" style="display:none;"  cols="50" rows="10" id="txtBox"></textarea>
							<textarea  name="txtareaq" style="display:none;" cols="50" rows="10" id="txtBox"></textarea>
							
							<div class="controls" style="float:left; width:300px;">
								<label class="control-label">Valor Total R$:</label><br>
								<input disabled="disabled" type="text" placeholder="R$" name="val_total" id="valor_total"  class="span3 m-wrap"></input>
							</div>
								<div class="controls" style="float:right; width:300px;">
									<label class="control-label" style="float:left;">Descontar Valor R$</label><br>
									<input style="float:left;" type="text" placeholder="R$" name="val_desc" id="valor_total"  class="span3 m-wrap" value=""></input>
								</div>
								<div class="controls">
									<input type="submit" name="finalizar" id="cadastrar_p_venda" value="Adicionar Receita" class="btn btn-primary btn-lg btn-block">
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
<?php
include "../php/bddata.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

@$titulo = $_POST['titulo'];
@$situacao = $_POST['situacao'];
@$pagamento = $_POST['pagamento'];
@$lista_produto_id = $_POST['txtareap'];
@$lista_produto_quantidade = $_POST['txtareaq'];
@$data_limite = $_POST['dataLimite'];
$data_limite= date('Y-m-d',  strtotime($data_limite));
@$val_desc = $_POST['val_desc'];
@$fornecedor = $_POST['fornecedor'];
@$listaobservacao = $_POST['listaobservacao'];
if($titulo == "" || $situacao == "0" || $pagamento=="0" || $data_limite==""){
			//echo "Titulo:".$titulo."Situação".$situacao."Pagamento:".$pagamento."Data Limite:".$data_limite;
			echo "<script>alert('Preencha todos os campos corretamente');</script>";
			//header('Refresh:1; url=nova_receita.php');
		} else{ 
		if ($lista_produto_id != ""){
			//echo "<script>alert('Passou');</script>";
			   $vlistaproduto = explode(',', $lista_produto_id);
			   $vlistaquantidade = explode(',', $lista_produto_quantidade);
			   $sql= "INSERT INTO planocontas_capa(idPlanoContas_Capa, data,entrada, idForma_Pagamento, idFornecedor, situacao, valor_total, observacao,titulo) VALUES('','$data_limite','S',$pagamento,$fornecedor,'$situacao',' ','$listaobservacao','$titulo')";
							$conn->query($sql);
							//echo "passei pelo sql<br>";
							$sql3= "SELECT MAX(idPlanoContas_Capa) AS idPlanoContas_Capa FROM planocontas_capa where valor_total='' and situacao = '$situacao'";
							$result=$conn->query($sql3);
							while($row=$result->fetch_assoc()){
								@$id_capa = $row['idPlanoContas_Capa'];
							//	echo "ID CAPA VENDA: ".$id_capa;
							}
					 for($i=0;$i<(sizeof($vlistaproduto)-1);$i++){
							if(is_numeric($vlistaproduto[$i]) && (is_numeric($vlistaquantidade[$i]))){
							$sql2= "INSERT INTO planocontas_itens(idPlanoContas_Itens, idPlanoContas_Capa,idProduto, quantidade) VALUES('',$id_capa,$vlistaproduto[$i],$vlistaquantidade[$i])";
							$conn->query($sql2);   
							//$sql5="UPDATE produto SET quantidade=(quantidade - $vlistaquantidade[$i]) where idProduto=$vlistaproduto[$i] or codigo_barras=$vlistaproduto[$i]";
							//$conn->query($sql5);   
							}
							
					}
					$sql4="SELECT SUM(p.preco_final*v.quantidade) as total from planocontas_itens as v INNER JOIN produto as p  WHERE v.idProduto=p.idProduto and v.idPlanoContas_Capa=$id_capa";
						$result2=$conn->query($sql4);
						while($row=$result2->fetch_assoc()){
							@$total = $row['total'];
							//echo "Total da Venda: ".number_format(@$total, 2, ',','.');
							}
							$total = $total - $val_desc;
					$sql6="UPDATE planocontas_capa SET valor_total=$total where idPlanoContas_Capa=$id_capa";
					$conn->query($sql6);
					echo "<script>alert('Lançamento efetuado com sucesso.');</script>";
					@header('Refresh:1; url=nova_receita.php');
			}
		}
	
	$conn->close();

?>