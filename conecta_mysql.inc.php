<html>
<head>
	<title>Conexão</title>
	<meta charset="utf-8">
</head>
<body>
<?php
  
  $conexao = mysql_connect("localhost", "root","", "bdpifinal");
  //mysqli_select_db("$conexao","bdpifinal");
  // mysqli_connect_errno - devolve o código do erro
if (mysqli_connect_errno()) {
	  // mysqli_connect_error - devolve a mensagem de erro
	  printf("Erro ao conectar ao banco de dados: %s<br> ", mysqli_connect_error() );
	  exit();
}
?>
</body>
</html>