<html>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Exibir dados com PHP/MySql</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
 </head>
<body>

<h4>Produtos</h4><br><br><br>

<?php

$servidor = "localhost"; /*maquina a qual o banco de dados está*/
$usuario = "root"; /*usuario do banco de dados MySql*/
$senha = ""; /*senha do banco de dados MySql*/
$banco = "mercadinho"; /*seleciona o banco a ser usado*/

$conexao = mysqli_connect($servidor,$usuario,$senha,$banco);  /*Conecta no bando de dados MySql*/

//mysql_select_db($banco); /*seleciona o banco a ser usado*/

$res = mysqli_query($conexao,"select * from produtos"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

echo "<div id='container'><table class='bordered striped centered'><thead><tr><th>Nome_Produto</th><th>Preço</th><th>Qtd. Estoque</th></tr></thead>";

/*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
while($escrever=mysqli_fetch_assoc($res)){

	if($escrever['qtdestoque']<=2){
			$statusEstoque =  '<font color="red">'.$escrever['qtdestoque'].'</font>';	
	echo "<tbody><tr><td>" . $escrever['nome'] . "</td><td>" . $escrever['preco'] . "</td><td>". $statusEstoque . "</td><td></tbody>";
	}else{
	echo "<tbody><tr><td>" . $escrever['nome'] . "</td><td>" . number_format($escrever['preco'],2,',','.') . "</td><td>". $escrever['qtdestoque'] . "</td><td></tbody>";
	}
}/*Fim do while*/

echo "</table></div>"; /*fecha a tabela apos termino de impressão das linhas*/

mysqli_close($conexao);

?>		 

</body>
</html>