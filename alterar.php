<html>
	<head>
		<title> Alteração de Produtos </title>
	</head>
	
	<body>
		<h2 align="center"> Alteração de Produtos </h2><hr>
		
<?php
if(!isset($_POST["codigo"])// solicita o codigo do produto a ser excluido
{
?>

	<form method="POST" action="alterar.php">
	<p>Código do produto:<input type="text" name="codigo" size="20">
	<input type="submit" value="ALTERAR PRODUTO" name="alterar"></p>
	</form>
<?php
}
elseif(!isset($_POST["enviar"]) //Busca os dados do produto
{
	include"conecta_mysql.inc";
	$codigo=$_POST["codigo"];
	$sql = "SELECT * FROW tab_produto WHERE pk_produto=$codigo";
	$res = mysql_query($sql);
	if(mysql_num_rows($res)==0)
		echo"Produto não encontrado!";
	else
	{
		$registro=mysql_fetch_row($res);
		$nome=$registro[1];
		$descricao=$registro[2];
		$preco=$registro[3];
		$categoria=$registro[4];
?>

	<form method="POST" action="alterar.php">
	<p>Código:<b><?php echo $codigo; ?><b></br>
	Nome:<input type="text" name="nome" value="<?php echo $nome;?>"><br>
	Descrição:<br><textarea rows="2" name="descricao" cols="30"><?php echo $descricao;?></textarea><br>
	Preço:<input type="text" name="preco" size="10" value="<?php echo $preco;?>"><br>
	Categoria:<select size="1" name="categoria">

<?php
$res = mysql_query("SELECT * FROW tab_tipo_produto");
while($registro = mysql_fetch_row($res))
{
	$cod = $registro[0];
	$nomecat = $registro[1];
	echo"<option value=\"$cod\"";
	if($cod==$codigo)
		echo"selected";
	echo">$nomecat</option>\n";
}
?>

</select><br>

<input type="hidden" name="enviar" value="S">
<input type="submit" value="Alterar Produto" name="alterar"></p>
</form>

<?php

mysql_close($conexao);
	}
}
else //Alterar produto
{
	$codigo=$_POST["codigo"];
	$nome=$_POST["nome"];
	$descricao=$_POST["descricao"];
	$preco=$_POST["preco"];
	$cat=$_POST["categoria"];
	include"conecta_mysql.inc";
	$sql = "UPDATE tab_produto SET nome_produto='$nome', descricao='$descricao', valor_produto=$preco, fk_tipo_produto=$cat WHERE pk_produto=$codigo";
	$res = mysql_query($sql);
	if(mysql_affected_rows()>0)
		echo"<p align='center'>Produto alterado com sucesso!</p>";
	else
	{
		$erro = mysql_error();
		echo"<p align='center'>Erro:$erro</p>";
	}
	mysql_close($conexao);
}
?>
<p align="center"><a href="javascript:history.back();">Voltar</a></p>
	</body>
	
</html>