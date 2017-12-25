        <?php include '../connect.php'; 
        if (isset($_GET['id']) && !empty($_GET['id'])){
            $id_produto = $_GET['id'];
            $id_produto = mysql_real_escape_string($id_produto);
            $search = mysql_query("SELECT * FROM produto WHERE id_produto = $id_produto") or die(mysql_error());
            if (mysql_num_rows($search) == 1){
                $result = mysql_fetch_array($search);
                if ($result['quantity'] >= 1){
                    if(isset($_SESSION['comprar'][$id_produto]) && !empty($_SESSION['comprar'][$id_produto]) && $_SESSION['comprar'][$id_produto] >=1 ){
                        $_SESSION['comprar'][$id_produto]++;
                    } else{
                        $_SESSION['comprar'][$id_produto] = 1;
                    }
                } else {
                    echo "<script type='text/javascript'> alert('Desculpe mas não temos esse produtos'); window.location.href = '../';</script>";
                }
            }
        }
    if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado']){
        include '../time_session.php';
        $search = mysql_query("SELECT * FROM produto") or die(mysql_error());
        $total_produtos = mysql_num_rows($search);
        for ($cont = 1; $cont<=$total_produtos;$cont++){
            if ($_SESSION['comprar'][$cont] <= 0){
                $_SESSION['comprar'][$cont] = 0;
            }
        }
