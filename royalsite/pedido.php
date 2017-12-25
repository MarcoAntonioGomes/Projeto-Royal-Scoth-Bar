<!doctype html>
<html>

<!-- Mirrored from themelooper.com/html/jz/menu.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Oct 2017 16:33:55 GMT -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Royal Store Conveniencia &amp; Bar</title>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!--THEME STYLE CSS-->
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--BOOTSTRAP CSS-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!--THEME COLOR CSS-->
<link href="css/theme_color.css" rel="stylesheet" type="text/css">
<!---Responsive CSS-->
<link href="css/responsive_query.css" rel="stylesheet">
<!---Owl Carousel CSS-->
<link href="css/owl.carousel.css" rel="stylesheet">
<!--FONTAWESOME CSS-->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!---PrettyPhoto CSS-->
<link href="css/prettyPhoto.css" rel="stylesheet">
<!--GOOGLE FONTS-->
<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet">

<style>
.linha-vertical {
  margin-top:100px;
  height: 250px;/*Altura da linha*/
  border-right: 1px solid;/* Adiciona borda esquerda na div como ser fosse uma linha.*/
  width:50%;
  float:left;
  margin-bottom:20px;
}
.linha-vertical input{
margin-left:50px;
}
.linha-vertical2 input{
margin-left:50px;
}

.linha-vertical2 {
  margin-top:100px;
  margin-bottom:20px;
  height: 250px;/*Altura da linha*/
  border-left: 1px solid;/* Adiciona borda esquerda na div como ser fosse uma linha.*/
  width:50%;
  float:right;
}
</style>
<script language="javascript">
   function verificarCPF(c){
    var i;
    s = c;
    var c = s.substr(0,9);
    var dv = s.substr(9,2);
    var d1 = 0;
    var v = false;
 
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(10-i);
    }
    if (d1 == 0){
        alert("CPF Inválido, entre somente com numeros")
        v = true;
        return false;
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(0) != d1){
        alert("CPF Inválido, entre somente com numeros")
        v = true;
        return false;
    }
 
    d1 *= 2;
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(11-i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(1) != d1){
        alert("CPF Inválido, entre somente com numeros")
        v = true;
        return false;
    }
    if (!v) {
        
    }
}
    </script>

</head>

