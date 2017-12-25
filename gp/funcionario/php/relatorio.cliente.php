 <?php
include "bddata.php";
header('Content-type: application/json; charset=utf-8'); 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql= "SELECT idCliente,nome,cpf,IFNULL(rg,'') as rg,IFNULL(endereco,'') as endereco, IFNULL(cidade,'') as cidade,IFNULL(estado,'') as estado, IFNULL(cep,'') as cep, IFNULL(telefone,'') as telefone ".
	"FROM cliente";


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