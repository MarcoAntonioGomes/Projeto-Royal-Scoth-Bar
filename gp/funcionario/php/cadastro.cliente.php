 <?php
header('Content-type: application/json; charset=utf-8'); 
include "bddata.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$cpf=$_POST["cpf"];

$sql2 = "SELECT cpf FROM cliente WHERE cpf = '$cpf'";
$stmt2=$conn->query($sql2);

if($stmt2->num_rows > 0){
	$result = ['falha' => true];
}else{
	$sql= "INSERT INTO cliente(nome,cpf,rg,endereco,complemento,cidade,estado,cep,telefone) VALUES(?,?,?,?,?,?,?,?,?)";
	$stmt=$conn->prepare($sql);

	$stmt->bind_param("sssssssss",$_POST["nome"],$_POST["cpf"],$_POST["rg"],
			$_POST["endereco"],$_POST["complemento"],$_POST["cidade"],$_POST["estado"],
				$_POST["cep"],$_POST["telefone"]);
				
	$success = $stmt->execute();
	$stmt->close();
	$result = ['success' => $success];
}

print json_encode($result);

$conn->close();
?> 