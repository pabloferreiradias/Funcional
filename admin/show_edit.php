<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT * FROM usuarios WHERE id='" . $_GET["id"] . "'");
?>
<td colspan=6 class="edit-form">
<form name="frmUsuarios" method="post" action="" id="frmUsuarios">
<div>
<label style="padding-top:20px;">Nome</label>
<span id="nome-info" class="info"></span><br/>
<input type="text" name="nome" id="add-nome" class="demoInputBox" value="<?php echo $result[0]["nome"]; ?>">
</div>
<div>
<label>Sobrenome</label>
<span id="sobrenome-info" class="info"></span><br/>
<input type="text" name="sobrenome" id="add-sobrenome" class="demoInputBox" value="<?php echo $result[0]["sobrenome"]; ?>">
</div>
<div>
<label>Email</label> 
<span id="email-info" class="info"></span><br/>
<input type="text" name="email" id="email" class="demoInputBox" value="<?php echo $result[0]["email"]; ?>">
</div>
<div>
<label>Telefone</label> 
<span id="telefone-info" class="info"></span><br/>
<input type="text" name="telefone" id="telefone" class="demoInputBox" value="<?php echo $result[0]["telefone"]; ?>">
</div>
<div>
<label>Senha</label> 
<span id="senha-info" class="info"></span><br/>
<input type="text" name="senha" id="senha" class="demoInputBox" value="<?php echo $result[0]["senha"]; ?>">
</div>
<div>
<input type="button" name="submit" id="btnAddAction" value="Save" onClick="edit(<?php echo $result[0]["id"]; ?>);" />
</div>
</form>
</td>