<?php

/*
Bem Vindo ao Explorer com ele você vai poder consultar tuplas de diversas bases de dados utilizando o PHP.
para que você possa fazer a navegação deve seguir está lógica..

(URL)+index.php?base=(nome do banco)&&tabela=(nome da tabela)
Exemplo: 
http://meusite/index.php?base=compras&&tabela=vendas 

*/

//Informações de acesso ao banco de dados
$servidor = "localhost"; // Defino o meu servidor
$usuario = "root"; // Defino o meu usuário
$senha = ""; // Defino a minha senha
$base = $_GET['base']; // Recebendo a URL parametro Base padrão

// Realizando o acesso ao Banco de Dados.
$connect = mysqli_connect($servidor, $usuario, $senha, $base);

// Caso der errado me mostre o erro
if(mysqli_connect_error()):
	echo "Erro na conexão: ".mysqli_connect_error();
endif;

// Recebendo a URL parametro Tabela padrão
$tabela = $_GET['tabela'];


$sql = "DESCRIBE $tabela"; // Utilizando uma consulta com a URL
$resultado = mysqli_query($connect, $sql); // Enviando consulta ao Banco de Dados

$n=0; // Nosso ponto inicial tem a missão de verificação 

// var $dados está obtendo uma consulta 
while($dados = mysqli_fetch_array($resultado)):
	$show [$n] = $dados[0]; //Após receber consulta de $dados passamos ela para $show
    // $show vai incrementar para $n e $n vai gerar um Array interno para própria $show
	$n++; // $n agora vai imprementar para o nosso ponto Inicial fazer as verificações
endwhile;

$final = implode($show, ','); // var $final vai concatenar o nosso Array de $show e tornar-se a mesma

echo $final; // exibindo o Array


?>