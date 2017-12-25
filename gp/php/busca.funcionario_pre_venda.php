 <?php
include "bddata.php";
header('Content-type: application/json; charset=utf-8'); 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT * FROM funcionario";
$result=$conn->query($sql);

while($row=$result->fetch_assoc()){
	$json[]=$row;
}
$data["data"]=$json;

print json_encode($data);

$conn->close();
?> 