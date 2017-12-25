 <?php
include "bddata.php";
header('Content-type: application/json; charset=utf-8'); 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nome=$_POST["nome"];
$cpf=$_POST["cpf"];

if($nome=="" && $cpf==""){
	die("Nenhum parametro!");
}else if($nome==""){
	$sql= "SELECT idCliente, nome, cpf,IFNULL(rg,'') as rg, IFNULL(endereco, '') as endereco, IFNULL(complemento, '') as complemento, IFNULL(cidade,'') as cidade, IFNULL(estado,'') as estado,IFNULL(cep,'')as cep, IFNULL(telefone, '') as telefone FROM cliente WHERE cpf='".$cpf."'";
}else if($cpf==""){
	$sql= "SELECT idCliente, nome, cpf,IFNULL(rg,'') as rg, IFNULL(endereco, '') as endereco, IFNULL(complemento, '') as complemento, IFNULL(cidade,'') as cidade, IFNULL(estado,'') as estado,IFNULL(cep,'')as cep, IFNULL(telefone, '') as telefone  FROM cliente WHERE nome LIKE '%".$nome."%'";
}else{
	$sql= "SELECT idCliente, nome, cpf,IFNULL(rg,'') as rg, IFNULL(endereco, '') as endereco, IFNULL(complemento, '') as complemento, IFNULL(cidade,'') as cidade, IFNULL(estado,'') as estado,IFNULL(cep,'')as cep, IFNULL(telefone, '') as telefone FROM cliente WHERE cpf='".$cpf."' OR nome LIKE '%".$nome."%'";
}

$result=$conn->query($sql);
$json=[];

while($row=$result->fetch_assoc()){
	$json[]=$row;
}
$data["data"]=$json;

print json_encode($data);

$conn->close();
?> 