?>
<html>
    <head>
        <title>Marcial Lanches -- Carrinho</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet"  href="../style.css"  TYPE="text/css">
        <script type="text/javascript" src="../java.js"></script>
        <script src="../jquery.js"></script>
        <script src="../jquery.roundabout2.js"></script>
        <script>
            $(document).ready(function() {
                $('ul').roundabout();
            });
        </script>
        <script type="text/javascript">
            function buscar(getURL, div ){                
                document.getElementById(div).innerHTML = "Aguarde...";
                getURL = '../'+getURL;  
                var Ajax = openAjax();//Inicia o Ajax.
                Ajax.open("GET", getURL+"&randon="+encodeURI(Math.random()) , true); // fazendo a requisição        
                Ajax.onreadystatechange = function(){
                    if(Ajax.readyState == 4) { // Quando estiver tudo pronto.
                        if(Ajax.status == 200) {
                            var resultado = Ajax.responseText; // Coloca o retornado pelo Ajax nessa variável
                            resultado = unescape(resultado); // Resolve o problema dos acentos
                            document.getElementById(div).innerHTML = resultado;
                            document.getElementById("body").style.height = document.getElementById("right").offsetHeight +50;
                        }	
                    }	
                }
                Ajax.send(null); // submete
            }
            function quantidade(div, getURL, id){
                div = div+id;
                document.getElementById(div).innerHTML = 'aguarde...';
                if (document.getElementById('input'+id).value <= 0){
                    if (confirm('você realmente deseja excluir esse item do carrinho?')){
                        document.getElementById('div'+id).style.display = 'none'; 
                        document.getElementById('div'+id).innerHTML = ''; 
                    }else{
                        document.getElementById('input'+id).value= '1'; 
                    }                
                }                
                getURL = getURL+document.getElementById('input'+id).value;
                var Ajax = openAjax(); // Inicia o Ajax.
                Ajax.open("GET", getURL+"&randon="+encodeURI(Math.random()) , true); // fazendo a requisição
                Ajax.onreadystatechange = function(){
                    if(Ajax.readyState == 4) { // Quando estiver tudo pronto.
                        if(Ajax.status == 200) {                
                            var resultado = Ajax.responseText; // Coloca o retornado pelo Ajax nessa variável                
                            resultado = unescape(resultado); // Resolve o problema dos acentos
                            document.getElementById(div).innerHTML = resultado;						  
                            var desculpe;
                            var idpreco, valor1, valor3, n1, total1, total2, decimal1, inteiro1;
                            total1 = 0;
                            total2 = 0;
                            decimal1 = 0;
                            inteiro1 = 0;
                            for(var cont=1; cont <= <?php echo $total_produtos?> ;cont++){
                                idpreco = 'preco'+cont;
                                if (document.getElementById(idpreco) != null){
                                    desculpe = document.getElementById(idpreco).innerHTML.split(" ");
                                    if (desculpe[0] != 'Desculpe'){
                                        valor1 = document.getElementById(idpreco).innerHTML;
                                        valor1 = valor1.split('$');
                                        valor3 = valor1[2].split('.');
                                        n1 = valor3[0].split(',');
                                        decimal1 += parseInt(n1[1]);
                                        inteiro1 += parseInt(n1[0]);
                                    }
                                }
                            }
                            decimal1 =  decimal1.toString();
                            decimal1 = decimal1.split('');    
                            var tamanho = decimal1.length;
                            total2 = decimal1[tamanho - 2] + decimal1[tamanho - 1];
                            if (decimal1.length == 1) {
                                total1 = inteiro1;
                                total2 = '00';
                            }
                            else if (decimal1.length == 2) {
                                total1 = inteiro1;
                            } else if(decimal1.length == 3) {
                                total1 = inteiro1;
                                total1 += parseInt(decimal1[tamanho - 3]);
                            } else if(decimal1.length == 4){
                                total1 = inteiro1;
                                total1 += parseInt(decimal1[tamanho - 3]);
                                total1 += (parseInt(decimal1[tamanho - 4]) *10);
                            }
                            document.getElementById('total').innerHTML = 'Total R$ '+ total1+','+total2;
                        }	
                    }	
                }
                Ajax.send(null); // submete
            }
        </script>
    </head>
    <body onload="<?php if(isset($_SESSION['ERRO']) && !empty($_SESSION['ERRO'])){ echo $_SESSION['ERRO']; unset($_SESSION['ERRO']);}?>            
            document.getElementById('body').style.height = document.getElementById('right').offsetHeight +50;">
        <div id='body'>
            <div id='left'>
                <div id='logo'>
                    <img src='../imagens/Logo2.png' width="200px;" height="150px;">
                </div>
                <div id="menu">
                    <?php include '../menu/verifica_menu_login.php';?>
                </div>
                <div id="publicidade">  
                    
                </div>
            </div>
            <div id='right'>
                <div id="resposta2">
                    <?php include "../hamburguer.php";?>
                </div>
                <div id="menu_top">
                    <?php include '../menu/basic_menu2.php';?>
                </div>
                <div id="resposta">
                    <?PHP
                        $total = 0;
                        while($row = mysql_fetch_array($search)){                    
                            if(isset($_SESSION['comprar'][$row['id_produto']]) && !empty($_SESSION['comprar'][$row['id_produto']])){?>
                                <div id="div<?php echo $row['id_produto']?>">
                                    <?php  echo 'Produto: '.$row['name'].' Quantidade: ';
                                    $preco = $_SESSION['comprar'][$row['id_produto']] * $row['value'];
                                    $total += $preco;
                                    $preco = number_format($preco, '2', ',', '.');
                                    $row['value'] = number_format($row['value'], '2', ',', '.');
                                    $total = number_format($total, '2', ',', '.');
                                    ?>
                                    <div>
                                        <input type="number" name="input<?php  echo $row['id_produto'];?>" id="input<?php  echo $row['id_produto'];?>"value="<?php echo $_SESSION['comprar'][$row['id_produto']]?>"style='width:10%;' onchange="quantidade('preco', 'add.php?value=<?php echo $row['id_produto']?>/', '<?php echo $row['id_produto']?>');"/>
                                    </div>
                
                                    <?php  echo "<label style='float:right; margin-top: -50px;' id='preco".$row['id_produto']."'> Valor: R$". $row['value'].".<br/>Subtotal: R$". $preco.".</label><br/><hr>";
                                    ?>                                    
                                </div><?php 
                            }            
                        }
                        ?><div id="comprar"><a href="../sair.php?value=Excluir"> Excluir Tudo </a> <a href="../validar_compra/"> Comprar</a><label style="float: right;" id="total">Total: R$<?php echo $total;?></label></div><?php
                    } else {
                        $_SESSION['ERRO'] = "alert('Faça seu login');";
                        header("location: ../");
                    }
               ?>

                </div>
            </div>
        </div>
        <div id="bottom">
                DISK-LANCHES:<br/>
                (37) 3431-2773<br/>
                (37) 9961-9324
            </div>
            <div id='rodape'>
                <label style="margin: 0 auto;">Agradecemos a preferência e nos de sugestões para melhor atende-lo. Obrigado!</label>
            </div>    
		</body>
</html>
		

    
    

