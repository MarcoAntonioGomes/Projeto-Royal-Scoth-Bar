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
$codigobarra=$_POST["codigobarras"];
$forn=$_POST["fornecedor"];

$sqlbase="SELECT p.idProduto, p.nome,p.preco_final,p.quantidade,IFNULL(p.codigo_barras,'') as codigobarra,IFNULL(p.observacao,'') as observacao,f.nome as fornecedor FROM `produto` AS p,fornecedor as f WHERE p.idFornecedor=f.idFornecedor ";

if($nome=="" && $codigobarra=="" && $forn == "0"){
	die("Nenhum parametro!");
}else if($nome=="" && $forn == "0"){
	$sql= " AND  p.codigo_barras='".$codigobarra."'";
}else if($codigobarra=="" && $forn == "0"){
	$sql= " AND p.nome LIKE '%".$nome."%'";
}else if($nome=="" && $codigobarra=="" && $forn != "0"){
	$sql="AND p.idFornecedor = '".$forn."'";
}
else{
	$sql= " ";
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