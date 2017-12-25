 <?php
header('Content-type: application/json; charset=utf-8'); 
include "bddata.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$estoque = $_POST['estoque'];
$codigo_barras = $_POST['codigo_barras'];
$quantidade = $_POST['quantidade'];


if($codigo_barras=="" && $estoque==""){
	die("Nenhum parametro!");
}else if($codigo_barras==""){
	$sql= "SELECT * from produto where idProduto=$estoque";
}else if($estoque==""){
	$sql= "SELECT * from produto where codigo_barras='$codigo_barras'";
	echo $sql;
}else{
	$sql= "SELECT * from produto where idProduto=$estoque or codigo_barras ='$codigo_barras'";
}


$result=$conn->query($sql);

while($row=$result->fetch_assoc()){
	$quantidade_atual = $row["quantidade"];
	$sql2="Update produto set quantidade = $quantidade+$quantidade_atual where idProduto=$estoque or codigo_barras = '$codigo_barras'";
	$conn->query($sql2);
	$json[]=$row;
}
$data["data"]=$json;

print json_encode($data);

$conn->close();
?> 