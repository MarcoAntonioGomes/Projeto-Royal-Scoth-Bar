 <?php
include "bddata.php";
header('Content-type: application/json; charset=utf-8'); 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$dataInicial=$_POST["datainicial"];
$dataInicial= date('Y-m-d',  strtotime($dataInicial));
$dataFinal=$_POST["datafinal"];
$dataFinal= date('Y-m-d',  strtotime($dataFinal));

if($dataInicial=="" && $dataFinal==""){
	die("Nenhum parametro!");
}else {
	$sql= "SELECT v.idVenda_Capa,DATE_FORMAT(v.data, '%d-%m-%Y') as data, fp.nome AS pagamento,". 
	 " c.nome as nomeCliente,c.cpf,v.valor_total,v.status,v.pre_venda,v.comanda,f.nome AS nomeFuncionario ".
	 " FROM venda_capa AS v, cliente as c,funcionario as f,forma_pagamento as fp ".
	 " WHERE v.idCliente=c.idCliente AND v.idForma_Pagamento=fp.idForma_Pagamento AND v.idFuncionario=f.idFuncionario AND ".
	 " data BETWEEN '".$dataInicial."' AND '".$dataFinal."' ORDER BY data";
}

$result=$conn->query($sql);
if($result){
	while($row=$result->fetch_assoc()){
		$json[]=$row;
	}
	$data["data"]=$json;
	$data["qtd"]=sizeof($data["data"]);
	
}else{
	$data["data"]=[];
	$data["qtd"]=0;
}

print json_encode($data);
$conn->close();
?>