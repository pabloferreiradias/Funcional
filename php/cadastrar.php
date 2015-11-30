<?php
include ("config/connect.php");

$sql = "INSERT INTO usuarios (nome, sobrenome, email, telefone, senha)
VALUES ('".$_POST["nome"]."', '".$_POST["sobrenome"]."', '".$_POST["email"]."', '".$_POST["telefone"]."', '".$_POST["senha"]."')";

$result = $conn->query($sql);
if ($result === TRUE) {
	if (isset($_POST["checkbox"])){
		if($_POST["checkbox"]){
			$sql = "INSERT INTO newsletter (nome, email)
			VALUES ('".$_POST["nome"]."', '".$_POST["email"]."')";
			$conn->query($sql);
		}
	}
	echo "<script>alert('Novo cadastro realizado com sucesso!');window.location.href='http://'+window.location.hostname+'/login.html';</script>";
} else {
	echo "<script>alert('Erro no cadastro, tente novamente.');window.location.href='http://'+window.location.hostname+'/login.html';</script>";
}

$conn->close();

?>