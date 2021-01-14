<html>
	<head>
		<title> Lista de Produtos</title>
		<meta charset="utf-8">
	</head>
	
<body>
	
		<h2 align="center">Lista de Produtos</h2><hr>
		<div align="center">
		<center>
		<table border="1" cellpadding="0" cellspacing="0" width="90%">
		<tr>
		<td width="10%" bgcolor="#EEEEEE" align="center">
		<p align="center"><b><a href="listar.php?ordem=pk_produto">Código</a></b></td>
		<td width="25%" bgcolor="#EEEEEE" align="center"><b><a href="listar.php?ordem=nome_produto">Nome</a></b></td>
		<td width="40%" bgcolor="#EEEEEE" align="center"><b><a href="listar.php?ordem=descricao">Descrição</a></b></td>
		<td width="14%" bgcolor="#EEEEEE" align="center"><b><a href="listar.php?ordem=valor_produto">Preço</a></b></td>
		<td width="11%" bgcolor="#EEEEEE" align="center"><b><a href="listar.php?ordem=pk_tipo_produto">Categoria</a></b></td>
		</tr>

<?php
include"conecta_mysql.inc.php";
if(isset($_GET["ordem"]))
	$ordem = $_GET["ordem"];
else
	$ordem ="pk_produto";

$sql = "SELECT * FROM tab_produto ORDER BY $ordem";
$res = mysql_query($sql);

while($registro=mysql_fetch_row($res))
{
	$codigo=$registro[0];
	$nome=$registro[1];
	$descricao=$registro[2];
	$preco=$registro[3];
	$categoria=$registro[4];
	echo"<tr>";
	echo"<td width='10%'>";
	echo"<p align='center'>$codigo</td>";
	echo"<p width='25%'>$nome</td>";
	echo"<p width='40%'>$descricao</td>";
	echo"<p width='14%' align='center'>R\$$preco</td>";
	echo"<p width='11%' align='center'>$categoria</td>";
	echo"</tr>";
}
mysql_close($conexao);
?>		
</table>
</center>
</div>
<p align="center"><a href="menu.html">Voltar</a></p>
</body>	
</html>