<?php
session_start();
if (!isset($_SESSION["emailAdmin"])){
	echo "<script>alert('Usario não encontrado.');window.location.href='http://'+window.location.hostname+'/admin';</script>";
}
$usuario['nome'] = $_SESSION["nomeAdmin"];
$usuario['email'] = $_SESSION["emailAdmin"];

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
	<script>
	function getresult(url) {    
		$.ajax({
			url: url,
			type: "POST",
			data:  {rowcount:$("#rowcount").val(),nome:$("#nome").val(),sobrenome:$("#sobrenome").val()},
			success: function(data){ $("#usuarios-grid").html(data); $('#add-form').hide();}
		});
	}
	getresult("getresult.php");
	function add() {
		var valid = validate();
		if(valid) {
			$.ajax({
				url: "add.php",
				type: "POST",
				data:  {nome:$("#add-nome").val(),sobrenome:$("#add-sobrenome").val(),email:$("#email").val(),telefone:$("#telefone").val(),senha:$("#senha").val()},
				success: function(data){ getresult("getresult.php"); }
			});
		}
	}
	function showEdit(id) {
		$.ajax({
			url: "show_edit.php?id="+id,
			type: "POST",
			success: function(data){ $("#usuarios-"+id).html(data); }
		});
	}
	function edit(id) {
		var valid = validate();
		if(valid) {
			$.ajax({
				url: "edit.php?id="+id,
				type: "POST",
				data:  {nome:$("#add-nome").val(),sobrenome:$("#add-sobrenome").val(),email:$("#email").val(),telefone:$("#telefone").val(),senha:$("#senha").val()},
				success: function(data){ $("#usuarios-"+id).html(data); }
			});
		}
	}	
	function del(id) {
		$.ajax({
			url: "delete.php?id="+id,
			type: "POST",
			success: function(data){ $("#usuarios-"+id).html(''); }
		});
	}
	function validate() {
		var valid = true;	
		$(".demoInputBox").css('background-color','');
		$(".info").html('');
		
		if(!$("#add-nome").val()) {
			$("#nome-info").html("(required)");
			$("#add-nome").css('background-color','#FFFFDF');
			valid = false;
		}
		if(!$("#add-sobrenome").val()) {
			$("#sobrenome-info").html("(required)");
			$("#add-sobrenome").css('background-color','#FFFFDF');
			valid = false;
		}
		if(!$("#email").val()) {
			$("#email-info").html("(required)");
			$("#email").css('background-color','#FFFFDF');
			valid = false;
		}
		if(!$("#telefone").val()) {
			$("#telefone-info").html("(required)");
			$("#telefone").css('background-color','#FFFFDF');
			valid = false;
		}	
		if(!$("#senha").val()) {
			$("#senha-info").html("(required)");
			$("#senha").css('background-color','#FFFFDF');
			valid = false;
		}	
		return valid;
	}
	</script>
	<style>
	.login-page{
		color:#000;
	}
	</style>
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
				<div class="col-md-6">
					<div class="login-page">
						<h4 class="title">Dados:</h4>
						<p>Nome: <?php echo $usuario["nome"]; ?></p>
						<p>Email: <?php echo $usuario["email"]; ?></p>
						<div class="button1">
							<a href="../php/logoff.php"><input type="submit" name="Submit" value="Sair"></a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="login-page">
						<h4 class="title">Alunos:</h4>
						<div style="text-align:right;margin:20px 0px 10px;">
							<a id="btnAddAction" onClick="$('#add-form').show();">Adicionar</a>
						</div>
						<div id="usuarios-grid">
							<input type="hidden" name="rowcount" id="rowcount" />					
						</div>
						<div id="add-form">
							<form name="frmUsuarios" method="post" action="" id="frmUsuarios">
								<div>
									<label style="padding-top:20px;">Nome</label>
									<span id="nome-info" class="info"></span><br/>
									<input type="text" name="nome" id="add-nome" class="demoInputBox">
								</div>
								<div>
									<label>Sobrenome</label>
									<span id="sobrenome-info" class="info"></span><br/>
									<input type="text" name="sobrenome" id="add-sobrenome" class="demoInputBox">
								</div>
								<div>
									<label>Email</label> 
									<span id="email-info" class="info"></span><br/>
									<input type="text" name="email" id="email" class="demoInputBox">
								</div>
								<div>
									<label>Telefone</label> 
									<span id="telefone-info" class="info"></span><br/>
									<input type="text" name="telefone" id="telefone" class="demoInputBox">
								</div>
								<div>
									<label>Senha</label> 
									<span id="senha-info" class="info"></span><br/>
									<input type="text" name="senha" id="senha" class="demoInputBox">
								</div>
								<div>
									<input type="button" name="submit" id="btnAddAction" value="Add" onClick="add();" />
								</div>
							</form>
						</div>	
					</div>
					<div class="clear"></div>
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