<body>
<div id="wrapper"> 
  <!--HEADER-->
  <header id="header"> 
    <!-- Navigation Row Start -->
     <div class="container">
      <div class="top-bar"> <strong class="time"><i class="fa fa-clock-o" aria-hidden="true"></i> Aberto de : 18:00 ás 03:00</strong>
        <div class="top-social"> <strong class="title">Siga-nós </strong>
          <ul>
            <li><a href="https://www.facebook.com/Royal-Scoth-Bar-1215622748457446/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="navigation"> <strong class="logo"><a href="index.html"><img src="images/logo.png" alt="logo"></a></strong>
        <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav" id="nav">
              <li class="active"><a href="index.html">Início</a>
              <!-- <ul>
              <li><a href="index-2.html">Home 1</a></li>
              <li><a href="index-3.html">Home 2</a></li>
              </ul>-->
              </li>
              <li><a href="about.html">Sobre</a></li>
              <li><a href="event.php">Eventos</a>
                <!--<ul>
                  <li><a href="event.html">Eventos</a></li>
                   <li><a href="event-detail.html">Event Detail</a></li>
                </ul>-->
              </li>
               <li><a href="menu.html">Drinks</a></li>
              <li class="logo-col"></li>
              <li><a href="albuns/album.php">Galeria</a></li>
               <li><a href="pedido.php">Pedido</a>
              <!--  <ul>
                  <li><a href="blog.html">Blog</a></li>
                  <li><a href="blog-detail.html">Blog Detail</a></li>
                </ul>-->
              </li> 
              <li><a href="contact.html">Contato</a></li>
            </ul>
          </div>
        </nav>
        <div class="top-right-box">
          <div class="burger-nav">
            <div class="tl-burger-nav">
              <div id="tl_side-menu-btn" class="cp_side-menu"><a href="#" class=""><i class="fa fa-align-justify" aria-hidden="true"></i></a></div>
              
              <!--SIDEBAR MENU START-->
              <div id="tl_side-menu"> <a href="#" id="tl-close-btn" class="crose"><i class="fa fa-close"></i></a>
                <div class="content mCustomScrollbar">
                  <div id="content-1" class="content">
                    <div class="tl_side-navigation">
                      <nav>
                        <ul class="navbar-nav">
                          <li class="active"><a href="index.html">Inicio</a>
                          </li>
                          
                          <li><a href="event.php">Eventos</a></li>
                          <li class="dropdown"><a href="menu.html">Drinks</a></li>
                          <li class="dropdown"><a href="albuns/album.php">Galeria</a>
                          </li>
                          <li><a href="pedido.php">Pedidos</a></li>
                          <li><a href="contact.html">Contato</a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
                <div class="sidebar-social">
                  <ul>
                    <li><a href="https://www.facebook.com/Royal-Scoth-Bar-1215622748457446/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                    
                  </ul>
                </div>
              </div>
              <!--SIDEBAR MENU END--> 
              
            </div>
          </div>
          <div class="tl_search_holder">
            <button id="trigger-overlay" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
          </div>
        </div>
      </div>
    </div>
    <!--Navigation Row End--> 
    
    <!--Search Bar Holder Start-->
    <div class="overlay overlay-contentscale">
      <button type="button" class="overlay-close">Fechar</button>
      <div class="tl_search_inner">
        <form method="get">
          <input type="text" placeholder="Enter your search" required>
          <button class="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
    <!--Search Bar Holder End--> 
  </header>
  <!--HEADER--> 
  
  <!--Inner BANNER-->
  <div id="inner-banner">
    <div class="container">
      <h1>menu</h1>
      <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active">Menu</li>
      </ol>
    </div>
  </div>
  <!--Inner BANNER--> 
  
  <!--Main-->
  <div id="main"> 
    
    <div class="container">
        <div class="bartender-detail">
          <form  id="register-form" onsubmit="gravar();return false;"  name="f1">
            <strong class="title">Formulário de Cadastro</strong>
            <div class="row">
              <div class="col-md-12 col-sm-4">
                <input required pattern="[a-zA-Z ]+" name="nome" type="text" placeholder="Nome">
              </div>
			  <div class="col-md-12 col-sm-4">
                <input onblur="return verificarCPF(this.value)" required name="cpf" type="text" placeholder="CPF">
              </div>
              <div class="col-md-12 col-sm-4">
                <input required name="email" type="email" placeholder="Email">
              </div>
              <div class="col-md-12 col-sm-4">
                <input required name="endereco" type="text" placeholder="Endereço - Formato: Rua e n° / Bairro ">
              </div>
             
              <div class="col-md-12">
                <div class="btn-row">
                  <input value="Cadastrar" type="submit">
                </div>
              </div>
            </div>
          </form>
        </div>
		
		
		
		
		   <div class="bartender-detail">
          
		  <form  id="served-form" onsubmit="pedir();return false;"  name="f1">
		  <strong class="title">Formulário de Pedido</strong>
		  
		  <div class="row">
		  <div class="col-md-12 col-sm-4">
            <input onblur="return verificarCPF(this.value)" required name="cpf" type="text" placeholder="CPF">
          </div>
		   <div class="col-md-12 col-sm-4">
            <textarea required name="txtarea" placeholder="Escreva seu pedido aqui" ></textarea>
          </div>
		   <strong class="title">Veja nosso cardápio abaixo:</strong>
		 
		 
		  <div class="btn-row">
			<input type="submit" value="Enviar Pedido">
		  </div>
		  </div>
		  
		</form>
		 <div class="col-md-12 col-sm-4">
			
			<center>
            <iframe scrolling="no" src="carousel/pag.php"  width="800px" height="400px" style="border:0"></iframe>
			</center>
		  </div>
		<!---->

		<!---->
        </div>
		
		
		<script type="text/javascript">

		 function gravar(){

			$.ajax({
				method: "post",
				url: "valida_cadastro_cliente.php",
				data: $("#register-form").serialize(),
			success: function(data){
					   alert("Cadastro efetuado com sucesso !");
			}
			

		});
		}
		
	 function pedir(){

			$.ajax({
				method: "post",
				url: "valida_cadastro_pedido.php",
				data: $("#served-form").serialize(),
			success: function(data){
					   alert("Pedido efetuado com sucesso !");
			},
			error: function() {
			alert("Faio");
			}
			

		});
		}
	</script>
		
		
		
      </div>
    
    <!--PARALLAX SECTION-->
  
    <!--PARALLAX SECTION--> 
  </div>
  <!--Main--> 
  
  <!--Footer-->
  <footer id="footer"> <strong class="footer-logo"><a href="index-2.html"><img src="images/logo.png" alt=""></a></strong>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <address>
          <p><span>Contato</span> +55 37 9 99865 0291</p>
          </address>
        </div>
        <div class="col-md-4">
          <address>
          <p><span>Endereço</span> Rua Rodolfo José Chaves - Bambuí MG</p>
          </address>
        </div>
        <div class="col-md-4">
          <address>
          <p><span>Email</span> <a href="mailto:">royalstore@royalstore.com</a></p>
          </address>
        </div>
      </div>
      <strong class="copyrights">Royal Store &copy; 2017 Todos os direitos reservados <a href="#">Termo de uso</a> e Desenvolvido por:  <a href="https://www.facebook.com/anderson.augusto.716195">Anderson Rezende</a></strong>
      <div class="footer-social">
        <ul>
          <li><a href="https://www.facebook.com/Royal-Scoth-Bar-1215622748457446/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        </ul>
      </div>
    </div>
  </footer>
  <!--Footer--> 
</div>
<!---JQuery-1.11.3.js--> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!---Bootstrap.js--> 
<script src="js/bootstrap.min.js"></script> 
<!---Owl Carousel.js--> 
<script src="js/owl.carousel.min.js"></script> 
<!---Modernizr Script.js--> 
<script src="js/modernizr.custom.js"></script> 
<!---Search Script.js--> 
<script src="js/search_script.js"></script> 
<!---PrettyPhoto.js--> 
<script src="js/jquery.prettyPhoto.js"></script> 
<!---Custom Script.js--> 
<script src="js/custom_script.js"></script>


			

</body>

<!-- Mirrored from themelooper.com/html/jz/menu.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Oct 2017 16:33:59 GMT -->
</html>

