<html>
	<head>
	<title>PHP CRUD with Search and Pagination</title>
	<link href="style.css" type="text/css" rel="stylesheet" />	
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
	</head>
	<body>


		<div style="text-align:right;margin:20px 0px 10px;">
		<a id="btnAddAction" onClick="$('#add-form').show();">Adionar</a>
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
		
	</body>
</html>