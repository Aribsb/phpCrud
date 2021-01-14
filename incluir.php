<html>
	<head>
		<title> Inclusão de produtos </title>
		<meta charset="utf-8">
	</head>
	
	<body>
	
		<h2 align="center">Inclusão de Produtos</h2><hr>
		
<?php

include"conecta_mysql.inc.php";

if(!isset($_POST["enviar"]))
{
	
?>

<form method="POST" action="incluir.php"><p>
	
	Nome:<input type="text" name="nome" size="30"><br>
	Descrição:<br><textarea rows="2" name="descricao" cols="30">
	</textarea>
	Preço:<input type="text" name="preco" size="10"><br>
	Categoria:<Select size="1" name="categoria">
<?php
//gera a lista de categorias
$res = mysql_query("SELECT * FROW tab_tipo_produto");
while($registro = mysql_fetch_row($res))
{	
	$nome = $registro[1];
	echo"<option value=\"$cod\">$nome</option>\n";
}
?>
</select><br>

<input type="hidden" name="enviar" value="5">
<input type="submit" value="Incluir Produto" name="incluir"></p>
</form>	

<?php
}
else  //inclui o produto
{
	$nome=$_POST["nome"];
	$descricao=$_POST["descricao"];
	$preco=$_POST["preco"];
	$categoria=$_POST["categoria"];
	$res = mysql_query("INSERT INTO tab_produto VALUES('$nome', '$descricao', $preco, $categoria)");
	
	if(mysql_affected_rows()>0)
	{
		echo"<p align='center'>Produto incluido com sucesso! </p>";
	}else
	{
		$erro = mysql_error();
		echo"<p align='center'> Produto incluido com sucesso!</p>";
	}
	
}
mysql_close($conexao);
?>
<p align="center"><a href="javascript:history.back();">Voltar</a></p>
	</body>
</html>