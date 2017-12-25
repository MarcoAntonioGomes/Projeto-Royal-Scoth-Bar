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
	
	$sql="SELECT c.idCliente,c.nome as nomeCliente,c.cpf,c.rg, ".
		" c.endereco,c.complemento,c.cidade,c.estado,c.cep,c.telefone".
		" FROM cliente as c ".
		" WHERE c.idCliente=?";
	
	$stmt=$conn->prepare($sql);

	$stmt->bind_param("i",$id);
				
	$success = $stmt->execute();
	
	$stmt->bind_result($id,$nomeCliente,$cpf,$rg,
		$endereco,$complemento,$cidade,$estado,$cep,$telefone);

	$stmt->fetch();
	
	$data["id"]=$id;
	$data["nomeCliente"]=$nomeCliente;
	$data["cpf"]=$cpf;
	$data["rg"]=$rg;
	$data["endereco"]=$endereco;
	$data["complemento"]=$complemento;
	$data["cidade"]=$cidade;
	$data["estado"]=$estado;
	$data["cep"]=$cep;
	$data["telefone"]=$telefone;

	print json_encode($data);

	$stmt->close();
	
?>