 <?php
include "bddata.php";
header('Content-type: application/json; charset=utf-8'); 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql= "SELECT p.idProduto,p.nome as nomeProduto,p.preco_final,".
	"p.quantidade,IFNULL(p.codigo_barras,'') as codigo_barras,IFNULL(p.observacao,'') as observacao,f.nome AS nomeFornecedor,f.CNPJ,fp.nome AS pagamento ".
	"FROM produto AS p,fornecedor as f, forma_pagamento as fp ".
	"WHERE p.idFornecedor=f.idFornecedor AND p.idForma_Pagamento=fp.idForma_Pagamento";
	


$result=$conn->query($sql) or die($conn->error);

if ($result) {
	while($row=$result->fetch_assoc()){
		$json[]=$row;
	}
	$data["data"]=$json;
	$data["qtd"]=sizeof($json);
} else {
	$data["qtd"]=0;
}

print json_encode($data);

$conn->close();
?> 