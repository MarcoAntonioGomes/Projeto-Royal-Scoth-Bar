 <?php
include "bddata.php";
header('Content-type: application/json; charset=utf-8'); 
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$situacao=$_POST["situacao"];
$datainicial=$_POST["datainicial"];
$datainicial= date('Y-m-d',  strtotime($datainicial));
$datafinal=$_POST["datafinal"];
$datafinal= date('Y-m-d',  strtotime($datafinal));

$sqlbase="SELECT DATE_FORMAT(pc.data, '%d-%m-%Y') as data2, pc.entrada, fp.nome as pagamento, f.nome as fornecedor, pc.situacao, pc.valor_total as valortotal, IFNULL(observacao,'') as observacao, pc.titulo FROM planocontas_capa AS pc, fornecedor as f, forma_pagamento as fp WHERE pc.idForma_pagamento = fp.idForma_pagamento AND  pc.idFornecedor = f.idFornecedor AND pc.data BETWEEN '".$datainicial."' AND '".$datafinal."'";

if($situacao == ""){
	die("Nenhum parametro!");
}else if($situacao != "T"){
	$sql =  "AND pc.situacao LIKE '".$situacao."'";
}
else if($situacao == "T"){
	$sql = " AND pc.situacao LIKE '%'";
}

$result=$conn->query($sqlbase.$sql);

$json=[];
while($row=$result->fetch_assoc()){
	$json[]=$row;
}

$data["data"]=$json;

print json_encode($data);

$conn->close();
?> 