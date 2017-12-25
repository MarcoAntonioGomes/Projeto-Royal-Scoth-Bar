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
$cnpj=$_POST["cnpj"];

$sqlbase="SELECT f.idFornecedor,f.nome,f.cnpj,IFNULL(f.endereco, '') as endereco, IFNULL(f.complemento, '') as complemento, IFNULL(f.cidade,'') as cidade, IFNULL(f.estado,'') as estado,IFNULL(f.cep,'')as cep, IFNULL(f.telefone, '') as telefone,fp.nome as pagamento FROM `fornecedor` AS f,forma_pagamento as fp WHERE f.idForma_pagamento=fp.idForma_pagamento ";

if($nome=="" && $cnpj==""){
	$sql=" ";
}else if($nome==""){
	$sql= " AND  f.cnpj='".$cnpj."'";
}else if($cnpj==""){
	$sql= " AND f.nome LIKE '%".$nome."%'";
}else{
	$sql= " AND ( f.cnpj='".$cnpj."' OR f.nome LIKE '%".$nome."%' ) ";
}

//echo $sqlbase.$sql;
$result=$conn->query($sqlbase.$sql);

$json=[];
while($row=$result->fetch_assoc()){
	$json[]=$row;
}

$data["data"]=$json;

print json_encode($data);

$conn->close();
?> 