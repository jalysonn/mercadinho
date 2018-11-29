<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>

</body>
</html>

<?php
$servername = "localhost";
$database = "mercadinho";
$username = "root";
$password = "";

	@$datacompra = $_POST['datacompra'];
	@$valorcompra = $_POST['valorvenda'];
	@$qtdvendida  = $_POST['qtdvendida'];
	@$produto = $_POST['produto'];
	@$cliente = $_POST['cliente'];


	#echo $datacompra.$valorcompra.$produto.$cliente;


$conn = mysqli_connect($servername, $username, $password, $database);
$res = mysqli_query($conn,"select * from produtos WHERE idprodutos = $produto");

while($escrever=mysqli_fetch_assoc($res)){

	//atribua 0 a uma variável que vai ser o valor atual do estoque
	//faça a subtração da qtd do estoque - qtd vendida

}
/*echo 'data compra: '.$datacompra.'<br>';
echo 'valor compra '.$valorcompra.'<br>';
echo 'qtd vendida: '.$qtdvendida.'<br>';
echo 'id produto:'.$produto.'<br>';
echo 'id cliente: '.$cliente.'<br>';
echo 'qtd atual estoque '.$qtdAtual.'<br>';*/
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
	
	//faça a decisão de um valor não pode ser maior do que a quantidade no estoque
	
		$sql = "INSERT INTO vendas VALUES ('', '$datacompra', '$valorcompra','$qtdvendida','$cliente','$produto')";

		$sql2 = "UPDATE produtos SET qtdestoque="./* valor do estoque atual*/." WHERE idprodutos = '$produto'";

		if ((mysqli_query($conn, $sql)) && (mysqli_query($conn, $sql2))) {
		      echo "Cadastro realizado com sucesso";
		} else {
		      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
mysqli_close($conn);
?>