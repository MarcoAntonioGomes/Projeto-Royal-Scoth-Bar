<?php
include "../conexoes/conexao.php";

?>

<html>
	<head>
		<script src="/mint/?js" type="text/javascript"></script>
		<meta charset="utf-8" />
		<title>A Standard Roundabout</title>
		
		<link href="/assets/projects/roundabout2/demos/demos.css" rel="stylesheet" />
		<style>
		ul {
				list-style: none;
				padding: 0;
				margin: 0 auto;
				width: 32em;
				height: 24em;
				
			}
		li {
			
				height: 15em;
				width: 30em;
				background-color: #c5a059;
				text-align: center;
				cursor: pointer;
				
			}
		li.roundabout-in-focus {
					cursor: default;
					
				}
		li span {
			
				display: block;
				padding-top: 6em;
			}

		#carbonads-container .carbonad {
				margin: 0 auto;
				
			}
		
		.imagem img{
			 width:250px;
			 float:left;
			 padding-top:30px;
			 
			
		}
		.para{
			width:200px;
			float:right;
			padding-top:30px;			
			height:200px;			
			border-left:1px solid black;
		}
		</style>
	</head>
	<body>
	
		
		<ul><?php
		$sql = "SELECT * FROM cardapio_online";
		$resul = mysql_query($sql, $conexao);
		while($linha = mysql_fetch_row($resul)) { 
			$titulo = $linha[1];
			$descricao = $linha[2];
			$caminho = $linha[3];
			echo "<li><div  class=\"imagem\" ><img src=\"../eventos/$caminho\"></div><div class=\"para\"><strong>$titulo</strong><br>$descricao</div></li>";
		}

		
		?>
		</ul>
		
		<div id="carbonads-container"><div class="carbonad"><div id="azcarbon"></div><script type="text/javascript">var z = document.createElement("script"); z.type = "text/javascript"; z.async = true; z.src = "http://engine.carbonads.com/z/15972/azcarbon_2_1_0_HORIZ"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(z, s);</script></div></div>

		<div class="interact">
		</div>
		
		<div class="return">
			<a href="/projects/roundabout#/demos"></a>
		</div>
		
		<script src="./jquery.js"></script>
		<script src="./jquery.roundabout2.js"></script>
		<script>
			$(document).ready(function() {
				$('ul').roundabout();
			});
		</script>
		<script type="text/javascript">
			// <![CDATA[
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
			// ]]>
			</script>
			<script type="text/javascript">
			// <![CDATA[
			try {
				var pageTracker = _gat._getTracker("UA-12086558-1");
				pageTracker._trackPageview();
			} catch(err) {}
			// ]]>
		</script>
	</body>
</html>
