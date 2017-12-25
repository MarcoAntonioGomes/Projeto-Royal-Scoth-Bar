<?php
    if(isset($_GET['value']) &&  !empty($_GET['value'])){
        include '../connect.php';
        $value = $_GET['value'];
        $value = explode('/', $value);
        $value[0] = mysql_real_escape_string($value[0]);
        $search =  mysql_query("select * from produto WHERE id_produto = $value[0]"); 
        $_SESSION['comprar'][$value[0]] = $value[1];
        while ($row = mysql_fetch_array($search)){
            if( $value[1] <= $row['quantity']){
                $preco = $value[1] * $row['value'];
                $preco = number_format($preco, '2', ',', '.');
                $row['value'] = number_format($row['value'], '2', ',', '.');
                echo "Valor: R$". $row['value'].".<br/>Subtotal: R$". $preco.'.';
            } else {
                echo "Desculpe mas só temos {$row['quantity']}   quantidade(s) de {$row['name']}.";
            }
        }
    }
?>