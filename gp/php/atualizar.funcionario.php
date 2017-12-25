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
$id=$_POST["id"];
$usuario=$_POST["usuario"];

$sql2 = "SELECT cpf FROM funcionario WHERE cpf = '$cpf'  AND idFuncionario != '$id'";
$stmt2=$conn->query($sql2);

$sql3 = "SELECT usuario FROM funcionario WHERE usuario = '$usuario' AND usuario != 'admin' AND idFuncionario != '$id'";
$stmt3=$conn->query($sql3);

if($stmt2->num_rows > 0){
	$result = ['falha' => true];
}else if($stmt3->num_rows > 0){
	$result = ['falhau' => true];
}else{
	$sql= "UPDATE funcionario SET nome=?,usuario=?,senha=?,cpf=?,rg=?,telefone=?,endereco=?,".
		"complemento=?,cidade=?,estado=?,cep=?,salario=? ".
		" WHERE idFuncionario=?";

	$stmt=$conn->prepare($sql);

	$stmt->bind_param("ssssssssssssi",$_POST["nome"],$_POST["usuario"],sha1($_POST["senha"]),$_POST["cpf"],$_POST["rg"],$_POST["telefone"],
				$_POST["endereco"],$_POST["complemento"],
				$_POST["cidade"],$_POST["estado"],
				$_POST["cep"],$_POST["salario"],intval($_POST["id"]));
				
	$success = $stmt->execute();
	$stmt->close();

	$result = ['success' => $success];
}
print json_encode($result);
$conn->close();
?> 