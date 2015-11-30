<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
mysql_query("UPDATE usuarios set nome = '".$_POST["nome"]."', sobrenome = '".$_POST["sobrenome"]."', email = '".$_POST["email"]."', telefone = '".$_POST["telefone"]."', senha = '".$_POST["senha"]."' WHERE  id=".$_GET["id"]);
$result = $db_handle->runQuery("SELECT * FROM usuarios WHERE id='" . $_GET["id"] . "'");
?>
<td class="nome"><?php echo $result[0]["nome"]; ?></td>
<td class="sobrenome"><?php echo $result[0]["sobrenome"]; ?></td>
<td class="email"><?php echo $result[0]["email"]; ?></td>
<td class="telefone"><?php echo $result[0]["telefone"]; ?></td>
<td class="senha"><?php echo $result[0]["senha"]; ?></td> 
<td class="action">
<a class="btnEditAction" onClick="showEdit(<?php echo $_GET["id"]; ?>)">Edit</a> <a class="btnDeleteAction" onClick="del(<?php echo $_GET["id"]; ?>)">Delete</a>
</td>