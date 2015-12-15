<?php

session_start();
if (!isset($_SESSION["email"])){
	echo "<script>alert('Usario não encontrado.');window.location.href='http://'+window.location.hostname+'/login.html';</script>";
}
$usuario['nome'] = $_SESSION["nome"];
$usuario['sobrenome'] = $_SESSION["sobrenome"];
$usuario['telefone'] = $_SESSION["telefone"];
$usuario['email'] = $_SESSION["email"];
if (isset($_SESSION["avaliacao"])){
	$usuario["avaliacao"] = $_SESSION["avaliacao"];
}else{
	$usuario["avaliacao"] = null;
}

if ($usuario["avaliacao"] == null){
	$arquivo = "Sem arquivo de avaliação";
}else{
	$arquivo = '<a href="admin/arquivos/'.$usuario["avaliacao"].'" download="'.$usuario["avaliacao"].'">Baixe o arquivo aqui.</a>';
}

?>

<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>Funcional Studio | Login</title>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="js/jquery.min.js"></script>
</head>
<body>
	<!-- start header_bottom -->
	<div class="header-bottom">
		<div class="container">
			<div class="header-bottom_left">
				<i class="phone"> </i><span>(19) 3295-4519 | <img src="images/whats.png" alt="whatsapp" /> 9 8301-0406</span>
			</div>
			<div class="social">	
				<ul>	
					<li class="facebook"><a href="#"><span> </span></a></li>
					<li class="twitter"><a href="#"><span> </span></a></li>
					<li class="pinterest"><a href="#"><span> </span></a></li>	
					<li class="google"><a href="#"><span> </span></a></li>
					<li class="tumblr"><a href="#"><span> </span></a></li>
					<li class="instagram"><a href="#"><span> </span></a></li>	
					<li class="rss"><a href="#"><span> </span></a></li>							
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!-- start menu -->
	<div class="menu">
		<div class="container">
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" alt=""/></a>
			</div>
			<div class="h_menu4"><!-- start h_menu4 -->
				<a class="toggleMenu" href="#">Menu</a>
				<ul class="nav">
					<li class="active"><a href="index.html">Home</a></li>
					<li><a href="depoimentos.html">Depoimentos</a></li>
					<li><a href="horarios.html">Horários</a></li>
					<li><a href="modalidades.html">Modalidades</a></li>
					<li><a href="planos.html">Planos</a></li>
					<li><a href="contato.html">Contato</a></li>
					<li><a href="login.html">Área do Cliente</a></li>
				</ul>
				<script type="text/javascript" src="js/nav.js"></script>
			</div><!-- end h_menu4 -->
			<div class="clear"></div>
		</div>
	</div>
	<!-- end menu -->
	<div class="main">
		<div class="login_top">
			<div class="container">
				<div class="col-md-6">
					<div class="login-page">
						<h4 class="title">Dados:</h4>
						<p>Nome: <?php echo $usuario["nome"] .' '.$usuario["sobrenome"]; ?></p>
						<p>Email: <?php echo $usuario["email"]; ?></p>
						<p>Telefone: <?php echo $usuario["telefone"]; ?></p>
						<div class="button1">
							<a href="php/logoff.php"><input type="submit" name="Submit" value="Sair"></a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="login-page">
						<h4 class="title">Download:</h4>
						<p><?php echo arquivo; ?></p>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="row section group">
				<div class="col-md-4">
					<h4 class="m_7">Cadastre-se</h4>
					<p class="m_8">Receba nossos e-mails com dicas e informações sobre saúde e atividade física.</p>
					<form class="subscribe">
						<input type="text" value="Digite seu e-mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Insert Email';}">
					</form>
					<div class="subscribe1">
						<a href="#">Enviar e-mail<i class="but_arrow"> </i></a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="f-logo">
						<img src="images/logo.png" alt=""/>
					</div>
					<p class="m_9">Nosso diferencial está na qualidade técnica e na experiência de quase uma década e também na alegria e satisfação em fazer o que amamos e praticar o que acreditamos!</p>
					<p class="address">Telefones : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="m_10">(19) 3295-4519 | 9 8301-0406</span></p>
					<p class="address">E-mail : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="m_10">contato@funcionalstudio.com.br</span></p>
				</div>
				<div class="col-md-4">
					<ul class="list">
						<h4 class="m_7">Menu</h4>
						<li><a href="#">Home</a></li>
						<li><a href="#">Depoimentos</a></li>
						<li><a href="#">Horários</a></li>
						<li><a href="#">Modalidades</a></li>
						<li><a href="#">Planos</a></li>
						<li><a href="#">Contato</a></li>
					</ul>
					<ul class="list1">
						<h4 class="m_7">INFORMATIVOS</h4>
						<li><a href="login.html">Área do Cliente</a></li>
						<li><a href="#">Newsletter</a></li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="container">
			<div class="copy">
				<p>© 2015 Todos os direitos reservados a Funcional Studio | Desenvolvido por <a href="http://www.optimus.adv.br" target="_blank"> Optimus Tecnologia Jurídica</a></p>
			</div>
			<div class="social">	
				<ul>	
					<li class="facebook"><a href="#"><span> </span></a></li>
					<li class="twitter"><a href="#"><span> </span></a></li>
					<li class="pinterest"><a href="#"><span> </span></a></li>	
					<li class="google"><a href="#"><span> </span></a></li>
					<li class="tumblr"><a href="#"><span> </span></a></li>
					<li class="instagram"><a href="#"><span> </span></a></li>	
					<li class="rss"><a href="#"><span> </span></a></li>							
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</body>
</html>