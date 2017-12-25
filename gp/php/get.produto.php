<?php
	include "bddata.php";
	header('Content-type: application/json; charset=utf-8'); 

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$id=$_GET["id"];

	$sql="SELECT p.idProduto, p.nome as nomeProduto, ".
		" p.preco_custo as precocusto,p.margem,p.preco_final as precofinal,p.quantidade,p.codigo_barras as codigobarras, p.observacao, ".
		" f.idFornecedor as fornecedor,fp.idForma_Pagamento as pagamento ".
		" FROM produto as p, fornecedor as f, forma_pagamento as fp ".
		" WHERE p.idForma_Pagamento = fp.idForma_Pagamento AND p.idFornecedor=f.idFornecedor AND p.idProduto =?";
	
	$stmt=$conn->prepare($sql);

	$stmt->bind_param("i",$id);
				
	$success = $stmt->execute();
	
	$stmt->bind_result($id,$nomeProduto,$precocusto,$margem,
		$precofinal,$quantidade,$codigobarras,$observacao,$fornecedor,$pagamento);

	$stmt->fetch();
	
	$data["id"]=$id;
	$data["nomeProduto"]=$nomeProduto;
	$data["precocusto"]=$precocusto;
	$data["margem"]=$margem;
	$data["precofinal"]=$precofinal;
	$data["quantidade"]=$quantidade;
	$data["codigobarras"]=$codigobarras;
	$data["observacao"]=$observacao;
	$data["fornecedor"]=$fornecedor;
	$data["pagamento"]=$pagamento;

	print json_encode($data);

	$stmt->close();
	
?>