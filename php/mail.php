<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$motivo = $_POST['motivo'];
$msg = $_POST['msg'];

$to = "contato@funcionalstudio.com.br";
$subject = $motivo;
$txt = 'Nome: '.$nome.'\n Mensagem: '.$msg;
$txt = wordwrap($txt,70);
$headers = "From: ".$email;

if(mail($to,$subject,$txt,$headers)){
	echo "<script>alert('E-mail enviado com sucesso!');window.location.href='http://'+window.location.hostname+'/contato.html';</script>";
}else{
	echo "<script>alert('Erro ao enviar o e-mail. Tente novamente por favor.');window.location.href='http://'+window.location.hostname+'/contato.html';</script>";
}
?>