<html>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Exibir dados com PHP/MySql</title>


  </script>
 </head>
<body>

<h4>Cadastrar Vendas</h4><br><br><br>

<?php

$servidor = "localhost"; /*maquina a qual o banco de dados está*/
$usuario = "root"; /*usuario do banco de dados MySql*/
$senha = ""; /*senha do banco de dados MySql*/
$banco = "mercadinho"; /*seleciona o banco a ser usado*/

$conexao = mysqli_connect($servidor,$usuario,$senha,$banco);  
?>

<form method="post" action="cadastroVenda.php">


Data compra: <input type="text" name="datacompra"></br>

Valor da venda: <input type="text" name="valorvenda"></br>


Quantidade: <input type="number" name="qtdvendida" min="1" stage="1"></br>


<?php

$res = mysqli_query($conexao,"select * from produtos");
echo "Escolha o produto: <select name='produto'>";

  while($escrever=mysqli_fetch_assoc($res)){
    
      echo '<option value='.$escrever["idprodutos"].'>'. $escrever['nome'].' </option>';
  //implode('/',array_reverse(explode('-',$date)));
  }
echo "</select></div><br>";

$resc = mysqli_query($conexao,"select * from clientes");
echo "Escolha o cliente: <select name='cliente'>";

  while($mostrar=mysqli_fetch_assoc($resc)){

      
    echo "<option value=".$mostrar['idclientes'].">" . $mostrar['nome'] . "</option>";
    //implode('/',array_reverse(explode('-',$date)));
  } 
echo "</select>";
echo "<input type='submit' value='Enviar'>";

mysqli_close($conexao);

?>     
</form>
</body>
</html>



