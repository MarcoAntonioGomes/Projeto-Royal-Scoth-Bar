 <?php
header('Content-type: application/json; charset=utf-8'); 
include "bddata.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$cnpj=$_POST["cnpj"];

$sql2 = "SELECT cnpj FROM fornecedor WHERE cnpj = '$cnpj'";
$stmt2=$conn->query($sql2);

if($stmt2->num_rows > 0){
	$result = ['falha' => true];
}else{
	$sql= "INSERT INTO Fornecedor(nome,cnpj,endereco,cidade,estado,complemento,cep,telefone,idForma_Pagamento) VALUES(?,?,?,?,?,?,?,?,?)";
	$stmt=$conn->prepare($sql);

	$stmt->bind_param("ssssssssi",$_POST["nome"],$_POST["cnpj"],$_POST["endereco"],$_POST["cidade"],
				$_POST["estado"],$_POST["complemento"],
				$_POST["cep"],$_POST["telefone"],intval($_POST["pagamento"]));
				
	$success = $stmt->execute();
	$stmt->close();

	$result = ['success' => $success];
}

print json_encode($result);
$conn->close();
?> 