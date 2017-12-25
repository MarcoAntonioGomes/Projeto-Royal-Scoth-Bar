 <?php
include "bddata.php";
header('Content-type: application/json; charset=utf-8'); 
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$comanda=$_POST["comanda"];
$nome=$_POST["nome"];
$datainicial=$_POST["datainicial"];
$datainicial= date('Y-m-d',  strtotime($datainicial));
$datafinal=$_POST["datafinal"];
$datafinal= date('Y-m-d',  strtotime($datafinal));

$sqlbase="SELECT c.nome as cliente,DATE_FORMAT(vc.data, '%d-%m-%Y') as data2, vc.valor_total, fc.nome as funcionario, vc.comanda, vc.status as status2 FROM `venda_capa` AS vc,cliente as c, funcionario as fc WHERE vc.idCliente=c.idCliente AND fc.idFuncionario=vc.idFuncionario AND vc.status = 'A' AND vc.data BETWEEN '".$datainicial."' AND '".$datafinal."'";

if($comanda=="" && $nome==""){
	die("Nenhum parametro!");
}else if($comanda==""){
	$sql= "AND c.nome LIKE '%".$nome."%'";
}else if($nome==""){
	$sql= "AND vc.comanda='".$comanda."'";
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