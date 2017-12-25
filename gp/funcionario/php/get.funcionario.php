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

	$sql="SELECT idFuncionario,nome as nomeFuncionario, cpf,rg,endereco, ".
		" complemento, cidade,estado,cep,salario,usuario,senha, telefone".
		" FROM funcionario ".
		" WHERE idFuncionario=?";
	
	$stmt=$conn->prepare($sql);

	$stmt->bind_param("i",$id);
				
	$success = $stmt->execute();
	
	$stmt->bind_result($id,$nomeFuncionario,$cpf,$rg,
		$endereco,$complemento,$cidade,$estado,$cep,$salario,$usuario,$senha,$telefone);

	$stmt->fetch();
	
	$data["id"]=$id;
	$data["nomeFuncionario"]=$nomeFuncionario;
	$data["cpf"]=$cpf;
	$data["rg"]=$rg;
	$data["endereco"]=$endereco;
	$data["complemento"]=$complemento;
	$data["cidade"]=$cidade;
	$data["estado"]=$estado;
	$data["cep"]=$cep;
	$data["salario"]=$salario;
	$data["usuario"]=$usuario;
	$data["senha"]=$senha;
	$data["telefone"]=$telefone;

	print json_encode($data);

	$stmt->close();
	
?>