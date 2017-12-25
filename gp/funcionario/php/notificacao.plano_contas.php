 <?php
include "bddata.php";
//header('Content-type: application/json; charset=utf-8'); 
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
date_default_timezone_set('America/Sao_Paulo'); 
$data_atual = date("Y-m-d");


$sql = "SELECT DATE_FORMAT(pc.data, '%d-%m-%Y') as data2, pc.entrada, fp.nome as pagamento, f.nome as fornecedor, pc.situacao, pc.valor_total as valortotal, IFNULL(observacao,'') as observacao, pc.titulo, pc.titulo FROM planocontas_capa AS pc, fornecedor as f, forma_pagamento as fp WHERE pc.idForma_pagamento = fp.idForma_pagamento AND pc.idFornecedor = f.idFornecedor AND pc.data <= '$data_atual' and pc.situacao = 'A' ";

$result=$conn->query($sql);


	//	$json=[];
		while($row=$result->fetch_assoc()){
		//	$json[]=$row;
		//echo "Produto:".$row['nome'];
		echo "<div class=\"new-update clearfix\"> <i class=\"icon-globe\"></i> <span class=\"update-notice\"> <a title=\"\" href=\"#\"><strong style=\"color:red;\">Plano de Contas - Iten Atrasado </strong></a> <span>Data: ".$row['data2']." Titulo: ".$row['titulo']." - Fornecedor: ".$row['fornecedor']." - Valor Total: ".$row['valortotal']." </span> </span> <span class=\"update-date\"><span class=\"update-day\"></span></span> </div>";
		}
		
$sql = "SELECT * FROM produto where quantidade <= 5";

$result=$conn->query($sql);


	//	$json=[];
		while($row=$result->fetch_assoc()){
		//	$json[]=$row;
		//echo "Produto:".$row['nome'];
		echo "<div class=\"new-update clearfix\"> <i class=\"icon-globe\"></i> <span class=\"update-notice\"> <a title=\"\" href=\"#\"><strong style=\"color:red;\">Produto em Falta</strong></a> <span>Produto: ".$row['nome']." - Quantidade: ".$row['quantidade']." </span> </span> <span class=\"update-date\"><span class=\"update-day\"></span></span> </div>";
		}

//$data["data"]=$json;
//$frase = $data["data"];

//print json_encode($frase);

$conn->close();
?> 