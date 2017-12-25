 <?php
header('Content-type: application/json; charset=utf-8'); 
include "bddata.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$cliente= $_POST['cliente'];
$funcionario = $_POST['funcionario'];
$produto = $_POST['estoque'];
$comanda = $_POST['comanda'];
$quantidade = $_POST['quantidade'];
$pagamento = $_POST['pagamento'];
$cod_barras = $_POST['cod_barras'];

$data_atual = date("Y-m-d");
if($cliente=="" || $funcionario=="" || $comanda=="" || $pagamento==""){
	die("Preencha todos os campos corretamente");
}else {
	$sql= "INSERT INTO venda_capa(idVenda_Capa, data,idForma_Pagamento, idCliente, valor_total, status, pre_venda, comanda,idFuncionario) VALUES('','$data_atual',$pagamento,$cliente,0,'A','S',$comanda,$funcionario)";
	$conn->query($sql);
	$sql2= "SELECT MAX(idVenda_Capa) AS idVenda_Capa FROM venda_capa where idFuncionario='$funcionario'";
	
	$result=$conn->query($sql2);

	while($row=$result->fetch_assoc()){
		$json[]=$row;
	}
	
	
}
$data["data"]=$json;
print json_encode($data);
$conn->close();
?> 