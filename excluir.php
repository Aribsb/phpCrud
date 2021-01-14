<html>
	<head>
		<title> Exclusão de Produtos </title>
		<meta charset="utf-8">
	</head>
	
	<body>
	
		<h2 align="center"> Exclusão de Produtos </h2><hr>
<?php
if(!isset($_POST["codigo"])
{
?>

		<form method="POST" action="excluir.php">
		<p>Código do produto:<input type="text" name="codigo" size="20">
		<input type="submit" value="EXCLUIR PRODUTO" name="exclui"></p>
		</form>
	
<?php
}
else // exclui o produto 
{
	include "conecta_mysql.inc";
	$codigo=$_POST["codigo"];
	$res = mysql_query("DELETE FROW tab_produto WHERE pk_produto=$codigo");
	
	if(mysql_affected_rows()==1)
		echo"<p align='center'>Produto excluido com sucesso!</p>";
	else
		echo"<p align='center'>Produto não encontrado!</p>";
	mysql_close($conexao)
}
?>
<p align="center"><a href="javascript:history.back();">Voltar</a></p>
	
	</body>
	
</html>