<?php
require_once("dbcontroller.php");
require_once("pagination.class.php");
$db_handle = new DBController();

$nome = "";
$sobreNome = "";

$perPage = new PerPage();

$queryCondition = "";
if(!empty($_POST["nome"])) {
$queryCondition .= " WHERE nome LIKE '" . $_POST["nome"] . "%'";
}

if(!empty($_POST["sobreNome"])) {
if(!empty($queryCondition)) {
	$queryCondition .= " AND ";
} else {
	$queryCondition .= " WHERE ";
}
$queryCondition .= " sobrenome LIKE '" . $_POST["sobrenome"] . "%'";
}

$orderby = " ORDER BY id desc";
$sql = "SELECT * FROM usuarios " . $queryCondition;
$paginationlink = "getresult.php?page=";					
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . $orderby .  " limit " . $start . "," . $perPage->perpage; 
$result = $db_handle->runQuery($query);

if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = $db_handle->numRows($sql);
}
$perpageresult = $perPage->perpage($_GET["rowcount"], $paginationlink);
?>
<form name="frmSearch" method="post" action="index.php">
			<div class="search-box">
			<p><input type="hidden" id="rowcount" name="rowcount" value="<?php echo $_GET["rowcount"]; ?>" /><input type="text" placeholder="nome" name="nome" id="nome" class="demoInputBox" value="<?php echo $nome; ?>"	/><input type="text" placeholder="sobrenome" name="sobrenome" id="sobrenome" class="demoInputBox" value="<?php echo $sobreNome; ?>"	/><input type="button" name="go" class="btnSearch" value="Search" onclick="getresult('<?php echo $paginationlink . $page; ?>')"><input type="reset" class="btnSearch" value="Reset" onclick="window.location='index.php'"></p>
			</div>
			
			<table cellpadding="10" cellspacing="1">
        <thead>
					<tr>
          <th><strong>Nome</strong></th>
          <th><strong>Sobrenome</strong></th>          
          <th><strong>Email</strong></th>
					<th><strong>Telefone</strong></th>
					<th><strong>Senha</strong></th>
					<th><strong>Ação</strong></th>
					
					</tr>
				</thead>
				<tbody>
<?php
if(!empty($result)) {
foreach($result as $k=>$v) {
?>
<tr id="usuarios-<?php echo $result[$k]["id"]; ?>">
<td class="nome"><?php echo $result[$k]["nome"]; ?></td>
<td class="sobrenome"><?php echo $result[$k]["sobrenome"]; ?></td>
<td class="email"><?php echo $result[$k]["email"]; ?></td>
<td class="telefone"><?php echo $result[$k]["telefone"]; ?></td>
<td class="senha"><?php echo $result[$k]["senha"]; ?></td> 
<td class="action">
<a class="btnEditAction" onClick="showEdit(<?php echo $result[$k]["id"]; ?>)">Edit</a> <a class="btnDeleteAction" onClick="del(<?php echo $result[$k]["id"]; ?>)">Delete</a>
</td>
</tr>
<?php
}}
if(isset($perpageresult)) {
?>
<tr>
<td colspan="6" align=right> <?php echo $perpageresult; ?></td>
</tr>
<?php } ?>
<tbody>
</table>
</form>	