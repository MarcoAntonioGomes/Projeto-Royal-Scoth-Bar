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

	$sql="SELECT f.idFornecedor,f.nome as nomeFornecedor, ".
		" f.cnpj,f.endereco,f.cidade,f.estado,f.complemento,f.cep,f.telefone,".
		" fp.idForma_Pagamento as pagamento FROM fornecedor as f, forma_pagamento as fp ".
		" WHERE f.idForma_Pagamento=fp.idForma_Pagamento AND f.idFornecedor=?";
	
	$stmt=$conn->prepare($sql);

	$stmt->bind_param("i",$id);
				
	$success = $stmt->execute();
	
	$stmt->bind_result($id,$nomeFornecedor,$cnpj,$endereco,
		$cidade,$est,$complemento,$cep,$telefone,$pagamento);

	$stmt->fetch();
	
	$data["id"]=$id;
	$data["nomeFornecedor"]=$nomeFornecedor;
	$data["cnpj"]=$cnpj;
	$data["endereco"]=$endereco;
	$data["cidade"]=$cidade;
	$data["complemento"]=$complemento;
	$data["cep"]=$cep;
	$data["telefone"]=$telefone;
	$data["pagamento"]=$pagamento;
	$data["estado"]=$est;

	print json_encode($data);

	$stmt->close();
	
?>