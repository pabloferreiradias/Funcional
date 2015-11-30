<?php
include ("../php/config/connect.php");

function criarSessao($usuario){
	session_start();
	$_SESSION["nomeAdmin"] = $usuario["nome"];
	$_SESSION["emailAdmin"] = $usuario["email"];
}

$sql = "SELECT * FROM admin WHERE email='".$_POST['email']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$row = $result->fetch_assoc();
	if ($_POST['senha'] == $row["senha"]){
		$usuario = $row;
		criarSessao($usuario);
		echo "<script>window.location.href='http://'+window.location.hostname+'/admin/adminindex.php';</script>";
	}else {
		echo "<script>alert('Senha invalida');window.location.href='http://'+window.location.hostname+'/admin';</script>";
	}
} else {
	echo "<script>alert('Usario não encontrado.');window.location.href='http://'+window.location.hostname+'/admin';</script>";
}
$conn->close();
?>