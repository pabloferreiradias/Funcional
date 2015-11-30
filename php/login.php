<?php
include ("config/connect.php");

function criarSessao($usuario){
	session_start();
	$_SESSION["nome"] = $usuario["nome"];
	$_SESSION["sobrenome"] = $usuario["sobrenome"];
	$_SESSION["telefone"] = $usuario["telefone"];
	$_SESSION["email"] = $usuario["email"];
	if (isset($usuario["avaliacao"])){
		$_SESSION["avaliacao"] = $usuario["avaliacao"];
	}
}

$sql = "SELECT * FROM usuarios WHERE email='".$_POST['email']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$row = $result->fetch_assoc();
	if ($_POST['senha'] == $row["senha"]){
		$usuario = $row;
		criarSessao($usuario);
		echo "<script>window.location.href='http://'+window.location.hostname+'/userindex.php';</script>";
	}else {
		echo "<script>alert('Senha invalida');window.location.href='http://'+window.location.hostname+'/login.html';</script>";
	}
} else {
	echo "<script>alert('Usario não encontrado.');window.location.href='http://'+window.location.hostname+'/login.html';</script>";
}
$conn->close();
?>