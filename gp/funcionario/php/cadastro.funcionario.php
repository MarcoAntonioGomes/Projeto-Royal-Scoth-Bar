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
$usuario=$_POST["usuario"];

$sql2 = "SELECT cpf FROM funcionario WHERE cpf = '$cpf'";
$stmt2=$conn->query($sql2);

$sql3 = "SELECT usuario FROM funcionario WHERE usuario = '$usuario' AND usuario != 'admin'";
$stmt3=$conn->query($sql3);

if($stmt2->num_rows > 0){
	$result = ['falha' => true];
}else if($stmt3->num_rows > 0){
	$result = ['falhau' => true];
}else{
	$sql= "INSERT INTO funcionario(nome,cpf,rg,endereco,complemento,cidade,estado,cep,telefone,usuario,senha,salario) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt=$conn->prepare($sql);

	$stmt->bind_param("sssssssssssd",$_POST["nome"],$_POST["cpf"],$_POST["rg"],
			$_POST["endereco"],$_POST["complemento"],$_POST["cidade"],$_POST["estado"],
				$_POST["cep"],$_POST["telefone"],$_POST["usuario"],sha1($_POST["senha"]),floatval($_POST["salario"]));
				
	$success = $stmt->execute();
	$stmt->close();

	$result = ['success' => $success];
}

print json_encode($result);
$conn->close();
?> 