<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$result = mysql_query("INSERT INTO usuarios (nome, sobrenome, email, telefone, senha) VALUES ('".$_POST["nome"]."', '".$_POST["sobrenome"]."', '".$_POST["email"]."', '".$_POST["telefone"]."', '".$_POST["senha"]."')");
?>