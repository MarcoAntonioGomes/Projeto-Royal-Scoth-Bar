<script type="text/javascript" src="jquery.js">
$(document).ready(function(){
				comeca();
			})
			var timerI = null;
			var timerR = false;

			function para(){
    			if(timerR)
        			clearTimeout(timerI)
    			timerR = false;
			}
			function comeca(){
    			para();
    			lista();
			}
			function lista(){
				$.ajax({
					url:"../php/notificacao.produto.php",
   					success: function (textStatus){
 						$('#lista').html(textStatus); //mostrando resultado
 					}
 				})
 				timerI = setTimeout("lista()", 10000);//tempo de espera
    			        timerR = true;

			}
</script>