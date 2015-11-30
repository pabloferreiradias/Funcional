<?php
include ("config/connect.php");

$sql = "INSERT INTO newsletter (email) VALUES ('".$_POST["email"]."')";

if ($conn->query($sql) === TRUE) {
	echo "<script>alert('Newsletter cadastrada com sucesso!');window.location.href='http://'+window.location.hostname;</script>";
} else {
	echo "<script>alert('Newsletter já cadastrada.');window.location.href='http://'+window.location.hostname;</script>";
}

$conn->close();

?>