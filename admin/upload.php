<?php
$msg = '';
if ($_FILES["file"]["error"] > 0)
{
  echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}
else
{   
  if (file_exists("../admin/arquivos/" . $_FILES["file"]["name"])) {
    $msg .= 'Arquivo substituido! ';
    unlink($_FILES["file"]["name"]);
  }
  $novoNome = $_POST["id"]."_".$_POST["nome"]."_".$_POST["sobrenome"];
  $temp = explode(".", $_FILES["file"]["name"]);
  $newfilename = $novoNome . '.' . end($temp);
  move_uploaded_file($_FILES["file"]["tmp_name"], "../admin/arquivos/" . $newfilename);
  
  include ("../php/config/connect.php");

  $sql = "UPDATE usuarios SET avaliacao = '" . $newfilename . "' WHERE id=".$_POST['id']."";

  if ($conn->query($sql) === TRUE) {
    $conn->close();
    $msg .= 'Arquivo enviado com sucesso!';
    
  } else {
    $msg .= 'Erro no upload.';
    $conn->close();
  }

  echo "<script>alert('".$msg."');window.location.href='http://'+window.location.hostname+'/admin/uploadindex.php?id=".$_POST["id"]."';</script>";

}
?>