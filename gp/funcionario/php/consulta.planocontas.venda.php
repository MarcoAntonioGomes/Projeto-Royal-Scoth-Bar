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

$sqlbase="SELECT c.nome as cliente, DATE_FORMAT(vc.data, '%d-%m-%Y') as data2, fp.nome as pagamento, vc.valor_total,  fc.nome as funcionario, vc.status as status2 FROM `venda_capa` AS vc,cliente as c, forma_pagamento as fp, funcionario as fc WHERE vc.idCliente=c.idCliente AND vc.idForma_Pagamento=fp.idForma_Pagamento AND fc.idFuncionario=vc.idFuncionario AND vc.status = 'F' AND vc.data BETWEEN '".$datainicial."' AND '".$datafinal."'";

if($situacao == "0"){
	die("Nenhum parametro!");
}else if($situacao == "V" ){
$sqlbase="SELECT c.nome as cliente, DATE_FORMAT(vc.data, '%d-%m-%Y') as data2, fp.nome as pagamento, vc.valor_total,  fc.nome as funcionario, vc.status as status2 FROM `venda_capa` AS vc,cliente as c, forma_pagamento as fp, funcionario as fc WHERE vc.idCliente=c.idCliente AND vc.idForma_Pagamento=fp.idForma_Pagamento AND fc.idFuncionario=vc.idFuncionario AND vc.status = 'F' AND vc.data BETWEEN '".$datainicial."' AND '".$datafinal."'";
}

$result=$conn->query($sqlbase);

$json=[];
while($row=$result->fetch_assoc()){
	$json[]=$row;
}

$data["data"]=$json;
if($situacao == "T" || $situacao == "P" || $situacao == "R" || $situacao == "A"){
$data = ['sucess' => $result];	
}

print json_encode($data);

$conn->close();
?> 