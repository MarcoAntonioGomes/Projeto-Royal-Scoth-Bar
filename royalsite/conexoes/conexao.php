<?php
   
$database="localhost";
$dbname="royal";
$usuario="root"; 
$dbsenha="";

$conexao = mysql_connect ($database, $usuario, $dbsenha);
if($conexao){
      if (mysql_select_db($dbname, $conexao)){ print "";
      }else{ print "Não foi possível selecionar o Banco de Dados"; }
}else{ print "Erro ao conectar o MySQL"; }

?>
