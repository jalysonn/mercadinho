<html>
 <head>

  <title>Exibir dados com PHP/MySql</title>

 </head>
<body>

<h4>Vendas</h4><br><br><br>

<?php

$servidor = "localhost"; 
$usuario = "root"; 
$senha = ""; 
$banco = "mercadinho"; 

$conexao = mysqli_connect($servidor,$usuario,$senha,$banco);

$res = mysqli_query($conexao,"SELECT c.nome as nomec,p.nome as nomep,p.preco as precop,v.qtdvendida as qtdv,v.data_venda as dtv from clientes as c, produtos as p, vendas as v WHERE v.clientes_idclientes = c.idclientes AND v.produtos_idprodutos = p.idprodutos"); 

echo "<div id='container'><table class='bordered striped centered'><thead><tr><th>Nome_Cliente</th><th>Nome_Produto</th><th>Qtd. Vendida</th><th>Data_Compra</th></tr></thead>";

while($escrever=mysqli_fetch_assoc($res)){
	echo "<tbody><tr><td>" . $escrever['nomec'] . "</td><td>" . $escrever['nomep'] . "</td><td>". $escrever['qtdv'] . "</td><td>". implode('/',array_reverse(explode('-',$escrever['dtv']))) . "</td><td></tbody>";

	//Converter a data para o formato brasileiro
	//implode('/',array_reverse(explode('-',$date)));
	}

echo "</table></div>"; 

mysqli_close($conexao);

?>		 

</body>
</html>