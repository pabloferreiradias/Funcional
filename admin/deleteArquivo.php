<?php
include ("../php/config/connect.php");
$sql = "UPDATE usuarios SET avaliacao='' WHERE id=".$_POST['id']."";
if ($conn->query($sql) === TRUE) {
	$msg .= 'Arquivo deletado com sucesso!';
}else {
	$msg .= 'Erro ao deletar.';
}
$conn->close();

echo "<script>alert('".$msg."');window.location.href='http://'+window.location.hostname+'/admin/uploadindex.php?id=".$_POST["id"]."';</script>";

?>