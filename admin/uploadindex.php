<?php
if (!isset($_GET["id"])){
	echo "<script>alert('Usario não encontrado.');window.location.href='http://'+window.location.hostname+'/admin/adminindex.php';</script>";
}
session_start();
if (!isset($_SESSION["emailAdmin"])){
	echo "<script>alert('Usario não encontrado.');window.location.href='http://'+window.location.hostname+'/admin';</script>";
}
$usuario['nome'] = $_SESSION["nomeAdmin"];
$usuario['email'] = $_SESSION["emailAdmin"];

include ("../php/config/connect.php");

$sql = "SELECT * FROM usuarios WHERE id='".$_GET['id']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$aluno = $result->fetch_assoc();
}
$conn->close();

if ($aluno["avaliacao"] == null){
	$arquivo = "Sem arquivo de avaliação";
}else{
	$nomeArquivo = str_replace(' ', '', $usuario["nome"]);
	$nomeArquivo = preg_replace('/[^A-Za-z0-9]/', '', $nomeArquivo);
	$arquivo = '<a href="arquivos/'.$aluno["avaliacao"].'" download="Avaliacao_'.$nomeArquivo.'">Baixe o arquivo aqui.</a></p><p>
	<form action="deleteArquivo.php" method="post"><input type="submit" name="submit" value="Deletar" /><input type="hidden" name="id" value="'.$aluno["id"].'" /></form>';
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
	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="../css/style.css" rel='stylesheet' type='text/css' />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--<link href="style.css" type="text/css" rel="stylesheet" />	-->
	<script src="http://code.jquery.com/jquery-2.1.1.js"></script>
</head>
<body>
	<!-- start header_bottom -->
	<div class="header-bottom">
		<div class="container">
			<div class="header-bottom_left">
				<i class="phone"> </i><span>(19) 3295-4519 | <img src="../images/whats.png" alt="whatsapp" /> 9 8301-0406</span>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="main" style="height:600px;">
		<div class="login_top">
			<div class="container">
				<div class="col-md-12">
					<div class="login-page">
						<h4 class="title">Aluno:</h4>
						<p>Nome: <?php echo $aluno["nome"] ." ". $aluno["sobrenome"]; ?></p>
						<p>Avaliação: <?php echo $arquivo; ?></p>
					</div>
					<div class="login-page">
						<form action="upload.php" method="post" enctype="multipart/form-data">
							<label for="file">Arquivo:</label>
							<input type="file" name="file" id="file" /> 
							<br />
							<input type="submit" name="submit" value="Enviar" />
							<input type="hidden" name="id" value="<?php echo $aluno["id"]; ?>" />
							<input type="hidden" name="nome" value="<?php echo $aluno["nome"]; ?>" />
							<input type="hidden" name="sobrenome" value="<?php echo $aluno["sobrenome"]; ?>" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="container">
			<div class="copy">
				<p>© 2015 Todos os direitos reservados a Funcional Studio | Desenvolvido por <a href="http://www.optimus.adv.br" target="_blank"> Optimus Tecnologia Jurídica</a></p>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</body>
</html>