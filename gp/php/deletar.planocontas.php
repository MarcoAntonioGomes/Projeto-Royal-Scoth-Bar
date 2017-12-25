 <?php
include "bddata.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id=$_GET["id"];

	$sql= "DELETE FROM planocontas_capa WHERE idPlanoContas_Capa=$id";
	$sql2 = "DELETE FROM planocontas_itens WHERE idPlanoContas_Itens=$id";
	$conn->query($sql);
	$conn->query($sql2);

$conn->close();
echo "<script>alert('Deletado com sucesso.');</script>";
header("Refresh:1; url=../plano_de_contas/plano_contas.html");
//header('Refresh:1; url=form_venda.php');
?> 