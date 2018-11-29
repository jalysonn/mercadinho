<html>
 <head>
  
  <title>Exibir dados com PHP/MySql</title>

 </head>
<body>

<h4>Clientes</h4><br><br><br>

<?php

$servidor = "localhost"; 
$usuario = "root"; 
$senha = ""; 
$banco = "mercadinho"; 

$conexao = mysqli_connect($servidor,$usuario,$senha,$banco); 


$res = mysqli_query($conexao,"select * from clientes"); 

echo "<div id='container'><table class='bordered striped centered'><thead><tr><th>Nome</th><th>Cidade</th></tr></thead>";


while($escrever=mysqli_fetch_assoc($res)){


echo "<tbody><tr><td>" . $escrever['nome'] . "</td><td>" . $escrever['cidade'] . "</td><td></tbody>";

}

echo "</table></div>"; 
mysqli_close($conexao);

?>

</body>
</html>